<?php

use Yee\Managers\Controller\Controller;
use Yee\Managers\CacheManager;
use App\Models\LoginModel\LoginModel;
use Yee\Libraries\Connectors\MemcachedConnector;

class LoginController extends Controller
{
     /**
     * @Route('/login')
     * @Name('login.index')
     */
    public function indexAction( )
    {
    	$app = $this->getYee();
      
    	$data = array();
        if(isset($_SESSION['userIsLogged'])){
                $app->redirect('/coinflip');
        }
    	$app->render('login/login.twig', $data);
    }

     /**
     * @Route('/login') 	
     * @Method('POST')
     * @Name('login.post')
     */
    public function postAction()
    {
        $app = $this->getYee();
        $newUserName = $app->request->post('userName');
        $unique_form_name = "loginForm";
        
        $newLoginModel = new LoginModel($newUserName, $unique_form_name);
        $validateData = $newLoginModel->checkLoginValidation();
        
        if($validateData == false){
        	$data = array(
            "error_login" => "Please fill the field. Your name must be between 3 and 20 symbols. This name may be in use.");

            $app->render('login/login.twig', $data);
        }else{
        	$userExists = $newLoginModel->checkUserExist();

            $_SESSION['userIsLogged'] = true;
            $_SESSION['userIsLogged'] = $newUserName;

            $newToken = $newLoginModel->getCsrfToken();
            $newValidateToken = $newLoginModel->getValidateToken();
            if($newValidateToken){
                $app->redirect('/coinflip');       
            }else{
                $app->redirect('/login');  
            }      
        }
    }
}