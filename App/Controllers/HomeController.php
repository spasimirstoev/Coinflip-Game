<?php

use Yee\Managers\Controller\Controller;
use Yee\Managers\CacheManager;
//use App\Models\HomeModel\HomeModel;

class HomeController extends Controller
{
     /**
     * @Route('/home')
     * @Name('home.index')
     */
    public function indexAction( )
    {
        $app = $this->getYee();
        //$data = array("message" => phpinfo());
        $data = array();
        $app->render('home/home.twig', $data);
    }

     /**
     * @Route('/home')
     * @Method('POST')
     * @Name('home.post')
     */
    public function thumbnailAction( )
    {
        $app = $this->getYee();

        $pathToImages = "C:/wamp64/www/kinguin_Tasks/public/images/";
        $pathToThumbs =  "C:/wamp64/www/kinguin_Tasks/public/images/tmp_name/";
        $thumbWidth = 200;

        $newModel = new App\Models\HomeModel\HomeModel();
        
        $createThumb = $newModel->createThumbnail($pathToImages, $pathToThumbs, $thumbWidth);
        
        $data = array("createThumb" => $createThumb);
      
        $app->render('home/home.twig', $data);
    }

}
