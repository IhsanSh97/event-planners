<?php
		//open connection
		$conn = mysqli_connect("localhost","root", "", "event_planners");
		
		//check the connection
		if(!$conn){
			die("cannot connect to server");
		}

?>