<?php

/**
* curlFacade
*/
class curlFacade
{
	private $list;
	private $data;
	private $ch;
	function __construct()
	{
		$this->data=array(
		    'pname' => $_REQUEST['pname'],
		    'price' => $_REQUEST['price'],
		    'Description' => $_REQUEST['Description'],
		);
		$this->list=array('image');
		$this->ch=curl_init();
	}

	/*
	*	push files from users to curl json
	*/
	function filecurladd(){
		foreach ($this->list as $item) {
			if(isset($_FILES[$item]['tmp_name'])&&$_FILES[$item]['tmp_name']!=''){
				$ifile=new CURLFILE($_FILES[$item]['tmp_name'], $_FILES[$item]['type'], $_FILES[$item]['name']);
				$this->data[$item]=$ifile;
			}
		}
	}
	/*
	*	Setup Curl Options URL,POST and POST_Fields
	*/
	function setoptfunction(){
		curl_setopt($this->ch, CURLOPT_URL, "local.testcode.com/addProduct.php");
		curl_setopt($this->ch, CURLOPT_POST, true);
		curl_setopt($this->ch, CURLOPT_POSTFIELDS, $this->data);
	}
	/*
	*	Returns API
	*/
	function curlresponce(){
		$responce=curl_exec($this->ch);

		if($responce){
		    return $responce;
		}else{
			return 'Error:' . curl_error($this->ch);
		}
	}
}

$curl=new curlFacade();
$curl->filecurladd();
$curl->setoptfunction();

echo curlresponce();
?>
