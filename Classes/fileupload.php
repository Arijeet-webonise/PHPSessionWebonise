<?php
	interface FileUpload{
		public function checksize();
		public function checkext();
		public function checkfile();
		public function getaddress();
		public function getFileType();
	}
	/**
	* image uploader class
	*/
	class ImageUploader implements FileUpload
	{
		private $target_dir;
		private $target_file;
		private $imageFileType;
		private $file;
		private $ext;
		private $info;
		public function __construct($file)
		{
			$this->file=$file;
			$this->target_dir='uploads/';
			$this->target_file = $this->target_dir . basename($this->file["name"]);
			$this->imageFileType=pathinfo($this->target_file,PATHINFO_EXTENSION);
			$this->info=getimagesize($file["tmp_name"]);
			$this->ext=array('png','jpg','jpeg');
		}
		/*
		* Check Image File Size
		*/
		public function checksize()
		{
			if ($this->file["size"] > 71000000) {
				throw new Exception("Sorry, your file is too large.", 1);
				return false;
			}
			return true;
		}
		/*
		*	Checks image Dimension
		*/
		public function checkdimen(){
			if($this->info[0]>400&&$this->info[1]>400){
				throw new Exception("Image must be smaller them 400 x 400", 1);
				return false;
			}
			return true;
		}
		public function checkext()
		{
			$flag=false;
			foreach ($this->ext as $ext) {
				if($this->imageFileType==$ext){
					$flag=true;
					break;
				}
			}
			if($flag){
				return true;
			}
			throw new Exception("Invalid File Type", 1);
			return false;
		}
		public function checkfile(){
			if (file_exists($this->target_file)) {
				return false;
			}
			return true;
		}
		function upload(){
			if (!($this->checksize()&&$this->checkdimen()&&$this->checkext())) {
				throw new Exception("Sorry, your file was not uploaded.", 1);
			} else {
				if (move_uploaded_file($this->file["tmp_name"], $this->target_file)) {
					echo '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Success!</strong> '."The file ". basename( $this->file["name"]). " has been uploaded.</div>";
				} else {
					throw new Exception("Sorry, there was an error uploading your file.", 1);
				}
			}
		}
		function getaddress(){
			return $this->target_file;
		}
		function getFileType(){
			return $this->imageFileType;
		}
	}

	/**
	* image uploader class
	*/
	class XlsUploader implements FileUpload
	{
		private $target_dir;
		private $target_file;
		private $imageFileType;
		private $file;
		private $ext;
		public function __construct($file)
		{
			$this->file=$file;
			$this->target_dir='uploads/';
			$this->target_file = $this->target_dir . basename($this->file["name"]);
			$this->imageFileType=pathinfo($this->target_file,PATHINFO_EXTENSION);
			$this->ext=array('xls','xlsx');
		}
		/*
		* Check Image File Size
		*/
		public function checksize()
		{
			if ($this->file["size"] > 73000000) {
				throw new Exception("Sorry, your file is too large.", 1);
				return false;
			}
			return true;
		}
		
		public function checkext()
		{
			$flag=false;
			foreach ($this->ext as $ext) {
				if($this->imageFileType==$ext){
					$flag=true;
					break;
				}
			}
			if($flag){
				return true;
			}
			throw new Exception("Invalid File Type", 1);
			return false;
		}
		public function checkfile(){
			if (file_exists($this->target_file)) {
				return false;
			}
			return true;
		}
		function upload(){
			if (!($this->checksize()&&$this->checkext())) {
				throw new Exception("Sorry, your file was not uploaded.", 1);
			} else {
				if (move_uploaded_file($this->file["tmp_name"], $this->target_file)) {
					echo '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Success!</strong> '."The file ". basename( $this->file["name"]). " has been uploaded.</div>";
				} else {
					throw new Exception("Sorry, there was an error uploading your file.", 1);
				}
			}
		}
		function getaddress(){
			return $this->target_file;
		}
		function getFileType(){
			return $this->imageFileType;
		}
	}

	/**
	* CSV uploader class
	*/
	class CSVUploader implements FileUpload
	{
		private $target_dir;
		private $target_file;
		private $imageFileType;
		private $file;
		private $ext;
		public function __construct($file)
		{
			$this->file=$file;
			$this->target_dir='uploads/';
			$this->target_file = $this->target_dir . basename($this->file["name"]);
			$this->imageFileType=pathinfo($this->target_file,PATHINFO_EXTENSION);
			$this->ext=array('csv');
		}
		/*
		* Check Image File Size
		*/
		public function checksize()
		{
			if ($this->file["size"] > 1000000) {
				throw new Exception("Sorry, your file is too large.", 1);
				return false;
			}
			return true;
		}
		

		public function checkext()
		{
			$flag=false;
			foreach ($this->ext as $ext) {
				if($this->imageFileType==$ext){
					$flag=true;
					break;
				}
			}
			if($flag){
				return true;
			}
			throw new Exception("Invalid File Type", 1);
			return false;
		}
		public function checkfile(){
			if (file_exists($this->target_file)) {
				return false;
			}
			return true;
		}
		function upload(){
			if (!($this->checksize()&&$this->checkdimen()&&$this->checkext())) {
				throw new Exception("Sorry, your file was not uploaded.", 1);
			} else {
				if (move_uploaded_file($this->file["tmp_name"], $this->target_file)) {
					echo '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Success!</strong> '."The file ". basename( $this->file["name"]). " has been uploaded.</div>";
				} else {
					throw new Exception("Sorry, there was an error uploading your file.", 1);
				}
			}
		}
		function getaddress(){
			return $this->target_file;
		}
		function getFileType(){
			return $this->imageFileType;
		}
	}

	/**
	* FileUpload factory
	*/
	class FileUploadFactory 
	{
		
		public static function create($type,$file)
		{
			switch ($type) {
				case 'img':
					return new ImageUploader($file);
					break;

				case 'xls':
					return new XlsUploader($file);
					break;

				case 'csv':
					return new CSVUploader($file);
					break;
				
				default:
					throw new Exception("Can't Find File Type", 1);
					return false;
					break;
			}
		}
	}
?>