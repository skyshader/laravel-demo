<div class="academy-container">

	<!-- Academy Name -->
	<div class="form-group required">
		<label for="academy-name">Academy's Name</label>
		<?php $name = isset($academy) ? $academy->name : old('name') ?>
		<input type="text" id="academy-name" name="name" value="{{ $name }}" required placeholder="Your academy's name" class="form-control" >
		<div class="row">
			<div class="col-md-12">
				<div class="errors hide">
					<p class="error-message"></p>
				</div>
			</div>
		</div>
	</div><!--/ Academy Name -->

	<!-- Username -->
	<div class="form-group required">
		<label for="username">Username</label>
		<?php $username = isset($academy) ? $academy->username : old('username') ?>
		<input type="text" id="username" name="username" value="{{ $username }}" required placeholder="Your username" class="form-control" >
		<div class="row">
			<div class="col-md-12">
				<div class="errors hide">
					<p class="error-message"></p>
				</div>
			</div>
		</div>
	</div><!--/ Username -->

	<!-- Email -->
	<div class="form-group required">
		<label for="email">Email</label>
		<?php $email = isset($academy) ? $academy->email : old('email') ?>
		<input type="email" id="email" name="email" value="{{ $email }}" required placeholder="Your email address" class="form-control" >
		<div class="row">
			<div class="col-md-12">
				<div class="errors hide">
					<p class="error-message"></p>
				</div>
			</div>
		</div>
	</div><!--/ Email -->

	<!-- Location -->
	<div class="form-group required">
		<label for="latitude">Location</label>
		<div class="row">
			<div class="col-md-4">
				<?php $latitude = isset($academy) ? $academy->getLocation()[0] : old('latitude') ?>
				<input type="text" id="latitude" name="latitude" value="{{ $latitude }}" required placeholder="Latitude" class="form-control" >
			</div>
			<div class="col-md-4">
				<?php $longitude = isset($academy) ? $academy->getLocation()[1] : old('longitude') ?>
				<input type="text" id="longitude" name="longitude" value="{{ $longitude }}" required placeholder="Longitude" class="form-control" >
			</div>
			<div class="col-md-4">
				<button class="btn btn-info detect-location disabled pull-right">Please wait..</button>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="errors hide">
					<p class="error-message"></p>
				</div>
			</div>
		</div>
	</div><!--/ Location -->

	<!-- Phone -->
	<div class="form-group">
		<label for="phone">Phone</label>
		<input type="text" id="phone" name="phone" value="{{old('phone')}}" placeholder="Your phone" class="form-control" >
	</div><!--/ Phone -->

	<!-- Description -->
	<div class="form-group">
		<label for="description">Description</label>
		<textarea type="description" id="description" name="description" value="{{old('description')}}" placeholder="Write a description here" class="form-control" ></textarea>
	</div><!--/ Description -->

</div>