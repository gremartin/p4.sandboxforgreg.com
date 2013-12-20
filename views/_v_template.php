<!DOCTYPE html>
<html>
<head>
	<title><?php if(isset($title)) echo $title; ?></title>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<!-- Common JS/CSS-->
	<link rel="stylesheet" href="/css/boston_historical_image_database.css"> 
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"> </script> 				
	<!-- Controller Specific JS/CSS -->
	<?php if(isset($client_files_head)) echo $client_files_head; ?>
	
</head>

<body>	
	<div id="page">
		
		<div id ='header'>			
			
			<div id = 'menu'>	
				
					
				<a href='/'><div class ="navigation">Home</div></a>
				
				<!-- Menu for logged in users -->
				<?php if($user): ?>
					
					<a href='/photos/gallery'><div class ="navigation">View Gallery</div></a>
					<a href='/photos/add'><div class ="navigation">Add Photos</div></a>
					<a href='/users/logout'><div class ="navigation">Logout</div></a>
					<a href='/users/profile'><div class ="navigation">Profile</div></a>
				<?php else: ?>
				<!-- Menu for users not logged in -->
					<a href='/photos/gallery'><div class ="navigation">View Gallery</div></a>
					<a href='/users/signup'><div class ="navigation">Sign up</div></a>
					<a href='/users/login'><div class ="navigation">Log in</div></a>
					
				<?php endif; ?>
				<div id = "greeting"><?php if($user) echo 'Hello, '.$user->first_name.'!'?></div>
			</div>  <!-- end menu div-->
		</div>	<!--end header div-->
		
		<br>
		<div id="content">
			<?php if(isset($content)) echo $content; ?>

			<?php if(isset($client_files_body)) echo $client_files_body; ?>
		</div> <!-- end content div -->
	</div>
</body>
</html>