var options = {
	type: 'POST',
	url: 'p_add_text',
		beforeSubmit: function() {
			if(($('#photo_title').val().length == 0) ||	($('#photo_photographer').val().length == 0) ||	($('#photo_year').val().length == 0)
					 ||	($('#photo_year').val().length == 0) ||	($('#photo_extension').val().length == 0)){
				$('#results').html("All fields are required");	 
				return false;	 
				}
			$('#results').html("processing...");
		},
		success: function(){
		$('#results').html("Record successfully added")
		$(".photo_text").val("");
		$("#photo_display").empty();
		$("#user_photo").val("");
		}
	};
	$('#photo_info').ajaxForm(options);