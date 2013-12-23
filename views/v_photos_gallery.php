<?php ?>

<h1>Image Gallery</h1>

	<div id = "col_headers"> 
	<div class="col_1"><h3>Photo</h3></div>
	<div class="col_2"><h3>Title</h3></div>
	<div class="col_3"><h3>Year Taken</h3></div>
	<div class="col_4"><h3>Uploaded by</h3></div>
	<div class="col_5"><h3>Date uploaded</h3></div>
</div>
<?php foreach ($photos as $photo): ?>
	<article id = "gallery_entries">
		<div class="col_1" id = "image_div"><img id = "sample_photo" src='../uploads/images/<?=$photo['photo_id']?>.<?=$photo['extension']?>'/></div>			
		<div id="gallery_text">
			<div class = "col_2"><p><?=$photo['title']?></></div>
			<div class = "col_3"><p><?=$photo['year']?> </p></div>
			<div class = "col_4"><p><?=$photo['first_name']?> <?=$photo['last_name']?></div>
			<div class = "col_5"><p><time datetime="<?=Time::display($photo['date_uploaded'], 'Y-m-d G:i')?>">
			<?=Time::display($photo['date_uploaded'])?>
		</time></div>		
		</div>
		<br><a href='/photos/view_record/<?=$photo['photo_id']?>'><input class ="gallery_btn" type='submit' value="View Record"></a>
		<?php if($user): ?>
		<a href='/photos/edit/<?=$photo['photo_id']?>'><input class ="gallery_btn" type='submit' value="Edit"></a>
		<a href='/photos/delete_photo/<?=$photo['photo_id']?>'><input class ="gallery_btn" type='submit' value="Delete"></a>
		<?php endif; ?>
	</article>
<?php endforeach; ?>