<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\CreateAcademyRequest;

use DB;
use Mail;
use App\Academy;
use App\Slot;
use App\Image;
use App\Tag;
use App\AcademyTag;

class AcademyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // list all academies and send it to view
        $academies = Academy::with('tags', 'slots', 'images')->get();
        return view('academy.index', compact('academies'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        // send the form to create a new academy
        return view('academy.create', compact('tags'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateAcademyRequest $request)
    {
        $academy = new Academy(array(
            'name' => $request->get('name'),
            'username' => $request->get('username'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
            'description' => $request->get('description')
        ));
        $location = $request->get('latitude') . "," . $request->get('longitude');
        $academy->setLocationAttribute($location);

        $result = DB::transaction(function () use ($academy, $request) {
            $academy->save();
            $academy->addTags($request->get('tags'));
            $academy->addSlots($request->get('slots'));
            $academy->addImages($request->file('images'));
            DB::commit();
        });

        return redirect()->route('explore')
                         ->with('success_message', 'Academy successfully added!');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $academy = Academy::where('id', $id)
                          ->with('tags', 'slots', 'images')
                          ->get()->first();
        Mail::send('email.notify', compact('academy'), function ($m) {
            $m->to('ehukewav-9759@yopmail.com', 'Demo User')
              ->subject('Someone Just Viewed An Academy!');
        });
        return view('academy.show', compact('academy'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $academy = Academy::where('id', $id)
                          ->with('tags', 'slots', 'images')
                          ->get()->first();
        $tags = Tag::all();
        return view('academy.edit', compact('academy'), compact('tags'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
