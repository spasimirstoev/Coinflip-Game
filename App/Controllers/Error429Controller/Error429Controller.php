<?php 

use Yee\Managers\Controller\Controller;
use Yee\Managers\CacheManager;

class Error429Controller extends Controller
{
	/**
     * @Route('/error429')
     * @Name('error.index')
     */
    public function indexAction( )
    {
    	$app = $this->getYee();
    	$app->render('errorPages/429/429Error.twig', $data = array());
    }
}