<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once("openfunc.php");

include_once("mysql.php");
include_once("template.php");
class cedit
	{
	public $con;
	public $tpl;
	public $arr=array();
        function exist($book, $author="", $sr="")
		{
		$val= 0;
		$qry=  "select count(*) from library where bookName= \"$book\"";
		$qry.= $author != ""? " and authorName = \"$author\"": "";
		$qry.= $sr != "" ? " and serialNumber = \"$sr\"": "";
		$qry.= ";";
		$val= $this->con->qtov($qry);
		return $val >0 ? 1: 0;
		}
	function exist_data($book, $author="", $sr="")
		{
		$val= 0;
		$qry=  "select * from library where bookName= \"$book\"";
		$qry.= $author != ""? " and authorName = \"$author\"": "";
		$qry.= $sr != "" ? " and serialNumber = \"$sr\"": "";
		$qry.= ";";
		$val= $this->con->qtoh($qry);
		return $val;
		}
	function update()
		{
		$name= $_GET["bookname"];
		$author= $_GET["author"];
		$srNo= $_GET["serialno"];
		$exist=$this->exist($name, $author, $srNo);
		if($exist)
			{
		        $arr=$this->exist_data($name);
			$id= $arr["id"];
                        $qry = "UPDATE library set";
			$qry .= $arr["authorName"] != $author ?" authorName = \"$author\" " : "" ;
			$qry .= $arr["serialNumber"] != $srNo ?" serialnumber = \"$srNo\" ": "";
                        $qry .= "WHERE bookName = \"$name\" and id= $id";
			$updated= $this->con->qexec($qry);
			$updated ? printf("updated successfully\n"): printf("ERROR!!!\n");
			}
		else
			{
			printf("already exist");
			};  
	        }
	function del()
		{
		$name= $_GET["book"];
		$exist=$this->exist($name);
                if($exist)
			{
			$qry= "DELETE FROM library WHERE bookName = \"$name\"";
			$deleted= $this->con->qexec($qry);
			$deleted ? printf("successfully deleted\n"): printf("ERROR!!!\n");
		        }
		}
	function draw()
		{
		if(false) {}
		else if(isset($_GET["update"]))                             { $this->update();}
		else if(isset($_GET["delete"]))                             { $this->del();}
		else  
			{
		        $this->tpl->drawsect("HEAD");
			$arr=$this->exist_data($_GET["book"]);
			$this->tpl->drawsect("edit_book_htl", $arr);
			$this->tpl->drawsect("FOOTER");
			}
		return 0;
		}
	function __construct()
		{
		$this->con= new cmysql();
		$this->tpl= new ctemplate($this, "home.tpl");
		}
    }
$o= new cedit();
$o->draw();

    ?>
