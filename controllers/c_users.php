<?php 
class users_controller extends base_controller{
    public function __construct(){
        parent::__construct();
    } 
		public function signup(){
		//set up view
		$this->template->content = View::instance('v_users_signup');
		$this->template->title = "Sign up";	
		
		//Render view
		echo $this->template;
		}
	public function p_signup(){
		$q = "SELECT email
				FROM users
				WHERE
					email =  '".$_POST['email']."'";
			
		$emailTest = DB::instance(DB_NAME)->select_field($q);
		if($emailTest) {
			$messageID = 0;
			$this->template->content = View::instance('v_users_signup_error');
			$this->template->title = "Sign up Error";
			
			$this->template->content->messageID = $messageID;
			echo $this->template;
		}
		else if($_POST['first_name'] == NULL OR $_POST['last_name'] == NULL OR $_POST['email'] == NULL OR $_POST['password'] == NULL){
			$this->template->content = View::instance('v_users_signup_error');
			$this->template->title = "Sign up Error";
			$messageID = 1;
			$this->template->content->messageID = $messageID;
			echo $this->template;
		}
		else{
			# Insert user into database
			$_POST['created'] = Time::now();
			$_POST['modified'] = Time::now();
			
			#Encrypt password
			$_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);
			
			#Create an encrypted token via user's email address and random string
			$_POST['token'] = sha1(TOKEN_SALT.$_POST['email'].Utils::generate_random_string());
			
			$user_id = DB::instance(DB_NAME)->insert('users', $_POST);
			#create variable to hold token value
			$token = $_POST['token'];
			#log user in
			setcookie("token", $token, strtotime('+1 year'), '/');			
			
			
			Router::redirect("/users/confirm");			
		}
	}
	public function confirm(){
	
		//Setup view
		$this->template->content = View::instance('v_users_signup_confirm');
		$this->template->title = "Sign up successful";
		
		//Render view
		echo $this->template;
		
		
	}
	
	public function login($error = NULL){
		
		//Setup view
		$this->template->content = View::instance('v_users_login');
		$this->template->title = "Login";
		
		//send error info to template
		$this->template->content->error = $error;
		//Render view
		echo $this->template;
		
	}
	public function p_login(){
		//Sanitize user data
		$_POST = DB::instance(DB_NAME)->sanitize($_POST);
		
		//hash password to match one in DB
		$_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);
		
		//Search for user in db
		$q = "SELECT token
		FROM users
		WHERE email = '".$_POST['email']."'
		AND password = '".$_POST['password']."'";
		$token = DB::instance(DB_NAME)->select_field($q);
		if(!$token){
			Router::redirect("/users/login/error");
		}else {
			//Store token in a cookie
			setcookie("token", $token, strtotime('+1 year'), '/');			
			#Send user to main page or wherever I prefer
			Router::redirect("/");
			}
		}
	public function logout() {
		//create new token for next login
		$new_token = sha1(TOKEN_SALT.$this->user->email.Utils::generate_random_string());
		//create array to insert into users table
		$data = Array("token" => $new_token);
		//insert new token
		DB::instance(DB_NAME)->update("users", $data, "'WHERE token =".$this->user->token."'");
		//log user out
		setcookie("token", $token, strtotime('-1 year'), '/');
		//send user back to main page
		Router::redirect("/");
	}
}