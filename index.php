<?php

include_once 'lib.php';

echo <<<_END
<!DOCTYPE html>

<html>
	<head>
		<title>
			To-do
		</title>
		<link rel="stylesheet" type="text/css" href="style.css" />
	</head>

	<body>
	<!-- A Simple to-do app using PHP -->
		<h1>To-do app</h1>
		<form method="POST" action="index.php">
_END;
		
		for($i=0;$i<3;$i++){
			$foo = "inp$i";
			echo "<br /><input type='text' name='$foo' />";
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

echo <<<_END
	<br />
		<input type='submit' value='Add' />	
		</form>

		<div id='incomplete'>
		<h2>To-do</h2>
		 <form method='POST' action='index.php'>
_END;
			
			$query = "SELECT * FROM todo WHERE status='no'";
			$result = queryMySql($query);
			$num = mysql_num_rows($result);

			for($i=0;$i<$num;$i++){
				$row = mysql_fetch_row($result);
				
				echo "<br /><input type='checkbox' name='list[]' value=$row[0] />
				<label>$row[1]</label> ";
			}

echo <<<_END
		<br />
		<input type="submit" value="Completed" />
		</form>
		</div>
		<div>
		<h2>Completed</h2>
_END;
// Displays the list of Completed items
			$query = "SELECT * FROM todo WHERE status='yes'";
			$result = queryMySql($query);
			$num = mysql_num_rows($result);

			for($i=0;$i<$num;$i++){
				$row = mysql_fetch_row($result);
				echo <<<_END
				<br /><input type='checkbox' value=row[0] checked='checked'/>
				<label class="strike">$row[1]</label> 
_END;
			}

echo <<<_END
		</div>
	</body>
</html>
_END;
	
	//Adds fields to completed Status
	if(isset($_POST['list'])){
		$sel = $_POST['list'];
		foreach ($sel as $item) {
			$query = "UPDATE todo SET status='yes' WHERE id=$item";
			queryMySql($query);
		}
	
	}
?>