$(document).ready(function() {

	if (navigator.geolocation) {
		$('.detect-location').removeClass('disabled').text('Auto Detect');
	} else {
		$('.detect-location').remove();
	}

	if($('.timepicker').length > 0)
		initializeTimePicker();

	var slotIndex = 1;
	$('.slot-add-next').on('click', function(e) {
		e.preventDefault();
		var templateString = $('.template-slot').prop('outerHTML');
		templateString = templateString.replace(new RegExp("{id}", "g"), slotIndex.toString());
		templateString = templateString.replace(new RegExp("template-name", "g"), 'name');
		var template = $(templateString);
		$(".slots-container .all-slots").append(template.html());
		initializeTimePicker();
		slotIndex++;
	});

	$('.slots-container').on('click', '.slot-delete', function(e) {
		e.preventDefault();
		$(this).closest('.slot-box').remove();
	});

	$("#image-input").change(function(){
		$('.image-container').html('');
		$('.image-choose').addClass('disabled')
						  .find('.image-choose-text')
						  .text('Please wait...');
		files = this.files;
		for (var i = 0; i < files.length; i++) {
			setTimeout(readURL(files[i]), 1);
		}
	});

	$('.detect-location').on('click', function(e) {
		e.preventDefault();
		if(!navigator.geolocation) return;
		$(this).addClass('disabled').text('Please wait..');
		navigator.geolocation.getCurrentPosition(geoSuccessFunction, geoErrorFunction);
	});

	$('input').on('focus', function() {
		hideInputError($(this).attr('id'));
	});

	if($('#tags-select').length > 0) {
		$('#tags-select').select2({
			placeholder: 'Select a tag',
			tags: true,
			tokenSeparators: [','],
			createTag: function (params) {
			    return {
			      id: params.term,
			      text: params.term,
			      newOption: true
			    }
			},
			templateResult: function (data) {
			    var $result = $("<span></span>");
			    $result.text(data.text);
			    if (data.newOption) {
			      $result.append(" <em>(new)</em>");
			    }
			    return $result;
			}
		});
	}

	if($('#map').length > 0) {
		mapLoadScript();
	}

	$('.academy-list .list-group-item').on('mouseover', function() {
		$data = $(this).data('location');
		google.maps.event.trigger(markers[$data[0]], 'click');
	});

	$('.academy-list .list-group-item').on('mouseout', function() {
		$data = $(this).data('location');
		infoWindows[$data[0]].close();
	});

});

function mapLoadScript() {
    var script = document.createElement('script');
    script.type = 'text/javascript';
    script.src = 'https://maps.googleapis.com/maps/api/js?key=AIzaSyDnHOgvwYIB7JfOFXDb8HZFb7UVZg_jFwQ&callback=initMap';
    document.body.appendChild(script);
}

function initMap() {
	var locationData = new Array();
	$('[data-location]').each(function() {
		locationData.push($(this).data('location'))
	});

	var myOptions = {
        center: new google.maps.LatLng(45.4555729, 9.169236),
        zoom: 8,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
    };

	window.map = new google.maps.Map(document.getElementById('map'), myOptions);
	window.markers = {};
	window.infoWindows = {};

    var infowindow = new google.maps.InfoWindow();
    var bounds = new google.maps.LatLngBounds();

    for(i = 0; i < locationData.length; i++) {
        marker = new google.maps.Marker({
            position: new google.maps.LatLng(locationData[i][3], locationData[i][4]),
            map: map,
            title: locationData[i][2],
            animation: google.maps.Animation.DROP
        });
        bounds.extend(marker.position);

        google.maps.event.addListener(marker, 'click', (function(marker, i) {
            return function() {
            	infowindow.setContent("<strong><a href='"+locationData[i][1]+"'>" + locationData[i][2] + "</a></strong>");
				infowindow.open(map, marker);
            }
        })(marker, i));

        markers[locationData[i][0]] = marker;
        infoWindows[locationData[i][0]] = infowindow;
    }

    map.fitBounds(bounds);
}


function geoSuccessFunction(position) {
	$('#latitude').val(position.coords.latitude);
	$('#longitude').val(position.coords.longitude);
	$('.detect-location').removeClass('disabled').text('Auto Detect');
}


function geoErrorFunction(error) {
	var errors = { 
		1: 'You need to give us permission for that!',
		2: 'Position unavailable currently!',
		3: 'Request timeout!'
	};
	showInputError('.detect-location', errors[error.code]);
	$('.detect-location').removeClass('disabled').text('Auto Detect');
}


function showInputError(field, error) {
	$(field).closest('.form-group')
			.find('.errors')
			.removeClass('hide')
			.find('.error-message')
			.text(error);
}


function hideInputError(field) {
	$errorField = $('#'+field).closest('.form-group').find('.errors');
	if(!$errorField.hasClass('hide')) {
		$errorField.addClass('hide');
		$errorField.find('.error-message').text('');
	}
}


function initializeTimePicker() {
	$('.timepicker input').each(function() {
		$(this).timepicker();
	});
}


function readURL(file) {
    var reader = new FileReader();
    var name = file.name;
    console.log(name);
    reader.onload = function (e) {
    	var img = new Image();

    	img.addEventListener("load", function() {
    		var canvas = document.createElement('canvas'),
    			MAX_WIDTH = $('.dummy-image-group .image-preview').width(),
    			MAX_HEIGHT = $('.dummy-image-group .image-preview').height(),
    			width = img.width,
    			height = img.height;

    		var sourceX = 0;
    		var sourceY = 0;
    		var IMG_SIZE = width;
    		if(width > height) {
    			sourceX = (width - height) / 2;
    			IMG_SIZE = height;
    		}
    		else {
    			sourceY = (height - width) / 2;
    			IMG_SIZE = width;
    		}

    		console.log(sourceX, sourceY, width, height, MAX_WIDTH, MAX_HEIGHT, IMG_SIZE);

    		canvas.width = width;
    		canvas.height = height;
    		canvas.getContext('2d').drawImage(img, sourceX, sourceY, IMG_SIZE, IMG_SIZE, 0, 0, width, height);


    		var dataurl = canvas.toDataURL("image/png");
    		var dummyImageHolder = $('.dummy-image-group');
    		dummyImageHolder.find('.image-preview').attr('src', dataurl);
    		$('.image-container').append(dummyImageHolder.html());

    		$('.image-choose').removeClass('disabled')
    						  .find('.image-choose-text')
    						  .text('Select Images');
    	}, false);
    	img.src = e.target.result;
    }
    reader.readAsDataURL(file);
}
