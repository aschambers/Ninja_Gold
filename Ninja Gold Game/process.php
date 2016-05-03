<?php 
session_start();

	if (!isset($_SESSION['gold'])) 
	{
		$_SESSION['gold'] = 0;
	} 

	if (!isset($_SESSION['activities'])) 
	{
		$_SESSION['activities'] = array();
	}

	function gold_amount($num1, $num2) 
	{
		return rand($num1,$num2);
	}

	function activity_log($location, $reward) {
		date_default_timezone_set('America/Los_Angeles');
		$timeStamp = date('M-d-Y h:i a', time());
		if ($reward > 0) 
		{
			return "<h3 class='profit'>You entered a " . $location . " and earned " . $reward . " golds. (" . $timeStamp . ")</h3>";
		} 
		else 
		{
			$reward = $reward * -1;
			return "<h3 class='loss'>You entered a " . $location . " and earned " . $reward . " golds... Ouch... (" . $timeStamp . ")</h3>";
		}
	}

	if(isset($_POST['farm']))
	{
		$gold = gold_amount(10, 20);
		$_SESSION['gold'] += $gold;
		array_push($_SESSION['activities'], activity_log("farm", $gold));
	}

	if(isset($_POST['cave']))
	{
		$gold = gold_amount(5, 10);
		$_SESSION['gold'] += $gold;
		array_push($_SESSION['activities'], activity_log("cave", $gold));
	}

	if(isset($_POST['house']))
	{
		$gold = gold_amount(2, 5);
		$_SESSION['gold'] += $gold;
		array_push($_SESSION['activities'], activity_log("house", $gold));
	}

	if(isset($_POST['casino']))
	{
		$percent = rand(1,100);
		if($percent <= 70)
		{
			$gold = gold_amount(-1,-50);
			$_SESSION['gold'] += $gold;
		}
		else
		{
			$gold = gold_amount(1,50);
			$_SESSION['gold'] += $gold;
		}
		array_push($_SESSION['activities'], activity_log("casino", $gold));
	}

	if(isset($_POST['reset']))
	{
		$gold = gold_amount(0,0);
		$_SESSION['gold'] *= $gold;
		$_SESSION['activities'] = array();
		header("Location: ninjagold.php");
	}

  	header("Location: ninjagold.php");
?>

