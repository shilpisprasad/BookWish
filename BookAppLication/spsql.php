<?php
include_once("openfunc.php");
class cmysql
    {
    function getcon()
	{
	$servername = "127.0.0.1";
	$username   = "sprasad";
	$password   = "Life@23";
	// Create connection
	//$conn = new PDO("mysql:host=localhost;dbname=lab", 'sprasad', 'Life@23', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	//plog($conn, "DB CONN");
	try
	    {
	    //$dbh = new PDO('mysql:host=localhost;dbname=test', $user, $pass);
	    $conn= new PDO("mysql:host=localhost;dbname=lab", 'sprasad', 'Life@23', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	    }
	catch (PDOException $e)
	    {
	    // attempt to retry the connection after some timeout for example
	    print("PDO Exception CONNECTION FAILED");
	    die("Connection failed: " . $conn->connect_error);
	    }
	//
	//$conn->exec('SET search_path TO lab'); plog($conn, "DB CONN SPATH");
	//
	// Check connection
	if ($conn)
	    {
	    print("CONNECTION SUCCESS");
	    plog($conn, "CONN");
	    }
	else
	    {
	    print("CONNECTION FAILED");
	    die("Connection failed: " . $conn->connect_error);
	    };
	return $conn;
	}
    function gettable()
	{
	$data= array();
	$p   = null;
	$con = $this->getcon();
	//$p= $con->prepare($q)->execute($data);
	//var_dump($data);
	//plog($data, $p);
	//
	//$data= $con->query('SELECT * FROM library');
	//plog($data, "SELECT");
 
$q = "SELECT * FROM library;";
$stmt = $con->query($q);
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

var_dump($rows);


	$con= null;
//
	return 0;
    }	
    function __construct() { }
    }
$o= new cmysql();
#$o->getcon();
$o->gettable();
?>
