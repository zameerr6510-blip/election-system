<?php
session_start();
include "config.php";

/* check session */

if(!isset($_SESSION['reg'])){
header("Location: index.php");
exit();
}

$reg = $_SESSION['reg'];
$pres = $_SESSION['president'];
$vice = $_SESSION['vice'];

/* get club selections */

$cultural = $_POST['cultural'] ?? [];
$sports = $_POST['sports'] ?? [];
$tech = $_POST['tech'] ?? [];
$nss = $_POST['nss'] ?? [];

/* validation */

if(count($cultural) != 2 || count($sports) != 2 || count($tech) != 2 || count($nss) != 2){

echo "<script>
alert('Please select exactly 2 candidates in each club');
window.location='clubs.php';
</script>";

exit();
}

/* store in session for voter_result page */

$_SESSION['cultural'] = $cultural;
$_SESSION['sports'] = $sports;
$_SESSION['tech'] = $tech;
$_SESSION['nss'] = $nss;

/* insert vote into database */

$sql = "INSERT INTO votes(
reg,
president,
vice,
cultural1,
cultural2,
sports1,
sports2,
tech1,
tech2,
nss1,
nss2
)

VALUES(
'$reg',
'$pres',
'$vice',
'".$cultural[0]."',
'".$cultural[1]."',
'".$sports[0]."',
'".$sports[1]."',
'".$tech[0]."',
'".$tech[1]."',
'".$nss[0]."',
'".$nss[1]."'
)";

if(!$conn->query($sql)){
echo "Database Error: " . $conn->error;
exit();
}

/* mark voter as voted */

$conn->query("UPDATE voters SET voted=1 WHERE reg='$reg'");

/* redirect to result page */

header("Location: voter_result.php");
exit();

?>