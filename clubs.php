<?php
session_start();

if(!isset($_SESSION['reg'])){
    header("Location: index.php");
    exit();
}

$_SESSION['vice'] = $_POST['vice'];
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Club Voting</title>


<style>

/* ===== Background ===== */
body::before{
    content:"";
    position:fixed;
    top:0;
    left:0;
    width:100%;
    height:100%;
    background:url("https://www.mbacollegesbangalore.in/wp-content/uploads/2017/07/Karnataka-College-of-Management-Bangalore-Campus.png") no-repeat center/cover;
    opacity:0.25;
    z-index:-1;
}

body{
    font-family:Arial;
    background:#f2f2f2;
    text-align:center;
}

/* ===== Main Instruction ===== */
h2{
    background-color: #28a745;
    color: white;
    display: block;
    width: fit-content;
    margin: 0 auto 30px auto;
    padding: 12px 25px;
    border-radius: 12px;
    box-shadow: 0 5px 15px rgba(0,128,0,0.5);
    text-align: center;
}

/* ===== Club Headers ===== */
h3{
    background-color: #28a745;
    color: white;
    display: block;
    width: fit-content;
    margin: 30px auto 15px auto;
    padding: 10px 30px;
    border-radius: 12px;
    box-shadow: 0 5px 15px rgba(0,128,0,0.5);
    font-size: 22px;
    text-align: center;
}

/* ===== Candidate Cards ===== */
.card{
    background: rgba(255, 255, 255, 0.85); /* slightly transparent now */
    width:220px;
    margin:10px;
    padding:15px;
    display:inline-block;
    border-radius:12px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.35);
    transition: transform 0.2s, box-shadow 0.2s;
    cursor: pointer;
    position: relative;
    vertical-align: top;
    text-align: center;
}

.card:hover{
    transform: translateY(-3px);
    box-shadow: 0 12px 25px rgba(0,0,0,0.45);
}

.card img{
    width:120px;
    height:120px;
    border-radius:50%;
    margin-bottom:10px;
}

