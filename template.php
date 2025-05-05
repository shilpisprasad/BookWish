<?php
class ctemplate
    {
    public $tarr;
    public $parent;
    function getsectr($section, $nv= array())
	{
	return (array_key_exists($section, $this->tarr)) ?  $htm= $this->tarr[$section] : "";
	}
    function getsect($section, $nv= array())
	{
	$p= "";
	$multy_html;
	if(array_key_exists($section, $this->tarr))
	    {
	    $htm= $this->tarr[$section];
	    if(preg_match('/\[\[.*\]\]/', $htm))
		{
		preg_match('/\[\[.*\]\]/', $htm, $match);
		$f= trim(str_replace(["[[","]]"], "", $match[0]));
		//
		$func= sprintf("tpl_%s", $f);
		if(strlen($f) > 0 && method_exists($this->parent, $func))
		    {
		    $hr= $this->parent->$func();
		    };
		$htm= str_replace("[[".$f."]]", empty($hr) ? "" : $hr , $htm);
		};
	    //
	    $multy_htm= $htm;
	    for($i=0; $i < count($nv); $i++)
		{
                if($i > 0){$htm= $htm.$multy_htm;};
		foreach($nv[$i] as $k => $v)
		    {
		    $j= "/##" . $k . "##/";
		    if(preg_match($j, $htm))
			{
			$htm= str_replace("##".$k."##", $v, $htm);
			}
		    };
		};
	    $p= $p . $htm;
	    }
	return $p;
	}
    function drawsect($section, $nv= array())
	{
	if(array_key_exists($section, $this->tarr))
	    {
	    $htm= $this->tarr[$section];
	    if(preg_match('/\[\[.*\]\]/', $htm))
		{
		preg_match('/\[\[.*\]\]/', $htm, $match);
		$f= trim(str_replace(["[[","]]"], "", $match[0]));
		//
		$func= sprintf("tpl_%s", $f);
		if(strlen($f) > 0 && method_exists($this->parent, $func))
		    {
		    $hr= $this->parent->$func();
		    };
		$htm= str_replace("[[".$f."]]", empty($hr) ? "" : $hr , $htm);
		};
	    foreach($nv as $k => $v)
		{
		$i= "/##" . $k . "##/";
		if(preg_match($i, $htm))
		    {
		    $htm= str_replace("##".$k."##", $v, $htm);
		    };
		};
	    
	    while(preg_match("/##\w+##/", $htm, $match))
	    {$htm= str_replace($match, "", $htm);}
	    
	    printf("%s", $htm);
	    
	    }
	}


    function getdata($name)
	{
	if(file_exists($name))
	    {
	    $key= "";
	    $fp = fopen($name, "r");
	    while($line= fgets($fp))
	        {
		if(preg_match('/^\[.*\]$/', $line))
		    {
		    $key= trim(str_replace(["[","]"], "", $line));
		    }
		else if(strlen($key) > 0)
		    {
		    if(array_key_exists($key, $this->tarr) == false) $this->tarr[$key]= "";
		    $this->tarr[$key]= $this->tarr[$key] . $line;
		    }
		else
		{};
		};
	    fclose($fp);
	    //debug($this->tarr, "TARR");
	    }
	else
	    {
	    };
	return 0;
	}

    function __construct($parent, $name= "home.tpl")
	{
	$this->tarr= array();
	$this->parent= $parent;
	$this->getdata($name);
	}
    }
?>
