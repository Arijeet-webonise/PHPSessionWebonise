<?php
/*
	check if Parameter is null and Return '-' if true
*/
	function isempty($str){
		if($str==null){
			return array(array('name'=>'-','created'=>'-'));
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
    	public $jobRole;
    	// public $jkey;
    	public $cfa;
    	// private $ckey;

    	function Rowobj($arr,$id){
    		$this->oid=$id;
    		$this->oname=isempty($arr['name']);
    		$this->cfa=isempty($arr['cfa']);
    		$this->jobRole=isempty($arr['jobRole']);
    		// $this->jobRole=isempty($jkey);
    	}

    	function getlastterm(){
        $str = array();
        foreach ($this->jobRole as $jkey => $jvalue) {
          $jstr=($jkey.' , '.$jvalue['name']);
          foreach ($this->cfa as $ckey => $cvalue) {
              $cstr=$cvalue['name'].' , '.$ckey;
              array_push($str, array('str' => $cstr.' , - , '.$jstr, 'created' => $jvalue['created']));
          }
        }
        return $str;
      }

    	function getcreated($arr){
    		return $arr['created'];
    	}
    }
    $row=0;
    $a = 'Created,Organisation Name,Organisation ID,CFA Name,CFA ID,RFA Name,JR ID,JR Name<br>
';
$rowobjs=array();
foreach ($organisationDetails as $okey => $value) {
  $rowobj=new RowObj($value,$okey);
  array_push($rowobjs, $rowobj);
  $str=($rowobj->getlastterm());
  // var_dump($str);
  foreach ($str as $svalue) {
    $a.=($svalue['created'].' , '.$value['name'].' , '.$okey.' , '.$svalue['str'].'<br>');
  }
}
echo $a;
?>