.details{font-size:14px;color:#333;}
.slogan{font-style:italic;color:#555;font-size:13px;margin-bottom:10px;}

/* ===== Checkbox centered in card ===== */
.card input[type="checkbox"]{
    margin-top:10px;
    transform: scale(1.5);
    cursor: pointer;
}

/* ===== Button ===== */
button{
    padding:12px 40px;
    background:green;
    color:white;
    border:none;
    border-radius:8px;
    font-size:16px;
    cursor:pointer;
    box-shadow: 0 5px 15px rgba(0,128,0,0.4);
    transition: transform 0.2s, box-shadow 0.2s;
}

button:hover{
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(0,128,0,0.6);
}

</style>
</head>

<body>

<h2>Vote for Clubs (Select EXACTLY 2 per Club)</h2>

<form id="clubForm" action="submit_vote.php" method="POST">

<!-- ===== CULTURAL CLUB ===== -->
<h3>Cultural Club</h3>

<div class="card" onclick="toggleCheckbox(this)">
    <img src="images/c1.jpg">
    <h4>Neha Singh</h4>
    <p class="details">BA – 2nd Year</p>
    <p class="slogan">"Celebrating Culture"</p>
    <input type="checkbox" name="cultural[]" value="Neha Singh">
</div>

<div class="card" onclick="toggleCheckbox(this)">
    <img src="images/c2.jpg">
    <h4>Riya Mehta</h4>
    <p class="details">BCom – 3rd Year</p>
    <p class="slogan">"Unity in Diversity"</p>
    <input type="checkbox" name="cultural[]" value="Riya Mehta">
</div>

<div class="card" onclick="toggleCheckbox(this)">
    <img src="images/c3.jpg">
    <h4>Krushna Rao</h4>
    <p class="details">BA – 1st Year</p>
    <p class="slogan">"Art is Life"</p>
    <input type="checkbox" name="cultural[]" value="Krushna Rao">
</div>

<div class="card" onclick="toggleCheckbox(this)">
    <img src="images/c4.jpg">
    <h4>Sneha Kulkarni</h4>
    <p class="details">BSc – 2nd Year</p>
    <p class="slogan">"Culture Connects"</p>
    <input type="checkbox" name="cultural[]" value="Sneha Kulkarni">
</div>

<!-- ===== SPORTS CLUB ===== -->
<h3>Sports Club</h3>

<div class="card" onclick="toggleCheckbox(this)">
    <img src="images/s1.jpg">
    <h4>Arjun Rao</h4>
    <p class="details">Mechanical – 3rd Year</p>
    <p class="slogan">"Play Strong"</p>
    <input type="checkbox" name="sports[]" value="Arjun Rao">
</div>

<div class="card" onclick="toggleCheckbox(this)">
    <img src="images/s2.jpg">
    <h4>Kiran Patel</h4>
    <p class="details">CSE – 2nd Year</p>
    <p class="slogan">"Fitness First"</p>
    <input type="checkbox" name="sports[]" value="Kiran Patel">
</div>

<div class="card" onclick="toggleCheckbox(this)">
    <img src="images/s3.jpg">
    <h4>Rahul Desai</h4>
    <p class="details">Civil – 3rd Year</p>
    <p class="slogan">"Never Give Up"</p>
    <input type="checkbox" name="sports[]" value="Rahul Desai">
</div>

<div class="card" onclick="toggleCheckbox(this)">
    <img src="images/s4.jpg">
    <h4>Amit Sharma</h4>
    <p class="details">EEE – 2nd Year</p>
    <p class="slogan">"Win with Discipline"</p>
    <input type="checkbox" name="sports[]" value="Amit Sharma">
</div>

<!-- ===== TECHNICAL CLUB ===== -->
<h3>Technical Club</h3>

<div class="card" onclick="toggleCheckbox(this)">
    <img src="images/t1.jpg">
    <h4>Aditya Verma</h4>
    <p class="details">CSE – 3rd Year</p>
    <p class="slogan">"Innovate Future"</p>
    <input type="checkbox" name="tech[]" value="Aditya Verma">
</div>

<div class="card" onclick="toggleCheckbox(this)">
    <img src="images/t2.jpg">
    <h4>Megha Iyer</h4>
    <p class="details">IT – 2nd Year</p>
    <p class="slogan">"Code with Purpose"</p>
    <input type="checkbox" name="tech[]" value="Megha Iyer">
</div>

<div class="card" onclick="toggleCheckbox(this)">
    <img src="images/t3.jpg">
    <h4>Rohan Malhotra</h4>
    <p class="details">AI – 3rd Year</p>
    <p class="slogan">"Tech Tomorrow"</p>
    <input type="checkbox" name="tech[]" value="Rohan Malhotra">
</div>

<div class="card" onclick="toggleCheckbox(this)">
    <img src="images/t4.jpg">
    <h4>Pooja Nair</h4>
    <p class="details">CSE – 2nd Year</p>
    <p class="slogan">"Think Build"</p>
    <input type="checkbox" name="tech[]" value="Pooja Nair">
</div>

<!-- ===== NSS CLUB ===== -->
<h3>NSS Club</h3>

<div class="card" onclick="toggleCheckbox(this)">
    <img src="images/n1.jpg">
    <h4>Vikram Singh</h4>
    <p class="details">Mechanical – 4th Year</p>
    <p class="slogan">"Service First"</p>
    <input type="checkbox" name="nss[]" value="Vikram Singh">
</div>

<div class="card" onclick="toggleCheckbox(this)">
    <img src="images/n2.jpg">
    <h4>Priya Menon</h4>
    <p class="details">ECE – 3rd Year</p>
    <p class="slogan">"Helping Hands"</p>
    <input type="checkbox" name="nss[]" value="Priya Menon">
</div>

<div class="card" onclick="toggleCheckbox(this)">
    <img src="images/n3.jpg">
    <h4>Akash Kulkarni</h4>
    <p class="details">Civil – 2nd Year</p>
    <p class="slogan">"Serve with Smile"</p>
    <input type="checkbox" name="nss[]" value="Akash Kulkarni">
</div>

<div class="card" onclick="toggleCheckbox(this)">
    <img src="images/n4.jpg">
    <h4>Divya Joshi</h4>
    <p class="details">BSc – 3rd Year</p>
    <p class="slogan">"Together We Care"</p>
    <input type="checkbox" name="nss[]" value="Divya Joshi">
</div>

<br><br>

<button type="submit">Submit Vote</button>

</form>

<script>
/* ===== Make entire card clickable ===== */
function toggleCheckbox(card){
    const checkbox = card.querySelector('input[type="checkbox"]');
    checkbox.checked = !checkbox.checked;
    checkbox.dispatchEvent(new Event('change'));
}

/* ===== Checkbox logic for exactly 2 per club ===== */
const clubs = ["cultural","sports","tech","nss"];

clubs.forEach(group => {
    let boxes = document.querySelectorAll(`input[name="${group}[]"]`);
    boxes.forEach(box => {
        box.addEventListener("change", function(){
            let checked = document.querySelectorAll(`input[name="${group}[]"]:checked`);
            if(checked.length > 2){
                alert("You can select only 2 candidates in "+group+" club");
                this.checked = false;
            }
        });
    });
});

document.getElementById("clubForm").addEventListener("submit", function(e){
    for(let group of clubs){
        let checked = document.querySelectorAll(`input[name="${group}[]"]:checked`);
        if(checked.length !== 2){
            alert("Please select exactly 2 candidates in "+group+" club");
            e.preventDefault();
            return;
        }
    }
});

/* ===== Lock page - disable back button ===== */
history.pushState(null, null, location.href);
window.onpopstate = function () { history.go(1); };

/* Disable refresh (optional) */
document.onkeydown = function(e){ if(e.keyCode == 116){ return false; } };

</script>

</body>
</html>