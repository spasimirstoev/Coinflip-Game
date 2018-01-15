<?php
namespace App\Models\GameModel;

class GameModel 
{
	private $heads;
	private $tails;
	private $balance;
	private $userBetValue;

	public function __construct()
	{
		$app = \Yee\Yee::getInstance();
		$this->db = $app->db['mysqli'];
		$this->balance = $this->getAmountDollars();
		$this->balance = $this->balance["login_dollars"];
	}

	public function setVariables($heads, $tails, $userBetValue)
	{
		$this->heads = $heads;
		$this->tails = $tails;
		$this->userBetValue = $userBetValue;
	}

	/**
	 * Check result from bet.
	 */
	public function gameLogic()
	{
		$coinToss = $this->getRandom();

		$wonBet = $coinToss < 0.5; //Less than 0.5 => Won

		$coinSide = null;

		if ($wonBet){
			$coinSide = $this->tails == 1 ? 1 : 0;
		} else {
			$coinSide = $this->tails == 1 ? 0 : 1;
		}

		$this->statistics($coinSide);

		//update new balance in database with $this->balance variable
		$newBalance = null;

		if ($wonBet){
			$newBalance = array(
				"login_dollars" => $this->balance + $this->userBetValue
				);
		}else{
			$newBalance =array(
				"login_dollars" => $this->balance - $this->userBetValue
				);
		}

		if($this->db->where("login_username", $_SESSION['userIsLogged'])){
			$this->db->where("login_dollars", $this->balance);
			$updateNewBalance = $this->db->update("loggin_users", $newBalance);
			$newBalanceInDb = $this->getAmountDollars();
		}
		

		// return won or lost && coin side
		if($this->tails == 1){
			if($coinSide == 1){
				$data = array(
						"side" 		=> "tail",
	                    "result" 	=> "win",
	                    "resultBet" => $newBalanceInDb["login_dollars"]
	                    );
			return $data;
			}else{
				$data = array(	
						"side" 		=> "head",
	                    "result" 	=> "lose",
	                    "resultBet" => $newBalanceInDb["login_dollars"]
	                    );
				return $data;
				}	
		}else{
			if($coinSide != 1){
				$data = array(
						"side" 		=> "head",
	                    "result" 	=> "win",
	                    "resultBet" => $newBalanceInDb["login_dollars"]
	                    );
				return $data;
			}else{
				$data = array(
						"side" 		=> "tail",
	                    "result" 	=> "lose",
	                    "resultBet" => $newBalanceInDb["login_dollars"]
	                    );
				return $data;
			}
		}
	}

	public function getRandom()
	{
		$min = 0;
		$max = 1;

		return $min + mt_rand() / mt_getrandmax() * ($max - $min);
	}

	public function getAmountDollars()
	{
		if (isset($_SESSION['userIsLogged'])) {
			$this->db->where("login_username", $_SESSION['userIsLogged']);
			$userAmountDollars = $this->db->getOne ("loggin_users");
			return $userAmountDollars;
		}
		unset($_SESSION['userIsLogged']);
	}

	public function securityCheck()
	{
		return $this->heads == 1 xor $this->tails == 1;
	}

	public function securityBalance()
	{
		if ($this->userBetValue > $this->balance || $this->userBetValue < 1){
			return false;
		}
		return true;
	}

	public function setValidationUserBet()
	{
		if(!ctype_digit(strval($this->userBetValue)) || $this->userBetValue < 1 || $this->userBetValue > $this->balance){
			return false;
		}
		return true;
	}

	public function statistics($coinSide)
	{
		if ($this->tails == 1){
			$countTails = $this->db->rawQuery('UPDATE coinflip_statistics 
			    SET tail_choosen = tail_choosen + 1');
		} else{
			$countHeads = $this->db->rawQuery('UPDATE coinflip_statistics 
			    SET head_choosen = head_choosen + 1');
		}
	
		if ($coinSide == 1){
			$countTailsWin = $this->db->rawQuery('UPDATE coinflip_statistics 
			    SET tail_win = tail_win + 1');
		} else{

			$countHeadsWin = $this->db->rawQuery('UPDATE coinflip_statistics 
			    SET head_win = head_win + 1');
		}
	}
}