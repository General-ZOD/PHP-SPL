<?php 
$options = array("uri"=>"http://localhost:84", "location"=>"http://localhost:84/server.php", "trace"=>true);
$client = new SoapClient(NULL, $options);
?>

<!DOCTYPE html>
<html>
 <head>
  <meta http-equiv="content-type" content="text/html; charset=UTF8" />
  <link rel="icon" type="image/x-icon" href="" />
  <title> SPL </title>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      $("#my_link").bind({"mouseover": function(e){
      	 e.preventDefault();
      	 e.stopPropagation();
      	 $(this).css("cursor", "pointer");
      	 var tip = $("<span></span>").html("This is pretty cool!").attr("id", "span");      	 
      	 $(this).parent().append(tip);
      	},
      	 "mouseout": function(e){
      	 	$(this).siblings("span").remove();
      	}
      });	 
    });
  </script>
 </head>
 <body>
 <style type="text/css">
  @import url(http://fonts.googleapis.com/css?family=Merriweather:400,300);
  @import url(http://fonts.googleapis.com/css?family=ABeeZee:400,400italic,700,700italic);

  body{ font: 17px/25px 'ABeeZee', serif; margin: 0; padding: 0; font-weight: 300; }
  h1{ font-family: 'Merriweather', serif; font-weight: 300; color: #222; text-decoration: underline;}
  h2{ font-family: 'Merriweather', serif; font-weight: 200; color: #222; text-decoration: underline;}
  #span{width:300px; height:100px; background:#ccc; border:solid 2px #999; border-radius:4px; 
  font-family: 'Merriweather', serif; font-weight: 150; display: block;}
</style>
<h2>XML-RPC</h2>
  <?php print $client->getDisplayName("General", "ZOD"); ?>
  <h2>Using Tips (JQuery)</h2>
  <p>This is a pretty cool <a href="#" id="my_link">link</a></p>
  <h2>Creating XML SimpleXML style</h2>
  <?php
   $simple = new SimpleXMLElement('<?xml version="1.0"?><concerts></concerts>');
   
   $concert1 = $simple->addChild("concert");
   $concert1->addChild("tito", "The Magic Flute");
   $concert1->addChild("time", 1329636600);
   print $simple->asXML();
  ?>
<h2>Sending Data via Streams</h2>
<?php 
$array = array();
$array["1"] = "yeah1";
$array["2"] = "yeah4";
$array["3"] = "yeah2";
$array["4"] = "yum6";

$json = json_encode($array);
print $json;
print "<br />";
$options = array("http"=>
								array("method"=>"GET", "header"=>"Content-Type:application/json", "content"=>$json));
$context = stream_context_create($options);
$result = file_get_contents("http://localhost:84/json.php", 0, $context);
print $result;
?>  
 </body>
</html>