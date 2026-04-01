<?php
$conn = new mysqli("localhost","root","","college_election");

if($conn->connect_error){
die("Database connection failed");
}
?>