<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once("openfunc.php");

include_once("mysql.php");
include_once("template.php");
class cadd
	{
	public $con;
	public $tpl;
	function exist($book, $author="", $sr="")
		{
		$val= 0;
		$qry=  "select count(*) from library where bookName= \"$book\"";
		$qry.= $author != ""? " and authorName = \"$author\"": "";
		$qry.= $sr != "" ? " and serialNumber = \"$sr\"": "";
		$qry.= ";";
		$val= $this->con->qtov($qry);
		return $val > 0? 0 : 1;
		}
	function save()
		{
		$name= $_GET["bookname"];
		$author= $_GET["author"];
		$srNo= $_GET["serialno"];
		if($this->exist($name, $author, $srNo))
			{
			$qry= "insert into library (bookName, authorName, serialnumber) ";
			$qry.= "values(\"$name\", \"$author\", \"$srNo\" );";
			$inserted= $this->con->qexec($qry);
			$inserted ? printf("your book is added in library\n"): printf("ERROR!!!");
			//$inserted ?  echo "<script>alert('Your book is added to the library.');</script>" : printf("ERROR!!!");

			}
		else
			{
			printf("already exist");
			};  
		}
	function draw()
		{
		if(false) {}
		else if(isset($_GET["save"]))                             { $this->save();}
		else  
			{
			$this->tpl->drawsect("HEAD");
			$this->tpl->drawsect("add_book_htl");
			$this->tpl->drawsect("FOOTER");
			}
		return 0;
		}
	function __construct()
		{
		//debug("dff");
		$this->con= new cmysql();
		$this->tpl= new ctemplate($this, "home.tpl");
		}
    }
$o= new cadd();
$o->draw();

    ?>
