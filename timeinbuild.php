<!DOCTYPE html>
<html>
<head>
	<title>SESSION 4</title>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<div>
		<?php
  		$gmt= date('Y-m-d H:i:s');
  		$timezones=array('IST'=>'Asia/Kolkata', 'Eastern US'=>'America/New_York', 'Central US'=>'America/Chicago', 'Mountain'=>'America/Denver','Mountain no DST US'=> 'America/Phoenix', 'Pacific US'=>'America/Los_Angeles','Alaska US'=>'America/Anchorage', 'Hawaii US'=>'America/Adak', 'Hawaii no DST US'=>'Pacific/Honolulu');
		foreach ($timezones as $area => $timezone) {
			date_default_timezone_set($timezone);
  			$IST= date('Y-m-d H:i:s');
  			echo '<li>'.$area.':'.$IST.'</li>';
		}
  		echo 'UK:'.($gmt);   
		?>
	</div>
</body>
</html>