<?php

include_once 'lib.php';

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
		//Stores the data
		if(!empty($val1)){
			$query = "INSERT INTO todo VALUES ('','$val1','no')";
			queryMySql($query);
		}		
		if(!empty($val2)){
			$query = "INSERT INTO todo VALUES ('','$val2','no')";
			queryMySql($query);
		}		
		if(!empty($val3)){
			$query = "INSERT INTO todo VALUES ('','$val3','no')";
			queryMySql($query);
		}
	}

echo "	
		<input type='submit' value='Add' />	
		</form>

		<div id='incomplete'> <form method='POST' action='index.php'>";
			
			$query = "SELECT * FROM todo WHERE status='no'";
			$result = queryMySql($query);
			$num = mysql_num_rows($result);

			for($i=0;$i<$num;$i++){
				$row = mysql_fetch_row($result);

				echo "<input type='checkbox' name='list' />
				<label>$row[1]</label><br /> ";
			}
echo '
		<input type="submit" value="Completed" />


		</form>;
		</div>

	</body>
</html>';


	if(isset($_POST[]))
?>

