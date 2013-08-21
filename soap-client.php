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

  div#arrow_up{width:0; height:0; border-left: 15px solid transparent; 
  border-right: 15px solid transparent; border-bottom: 15px solid #2f2f2f;
  font-size: 0; line-height: 0;}
  div#arrow_down{width:0; height:0; border-left: 15px solid transparent; 
  border-right: 15px solid transparent; border-top: 15px solid #ccc;
  font-size: 0; line-height: 0;}
  p#arrow_left{width:0; height:0; border-top: 20px solid transparent; 
  border-bottom: 20px solid transparent; border-right: 20px solid #ccc;line-height: 0;}
  	 
  div.tip{background: #eee; border: 1px solid #ccc; padding: 10px;
   border-radius: 8px; box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2), 
   position: relative; width: 200px; margin: 0 auto;}	 
  /* Left arrow */ 
   div.tip:before{position: absolute; 
     border-top: 7px solid transparent; border-bottom: 7px solid transparent;
     border-right: 7px solid #eee; border-right-color: rga(0,0,0, 0.2);
     left: -6px; top: 20px; content: "";}
     
   /* Top arrow */  
   div.tip:before{position: absolute; 
     border-left: 7px solid transparent; border-right: 7px solid transparent;
     border-bottom: 7px solid #eee; border-bottom-color: rga(0,0,0, 0.2);
     top: -13px; left: 10px; content: "";}     
    
   /* Right arrow */  
   div.tip:after{position: absolute; 
     border-top: 6px solid transparent; border-bottom: 6px solid transparent;
     border-left: 6px solid #eee; border-right-color: rga(0,0,0, 0.2);
     right: -7px; top: 21px; content: "";}    
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
<div id="arrow_up"></div>
<div id="arrow_down"></div>
<p id="arrow_left"></p>

<div id="position:relative;" style="position: relative; width:220px; margin: 0 auto;">
 <div class="tip">
	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam consectetur quam a sapien egestas eget scelerisque lectus tempor. Duis placerat tellus at erat pellentesque nec ultricies erat molestie. Integer nec orci id tortor molestie porta. Suspendisse eu sagittis quam.
 </div>
</div>
 </body>
</html>