<?php 
namespace App\Models\LoginModel;
use App\Libraries\CSRF\Csrf;

class LoginModel{
	private $app;
	private $newUserName;
	private $userName;
	private $userDollars;
	private $userQuery;
	private $unique_form_name;

	public function __construct($newUserName, $unique_form_name)
	{
		$this->app = \Yee\Yee::getInstance();
		$this->userQuery = $this->app->db['mysqli']->where('login_username', $newUserName)->getOne('loggin_users');
		$this->newUserName = $newUserName;
		$this->userName = $this->userQuery['login_username'];
		$this->userDollars = $this->userQuery['login_dollars'];
		$this->unique_form_name = $unique_form_name;
		$this->newCsrf = new Csrf();
	}

	public function getCsrfToken()
	{
		return $this->newCsrf->generateToken($this->unique_form_name);
	}

	public function getValidateToken()
	{
		$token_value = $this->getCsrfToken();
		return $this->newCsrf->validateToken($this->unique_form_name, $token_value);
	}

	public function checkLoginValidation()
	{
		$len = strlen($this->newUserName);
		$min = 3;
		$max = 20;

		if($len == null || $len < $min || $len > $max){
			return false;
		}
		return true;
	}

	public function checkUserExist()
	{
		if($this->checkLoginValidation() === true){
			if($this->userQuery != null){
				return false;
			}else{
				$data = array(
					"login_username" => $this->newUserName,
					"login_dollars" => '100'
					);
				$insertData = $this->app->db['mysqli']->insert("loggin_users", $data);
			}
		}
	}
}