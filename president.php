<?php
session_start();

if(!isset($_SESSION['reg'])){
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>President Voting</title>
<style>
/* ===== Background ===== */
body::before{
    content:"";
    position:fixed;
    top:0;
    left:0;
    width:100%;
    height:100%;
    background:url("https://www.mbacollegesbangalore.in/wp-content/uploads/2017/07/Karnataka-College-of-Management-Bangalore-Campus.png")
               no-repeat center center/cover;
    opacity:0.25;     
    z-index:-1;
}

body{
    font-family:Arial;
    background:#f2f2f2;
    text-align:center;
}

/* ===== Highlighted Heading ===== */
.vote-heading {
    font-weight: bold;
    font-size: 28px;
    color: #ffffff;
    background-color: #28a745; /* Green color */
    padding: 15px 25px;
    border-radius: 12px;
    display: table;
    margin: 20px auto;
    box-shadow: 0 0 15px rgba(0,128,0,0.5);
    text-align: center;
    transition: transform 0.2s, box-shadow 0.2s;
}
.vote-heading:hover {
    background-color: #218838;
    transform: scale(1.05);
    box-shadow: 0 0 25px rgba(0,128,0,0.7);
}

/* ===== Candidate Cards ===== */
.card{
    background:#ffffffcc; /* semi-transparent to blend with background */
    width:220px;
    margin:12px;
    padding:15px;
    display:inline-block;
    border-radius:12px;
    vertical-align: top;
    box-shadow: 0 8px 20px rgba(0,0,0,0.25);
    transition: transform 0.2s, box-shadow 0.2s;
    cursor: pointer; /* show pointer */
}
.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 12px 25px rgba(0,0,0,0.35);
}

img{
    width:120px;
    height:120px;
    border-radius:50%;
}

/* ===== Radio button styling ===== */
input[type="radio"] {
    margin-top: 10px;
}

/* ===== Next Button ===== */
button{
    padding:10px 30px;
    background:#28a745;
    color:white;
    border:none;
    border-radius:6px;
    font-size:16px;
    cursor:pointer;
    margin-top: 20px;
    box-shadow: 0 5px 15px rgba(0,128,0,0.4);
    transition: transform 0.2s, box-shadow 0.2s;
}
button:hover {
    background:#218838;
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(0,128,0,0.6);
}
</style>
</head>

<body>

<!-- ===== Highlighted Heading ===== -->
<div class="vote-heading">Vote for President</div>

<form action="vice.php" method="POST">

<div class="card" data-radio="pres1">
    <img src="images/p1.jpg">
    <h4>Roshan Zameer</h4>
    <p>BCA – 3rd Year</p>
    <p><i>"Leadership with Integrity"</i></p>
    <input type="radio" id="pres1" name="president" value="Roshan Zameer" required>
</div>

<div class="card" data-radio="pres2">
    <img src="images/p2.jpg">
    <h4>Tabrez j</h4>
    <p>ECE – 4th Year</p>
    <p><i>"Voice of Students"</i></p>
    <input type="radio" id="pres2" name="president" value="Tabrez j">
</div>

<div class="card" data-radio="pres3">
    <img src="images/p3.jpg">
    <h4>Roopa</h4>
    <p>ME – 3rd Year</p>
    <p><i>"Unity & Progress"</i></p>
    <input type="radio" id="pres3" name="president" value="Roopa">
</div>

<div class="card" data-radio="pres4">
    <img src="images/p4.jpg">
    <h4>Saba</h4>
    <p>CE – 2nd Year</p>
    <p><i>"Together We Rise"</i></p>
    <input type="radio" id="pres4" name="president" value="Saba">
</div>

<br><br>

<button type="submit">Next</button>

</form>

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

/* ===== Make card clickable ===== */
document.querySelectorAll('.card').forEach(card => {
    card.addEventListener('click', function(e){
        // if the click is NOT directly on the radio button, select the radio button
        const radio = document.getElementById(card.dataset.radio);
        if(e.target !== radio) {
            radio.checked = true;
        }
    });
});
</script>
</body>
</html>