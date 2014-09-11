<?php

// Setting Database
	
include_once 'lib.php';

createTable('todo','id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
					task VARCHAR(50),
					status VARCHAR(3)');
?>