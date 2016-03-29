<!-- Slots -->

<?php
	$index = 0;
	$days = array(
		'Sunday', 'Monday', 'Tuesday',
		'Wednesday', 'Thursday',
		'Friday', 'Saturday'
	);
?>

<div class="slots-container">
	<h3>Time Slots</h3>

	<div class="all-slots">

		@include('slot._slot', [compact($days), compact($index), 'template'=>false])

	</div>

	<br>
	
	<div class="row">
		<div class="col-md-9">
			<button class="btn btn-info slot-add-next"><i class="glyphicon glyphicon-plus"></i> Add more slots</button>
		</div>
	</div>

	<div class="template-slot hide">
		<?php $index = '{id}'; ?>
		@include('slot._slot', [compact($days), compact($index), 'template'=>true])
	</div>

</div><!--/ Slots -->
