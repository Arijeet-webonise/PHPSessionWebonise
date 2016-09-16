<?php
	/*
		Convert time from IST to GMT
		Parameter:time string in format(yyyy:mm:dd)
		Return:string in GMT
	*/
	function getGMT($timestr){
		$time=explode(':', $timestr);
		$time[1]-=30;
		if($time[1]<0){
			$time[1]+=60;
			$time[0]--;
		}
		$time[0]-=4;
		if($time[0]<0){
			$time+=24;
		}
		return 'GMT:'.$time[0].':'.$time[1].':'.$time[2];
	}
	/*
		Convert time from IST to Centern American Time
		Parameter:time string in format(yyyy:mm:dd)
		Return:string in Centern American Time
	*/
	function getUSC($timestr){
		$time=explode(':', $timestr);
		$time[1]-=30;
		if($time[1]<0){
			$time[1]+=60;
			$time[0]--;
		}
		$time[0]-=10;
		if($time[0]<0){
			$time+=24;
		}
		return 'US Center Time:'.$time[0].':'.$time[1].':'.$time[2];
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Time Convertion</title>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<div>
		<?php
		date_default_timezone_set('Asia/Kolkata');
		$IST= date('H:i:s');
		echo '<li>IST:'.$IST.'</li>';
		echo '<li>'.getGMT($IST).'</li>';
		echo '<li>'.getUSC($IST).'</li>';
		?>
	</div>
</body>
</html>