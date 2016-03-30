@extends('layout')

@section('content')

        <div class="row header-fixed">
            <div class="col-md-12">
                <h1>Explore Academies</h1>
            </div>
        </div>

        <div class="row content-main top-padded">
            <div class="col-md-6">

                @if (isset($success_message))
                    <br>
                    <div class="alert alert-success">
                        {{ $success_message }}
                    </div>
                @endif

                @if(isset($academies[0]))
                    <ul class="list-group academy-list">
                        <?php $i = 0; ?>
                        @foreach ($academies as $academy)
                            <li class="list-group-item" data-index="{{ $i++ }}" data-location='{{ json_encode($academy->locationData()) }}'>
                                <strong>{{ $academy->name }}</strong>
                                <a class="pull-right" target="_blank" href="{{ $academy->path() }}">
                                    <i class="glyphicon glyphicon-new-window"></i>
                                </a>
                            </li>
                        @endforeach
                    </ul>

                    <a class="display-block btn btn-default" href="/academy/create"><strong>Add an Academy</strong></a>
                @else
                    <div class="text-center">
                        <h3>No academies listed yet.</h3>
                        <a class="btn btn-lg btn-default mt20" href="/academy/create">Create an Academy</a>
                    </div>
                @endif
            </div>
            <div class="col-md-6">
                <div class="map-fixed">
                    <div id="map" class="map-container">
                        
                    </div>
                </div>
            </div>
        </div>

@stop
