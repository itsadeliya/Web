<?php
$k=$_GET["kol"];
$t=$_GET["tek"];
$xmlDoc = new DOMDocument();
$xmlDoc->load("3.xml");
$s=simplexml_import_dom($xmlDoc);
$s=substr(json_encode($s),8,-1);
echo json_encode($s);
?>