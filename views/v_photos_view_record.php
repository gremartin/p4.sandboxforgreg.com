<?php ?>
<h1>Image Record</h1>
<img id = "large_photo" src='/uploads/images/<?=$photo['photo_id']?>.<?=$photo['extension']?>'/></img>
<div id = "image_details"> 
	<ul>
	<li>Title: <?=$photo['title']?></li>
	<li>Photographer: <?=$photo['photographer']?></li>
	<li>Year taken:  <?=$photo['year']?></li>
	<li>Uploaded by: <?=$photo['first_name']?> <?=$photo['last_name']?></time></li> 
	</ul>
	<p><?=$photo['description']?></p>
	<br>

</div>