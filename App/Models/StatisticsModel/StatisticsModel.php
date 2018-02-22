<?php 
namespace App\Models\StatisticsModel;

class StatisticsModel{

	private $app;
	private $headPercentage;
	private $tailPercentage;
	private $headWinPercentage;
	private $tailWinPercentage;
	private $queryStatistics;

	public function __construct()
	{
		$this->app = \Yee\Yee::getInstance();
		$this->queryStatistics = $this->app->db['mysqli']->get('coinflip_statistics');
		$this->headPercentage = $this->queryStatistics[0]["head_choosen"];
		$this->tailPercentage = $this->queryStatistics[0]["tail_choosen"];
		$this->headWinPercentage = $this->queryStatistics[0]["head_win"];
		$this->tailWinPercentage = $this->queryStatistics[0]["tail_win"];
	}

	/**
	 *  Statistics choosen head
	 */
	public function headStatistics()
	{
		$headStatistics = $this->headPercentage / ($this->headPercentage + $this->tailPercentage) * 100;
		return round($headStatistics);
	}

	/**
	 *  Statistics choosen tail
	 */
	public function tailStatistics()
	{
		$tailStatistics = $this->tailPercentage / ($this->headPercentage + $this->tailPercentage) * 100;
		return round($tailStatistics);
	}

	/**
	 *  Statistics for won head
	 */
	public function headWinStatistics()
	{
		$headWinStatistics = $this->headWinPercentage / ($this->headWinPercentage + $this->tailWinPercentage) * 100;
		return round($headWinStatistics);
	}

	/**
	 *  Statistics for won tail
	 */
	public function tailWinStatistics()
	{
		$tailWinStatistics = $this->tailWinPercentage / ($this->headWinPercentage + $this->tailWinPercentage) * 100;
		return round($tailWinStatistics);
	}
}