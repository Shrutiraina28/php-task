<?php
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$gender = $_POST['phonenumber'];
	$email = $_POST['email'];
	$password = $_POST['subject'];
	$number = $_POST['message'];

	// Database connection
	$conn = new mysqli('localhost','root','admin','registration');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(firstName, lastName, phonenumber, email, subject, message) values(?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("ssisss", $firstName, $lastName, $phonenumber, $email, $subject, $message);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>