<?php
function debug($v, $p= "DEBUG")
    {
    print("<br><pre>");
    printf("%s<br>", $p);
    print_r($v);
    print("</pre><br>");
    //phpinfo();
    }

function plog($v, $p= "DEBUG")
    {
    print("\n\n");
    printf("%s\n", $p);
    print_r($v);
    print("\n");
    //phpinfo();
    }

function get_merg()
    {
    return array_merge($_GET, $POST);
    }
?>
