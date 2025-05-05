<?php
class cmysql
    {
    public $st;
    function getcon()
	{
	$servername = "127.0.0.1";
	$username   = "sprasad";
	$password   = "Life@23";
	//
	$this->st= new PDO("mysql:host=localhost;dbname=lab", 'sprasad', 'Life@23');
	//	debug($st, "DB CONN");
	if($this->st)
	    {
	    //print("CONNECTION SUCCESS\n");
	    }
	else
	    {
	    print("CONNECTION FAILED\n");
	    die("Connection failed: " . $this->st->connect_error);
	    };
	return $this->st;
	}
    function qtohs($qry)
	{
	return  $this->st->query($qry)->fetchAll(PDO::FETCH_ASSOC);
	/*
	$this->st->fetch(PDO::FETCH_ASSOC);
	return $this->st->execute($qry);
	*/
	}
    function qtoh($qry)
	{
	$rarr= array();
	$r= $this->st->query($qry)->fetch(PDO::FETCH_ASSOC);
	return $r;
	}
    function qtov($qry)
	{
	return $this->st->query($qry)->fetchColumn();
	}
    function qexec($qry)
	{
	return  $this->st->prepare($qry)->execute();
	}
    function __construct()
	{
	return $this->getcon();
	}
    }
//$o= new cmysql(); ---> new object returns the created connection
/* 
How to query for data
---------------------
1. qtov()       -> query for single value;
2. qtoh()       -> query for single hash;
3. qtohs()      -> query for array of hash;
4.qexec($qry)   -> execute the query to get boolean return;
*/
#-- examples ---
#$o->qtoh("select id from Library Limit 1");
#$o->qtoh("select * from Library Limit 1");
#$o->qtoh("select * from Library");
#$o->qtoh("select count(*) from Library");
?>
