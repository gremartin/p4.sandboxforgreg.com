<?php ?>
<form method='POST' action='/users/p_signup'>

	First Name<br>
	<input type='text' name='first_name' maxlength = "20">	
	<br><br>
	
	Last Name<br>
	<input type='text' name='last_name' maxlength = "20">	
	<br><br>
	
	Email<br>
	<input type='text' name='email' maxlength = "20">	
	<br><br>
	
	Password<br>
	<input type='password' name='password' maxlength = "20">
	<br><br>
	
	Confirm Password<br>
	<input type='password' name='password_confirm' maxlength = "20">
	<br><br>

	<input id = "signup_button" type='submit' value='Sign up'>
</form>
