<?php 
session_start();
class HangMan
{
	public $vowel=array('A','E','I','O','U');
	public $text='LEGEND';	
	public $sample=array();
    public $tries;
    public $textarray;

    function gettextarray(){
    	return $this->textarray;
    }
    function gettries(){
    	return $this->tries;
    }
    function counttries(){
		if(!isset($_REQUEST['tries'])){
			$this->tries= 7;
		}else{
			$this->tries=$_REQUEST['tries'];
			if(2==$this->tries){
				ob_start();
			    header('refresh:5;url=gameover.php');
			    ob_end_flush();
			}
		}
	}

	function check(){
		$this->try="tries";
		for ($i=0;$i<strlen ($this->text);$i++) {
			array_push($this->sample,$this->text[$i]);
		}

		if(isset($_SESSION['word'])){
			$this->textarray=$_SESSION['word'];
		}
		else{
			$this->textarray=$this->sample;
			foreach ($this->textarray as $key => $letter) {
				if(!in_array($letter,$this->vowel)){
					$this->textarray[$key]='_';
				}
			}
		}

		if(isset($_REQUEST['letter'])){
			$letter=strtoupper($_REQUEST['letter']);
			if(in_array($letter,$this->sample)){
				foreach ($this->sample as $key => $value) {
					if($value==$letter){
						$this->textarray[$key]=$letter;
					}
				}
			}else{
				$this->tries--;
			}
		}
		// var_dump(in_array('_',$textarray));
		if(!in_array('_',$this->textarray)){
			header('refresh:5;url=victory.php');
		}
	}
}

$hm = new HangMan();
$hm->counttries();
$hm->check();
$_SESSION['word']=$hm->gettextarray();
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
	<div class="well" id="Text"><?= implode(' ',$hm->gettextarray()) ?></div>
	<div class="col-sm-6">
		<form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
			<input type="text" name="letter" <?php if($hm->gettries()==1){?> disabled <?php } ?>>
			<input type="hidden" name="tries" value="<?php $try="tries";
			 echo $hm->gettries(); ?>">
		</form>
	</div>
	<div class="col-sm-6" id="hangman"><img src="Assets/try<?php if($hm->gettries()>0){echo 8-$hm->gettries();}else{echo 7;} ?>.gif"></div>
</body>
</html>