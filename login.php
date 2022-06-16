<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "estudent";
$connect = new mysqli($servername, $username, $password, $dbname);
  
if($_SERVER['REQUEST_METHOD'] === 'POST')  
{
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = "SELECT * FROM user WHERE login_id='$username' AND teacherPassword = '$password'";
    $result = $connect->query($query);
    $row = $result->fetch_assoc();
    $count = mysqli_num_rows($result);
    if ($count == 1)
    { 
        $cookie_name = "user_name";
        $cookie_value = $username;
        setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
        $type = $row["teacherType"];
        $cookie_name = "type";
        $cookie_value = $type;
        setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
        $class = $row["class"];
        $cookie_name = "class";
        $cookie_value = $class;
        setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
        
        $name = $row["teacherName"];
        $cookie_name = "teacherName";
        $cookie_value = $name;
        setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
        
        header ('Location: index.php');
        
    }
    else if ($count != 1)
    {
    $query = "SELECT * from student WHERE icNum='$username' AND stuPassword = '$password'";
    $result = $connect->query($query);
    $row = $result->fetch_assoc();
    $count = mysqli_num_rows($result);
        if ($count == 1)
        {
        $cookie_name = "user_name";
        $cookie_value = $username;
        setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
        $cookie_name = "type";
        $cookie_value = "student";
        setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
        header ('Location: index.php');
        }
        else
        {
            echo "wrong username or password";
        }
    }
    else 
    {
        echo "wrong username or password";
    }
}

?>
 

 <html>
  <head>
  	<title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="assets/vendor/font-awesome/css/all.min.css">
	
	<link rel="stylesheet" href="assets/css/login.css">

	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Log masuk ke eStudent Assessment System</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-12 col-lg-10">
					<div class="wrap d-md-flex">
						<div class="img" style="background-image: url(assets/img/logo_sk.png);">
			      </div>
						<div class="login-wrap p-4 p-md-5">
			      	<div class="d-flex">
			      		<div class="w-100">
			      			<h3 class="mb-4">Log masuk</h3>
			      		</div>
			      	</div>
							<form action="login.php" class="signin-form" method="post">
			      		<div class="form-group mb-3">
			      			<label class="label" for="name">No IC</label>
			      			<input required type="text" name="username" class="form-control" placeholder="No IC" required>
			      		</div>
		            <div class="form-group mb-3">
		            	<label class="label" for="password">Kata laluan</label>
		              <input required type="password" name="password" class="form-control" placeholder="Kata laluan" required>
		            </div>
		            <div class="form-group">
		            	<button type="submit" class="form-control btn btn-primary rounded submit px-3">Log masuk</button>
		            </div>
		            <div class="form-group d-md-flex">
		            	<div class="w-50 text-left">
									</div>
									<div class="w-50 text-md-right">
										<!--<a href="#">Forgot Kata laluan</a>-->
									</div>
		            </div>
		          </form>
		        </div>
		      </div>
				</div>
			</div>
		</div>
	</section>

  <link rel="stylesheet" href="assets/css/jquery-ui.min.css">
  <script src="assets/js/popper.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/main.js"></script>

	</body>
</html>

