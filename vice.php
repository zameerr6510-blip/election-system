<?php
session_start();

if(!isset($_SESSION['reg'])){
    header("Location: index.php");
    exit();
}

// store president vote from previous page
$_SESSION['president'] = $_POST['president'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<meta charset="UTF-8">
<title>Vice President Voting</title>
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
    font-family: Arial, sans-serif;
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
    background-color: #218838; /* Darker green on hover */
    transform: scale(1.05);
    box-shadow: 0 0 25px rgba(0,128,0,0.7);
}

/* ===== Candidate Cards ===== */
.card{
    background:#ffffffcc; /* semi-transparent to blend with background */
    width:230px;
    margin:12px;
    padding:15px;
    display:inline-block;
    border-radius:12px;
    vertical-align: top;
    box-shadow: 0 8px 20px rgba(0,0,0,0.25);
    transition: transform 0.2s, box-shadow 0.2s;
    cursor: pointer; /* pointer on hover */
}
.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 12px 25px rgba(0,0,0,0.35);
}

img{
    width:140px;
    height:140px;
    border-radius:50%;
}

.slogan{
    font-style:italic;
    color:#555;
}

/* ===== Radio button styling ===== */
input[type="radio"] {
    margin-top: 10px;
}

/* ===== Next Button ===== */
button{
    padding:10px 30px;
    background:#28a745; /* Green color */
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
    background:#218838; /* Darker green */
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(0,128,0,0.6);
}
</style>
</head>

<body>

<!-- ===== Highlighted Heading ===== -->
<div class="vote-heading">Vote for Vice President</div>

<form action="clubs.php" method="POST">

<!-- Keep president vote hidden -->
<input type="hidden" name="president" value="<?php echo $_POST['president']; ?>">

<div class="card" data-radio="vp1">
<img src="images/vp1.jpg">
<h4>Pancham Kumar</h4>
<p>CSE – 3rd Year</p>
<p class="slogan">"Support • Strength • Success"</p>
<input type="radio" id="vp1" name="vice" value="Pancham Kumar" required>
</div>

<div class="card" data-radio="vp2">
<img src="images/vp2.jpg">
<h4>Arshad</h4>
<p>EEE – 2nd Year</p>
<p class="slogan">"Together We Grow"</p>
<input type="radio" id="vp2" name="vice" value="Arshad">
</div>

<div class="card" data-radio="vp3">
<img src="images/vp3.jpg">
<h4>Fouziya</h4>
<p>Mechanical – 4th Year</p>
<p class="slogan">"Action Over Words"</p>
<input type="radio" id="vp3" name="vice" value="Fouziya">
</div>

<div class="card" data-radio="vp4">
<img src="images/vp4.jpg">
<h4>Bhagya</h4>
<p>ECE – 3rd Year</p>
<p class="slogan">"Responsibility with Care"</p>
<input type="radio" id="vp4" name="vice" value="Bhagya">
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

/* ===== Make card clickable to select radio ===== */
document.querySelectorAll('.card').forEach(card => {
    card.addEventListener('click', function(e){
        const radio = document.getElementById(card.dataset.radio);
        if(e.target !== radio){
            radio.checked = true;
        }
    });
});
</script>

</body>
</html>