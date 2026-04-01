<?php
session_start();
include "config.php";

if(isset($_POST['name']) && isset($_POST['reg'])){

    $name = trim($_POST['name']);
    $reg  = trim($_POST['reg']);

    if($name == "" || $reg == ""){
        echo "<script>alert('Enter all details');window.location='index.php';</script>";
        exit();
    }

    // Check if voter exists
    $stmt = $conn->prepare("SELECT * FROM voters WHERE reg=?");
    $stmt->bind_param("s", $reg);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows > 0){

        $row = $result->fetch_assoc();

        if($row['voted'] == 1){
            echo "<script>alert('You already voted');
            window.location='index.php';</script>";
        } else {
            $_SESSION['reg']  = $reg;
            $_SESSION['name'] = $name;
            header("Location: rules.php");
        }

    } else {

        // Insert new voter
        $stmt = $conn->prepare("INSERT INTO voters(name, reg) VALUES (?, ?)");
        $stmt->bind_param("ss", $name, $reg);
        if($stmt->execute())
            {
            $_SESSION['reg']  = $reg;
            $_SESSION['name'] = $name;
            header("Location: rules.php");
        } else {
            echo "Error: " . $conn->error;
        }
    }

} else {
    echo "<script>alert('Invalid Access');window.location='index.php';</script>";
}
?>