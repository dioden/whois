<?php
require("Whois.class.php");
$whois=new Whois;
//echo $whois->whoislookup($_GET['domain']);
?>
<form action="" method="post">
<textarea name="query"></textarea><br /><br />
<input type="submit" name="submit" value="GO FFS!" />
</form>
<?php
$query = explode("\n",$_POST['query']);

//var_dump($query);

if(isset($_POST['submit']))
{
	foreach($query as $key => $value)
	{
		echo nl2br($whois->whoislookup($value))."<br /><br />";
		sleep(3);
	}
}
?>
