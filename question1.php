<!DOCTYPE html>
<html lang = "en-US">

	<head>
		<meta charset = "UTF-8">
		<title> Question 1 </title>
	</head>
	<body>
	<?php
	function evaluate($my_jfile){
		
		foreach ($my_jfile as $p => $value){
			
			if(is_array($value)&& sizeof($value)>1){// check if the value of the element is of type children that is an array and if it is an empty or not array
			
				for($i=0; $i<sizeof($value); $i++){ // for each child call the same function
					evaluate($my_jfile->children[$i]);
				}
				
			}
		
			else	
			{
				if($p == "type" && $value == "Manual") // if the type of the child that has not more children unchecked is manual then print it
					 echo $my_jfile->node_id ."\n" ;
			}
		}
	}
	
	
	$contents = file_get_contents("C:/Users/Babouski/Desktop/Entry Interview/node.json"); 
	$json_file = json_decode($contents);
	echo "The node ID's with node type manual are:";
	evaluate($json_file);
	
	?>
	</body>
	
</html>