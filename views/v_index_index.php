<?php ?>
<h1>Welcome to the Boston Historical Image Database</h1>
<div id = "index_image_div">
	<img id = "index_photo" alt="Copley Square, ca 1905" src='/images/copley_square_looking_east_loc.jpg'/></img>
	<img id = "index_photo" alt="State House, ca 1905" src='/images/state_house_loc.jpg'/></img><br>
	
</div>
<div id = "index_message">
	<p>Postcards depicting Copley Square and the State House from around 1905</p>
	<?php if(!$user): ?>
		<p>Please <a href='/users/signup'>Sign up, </a><a href='/users/login'>Log in, </a>or just view the <a href='/photos/gallery'>gallery</p>
	<?php endif; ?>
</div>