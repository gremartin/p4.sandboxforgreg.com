<?php ?>

<div id='photo_display'></div>
<form id="photo_form" method='POST' enctype ="multipart/form-data" action='/photos/p_add'>
	<input type="hidden" name="MAX_FILE_SIZE" value = "1000000"/> 
	<input type='file' id='user_photo' name = 'user_photo'>
	<br><br>
	<input id='sbmt_btn' type='submit'>
</form>
