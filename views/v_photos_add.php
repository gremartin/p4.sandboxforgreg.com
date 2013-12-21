<?php ?>
<div id="add_photo_header">
	<h2>Upload a photo</h2>
</div>
<!-- div for content on left side of this page-->
<div id = "add_photo_left">
	<!--div to display photos being viewed/uploaded-->
	<div id='photo_display'></div>
	<br>
	<!-- form to retrieve photo from user -->
	<form id="photo_form" method='POST' enctype ="multipart/form-data" action='/photos/p_add'>
		<input type="hidden" name="MAX_FILE_SIZE" value = "1000000"/> 
		<input type='file' id='user_photo' name = 'user_photo'>	
		<input id='sbmt_btn' type='submit' value="Upload Photo">
	</form>
</div> <!-- end add_photo_left div -->
<!-- div for content on right side of this page-->
<div id = "add_photo_right">
	<!-- div for user to add text for database to associate with photo-->
	<form id = "photo_info" method = 'POST' action='/photos/p_add_text'>
		<label for = "photo_title">Title</label>
		<input class="photo_text" id ="photo_title" type='text' name = "title"><br><br>		
		<label for = "photo_photographer">Photographer</label>
		<input class="photo_text" id ="photo_photographer" type='text' name = "photographer"><br><br>			
		<label for = "photo_year">Year</label>
		<input class="photo_text" id ="photo_year" type='text' name = "year"><br><br>			
		<label for = "photo_description">Description</label><br>
		<textarea id ="photo_description" name='description'>Enter a brief description</textarea><br><br>
		<input id="save_btn" type='submit' value="Save Photo">
	</form>
	
</div> <!-- end add_photo_right div -->
<div id="add_photo_footer">
	<br>
	<input id="cancel_btn" type='submit' value="Cancel">
</div>
