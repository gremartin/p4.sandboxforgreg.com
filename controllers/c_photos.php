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
		$photo_file = Upload::upload($_FILES, "/uploads/images/", array('jpeg', 'jpg', 'png', 'bmp'), "temp");
		
	
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
		/*$thumb_nail = "uploads/thumbnails/".$last_photo.".".$ext;
		copy($new_name, $thumb_nail);
		save_image($thumb_nail, "10");*/
		
	}
}