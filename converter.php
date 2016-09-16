<?php
/*
	check if Parameter is null and Return '-' if true
*/
	function isempty($str){
		if($str==null){
			return array('name'=>'-','created'=>'-');
		}
		return $str;
	}
	$organisationDetails = array(
      10 => array(
        'name' => 'weboniseLab',
        'jobRole' => array(
          '11' => array(
            'name' => 'devloper',
            'created' => '2016-02-01',
          ),
          '12' => array(
            'name' => 'sr. developer',
            'created' => '2016-02-10',
          ),
        ),
        'cfa' => array(
          '11' => array(
            'name' => 'php',
            'created' => '2016-03-10',
          ),
          '12' => array(
            'name' => 'ruby',
            'created' => '2016-04-15',
          ),
        )
      ),
      11 => array(
        'name' => 'Hartley Lab',
        'jobRole' => array(
          '11' => array(
            'name' => 'foront end',
            'created' => '2016-03-01',
          ),
          '12' => array(
            'name' => 'design',
            'created' => '2016-03-10',
          ),
        ),
        'cfa' => array(
          '11' => array(
            'name' => 'UI',
            'created' => '2016-02-01',
          ),
          '12' => array(
            'name' => 'UX',
            'created' => '2016-01-01',
          ),
        )
      ),
      15 => array(
        'name' => 'Hartley Lab',
        'jobRole' => array(
          '11' => array(
            'name' => 'foront end',
            'created' => '2016-03-01',
          ),
          '12' => array(
            'name' => 'design',
            'created' => '2016-03-10',
          ),
        ),
        'cfa' => array()
      )
    );
    /**
    * Object for each row
    */
    class RowObj
    {
    	private $oname;
    	private $oid;
    	// public $jobRole;
    	// public $jkey;
    	public $cfa;
    	private $ckey;

    	function rowobj($arr,$id,$cfa,$ckey){
    		$this->oid=$id;
    		$this->oname=isempty($arr['name']);
    		$this->cfa=isempty($cfa);
    		$this->ckey=isempty($ckey);
    		// $this->jobRole=isempty($jobRole);
    		// $this->jobRole=isempty($jkey);
    	}

    	function getcfa(){
			$cfa=array();
    		foreach ($this->cfa as $key => $value) {
    			array_push($cfa, $key.','.$value['name']);
    		}
    		return $cfa;
    	}

    	function getjobRole(){
			$jobRole=array();
    		foreach ($this->jobRole as $key => $value) {
    			array_push($jobRole, $key.','.$value['name']);
    		}
    		return $jobRole;
    	}

    	function getcreated($arr){
    		return $arr['created'];
    	}
    }
    $row=0;
    $a = 'Created,Organisation Name,Organisation ID,CFA Name,CFA ID,RFA Name,JR ID,JR Name
';

	$rowobj=array();
    foreach ($organisationDetails as $key => $organisationDetail) {
    	if($organisationDetail['cfa']!=null){
    		foreach ($organisationDetail['cfa'] as $ckey => $value) {
    			if($organisationDetail['jobRole']!=null)
    			array_push($rowobj, new RowObj($organisationDetail,$key,$value,$ckey));
    		}
    	}else{

    	}
		// array_push($rowobj, new RowObj($organisationDetail,$key));
    }
    var_dump($rowobj);
    
 //    $filename = "newfile.csv";
	// $file = fopen( $filename, "w" );
   
	// if( $file == false ) {
	// 	echo ( "Error in opening new file" );
	// 	exit();
	// }
	// fwrite( $file, $a );
	// fclose( $file );
 //        echo("file name: $filename");
      
?>