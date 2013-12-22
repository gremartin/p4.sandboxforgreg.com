	
var options = {
	type: 'POST',
	url: 'p_add',
			beforeSubmit: function() {
			var image = user_photo['value'];
			var ext = image.split('.').pop();
			if(ext != 'jpeg' && ext != 'jpg' && ext != 'png' && ext != 'bmp'){
				$('#photo_display').html("Unsupported File Type");
				console.log(ext);
				return false;
				}
			$('#photo_display').html("Uploading...");
		},
		success: function(){
			var image = user_photo['value'];
			var ext = image.split('.').pop();
			$('#photo_display').html("<div ><img id ='preview_image' src='../uploads/images/temp."+ ext +"'/></div>");
			$('#photo_extension').val(ext);			
		}
	};
	$('#photo_form').ajaxForm(options);
	