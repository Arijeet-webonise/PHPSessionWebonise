<?php

function myException($errno, $errstr) {
   "<b>Error:</b> [$errno] $errstr<br>";
}

set_error_handler('myException',E_USER_ERROR);

/**
* Book Class
*/
class Books
{
	private $id;
	private $bname;
	private $author;
	private $content;

	/*
		Constructor(bookid, book name, author name)
	*/
	public function Books($id,$bname,$author=null){
		$this->id=$id;
		$this->bname=$bname;
		$this->author=$author;
	}

	/*
		Setter(Content)
	*/
	function setcontent($txt){
		$this->content=$txt;
	}

	/*
		Getter()
		return content
	*/
	function getcontent(){
		return $this->content;
	}

	/*
		Getter()
		return id
	*/
	function getid(){
		return $this->id;
	}

	/*
		Getter()
		return bookname
	*/
	function getbname(){
		return $this->bname;
	}

	/*
		Getter()
		return author
	*/
	function getauthor(){
		return $this->author;
	}

	/*
		GetJsonStr()

		Return Json Object
	*/
	function getjsonstr2(){
		return json_decode('{"id":'.$this->id.',"name":"'.$this->bname.'","author":"'.$this->author.'","content":"'.$this->content.'"}');
	}

	/*
		GetJsonStr()

		Return Json Object
	*/
	function getjsonstr(){
		return json_decode('{"id":'.$this->id.',"name":"'.$this->bname.'","author":"'.$this->author.'"}');
	}

	/*
		SaveBook()

		Save book to database
	*/
	function savebook(){
		$myfile = fopen('books.txt', "r") or trigger_error("Unable to open file!",E_USER_ERROR);
		$json=json_decode(fread($myfile,filesize("books.txt")));
		fclose($myfile);

		$a=(object)array('id'=>$this->id,'name'=>$this->bname,'author'=>$this->author);
		array_push($json->books, $a);
		
		$name="books/".$this->bname.".txt";
		$myfile = fopen($name, "w") or trigger_error("Unable to open file!",E_USER_ERROR);
		fwrite($myfile, $this->content);
		fclose($myfile);

		$myfile = fopen('books.txt', "w") or trigger_error("Unable to open file!",E_USER_ERROR);
			fwrite($myfile, json_encode($json));
		fclose($myfile);
	}

	/*
		SaveBook()

		Save book to database
	*/
	function uploadbook(){
		$myfile = fopen('books.txt', "r") or trigger_error("Unable to open file!",E_USER_ERROR);
		$json=json_decode(fread($myfile,filesize("books.txt")));
		fclose($myfile);

		$a=(object)array('id'=>$this->id,'name'=>$this->bname,'author'=>$this->author);
		array_push($json->books, $a);

		$myfile = fopen('books.txt', "w") or trigger_error("Unable to open file!",E_USER_ERROR);
			fwrite($myfile, json_encode($json));
		fclose($myfile);
	}

	/*
		EditBook()

		Save book to database
	*/
	function editbook(){
		$name="books/".$this->bname.".txt";
		$myfile = fopen($name, "w") or trigger_error("Unable to open file!",E_USER_ERROR);
		fwrite($myfile, $this->content);
		fclose($myfile);

		$myfile = fopen('books.txt', "r") or trigger_error("Unable to open file!",E_USER_ERROR);
		$json=json_decode(fread($myfile,filesize("books.txt")));
			foreach ($json->books as $book) {
				if($book->id==$this->id){	
					$book->id=$this->id;
					$book->name=$this->bname;
					$book->author=$this->author;
				}
			}
		fclose($myfile);
		$myfile = fopen('books.txt', "w") or trigger_error("Unable to open file!",E_USER_ERROR);
		fwrite($myfile, json_encode($json));
		fclose($myfile);
	}
}

/*
	GetBook()

	Get List of books as json
*/
function getbooks(){
	$books = array();
	$myfile = fopen("books.txt", "r") or trigger_error("Unable to open file!",E_USER_ERROR);
	 $bookstr=(json_decode(fread($myfile,filesize("books.txt"))));
	// while($line=fgets($myfile)){
	// 	$bookstr=json_decode($line);
	 foreach ($bookstr->books as $book) {
	 	# code...
	 	// var_dump($book);
		$name="books/".$book->name.".txt";
		$myfiles = fopen($name, "r") or trigger_error("Unable to open file!",E_USER_ERROR);
			$content=fread($myfiles,filesize($name));
			$book=new Books($book->id,$book->name,$book->author);
			$book->setcontent($content);
		fclose($myfiles);
		array_push($books, $book);
	 }
	// }
	fclose($myfile);
	return $books;
}

?>
