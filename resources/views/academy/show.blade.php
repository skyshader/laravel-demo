@extends('layout')


@section('content')

		<div class="row header-fixed">
		    <div class="col-md-12">
		        <h1 data-location="{{ json_encode($academy->locationData()) }}">{{ $academy->name }}</h1>
		    </div>
		</div>

        <div class="row content-main top-padded">
    		<div class="col-md-6">

				@if(!empty($academy->description))
					{{ $academy->description }}
					<br><br>
				@else
					<p>No description provided.</p>
				@endif

				@foreach($academy->tags as $tag)
					<span class='label label-default'>{{ $tag->name }}</span>
				@endforeach

				<br><hr>

				<h3>Images</h3>

				<div class="row">
					<div class="col-md-12">

						@if(isset($academy->images[0]))
							@foreach($academy->images as $image)
								<div class="image-group">
									<div class="image-holder">
										<img src="{{ $image->path() }}" class="image-preview" />
									</div>
								</div>
							@endforeach
						@else
							<p>No images uploaded.</p>
						@endif

					</div>
				</div>

				<br><hr>

				<h3>Slots</h3>

				<div class="row">
					<div class="col-md-12">
						@if(isset($academy->slots[0]))
							<?php
								$days = array(
									'Sunday', 'Monday', 'Tuesday',
									'Wednesday', 'Thursday',
									'Friday', 'Saturday'
								);
							?>
							<table class="table table-hover table-bordered mt20">
								<thead>
									<tr>
										<th>#</th>
										<th>Day</th>
										<th>Start</th>
										<th>End</th>
									</tr>
								</thead>
								<tbody>
									@foreach($academy->slots as $key=>$slot)
										<tr>
											<th scope="row">{{ $key + 1 }}</th>
											<td>{{ $days[$slot->day - 1] }}</td>
											<td>{{ $slot->slot_from }}</td>
											<td>{{ $slot->slot_to }}</td>
										</tr>
									@endforeach
								</tbody>
							</table>
						@else
							<p>No slots provided.</p>
						@endif
					</div>
				</div>
				<br><br><br>
    		</div>

    		<div class="col-md-6">
    		    <div class="map-fixed">
    		        <div id="map" class="map-container">
    		            
    		        </div>
    		    </div>
    		</div>
    	</div>

@stop