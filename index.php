<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>


    <!-- CSS only -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">



</head>
    <style>
body {
  margin: 50;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  overflow: hidden;
  background-color: #FFC300 ;
}

.topnav a {
  float: left;
  color: #000000;
  text-align: center;
  padding: 16px 30px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #04AA6D;
  color: white;
}

.topnav-right {
  float: right;
}

.center {
  display: block;
  margin-left: auto;
  margin-right: auto;
}
        
        
        

/*        start*/
        * {
  box-sizing: border-box;
}

body {
  font-family: Arial, Helvetica, sans-serif;
}

/* Style the header */
header {
  background-color: #929292 ;
  padding: 20px;
  text-align: center;
  font-size: 50px;
  color: black;
}



/* Style the list inside the menu */
nav ul {
  list-style-type: none;
  padding: 0;
}

article {
  float: left;
  padding: 50px;
  width: 100%;
  background-color: #f1f1f1;
  height: 500px; /* only for demonstration, should be removed */
}

/* Clear floats after the columns */
section::after {
  content: "";
  display: table;
  clear: both;
}

/* Style the footer */
footer {
  background-color: #FFC300 ;
  padding: 10px;
  text-align: center;
  color: black;
}

/* Responsive layout - makes the two columns/boxes stack on top of each other instead of next to each other, on small screens */
@media (max-width: 600px) {
  nav, article {
    width: 100%;
    height: auto;
  }
}
/*        end*/
</style>

<body>

    <!--start navigation-->
    <div class="topnav">
<!--  <a class="active" href="#home">E-Student Assessment System</a>-->
  <div class="topnav-right">
    <a href="login.php">Log masuk</a>
  </div>
</div>
    <!--end navigation-->

    <!--start jumbo-->
<!--
    <div class="jumbotron">
        <h1 class="display-4">Hello, world!</h1>
        <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
        <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
    </div>
    
-->
    <!--end jumbo-->
<header>
  <h2>E-STUDENT ASSESSMENT SYSTEM</h2>
</header>

<section>
  <article>
<!--    <h1>E-STUDENT ASSESSMENT SYSTEM</h1>-->
      <img src="assets/img/logo_sk.png" class="center">
    <p>E-student assessment system merupakan laman web pentaksiran murid yang dicipta khas bagi Sekolah Kebangsaan Kota Raja Panchor, Johor. Tujuan laman web ini dicipta adalah untuk membantu guru-guru bagi mengisi dan memaparkan markah serta prestasi murid dalam pelajaran di sekolah secara atas talian yang lebih mudah untuk diakses. Selain itu, objektif utama sistem ini dibangunkan adalah untuk menginovasi sistem pentaksiran pelajar kepada yang baharu dan lebih khusus kepada pelajar Sekolah Kebangsaan Kota Raja, Panchor. Seterusnya, sistem ini dibangunkan untuk meminimumkan masalah yang dihadapi semasa menggunakan sistem terdahulu, atau sistem konvensional. Akhir sekali, ianya dibangunkan untuk membantu guru menetapkan dan mengemaskini data pelajar dengan lebih teratur dan mudah dan cermat. Diharapkan sistem yang dibangunkan ini sedikit sebanyak dapat membantu khususnya kepada ibu bapa, pelajar, dan guru Sekolah Kebangsaan Kota Raja, Panchor.</p>
     
     
     <p>Jikalau anda ingin menukar kata laluan atau terlupa kata laluan, sila hubungi admin untuk bantuan selanjutnya.</p>
      <a class="btn btn-primary btn-lg" href="login.php" role="button">Log masuk</a>
      
  </article>
</section>

    <hr>

    <footer>
        <div class="container">
            <p>&copy FINAL YEAR PROJECT UTHM 2022</p>
        </div>

    </footer>



</body>

</html>
