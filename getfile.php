<?php
//error handler function
function customError($errno, $errstr) {
  echo "Error: [$errno] $errstr";
}

//set error handler
set_error_handler("customError");

$myfile = fopen($_REQUEST['file'], "r") or die("Unable to open file!");
echo fread($myfile,filesize("local.txt"));
fclose($myfile);
?>