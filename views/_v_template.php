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
				<?php if($user) echo 'Hello, '.$user->first_name.'!'?>
					
				<a href='/'>Home</a>
				
				<!-- Menu for logged in users -->
				<?php if($user): ?>
					
					<a href='/photos/gallery'>View Gallery</a>
					<a href='/photos/add'>Add Photos</a>
					<a href='/users/logout'>Logout</a>
					<a href='/users/profile'>Profile</a>
				<?php else: ?>
				<!-- Menu for users not logged in -->
					<a href='/photos/gallery'>View Gallery</a>
					<a href='/users/signup'>Sign up</a>
					<a href='/users/login'>Log in</a>
					
				<?php endif; ?>
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