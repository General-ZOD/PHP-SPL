<?php 
$decoded = json_decode(file_get_contents("php://input")); 
$string = http_build_query($decoded);
print $string;