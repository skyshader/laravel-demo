<div class="form-group slot-box">
	<div class="row">
		<div class="col-md-4">
			<label for="slot_day_{{ $index }}">Day</label>
			<select class="form-control" {{ ($template) ? 'template-' : '' }}name="slots[{{ $index }}][day]" id="slot_day_{{ $index }}">
				<option value="0">Select Day</option>
				@foreach($days as $key => $day)
					<option value="{{ $key + 1 }}">{{ $day }}</option>
				@endforeach
			</select>
		</div>
		<div class="col-md-3 bootstrap-timepicker timepicker">
			<label for="slot_from_{{ $index }}">Start time</label>
			<input type="text" id="slot_from_{{ $index }}" {{ ($template) ? 'template-' : '' }}name="slots[{{ $index }}][slot_from]" placeholder="Start time" class="form-control" >
		</div>
		<div class="col-md-3 bootstrap-timepicker timepicker">
			<label for="slot_to_{{ $index }}">End time</label>
			<input type="text" id="slot_to_{{ $index }}" {{ ($template) ? 'template-' : '' }}name="slots[{{ $index }}][slot_to]" placeholder="End time" class="form-control" >
		</div>
		<div class="col-md-2">
			@if($template)
				<label class="display-block full-width">&nbsp;</label>
				<button id="slot_delete_{{ $index }}" class="btn btn-danger slot-delete"><i class="glyphicon glyphicon-trash"></i></button>
			@else
				<!-- No delete button -->
			@endif
		</div>
	</div>
</div>