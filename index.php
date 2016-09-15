<?php
	session_start();
	/**
	* 
	*/
	$vowel=array('A','E','I','O','U');
	$try="tries";
	$text='LEGEND';	
	$sample=array();
	class HangMan
	{
		public $textarray=NULL;
		private $text;
		private $vowel;
		public $tries;
		public $sample;
		function HangMan(){	
			// $text='LEGEND';	
		}

		function counttries(){
			if(!isset($_REQUEST['tries'])){
				return 7;
			}
			$tries=$_REQUEST['tries'];
			if(2==$tries){
				ob_start();
			    header('refresh:5;url=gameover.php');
			    ob_end_flush();
			}
			$try="tries";
			return $tries;
		}

		function check($tries,$text,$vowel,$sample){
			$try="tries";
			$t=array('text'=>$sample,'tries'=>$tries);
			for ($i=0;$i<strlen ($text);$i++) {
				array_push($sample,$text[$i]);
			}

			if(isset($_SESSION['word'])){
				$textarray=$_SESSION['word'];
			}
			else{
				$textarray=$sample;
				foreach ($textarray as $key => $letter) {
					if(!in_array($letter,$vowel)){
						$textarray[$key]='_';
					}
				}
			}

			if(isset($_REQUEST['letter'])){
				$letter=strtoupper($_REQUEST['letter']);
				if(in_array($letter,$sample)){
					foreach ($sample as $key => $value) {
						if($value==$letter){
							$textarray[$key]=$letter;
						}
					}
				}else{
					$tries--;
				}
			}
			// var_dump(in_array('_',$textarray));
			if(!in_array('_',$textarray)){
				header('refresh:5;url=victory.php');
			}
			$t['text']=$textarray;
			$t['tries']=$tries;
			return $t;
		}
	}

	$hm=new HangMan();
	$tries=$hm->counttries();
	$array=$hm->check($tries,$text,$vowel,$sample);
	$textarray=$array['text'];
	$tries=$array['tries'];
	$_SESSION['word']=$textarray;
?>
<!DOCTYPE html>
<html>
<head>
	<title>Hangman</title>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="well" id="Text"><?= implode(' ',$textarray) ?></div>
	<div class="col-sm-6">
		<form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
			<input type="text" name="letter" <?php if($tries==1){?> disabled <?php } ?>>
			<input type="hidden" name="tries" value="<?php $try="tries";
			 echo $tries; ?>">
		</form>
	</div>
	<div class="col-sm-6" id="hangman"><img src="Assets/try<?php if($tries>0){echo 8-$tries;}else{echo 7;} ?>.gif"></div>
</body>
</html>