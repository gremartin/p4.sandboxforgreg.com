<?php ?>
<div id="add_photo_header">
	<h2>Edit Photo</h2>
</div>
<!-- div for content on left side of this page-->
<div id = "add_photo_left">
	<!--div to display photos being viewed/uploaded-->
	<div id='photo_display'><img id ='preview_image' src='/uploads/images/<?=$photo['photo_id']?>.<?=$photo['extension']?>'/></div>
	<br>
		
</div> <!-- end add_photo_left div -->
<!-- div for content on right side of this page-->
<div id = "add_photo_right">
	<!-- div for user to add text for database to associate with photo-->
	<form id = "photo_info" method = 'POST' action='/photos/p_edit_text'>
		<label for = "photo_title">Title</label>
		<input class="photo_text" id ="photo_title" type='text' value="<?=$photo['title']?>" maxlength = "20" name = "title"><br><br>		
		<label for = "photo_photographer">Photographer</label>
		<input class="photo_text" id ="photo_photographer" type='text' value="<?=$photo['photographer']?>" maxlength = "20" name = "photographer"><br><br>			
		<label for = "photo_year">Year</label>
		<input class="photo_text" id ="photo_year" type='text' value="<?=$photo['year']?>" maxlength = "20" name = "year"><br><br>			
		<label for = "photo_description">Description</label><br>
		<textarea class="photo_text" id ="photo_description" maxlength = "20" name='description'><?=$photo['description']?> </textarea><br><br>
		<input class="photo_text" id= "photo_extension" type='hidden' name="extension">
		<input class="photo_text" id= "photo_identifier" type='hidden' value="<?=$photo['photo_id']?>" name="photo_id">
		<input id="save_btn" type='submit' value="Update Photo">
	</form>
	<div id = "results"></div>
</div> <!-- end add_photo_right div -->
<div id="add_photo_footer">	
</div>
