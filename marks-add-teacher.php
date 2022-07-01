<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "estudent";
$conn = new mysqli($servername, $username, $password, $dbname);
$class=$_GET['class'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$stuIC = $_POST['stuName'];
$subject = $_POST['subject'];
$marks = $_POST['marks'];
#$remarks = $_POST['remarks'];
$test = $_POST['test'];
$band = $_POST['band'];
$year = $_POST['year'];

switch ($subject) {
  case "Bahasa Melayu":
    $newSub = "marksBM";
    $newBand = "bandBM";
    break;
  case "Bahasa Inggeris":
    $newSub = "marksBI";
    $newBand = "bandBI";
    break;
  case "Sains":
    $newSub = "marksSains";
    $newBand = "bandSains";
    break;
  case "Matematik":
    $newSub = "marksMath";
    $newBand = "bandMath";
    break;
  case "Pendidikan Seni Visual":
    $newSub = "marksSeni";
    $newBand = "bandSeni";
    break;
  case "Pendidikan Musik":
    $newSub = "marksMusik";
    $newBand = "bandMusik";
    break;
  case "Reka bentuk teknologi":
    $newSub = "marksRBT";
    $newBand = "bandRBT";
    break;
  case "Pendidikan Islam":
    $newSub = "marksPI";
    $newBand = "bandPI";
    break;
  case "Bahasa Arab":
    $newSub = "marksBA";
    $newBand = "bandBA";
    break;
  case "Tasmik":
    $newSub = "marksTasmik";
    $newBand = "bandTasmik";
    break;
   case "Sejarah":
    $newSub = "marksSejarah";
    $newBand = "bandSejarah";
    break;
  default:
}

$query = "SELECT * FROM grades WHERE stuIC = '$stuIC' AND test='$test' AND year='$year'";
$result = $conn->query($query);
$row = $result->fetch_assoc();
$count = mysqli_num_rows($result);
    
if ($count == 1)    
{
$conn->query("UPDATE grades SET $newBand='$band' WHERE stuIC = '$stuIC' AND test='$test' AND year='$year'");
$conn->query("UPDATE grades SET $newSub='$marks' WHERE stuIC = '$stuIC' AND test='$test' AND year='$year'");
echo '<script type="text/javascript">';
echo ' alert("Data telah dikemaskini!")';  //not showing an alert box.
echo '</script>';
echo '<meta http-equiv="Refresh" content="0; url=marks.php"/>';
}
else
{
$sql = "INSERT into grades (stuIC, $newSub, year, test, $newBand)
VALUES ('$stuIC', '$marks', '$year', '$test', '$band')";
$conn->query($sql);
echo '<script type="text/javascript">';
echo ' alert("Data berjaya dimasukkan!")';  //not showing an alert box.
echo '</script>';
echo '<meta http-equiv="Refresh" content="0; url=marks.php"/>';
}
}
$username = $_COOKIE["user_name"];
$sql = "SELECT * FROM user WHERE login_id='$username'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

$val=$conn->query($sql);    
$rows=$val;
//header ('Location: attendances-blank.php');
if (!isset($_COOKIE["user_name"]))
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

if (isset($_COOKIE["user_name"]))
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
                            <h2 class="text-white mb-0">Tambah markah untuk Kelas <?php echo $class;?></h2>
                        </header>
                        <div class="card-body">
                            <form action="marks-add-teacher.php" method="post" class="es-form es-add-form">
                                <div class="row">
                                   
                                    <div class="col-lg-8 offset-lg-2 col-md-12 mb-4">
                                       
                                        <label for="title">Nama murid</label>
                                        <select name="stuName" id="stuName" class="es-add-select">
                                        <?php
                                        $sql2 = "SELECT * FROM student WHERE class='$class'";
                                        $result2 = mysqli_query($conn, $sql2);
                                        $row2 = mysqli_fetch_array($result2);

                                        $val2=$conn->query($sql2);    
                                        $rows2=$val2;
                                            while($row2=$rows2->fetch_assoc()):?>
                                            
                                            <option value="<?php echo $row2["icNum"];?>"><?php echo $row2["stuName"];?></option>
                                            <?php endwhile; ?>
                                        </select>
                                    </div>
                                     <div class="col-lg-8 offset-lg-2 col-md-12 mb-4">
                                        <label for="subject">Subjek</label>
                                        <select name="subject" id="subject" class="es-add-select">
                                           <?php if ($row["teacherSub1"] != ""){?>
                                            <option value="<?php echo $row["teacherSub1"];?>"><?php echo $row["teacherSub1"];?></option>
                                            <?php } if ($row["teacherSub2"] != ""){?>
                                            <option value="<?php echo $row["teacherSub2"];?>"><?php echo $row["teacherSub2"];?></option>
                                            <?php }
                                            if ($row["teacherSub3"] != ""){?>
                                            <option value="<?php echo $row["teacherSub3"];?>"><?php echo $row["teacherSub3"];?></option>
                                            <?php } ?>
                                        </select>
                                        
                                    </div>
                                    <div class="col-lg-8 offset-lg-2 col-md-12 mb-4">
                                        <label for="marks">Markah</label>
                                        <input required name="marks" id="marks" type="number" placeholder="90">
                                    </div>
                                    
                                    <div class="col-lg-8 offset-lg-2 col-md-12 mb-4">
                                        <label for="exam">Peperiksaan</label>
                                           <select name="test" id="test" class="es-add-select">
                                            <option value="PepAwal">Peperiksaan Awal Tahun</option>
                                            <option value="PepAkhir">Peperiksaan Akhir Tahun</option>
                                             </select>
                                    </div>
                                    
                                    <div class="col-lg-8 offset-lg-2 col-md-12 mb-4">
                                        <label for="band">Tahap Penguasaan</label>
                                        <select name="band" id="band" class="es-add-select">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                        </select>
                                    </div>
                                    
                                    <div class="col-lg-8 offset-lg-2 col-md-12 mb-4">
                                        <label for="remarks">Tahun</label>
                                        <select name="year" id="year" class="es-add-select">
                                            <option value="2022">2022</option>
                                            <option value="2021">2021</option>
                                            <option value="2020">2020</option>
                                        </select>
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
</body>
</html><?php
}
?>