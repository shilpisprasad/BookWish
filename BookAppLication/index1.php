<?php
#php_flag display_startup_errors on
#php_flag display_errors on
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once("openfunc.php");
include_once("mysql.php");
include_once("template.php");
include_once("browse.php");

class cindex
    {
    public $con;
    public $tpl;
    function tpl_table_data()
	{
	$qry= "select * from library;";
        $arr= $this->con->qtohs($qry);
	return empty($arr) ? $this->tpl->drawsect("null_book") : $this->tpl->getsect("draw_data", $arr);
	}
    function draw()
	{
	$i= null;
	if(false) {}
	else if(isset($_GET["search"]))                           { $i= new cbrowse($this->con); }
	else if(strcmp($_GET["pagetype"] ?? "", "newbook")  == 0) { $i= new cnewbook();    }
	else if(strcmp($_GET["pagetype"] ?? "", "editbook") == 0) { $i= new ceditbook();   }
	else {
	     $this->tpl->drawsect("HEAD");
             $this->tpl->drawsect("ADD_BOOK");
	     $this->tpl->drawsect("HOME_PAGE_SEARCH", array("search" => "Searching..."));
	     $this->tpl->drawsect("FOOTER");
	     };
	}
    function __construct()
	{
	$this->con= new cmysql();
	$this->tpl= new ctemplate($this, "home.tpl");
	}
    }
$o= new cindex();
$o->draw();
?>
