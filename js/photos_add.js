$(document).ready(function() {
	$('#photo_form').ajaxForm(function() {
		var image = user_photo['value'];
		var ext = image.split('.').pop();
		$('#photo_display').html("<div ><img id ='preview_image' src='../uploads/temp." + ext +"'/></div>");
		});
	});
/*$('#sbmt_btn').click(function() {
	$.ajax({
		type: 'POST',
		url: 'photos/p_add',
		success: function(response){
		$('#photo_display').html("Your photo was added.");
	},
	data: {
	
		name: $('#user_photo').val(),	
		},
	});
});
		
var options = {
	type: 'POST',
	url: 'photos/p_add',
		beforeSubmit: function() {
			$('#photo_display').html("Uploading...");
		},
		success: function(response){
			$('#photo_display').html(response);
		}
	};
	$('form').ajaxForm(options);*/
	