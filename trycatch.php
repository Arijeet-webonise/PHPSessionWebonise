<?php

function checkfile($file){
	if(file_exists($file)){
		throw new Exception("File Already Excess", 1);
	}
	return true;
}

?>