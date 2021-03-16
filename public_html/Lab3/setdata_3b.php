<?php

$nameW=$_GET["NAME"];
$smsW=$_GET["SMS"];
$dateW=$_GET["DATE"];

$xml = new DOMDocument();
$xml->load("comments.xml");
$xpath = new DOMXPath($xml);
$base = $xpath->evaluate("/COMMENTS")->item(0);
$comment = $xml->createElement('COMMENT');
$base->appendChild($comment);
$name=$xml->createElement('NAME',$nameW);
$text=$xml->createElement('TEXT',$smsW);
$date=$xml->createElement('DATE',$dateW);
$comment->appendChild($name);
$comment->appendChild($text);
$comment->appendChild($date);
echo $xml->save("comments.xml");
?>

