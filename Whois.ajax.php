<?php
header('Content-type: text/json');
header('Content-type: application/json');
require_once("Whois.class.php");
require_once("Functions.class.php");
$whois = new Whois;
$function = new Functions;

if(isset($_GET))
{
    $domain = $_GET['query'];
    $data = $whois->whoislookup($domain);
    
    $data = $function->split($data,$domain);
    $data = $function->arrayToJson($data);
    echo $data;
}
?>