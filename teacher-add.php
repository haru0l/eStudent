<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "estudent";
$conn = new mysqli($servername, $username, $password, $dbname);
if(isset($_GET['login_id'])) {
    $idGet = $_GET['login_id'];
    $passGet = $_GET['teacherPassword'];
    $nameGet = $_GET['teacherName'];
    $genderGet = $_GET['gender'];
    $phoneGet = $_GET['teacher_phoneNum'];
    $mailGet = $_GET['teacherEmail'];
    $typeGet = $_GET['teacherType'];
    $sub1Get = $_GET['teacherSub1'];
    $sub2Get = $_GET['teacherSub2'];
    $sub3Get = $_GET['teacherSub3'];
    $classGet = $_GET['class'];
    $tabIDGet = $_GET['tableID'];
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {

$login_id = $_POST['login_id'];
$teacherPassword = $_POST['teacherPassword'];
$teacherName = $_POST['teacherName'];
$gender = $_POST['gender'];
$teacher_phoneNum = $_POST['teacher_phoneNum'];
$date_of_birth = $_POST['date_of_birth'];
$teacherEmail = $_POST['teacherEmail'];
$teacherType = $_POST['teacherType'];
$teacherSub1 = $_POST['teacherSub1'];
$teacherSub2 = $_POST['teacherSub2'];
$teacherSub3 = $_POST['teacherSub3'];
$class = $_POST['class'];
$tableID = $_POST['tableID'];

$query = "SELECT * FROM user WHERE login_id ='$login_id' AND tableID='$tableID'";
$result = $conn->query($query);
$row = $result->fetch_assoc();
$count = mysqli_num_rows($result);
    
if ($count == 1)    
{
$conn->query("UPDATE user SET login_id='$login_id' WHERE tableID = '$tableID'");
$conn->query("UPDATE user SET teacherPassword='$teacherPassword' WHERE tableID = '$tableID'");
$conn->query("UPDATE user SET teacherName='$teacherName' WHERE tableID = '$tableID'");
$conn->query("UPDATE user SET gender='$gender' WHERE tableID = '$tableID'");
$conn->query("UPDATE user SET teacher_phoneNum='$teacher_phoneNum' WHERE tableID = '$tableID'");
$conn->query("UPDATE user SET teacherEmail='$teacherEmail' WHERE tableID = '$tableID'");
$conn->query("UPDATE user SET teacherType='$teacherType' WHERE tableID = '$tableID'");
$conn->query("UPDATE user SET teacherSub1='$teacherSub1' WHERE tableID = '$tableID'");
$conn->query("UPDATE user SET teacherSub2='$teacherSub2' WHERE tableID = '$tableID'");
$conn->query("UPDATE user SET teacherSub3='$teacherSub3' WHERE tableID = '$tableID'");
$conn->query("UPDATE user SET class='$class' WHERE tableID = '$tableID'");
echo '<script type="text/javascript">';
echo ' alert("Data telah dikemaskini!")';  //not showing an alert box.
echo '</script>';
echo '<meta http-equiv="Refresh" content="0; url=teacher-list.php"/>';
}
else
{
$sql = "INSERT into user (login_id, teacherPassword, teacherName, gender, teacherEmail, teacher_phoneNum, teacherType, teacherSub1, teacherSub2, teacherSub3, class)
VALUES ('$login_id', '$teacherPassword', '$teacherName', '$gender', '$teacherEmail', '$teacher_phoneNum', '$teacherType', '$teacherSub1', '$teacherSub2', '$teacherSub3', '$class')";
$conn->query($sql);
echo '<script type="text/javascript">';
echo ' alert("Data berjaya dimasukkan!")';  //not showing an alert box.
echo '</script>';
echo '<meta http-equiv="Refresh" content="0; url=teacher-list.php"/>';
}

}
$login_user = $_COOKIE["user_name"];
$sql = "SELECT * FROM user WHERE login_id='$login_user'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
$val=$conn->query($sql);    
$rows=$val;
if (!isset($_COOKIE["user_name"]) || $_COOKIE["user_name"] != "admin")
{?>
<html>
<meta charset="utf-8">
<title>Error</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<div class="container">
    <div class="alert alert-danger alert-dismissible fade show">
        <h4 class="alert-heading"><i class="bi-exclamation-octagon-fill"></i> Ralat!</h4>
        <p>Anda tidak log masuk dengan akaun yang sah.</p>
        <hr>
        <p class="mb-0">Tekan butang 'Kembali' untuk ke laman log masuk semula.</p>
        <button type="button" class="btn btn-danger" data-toggle="modal" onclick="logout()">Kembali</button>
    </div>
    <script>
        function logout() {
            window.location.replace("logout.php");
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</div>

</html>
<?php
}

if (isset($_COOKIE["user_name"]) && $_COOKIE["user_name"] == "admin")
{?>
<html lang="en" class="no-js">
<!-- Head -->

<title>eStudent Assessment System</title>

    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    

    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.png" type="image/x-icon">
    <!-- Web Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
    <!-- Components Vendor Styles -->
    <link rel="stylesheet" href="assets/vendor/font-awesome/css/all.min.css">
    <link rel="stylesheet" href="assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css">
    <link rel="stylesheet" href="assets/css/nice-select.css">
    <link rel="stylesheet" href="assets/css/jquery-ui.min.css">
    <!-- Theme Styles -->
    <link rel="stylesheet" href="assets/css/theme.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

  
</head>
<!-- End Head -->

<body>
    <!-- Header (Topbar) -->
    <header class="u-header">
        <div class="u-header-left">
            <a class="u-header-logo" href="dashboard.php">
                <img class="u-logo-desktop" src="assets/img/logo_sk.png" width="160" alt="Stream Dashboard">
                <img class="img-fluid u-logo-mobile" src="assets/img/logo-mobile.png" width="50" alt="Stream Dashboard">
            </a>
        </div>

       <div class="u-header-middle">
            <a class="js-sidebar-invoker u-sidebar-invoker text-danger" href="#!" data-is-close-all-except-this="true" data-target="#sidebar">
                <i class="fa fa-bars u-sidebar-invoker__icon--open"></i>
                <i class="fa fa-times u-sidebar-invoker__icon--close"></i>
                
            </a>
            <h1 class="text" style="text-align: center; font-size: 36">e-Student Assessment System</h1>
			

        <div class="u-header-right">
            <!-- User Profile -->
			<h6 class="text" style="text-align: center; font-size: 16">Selamat datang, <?php echo $_COOKIE['teacherName']; ?>    </h6>
            <div class="dropdown ml-2">
			
                <a class="link-muted d-flex align-items-center us-u-avatar-wrap" href="#!" role="button" id="dropdownMenuLink" aria-haspopup="true" aria-expanded="false" data-toggle="dropdown">
                    <img class="u-avatar--xs img-fluid rounded-circle mr-2 bg-gradient-blue" src="assets/img/avatars/user-unknown.jpg" alt="User Profile">
                    <span class="d-none d-sm-inline-block text-danger">
                        <small class="fas fa-ellipsis-v"></small>
                    </span>
                </a>

                <div class="dropdown-menu dropdown-menu-right border-0 py-0 mt-3" aria-labelledby="dropdownMenuLink" style="width: 260px;">
                    <div class="card">
						
                        <div class="card-body">
                            <ul class="list-unstyled mb-0">
                                <li class="mb-4">
								
                                    <a class="d-flex align-items-center link-dark" href="my-profile.php">
                                        <span class="h3 mb-0"><i class="far fa-user-circle text-muted mr-3"></i></span> Profil
                                    </a>
                                </li>
                                <li>
                                    <a class="d-flex align-items-center link-dark" href="logout.php">
                                        <span class="h3 mb-0"><i class="far fa-share-square text-muted mr-3"></i></span> Log keluar
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End User Profile -->
        </div>
    </header>
    <!-- End Header (Topbar) -->

    <main class="u-main" role="main">
        <!-- Sidebar -->
        <aside id="sidebar" class="u-sidebar">
            <div class="u-sidebar-inner bg-gradient-yellow bdrs-30">
                <header class="u-sidebar-header">
                    <a class="u-sidebar-logo" href="dashboard.php">
                        <img class="img-fluid" src="assets/img/logo_sk.png" width="124" alt="Stream Dashboard">
                    </a>
                </header>
                <nav class="u-sidebar-nav">
                    <ul class="u-sidebar-nav-menu u-sidebar-nav-menu--top-level">
                        <!-- Dashboard -->
                        <li class="u-sidebar-nav-menu__item">
                            <a class="u-sidebar-nav-menu__link" href="dashboard.php">
                                <i class="fas fa-tachometer-alt u-sidebar-nav-menu__item-icon"></i>
                                <span class="u-sidebar-nav-menu__item-title">Dashboard</span>
                            </a>
                        </li>
                        <!-- End Dashboard -->

                        
                        <?php 
                        if ($_COOKIE["user_name"] == "admin" || $_COOKIE["type"] == "Guru kelas" || $_COOKIE["type"] == "Guru subjek") {
                        if ($_COOKIE["user_name"] == "admin") {
                        echo '<li class="u-sidebar-nav-menu__item">
                            <a class="u-sidebar-nav-menu__link" href="teacher-list.php">
                                <i class="fas fa-chalkboard-teacher u-sidebar-nav-menu__item-icon"></i>
                                <span class="u-sidebar-nav-menu__item-title">Guru</span>
                                <span class="u-sidebar-nav-menu__indicator"></span>
                            </a>
                        </li>';
} ?>
                        <!-- End Classes -->

                        <!-- Markah -->
                        <!-- Classes -->
                        <?php if ($_COOKIE["user_name"] == "admin") {
                            echo '<li class="u-sidebar-nav-menu__item">
                            <a class="u-sidebar-nav-menu__link" href="classes-view.php">
                                <i class="fas fa-user-check u-sidebar-nav-menu__item-icon"></i>
                                <span class="u-sidebar-nav-menu__item-title">Senarai murid</span>
                                <span class="u-sidebar-nav-menu__indicator"></span>
                            </a>
                        </li>';
                                
                                echo '<li class="u-sidebar-nav-menu__item">
                            <a class="u-sidebar-nav-menu__link" href="marks-admin.php">
                                <i class="far fa-clipboard u-sidebar-nav-menu__item-icon"></i>
                                <span class="u-sidebar-nav-menu__item-title">Permarkahan</span>
                                <span class="u-sidebar-nav-menu__indicator"></span>
                            </a>
                        </li>';
                        }
                        if ($_COOKIE["type"] == "Guru kelas") {
                        
                        echo '<li class="u-sidebar-nav-menu__item">
                            <a class="u-sidebar-nav-menu__link" href="classes-list.php">
                                <i class="fas fa-user-check u-sidebar-nav-menu__item-icon"></i>
                                <span class="u-sidebar-nav-menu__item-title">Senarai murid</span>
                                <span class="u-sidebar-nav-menu__indicator"></span>
                            </a>
                        </li>';
                        
    
    
                        echo '<li class="u-sidebar-nav-menu__item">
                            <a class="u-sidebar-nav-menu__link" href="marks.php">
                                <i class="far fa-clipboard u-sidebar-nav-menu__item-icon"></i>
                                <span class="u-sidebar-nav-menu__item-title">Permarkahan</span>
                                <span class="u-sidebar-nav-menu__indicator"></span>
                            </a>
                        </li>';
}
                        if ($_COOKIE["type"] == "Guru subjek") {
                        echo '<li class="u-sidebar-nav-menu__item">
                            <a class="u-sidebar-nav-menu__link" href="marks.php">
                                <i class="far fa-clipboard u-sidebar-nav-menu__item-icon"></i>
                                <span class="u-sidebar-nav-menu__item-title">Permarkahan</span>
                                <span class="u-sidebar-nav-menu__indicator"></span>
                            </a>
                        </li>';
                        
                        }

                        echo
                        '<li class="u-sidebar-nav-menu__item">
                            <a class="u-sidebar-nav-menu__link" href="#!" data-target="#profil">
                                <i class="fa fa-user u-sidebar-nav-menu__item-icon"></i>
                                <span class="u-sidebar-nav-menu__item-title">Profil</span>
                                <i class="fa fa-angle-right u-sidebar-nav-menu__item-arrow"></i>
                                <span class="u-sidebar-nav-menu__indicator"></span>
                            </a>

                            <ul id="profil" class="u-sidebar-nav-menu u-sidebar-nav-menu--second-level" style="display: none;">
                                <li class="u-sidebar-nav-menu__item">
                                    <a class="u-sidebar-nav-menu__link" href="my-profile.php">
                                        <span class="u-sidebar-nav-menu__item-title">Profil</span>
                                    </a>
                                </li>
                                <li class="u-sidebar-nav-menu__item">
                                    <a class="u-sidebar-nav-menu__link" disabled href="edit-my-profile.php">
                                        <span class="u-sidebar-nav-menu__item-title">Sunting Profil</span>
                                    </a>
                                </li>
                            </ul>
                        </li>';
                        }
                        if ($_COOKIE["type"] == "student" ){
                            echo 
                            '<li class="u-sidebar-nav-menu__item">
                            <a class="u-sidebar-nav-menu__link" href="slip.php" target="_blank">
                                <i class="fas fa-user-check u-sidebar-nav-menu__item-icon"></i>
                                <span class="u-sidebar-nav-menu__item-title">Keputusan</span>
                                <span class="u-sidebar-nav-menu__indicator"></span>
                            </a>
                        </li>';
                        }
                        ?>
                        
                        <!-- End Profile -->
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- End Sidebar -->

        <div class="u-content">
            <div class="u-body">

                

                
                <section class="es-form-area">
                    <div class="card">
                        <header class="card-header bg-gradient-blue border-0 pt-5 pb-5 d-flex align-items-center">
                            <h2 class="text-white mb-0">Tambah guru</h2>
                        </header>
                        <div class="card-body">
                            <form action="teacher-add.php" method="post" class="es-form es-add-form">
                                <div class="row">
                                 <?php if(isset($_GET['login_id'])) { ?>
                                  <div class="col-lg-8 offset-lg-2 col-md-12 mb-4">
                                        <label for="tableID">ID Guru</label>
                                        <input required type="text" name="tableID" readonly value="<?php echo $tabIDGet?>">
                                    <?php  }?>
                                    </div>
                                   <div class="col-lg-8 offset-lg-2 col-md-12 mb-4">
                                        <label for="title">No IC</label>
                                        <input required type="number" required name="login_id" placeholder="Masukkan nombor kad pengenalan tanpa sengkang (-)"
                                        <?php if(isset($_GET['login_id'])) { ?> value="<?php echo $idGet?>" <?php  }?>>
                                    </div>
                                    <div class="col-lg-8 offset-lg-2 col-md-12 mb-4">
                                        <label for="title">Kata laluan</label>
                                        <input required type="text" required placeholder="Masukkan kata laluan" name="teacherPassword" <?php if(isset($_GET['login_id'])) { ?> value="<?php echo $passGet?>" <?php  }?>>
                                    </div>
                                    <div class="col-lg-8 offset-lg-2 col-md-12 mb-4">
                                        <label for="title">Nama Guru</label>
                                        <input required type="text" required placeholder="Masukkan nama guru" oninput="this.value = this.value.toUpperCase()" name="teacherName" <?php if(isset($_GET['login_id'])) { ?> value="<?php echo $nameGet?>" <?php  }?>>
                                    </div>
                                     <div class="col-lg-8 offset-lg-2 col-md-12 mb-4">
                                        <label for="class">Jantina</label>
                                        <select name="gender" required id="gender" class="es-add-select" <?php if(isset($_GET['login_id'])) { ?> value="<?php echo $genderGet?>" <?php  }?>>
                                            <option value="LELAKI">LELAKI</option>
                                            <option value="PEREMPUAN">PEREMPUAN</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-8 offset-lg-2 col-md-12 mb-4">
                                        <label for="phone">No. Telefon</label>
                                        <input required type="num" required placeholder="Masukkan nombor telefon tanpa sengkang (-)" name="teacher_phoneNum" <?php if(isset($_GET['login_id'])) { ?> value="<?php echo $phoneGet?>" <?php  }?>>
                                    </div>
                                    <div class="col-lg-8 offset-lg-2 col-md-12 mb-4">
                                        <label for="email">E-mail</label>
                                        <input required type="email" required name="teacherEmail" placeholder="Masukkan e-mail" <?php if(isset($_GET['login_id'])) { ?> value="<?php echo $mailGet?>" <?php  }?>>
                                    </div>
                                    <div class="col-lg-8 offset-lg-2 col-md-12 mb-4">
                                        <label for="class">Jenis</label>
                                        <select name="teacherType" required id="class" <?php if(isset($_GET['login_id'])) { ?> value="<?php echo $typeGet?>" <?php  }?>>
                                            <option value="Guru kelas">Guru kelas</option>
                                            <option value="Guru subjek">Guru subjek</option>
											<option value="Guru subjek">Admin</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-8 offset-lg-2 col-md-12 mb-4">
                                        <label for="subject">Subjek mengajar 1</label>
                                        <select required name="teacherSub1" id="subject" class="es-add-select" <?php if(isset($_GET['login_id'])) { ?> value="<?php echo $sub1Get?>" <?php } ?>>
                                            <option value="Bahasa Melayu">Bahasa Melayu</option>
                                            <option value="Bahasa Inggeris">Bahasa Inggeris</option>
                                            <option value="Matematik">Matematik</option>
                                            <option value="Sains">Sains</option>
                                            <option value="Pendidikan Seni Visual">Pendidikan Seni Visual</option>
                                            <option value="Pendidikan Musik">Pendidikan Musik</option>
                                            <option value="Reka bentuk teknologi">Reka bentuk teknologi</option>
                                            <option value="Pendidikan Islam">Pendidikan Islam</option>
                                            <option value="Bahasa Arab">Bahasa Arab</option>
                                            <option value="Tasmik">Tasmik</option>
                                            <option value="Sejarah">Sejarah</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-8 offset-lg-2 col-md-12 mb-4">
                                        <label for="subject">Subjek mengajar 2</label>
                                        <select name="teacherSub2" id="subject" class="es-add-select"
                                        <?php if(isset($_GET['login_id'])) { ?> value="<?php echo $sub2Get;?>"<?php }?>>
                                            <option value="">-</option>
                                            <option value="Bahasa Melayu">Bahasa Melayu</option>
                                            <option value="Bahasa Inggeris">Bahasa Inggeris</option>
                                            <option value="Matematik">Matematik</option>
                                            <option value="Sains">Sains</option>
                                            <option value="Pendidikan Seni Visual">Pendidikan Seni Visual</option>
                                            <option value="Pendidikan Musik">Pendidikan Musik</option>
                                            <option value="Reka bentuk teknologi">Reka bentuk teknologi</option>
                                            <option value="Pendidikan Islam">Pendidikan Islam</option>
                                            <option value="Bahasa Arab">Bahasa Arab</option>
                                            <option value="Tasmik">Tasmik</option>
                                            <option value="Sejarah">Sejarah</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-8 offset-lg-2 col-md-12 mb-4">
                                        <label for="subject">Subjek mengajar 3</label>
                                        <select name="teacherSub3" id="subject" class="es-add-select" <?php if(isset($_GET['login_id'])) { ?> value="<?php echo $sub3Get?>" <?php }?>>
                                            <option value="">-</option>
                                            <option value="Bahasa Melayu">Bahasa Melayu</option>
                                            <option value="Bahasa Inggeris">Bahasa Inggeris</option>
                                            <option value="Matematik">Matematik</option>
                                            <option value="Sains">Sains</option>
                                            <option value="Pendidikan Seni Visual">Pendidikan Seni Visual</option>
                                            <option value="Pendidikan Musik">Pendidikan Musik</option>
                                            <option value="Reka bentuk teknologi">Reka bentuk teknologi</option>
                                            <option value="Pendidikan Islam">Pendidikan Islam</option>
                                            <option value="Bahasa Arab">Bahasa Arab</option>
                                            <option value="Tasmik">Tasmik</option>
                                            <option value="Sejarah">Sejarah</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-8 offset-lg-2 col-md-12 mb-4">
                                        <label for="class">Guru Kelas</label>
                                        <select name="class" id="class" <?php if(isset($_GET['login_id'])) { ?> value="<?php echo $classGet?>" <?php  }?>>
                                            <option value="">Bukan guru kelas</option>
                                            <option value="1 Bijak">1 Bijak</option>
                                            <option value="1 Cerdik">1 Cerdik</option>
                                            <option value="2 Bijak">2 Bijak</option>
                                            <option value="2 Cerdik">2 Cerdik</option>
                                            <option value="3 Bijak">3 Bijak</option>
                                            <option value="3 Cerdik">3 Cerdik</option>
                                            <option value="4 Bijak">4 Bijak</option>
                                            <option value="4 Cerdik">4 Cerdik</option>
                                            <option value="5 Bijak">5 Bijak</option>
                                            <option value="5 Cerdik">5 Cerdik</option>
                                            <option value="6 Bijak">6 Bijak</option>
                                            <option value="6 Cerdik">6 Cerdik</option>
                                        </select>
                                    </div>
                                    </div>
                                    <div class="col-lg-4 offset-lg-4 col-md-12 text-center">
                                        <button type=submit class="btn btn-danger btn-block bg-gradient-blue border-0 text-white">Tambah</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>    
                </section>
            </div>
        </div>
    </main>

    <!-- Global Vendor -->
    <script src="assets/vendor/jquery/dist/jquery.min.js"></script>
    <script src="assets/vendor/jquery-migrate/jquery-migrate.min.js"></script>
    <script src="assets/vendor/popper.js/dist/umd/popper.min.js"></script>
    <script src="assets/vendor/bootstrap/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="assets/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="assets/js/jquery.nice-select.min.js"></script>
    <script src="assets/js/jquery-ui.min.js"></script>

    <!-- Initialization  -->
    <script src="assets/js/sidebar-nav.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/dashboard-page-scripts.js"></script>
    <!--<script src="assets/js/scripts.js"></script>-->
<script>

        function logout() {
            window.location.replace("logout.php");
        }
    </script>
</body>

</html><?php
}
?>