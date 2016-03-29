<div class="tag-container">
	<h3>Tags</h3>

	<br>

	<div class="row">
		<div class="col-md-12">
			<label for="tags-select">Add Tags</label>
			<select class="form-control" required multiple name="tags[]" id="tags-select">
				@foreach($tags as $key => $tag)
					<option value="{{ $tag->name }}">{{ $tag->name }}</option>
				@endforeach
			</select>
		</div>
	</div>
</div>