<?php
echo <<<_END
<!DOCTYPE html>

<html>
	<head>
		<title>
			To-do
		</title>
		<script type="text/javascript">

		</script>
	</head>

	<body>
	<!-- A Simple to-do app using PHP -->
		<h1>To-do app</h1>


		<form method="POST" action="index.php">
_END;
		
		for($i=0;$i<3;$i++){
			$foo = "inp$i";
			echo "<input type='text' name='$foo' /><br />";
		}	

if(isset($_POST['inp0']) || isset($_POST['inp1']) || isset($_POST['inp2'])){
	
	$val1 = sanitizeString($_POST['inp0']);
	$val2 = sanitizeString($_POST['inp1']);
	$val3 = sanitizeString($_POST['inp2']);


	// if(!empty($val1)){
	// 	if(!empty($val2)){

	// 	}
	// 	else if(!empty)
	// }
	// else if(!empty($val2)){
	// 	$str 
	// }
	// else{

	// }

}


echo "	
		<input type='submit' value='Add' />	
		</form>
	</body>
</html>";
?>

