<?php

use Yee\Managers\Controller\Controller;
use Yee\Managers\CacheManager;
use App\Models\GameModel\GameModel;

class GameController extends Controller
{

    /**
     * @Route('/random')
     * @Name('coinflip.random')
     */
    public function test()
    {
        $model = new GameModel();

        $tests = 1000000;

        $win = 0;
        $lose = 0;

        for($i = 0; $i < $tests; $i++){
            $rand = $model->getRandom();
            if ($rand < 0.5){
                $win++;
            } else {
                $lose++;
            }
        }
        $win /= $tests;
        $lose /= $tests;
        echo "<pre>WIN: $win LOSE: $lose </pre>";
    }

     /**
     * @Route('/coinflip')
     * @Name('coinflip.index')
     */
    public function indexAction( )
    {
        $app = $this->getYee();
        
        if(isset($_SESSION['userIsLogged'])){

            $gameModel = new GameModel();
            $showAmountDollar = $gameModel->getAmountDollars();

            $data = array(
                        "amountDollar"      => $showAmountDollar['login_dollars']
                        );
            $app->render('coinflip_game/coinflip_game.twig', $data);
        }else{
            $app->redirect('/login');
        }    
    }

    /**
     * @Route('/coinflip')
     * @Method('POST')
     * @Name('coinflip.post')
     */
    public function postAction( )
    {
        $app = $this->getYee();
        $heads = $app->request->post('heads');
        $tails = $app->request->post('tails');  
        $userBetValue = (int)$app->request->post('userBetValue');

        $newGameModel = new GameModel();
        $newGameModel->setVariables($heads, $tails, $userBetValue);
        $checkSecurity = $newGameModel->securityCheck();
        $validBet = $newGameModel->setValidationUserBet();
        $validBetAmount = $newGameModel->securityBalance();

        if ($validBet == false){
            $data = array(
                        "errorBetValidation"    => "Invalid bet. Your bet must be number bigger than zero and smaller than your ballance"
                        );
        } else if ($checkSecurity == false){
            $data = array(
                        "error"                 => "Please choose coin and then press START buton"
                        );
        } else {
            $data = $newGameModel->gameLogic();
            


            /*
            $fakeUser = null;

            if(isset($_SESSION['ip']) && ($_SESSION['last_post'] + 0.5) > time()){
                $fakeUser = true; 
            } 

            if($fakeUser){
                session_unset(); 

                session_destroy();

                $app->redirect('/login');
            }

            $_SESSION['last_post'] = time();
            $_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
    */

        }
    
        echo json_encode($data);
    }
}