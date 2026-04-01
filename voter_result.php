<?php
session_start();

/* Prevent browser caching */
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");

/* Check voter session */
if(!isset($_SESSION['name']) || !isset($_SESSION['reg'])){
    header("Location:index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Vote Submitted</title>

<style>

body::before{
content:"";
position:fixed;
top:0;
left:0;
width:100%;
height:100%;
background:url("https://www.mbacollegesbangalore.in/wp-content/uploads/2017/07/Karnataka-College-of-Management-Bangalore-Campus.png")
no-repeat center/cover;
opacity:0.25;
z-index:-1;
}

body{
font-family:Arial;
background:#eef;
text-align:center;
}

.box{
background:#ecfdf5;
width:70%;
margin:30px auto;
padding:20px;
border-radius:12px;
}

table{
margin:auto;
border-collapse:collapse;
width:70%;
}

th,td{
border:1px solid #888;
padding:10px;
}

th{
background:#28a745;
color:white;
}

</style>
</head>

<body>

<div class="box">
<h2>🎉 Vote Successfully Submitted</h2>
<p>You cannot go back and vote again.</p>
</div>

<div class="box">
<h3>Voter Details</h3>

<p><b>Name:</b> <?php echo $_SESSION['name']; ?></p>
<p><b>Register No:</b> <?php echo $_SESSION['reg']; ?></p>

</div>

<div class="box">

<h3>Your Selected Candidates</h3>

<table>

<tr>
<th>Post / Club</th>
<th>Selected</th>
</tr>

<tr>
<td>President</td>
<td><?php echo $_SESSION['president'] ?? "-"; ?></td>
</tr>

<tr>
<td>Vice President</td>
<td><?php echo $_SESSION['vice'] ?? "-"; ?></td>
</tr>

<tr>
<td>Cultural Club</td>
<td>
<?php
echo isset($_SESSION['cultural']) ? implode(", ", $_SESSION['cultural']) : "-";
?>
</td>
</tr>

<tr>
<td>Sports Club</td>
<td>
<?php
echo isset($_SESSION['sports']) ? implode(", ", $_SESSION['sports']) : "-";
?>
</td>
</tr>

<tr>
<td>Technical Club</td>
<td>
<?php
echo isset($_SESSION['tech']) ? implode(", ", $_SESSION['tech']) : "-";
?>
</td>
</tr>

<tr>
<td>NSS Club</td>
<td>
<?php
echo isset($_SESSION['nss']) ? implode(", ", $_SESSION['nss']) : "-";
?>
</td>
</tr>

</table>

</div>

<script>

/* Lock page - disable back button */
history.pushState(null, null, location.href);
window.onpopstate = function () {
history.go(1);
};

/* Disable refresh (optional) */
document.onkeydown = function(e){
if(e.keyCode == 116){ // F5
return false;
}
};

</script>

</body>
</html>

