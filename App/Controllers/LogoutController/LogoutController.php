<?php
use Yee\Managers\Controller\Controller;
use Yee\Managers\CacheManager;

class LogoutController extends Controller
{
     /**
     * @Route('/logout')
     * @Name('logout.index')
     */
    public function indexAction( )
    {
    	$app = $this->getYee();

        session_unset(); 

        session_destroy();
        
        $app->redirect('/login');
    }
}