<?php
$k=$_GET["kol"];
$t=$_GET["tek"];
$xmlDoc = new DOMDocument();
$xmlDoc->load("comments.xml");
$s=simplexml_import_dom($xmlDoc);
$s=substr(json_encode($s),11,-1);
echo json_encode($s);
?>