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
			"/js/photos_add.js"			
			);
		$this->template->client_files_body = Utils::load_client_files($client_files_body);
		//Render view
		echo $this->template;
	}
	public function p_add(){
		
		$photo_file = Upload::upload($_FILES, "/uploads/", array('jpeg', 'jpg', 'png', 'bmp'), "temp");
		echo $photo_file;
	
	}
}