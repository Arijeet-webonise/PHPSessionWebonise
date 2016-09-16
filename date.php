<?php
	/*
		Return Number of days left in a year
		parameter is a array(year,month,day) 
	*/
	function no_of_days($date1){
		if($date1[1] <=2){
			$date1[1] = $date1[1]+12;
     		$date1[0] = $date1[0]-1;
		}
		return (int)((146097*$date1[0])/400) + (int)((153*$date1[1] + 8)/5) + $date1[2];
	}
	/*
		Return Diffrence between the dates
		parameter is a array(year,month,day) of date1 and date2 
	*/
	function caldif($date1,$date2){
		return abs(no_of_days($date1)-no_of_days($date2))+1;
	}
	if(isset($_REQUEST['submit'])){
		if(isset($_REQUEST['date1'])&&isset($_REQUEST['date2']))
		{
			$date1=explode('-', $_REQUEST['date1']);
			$date2=explode('-', $_REQUEST['date2']);
			$diff=date_diff(date_create($_REQUEST['date1']),date_create($_REQUEST['date2']))->days;
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>date</title>
</head>
<body>
<form action="<?= $_SERVER['PHP_SELF'] ?>">
	<input type="date" name="date1">
	<input type="date" name="date2">
	<input type="submit" name="submit">
	 <?php 
		if(isset($_REQUEST['submit'])){
			?>Diffrence is : <?php echo $diff.'Days';
		} 
	?> 
</form>
</body>
</html>