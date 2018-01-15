<?php

use Yee\Managers\Controller\Controller;
use Yee\Managers\CacheManager;
use App\Models\StatisticsModel\StatisticsModel;

class StatisticsController extends Controller
{
     /**
     * @Route('/statistics')
     * @Name('statistics.index')
     */
    public function indexAction( )
    {
        $app = $this->getYee();
        $newStatisticsModel = new StatisticsModel();
        $headStatistics = $newStatisticsModel->headStatistics();
        $tailStatistics = $newStatisticsModel->tailStatistics(); 
        $headWinStatistics = $newStatisticsModel->headWinStatistics(); 
        $tailWinStatistics = $newStatisticsModel->tailWinStatistics();
        $data = array(
            "headStatistics" => $headStatistics,
            "tailStatistics" => $tailStatistics,
            "headWin" => $headWinStatistics,
            "tailWin" => $tailWinStatistics
            );
       
        $app->render('statistics/statistics.twig', $data);
    }
}