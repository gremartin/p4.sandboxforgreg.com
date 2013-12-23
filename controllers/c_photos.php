<?php 
class photos_controller extends base_controller{
	public function __construct(){
		parent::__construct();
	}
	public function add(){
		//set up view
		$this->template->content = View::instance('v_photos_add');
		$this->template->title = "Add photo";	
		
		//add js file
	$client_files_body = Array(
			"/js/jquery.form.js",
			"/js/photos_add.js",
			"/js/photos_add_text.js"
			);
		$this->template->client_files_body = Utils::load_client_files($client_files_body);
		//Render view
		echo $this->template;
	}
	public function p_add(){
		Upload::upload($_FILES, "/uploads/images/", array("jpeg", "JPEG", "jpg", "JPG", "png", "PNG", "bmp", "BMP"), "temp");
		
	
	}
	public function p_add_text(){		
		//link user to photo record
		$_POST['uploaded_by'] = $this->user->user_id;		
		# Create created and modified timestamps
		$_POST['date_uploaded'] = Time::now();
		$time_added = $_POST['date_uploaded'];
		$ext = $_POST['extension'];
		DB::instance(DB_NAME)->insert('photos', $_POST);		
		$where_condition = "SELECT photo_id FROM photos WHERE date_uploaded =".$time_added;
		
		$last_photo = DB::instance(DB_NAME)->select_field($where_condition);
		$old_name = "uploads/images/temp.".$ext;
		$new_name = "uploads/images/".$last_photo.".".$ext;	
		rename($old_name, $new_name);				
		unlink("uploads/images/temp.".$ext);
		/*$thumb_nail = "uploads/thumbnails/".$last_photo.".".$ext;
		copy($new_name, $thumb_nail);
		save_image($thumb_nail, "10");*/
		
	}
	public function gallery(){
		$this->template->content = View::instance('v_photos_gallery');
		$this->template->title	= "Images";
		//build query for DB call
			$q ="SELECT
					photos.title,
					photos.photo_id,
					photos.uploaded_by,
					photos.date_uploaded,
					photos.extension,
					photos.year,
					users.first_name,
					users.last_name
				FROM photos
				INNER JOIN users
					ON users.user_id = photos.uploaded_by";
			//run query
		$photos = DB::instance(DB_NAME)->select_rows($q);
		//send results to view
		$this->template->content->photos = $photos;
		//render view
		echo $this->template;
	
	}
	public function edit($photo_id){
			//set up view
		$this->template->content = View::instance('v_photos_edit');
		$this->template->title = "Edit photo";				
		//add js file
		$client_files_body = Array(
				"/js/jquery.form.js",
				"/js/photos_edit.js",
				"/js/photos_edit_text.js"
				);//build query for DB call
			$q ="SELECT
					photos.title,
					photos.description,
					photos.photo_id,
					photos.photographer,
					photos.uploaded_by,
					photos.date_uploaded,
					photos.extension,
					photos.year,
					users.first_name,
					users.last_name
				FROM photos
				INNER JOIN users
					WHERE photo_id =".$photo_id;
			//run query
		$photo = DB::instance(DB_NAME)->select_row($q);
		//send results to view
		$this->template->client_files_body = Utils::load_client_files($client_files_body);
		$this->template->content->photo = $photo;
		//render view		
		echo $this->template;
	}
	public function p_edit(){
		Upload::upload($_FILES, "/uploads/images/", array("jpeg", "JPEG", "jpg", "JPG", "png", "PNG", "bmp", "BMP"), "temp");
	
	}
	public function p_edit_text(){	
		#sanitize user data
		$_POST=DB::instance(DB_NAME)->sanitize($_POST);			
		# Create modified timestamp		
		$_POST['date_modified'] = Time::now();		
		$ext = $_POST['extension'];
		if(strlen($ext)==0){
			$data = Array('title' => $_POST['title'], 'photographer' => $_POST['photographer'], 'year' => $_POST['year'], 
								'description' => $_POST['description'], 'date_modified' => $_POST['date_modified']);}
		else	{
			$data = Array('title' => $_POST['title'], 'photographer' => $_POST['photographer'], 'year' => $_POST['year'], 
								'description' => $_POST['description'], 'extension' => $_POST['extension']);}
		DB::instance(DB_NAME)->update_row('photos', $data, "WHERE photo_id = ".$_POST['photo_id']);
		if(strlen($ext)>0){
			$old_name = "uploads/images/temp.".$ext;
			$new_name = "uploads/images/".$_POST['photo_id'].".".$ext;	
			rename($old_name, $new_name);				
			unlink("uploads/images/temp.".$ext);
		}
		/*$thumb_nail = "uploads/thumbnails/".$last_photo.".".$ext;
		copy($new_name, $thumb_nail);
		save_image($thumb_nail, "10");*/
		
	}
	public function view_record($photo_id){
		$this->template->content = View::instance('v_photos_view_record');
		$this->template->title	= "Image Details";
				//build query for DB call
			$q ="SELECT
					photos.title,
					photos.description,
					photos.photo_id,
					photos.photographer,
					photos.uploaded_by,
					photos.date_uploaded,
					photos.extension,
					photos.year,
					users.first_name,
					users.last_name
				FROM photos
				INNER JOIN users
					WHERE photo_id =".$photo_id;
			//run query
		$photo = DB::instance(DB_NAME)->select_row($q);
		//send results to view
		$this->template->content->photo = $photo;
		//render view
		echo $this->template;
	}
	
	public function delete_photo ($photo_id){
		#create sql statements for getting extension and finding photo record to delete
		$q_extension = "SELECT extension FROM photos WHERE photo_id =".$photo_id;	
		$q_photo = 'WHERE photo_id = '.$photo_id;
		#delete photo record from database
			
		$ext = DB::instance(DB_NAME)->select_field($q_extension);
		DB::instance(DB_NAME)->delete('photos', $q_photo);		
		//delete photo from uploads images folder
		unlink("uploads/images/".$photo_id.".".$ext);
		#send user back to message index
		Router::redirect("/photos/gallery");
	
	}
}