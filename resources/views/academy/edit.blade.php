@extends('layout')


@section('styles')
	<link rel="stylesheet" href="/css/bootstrap-timepicker.min.css">
	<link rel="stylesheet" href="/css/select2.min.css">
@stop


@section('content')

		<div class="row header-fixed">
		    <div class="col-md-12">
		        <h1>Edit {{ $academy->name }}</h1>
		    </div>
		</div>

		<div class="row content-main top-padded">
			<div class="col-md-6 col-md-offset-3">
				<form id="save-academy-form" action="{{ URL::to('academy') }}" method="POST" enctype="multipart/form-data" >

					@if (count($errors) > 0)
					    <div class="alert alert-danger">
					        <ul>
					            @foreach ($errors->all() as $error)
					                <li>{{ $error }}</li>
					            @endforeach
					        </ul>
					    </div>
					@endif

					{{ csrf_field() }}

					@include('academy._form', compact('academy'))

					<br><hr>

					@include('tag._form', compact('academy'), compact('tags'))

					<br><hr>

					@include('slot._form', compact('academy'))

					<br><hr>

					@include('image._form', compact('academy'))

					<br><hr>

					<br><br>
					
					<div class="form-group">
						<button type="submit" class="btn btn-lg btn-primary display-block full-width">Save</button>
					</div>

					<br><br>
				</form>
			</div>
		</div>

@stop



@section('scripts')
	<script src="/js/bootstrap-timepicker.min.js"></script>
	<script src="/js/select2.min.js"></script>
@stop