<?php
class cbrowse
    {
    public $con;
    public $tpl;
    public $arr;
   function tpl_table_data()
        {
        return $this->tpl->getsect("draw_data", $this->arr);
        }
   
    function get_books($txt)
	{
	$qry= "select * from library where bookName like \"$txt%\"";
	$data= array();
	$data= $this->con->qtohs($qry);
	return $data;
	}
    function draw()
	{
	$search= $_GET["search"] ?? $_GET["search"];
	$data= $this->get_books($search);
	$this->arr= $data;
	//
	if(count($data) == 0) {  $this->tpl->drawsect("null_book"); print("NO BBOOKS FOUND"); }
	else
	    {
	    $this->tpl->drawsect("SEARCH_RES", array("search" => "Searching..."));
	    };
	return 0;
	}
    function __construct($con= null)
	{
	$this->con= $con;
	$this->tpl= new ctemplate($this, "home.tpl");
	$this->tpl->drawsect("HEAD");
	$this->draw();
	$this->tpl->drawsect("FOOTER");
	}
    }
    ?>
