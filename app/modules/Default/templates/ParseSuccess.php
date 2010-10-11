<pre>
<?php //var_dump($t['source']); ?>

<?php 
$repos = array();
$features = array();
foreach ($t['source'] AS $obj){
	if ($obj->getName()=='repository'){
		$repos[] = (string)$obj;
	} elseif ($obj->getName()=='feature'){
		$features[] = $obj;
	}
}
var_dump("Repositories:",$repos);
var_dump("Features:",$features);
?>
</pre>