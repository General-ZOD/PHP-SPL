<!DOCTYPE html>
<html>
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf8" />
  <link rel="icon" type="image/x-icon" href="" />
  <title> SPL </title>
 </head>
 <body>
 <style type="text/css">
  @import url(http://fonts.googleapis.com/css?family=Merriweather:400,300);
  @import url(http://fonts.googleapis.com/css?family=ABeeZee:400,400italic,700,700italic);

  body{ font: 17px/25px 'ABeeZee', serif; margin: 0; padding: 0; font-weight: 300; }
  h1{ font-family: 'Merriweather', serif; font-weight: 300; color: #222; text-decoration: underline;}
  h2{ font-family: 'Merriweather', serif; font-weight: 200; color: #222; text-decoration: underline;}
</style>
<h1>Stack Section</h1>
<?php
$stack = new SplStack();
$stack->push(1);
$stack->push(2);
$stack->push(3);

foreach ($stack as $value)
  print $value . PHP_EOL;
?>

<h1>Queue Section</h1>
<?php
$queue = new SplQueue();
$queue->push(1);
$queue->push(2);
$queue->push(3);

foreach ($queue as $value)
  print $value . PHP_EOL;
?>

<h1>Priority Heap Section</h1>
<h2>Priority Minimum Heap</h2>
<?php
$heap = new SplMinHeap();
$heap->insert(1);
$heap->insert(4);
$heap->insert(2);
$heap->insert(6);
$heap->insert(3);
$heap->insert(10);

foreach ($heap as $value)
  print $value . PHP_EOL;
?>

<h2>Priority Maximum Heap</h2>
<?php 
$maxheap = new SplMaxHeap();
$maxheap->insert(1);
$maxheap->insert(4);
$maxheap->insert(2);
$maxheap->insert(6);
$maxheap->insert(3);
$maxheap->insert(10);

foreach ($maxheap as $value)
  print $value . PHP_EOL;
?>

<h1>Sending cURL using JSON</h1>
<?php 
$array = array();
$array["1"] = "yeah1";
$array["2"] = "yeah4";
$array["3"] = "yeah2";
$array["4"] = "yum6";

$json = json_encode($array);
print $json;
print "<br />";

								

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "");
curl_setopt($ch, CURLOPT_POST,1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch, CURLOPT_TIMEOUT, 60);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json ", "Content-Length: " . strlen($json)));
$result = curl_exec($ch);
curl_close($ch);
var_dump($result);
?>
 </body>
</html>