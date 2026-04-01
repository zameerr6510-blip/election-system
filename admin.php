<?php
include "config.php";

/* RESET */
if(isset($_POST['reset_all'])){
    $conn->query("DELETE FROM votes");
    $conn->query("UPDATE voters SET voted=0");
    echo "<script>alert('Election Reset Successfully');</script>";
}

/* SINGLE COLUMN COUNT (President / Vice) */
function getCounts($conn, $column){
    $sql = "SELECT $column as candidate, COUNT(*) as total 
            FROM votes 
            WHERE $column IS NOT NULL AND $column != ''
            GROUP BY $column 
            ORDER BY total DESC";

    return $conn->query($sql);
}

/* DOUBLE COLUMN COUNT (Clubs - 2 votes) */
function getMultiCounts($conn, $col1, $col2){
    $sql = "
        SELECT candidate, COUNT(*) as total FROM (
            SELECT $col1 as candidate FROM votes
            UNION ALL
            SELECT $col2 FROM votes
        ) as temp
        WHERE candidate IS NOT NULL AND candidate != ''
        GROUP BY candidate
        ORDER BY total DESC
    ";

    return $conn->query($sql);
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Admin Panel</title>

<style>
body{
    font-family:Arial;
    background:#eef;
    text-align:center;
}

table{
    margin:20px auto;
    border-collapse:collapse;
    width:60%;
}

th,td{
    border:1px solid #777;
    padding:10px;
}

th{
    background:#333;
    color:white;
}

h3{
    margin-top:40px;
}

.winner{
    background:lightgreen;
    font-weight:bold;
}

button{
    padding:12px 25px;
    background:red;
    color:white;
    border:none;
    cursor:pointer;
    margin-top:20px;
    font-size:16px;
}
</style>
</head>

<body>

<h2>📊 Election Results</h2>

<!-- PRESIDENT -->
<h3>🏆 President Result</h3>
<table>
<tr><th>Name</th><th>Votes</th></tr>

<?php
$res = getCounts($conn, "president");
$first = true;

while($row = $res->fetch_assoc()){
$class = $first ? "winner" : "";
echo "<tr class='$class'>";
echo "<td>{$row['candidate']}</td>";
echo "<td>{$row['total']}</td>";
echo "</tr>";
$first = false;
}
?>
</table>

<!-- VICE PRESIDENT -->
<h3>🏆 Vice President Result</h3>
<table>
<tr><th>Name</th><th>Votes</th></tr>

<?php
$res = getCounts($conn, "vice");
$first = true;

while($row = $res->fetch_assoc()){
$class = $first ? "winner" : "";
echo "<tr class='$class'>";
echo "<td>{$row['candidate']}</td>";
echo "<td>{$row['total']}</td>";
echo "</tr>";
$first = false;
}
?>
</table>

<!-- CULTURAL -->
<h3>🎭 Cultural Club</h3>
<table>
<tr><th>Name</th><th>Votes</th></tr>

<?php
$res = getMultiCounts($conn, "cultural1", "cultural2");
$first = true;

while($row = $res->fetch_assoc()){
$class = $first ? "winner" : "";
echo "<tr class='$class'>";
echo "<td>{$row['candidate']}</td>";
echo "<td>{$row['total']}</td>";
echo "</tr>";
$first = false;
}
?>
</table>

<!-- SPORTS -->
<h3>🏏 Sports Club</h3>
<table>
<tr><th>Name</th><th>Votes</th></tr>

<?php
$res = getMultiCounts($conn, "sports1", "sports2");
$first = true;

while($row = $res->fetch_assoc()){
$class = $first ? "winner" : "";
echo "<tr class='$class'>";
echo "<td>{$row['candidate']}</td>";
echo "<td>{$row['total']}</td>";
echo "</tr>";
$first = false;
}
?>
</table>

<!-- TECH -->
<h3>💻 Technical Club</h3>
<table>
<tr><th>Name</th><th>Votes</th></tr>

<?php
$res = getMultiCounts($conn, "tech1", "tech2");
$first = true;

while($row = $res->fetch_assoc()){
$class = $first ? "winner" : "";
echo "<tr class='$class'>";
echo "<td>{$row['candidate']}</td>";
echo "<td>{$row['total']}</td>";
echo "</tr>";
$first = false;
}
?>
</table>

<!-- NSS -->
<h3>🤝 NSS Club</h3>
<table>
<tr><th>Name</th><th>Votes</th></tr>

<?php
$res = getMultiCounts($conn, "nss1", "nss2");
$first = true;

while($row = $res->fetch_assoc()){
$class = $first ? "winner" : "";
echo "<tr class='$class'>";
echo "<td>{$row['candidate']}</td>";
echo "<td>{$row['total']}</td>";
echo "</tr>";
$first = false;
}
?>
</table>

<!-- RESET BUTTON -->
<form method="POST">
<button name="reset_all"
onclick="return confirm('Are you sure you want to reset election?')">
Reset Election
</button>
</form>

</body>
</html>