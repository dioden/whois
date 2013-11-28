<?php
require_once("Whois.class.php");
require_once("Functions.class.php");
$whois = new Whois;
$function = new Functions;

if(isset($_POST))
{
    $domain = explode('%0D%0A',urlencode($_POST['query']));
    $domains = array();
    
    foreach($domain as $value)
    {
        $domains[$value] = $whois->whoislookup($value);
    }
    
    //var_dump($domains);
    
    foreach($domains as $key => $value)
    {
        $domains[$key] = $function->split($value);
    }
    
    var_dump($domains);
}
?>