var options = {
	type: 'POST',
	url: 'p_edit',
			beforeSubmit: function() {
			//get filename extension from submitted file
			var image = user_photo['value'];
			var ext = image.split('.').pop();
			//check if file supported
			if(ext != 'jpeg' && ext != 'JPEG' && ext != 'jpg' && ext != 'JPG' && ext != 'png' && ext != 'PNG' && ext != 'bmp' && ext != 'BMP'){
				$('#photo_display').html("Unsupported File Type");
				console.log(ext);
				return false;
				}
			$('#photo_display').html("Uploading...");
		},
		success: function(){
			var image = user_photo['value'];
			var ext = image.split('.').pop();
			//load image in photo display div
			$('#photo_display').html("<div ><img id ='preview_image' src='../uploads/images/temp."+ ext +"'/></div>");
			//load extension in photo_info form
			$('#photo_extension').val(ext);			
		}
	};
	$('#photo_form').ajaxForm(options);
	