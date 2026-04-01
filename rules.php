<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Rules</title>
<style>
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
    text-align:center;
    background:#eef;
}

.box{
    background:#ecfdf5;
    width:70%;
    margin:80px auto;
    padding:30px;
    border-radius:10px;
}

button{
    padding:10px 30px;
    background:green;
    color:white;
    border:none;
    border-radius:6px;
    cursor:pointer;
}

/* ===== OFFICIAL DETAILS ===== */
.officials{
    margin-top:30px;
    padding-top:20px;
    border-top:2px solid #c7e8d9;
}

.officials h3{
    margin-bottom:10px;
    color:#14532d;
}

.officials p{
    margin:6px 0;
    font-size:14px;
    color:#333;
}
</style>
</head>

<body>

<div class="box">
<h2>Election Rules</h2>

<p>✔ One voter can vote only once</p>
<p>✔ Select only one candidate per post</p>
<p>✔ All votes are confidential</p>

<!-- ===== OFFICIAL DETAILS SECTION ===== -->
<div class="officials">
<h3>Election Committee</h3>

<p><b>Secretary:</b> Dr. Suresh Kumar</p>
<p><b>COO:</b> Mr. Ramesh Iyer</p>

<p><b>HOD – Computer Science:</b> Dr. Anjali Mehta</p>
<p><b>HOD – Mechanical Engineering:</b> Dr. Prakash Rao</p>
<p><b>HOD – Electronics & Communication:</b> Dr. Sunita Menon</p>

<p><b>Faculties:</b> Prof. Arvind | Prof. Kavya | Prof. Nitin | Prof. Asha</p>
</div>

<br>
<button onclick="location.href='president.php'">Proceed to Vote</button>
</div>

</body>
</html>
