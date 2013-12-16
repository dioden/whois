<?php
require_once("Whois.class.php");
require_once("Functions.class.php");
$whois = new Whois;
$function = new Functions;

if(isset($_GET['query']))
{
    $domain = $_GET['query'];
    if(isset($_GET['use']) && $_GET['use'] == "exec")
    {
        echo exec("whois ".$_GET['query']);
    }else{
        $data = $whois->whoislookup($domain);
    }
    $data = $function->split($data,$domain);
    if(!isset($_GET['debug']))
    {
        header('Content-type: text/json');
        header('Content-type: application/json');
        $data = $function->arrayToJson($data);
        echo $data;
    }
    
    if(isset($_GET['debug']))
    {
        echo "<pre>";
        var_dump($data);
    }
    
}
?>