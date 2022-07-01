<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "estudent";
$connect = new mysqli($servername, $username, $password, $dbname);
$class = $_POST['class'];
$loggedin = $_COOKIE["user_name"];
$sql = "SELECT grades.*, student.*, user.* FROM student INNER JOIN grades ON grades.stuIC=student.icNum INNER JOIN user WHERE student.class='$class' AND user.login_id=$loggedin GROUP BY stuName ASC";
    
$result = mysqli_query($connect, $sql);
$row = mysqli_fetch_array($result);
$val=$connect->query($sql);    
$rows=$val;


}
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
<style>
td {
  text-align: center;
}
</style>
    
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

                <!-- breadcumb-area -->
                <section class="breadcumb-area card bg-gradient-blue mb-5">
                    <div class="bread-cumb-content card-body d-flex align-items-center">
                        <div class="breadcumb-heading">
                            <h2 class="text-white">Markah murid</h2>
                        </div>
                        <div class="breadcumb-image ml-auto">
                            <img src="assets/img/breadcumb-marks.png" alt="">
                        </div>
                    </div>
                </section>
                <!-- End breadcumb-area -->

                

                
                <section class="es-form-area">
                    <div class="card">
                        <header class="card-header bg-gradient-blue border-0 pt-5 pb-5 d-flex align-items-center">
                           <?php
                            if ($_COOKIE["user_name"] == "admin") 
                            {
                             echo '<a href="marks-viewClass.php" class="btn btn-sm btn-pill btn-outline-light ml-auto">+ Tambah</a>';
                            }
                            else
                            {
                            echo    '<a href="marks-viewClass.php" class="btn btn-sm btn-pill btn-outline-light ml-auto">+ Tambah</a>' ;
                            } ?>
                            <button class="btn btn-sm btn-pill btn-outline-light" onclick="window.print();">Cetak</button>
                        </header>
                        <div class="card-body">
                            <form action="marks.php" method="post" class="es-form">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <label for="class">Kelas</label>
                                        <select name="class" id="class" value="<?php echo $_POST['class'];?>">
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
                                    <div class="col">
                                        <button type="submit" class="es-form-btn btn btn-block bg-gradient-blue text-white">Paparkan</button>
                                    </div>
                                </div>
                            </form> 

                            <div class="attendances-list-wrap mt-5">
                                <div class="show-option d-flex align-items-center mb-4">
                                </div>

                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <thead class="bg-gradient-blue">
                                            <tr>
                                               <?php
                                                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                                
                                                ?>
                                                <th scope="col" class="text-white">Nama murid</th>
                                                <?php if ($row["teacherSub1"] != ""){?>
                                                <th scope="col" class="text-white text-center"><?php echo $row["teacherSub1"];?></th>
                                                <?php } ?>
                                                <?php if ($row["teacherSub2"] != ""){?>
                                                <th scope="col" class="text-white text-center"><?php echo $row["teacherSub2"];?></th>
                                                <?php } ?>
                                                <?php if ($row["teacherSub3"] != ""){ ?>
                                                <th scope="col" class="text-white text-center"><?php echo $row["teacherSub3"];?></th>
                                                <?php }
                                                }
                                                ?>
                                            </tr>
                                        </thead>

                                        <tbody>
                                           <?php if ($_SERVER["REQUEST_METHOD"] == "POST") {

                                                    $sub1 = $row["teacherSub1"];
                                                    $sub2 = $row["teacherSub2"];
                                                    $sub3 = $row["teacherSub3"];
                                                    switch ($sub1) {
                                                      case "Bahasa Melayu":
                                                        $marks1 = $row["marksBM"];
                                                        break;
                                                      case "Bahasa Inggeris":
                                                        $marks1 = $row["marksBI"];
                                                        break;
                                                      case "Sains":
                                                        $marks1 = $row["marksSains"];
                                                        break;
                                                      case "Matematik":
                                                        $marks1 = $row["marksMath"];
                                                        break;
                                                      case "Pendidikan Seni Visual":
                                                        $marks1 = $row["marksSeni"];
                                                        break;
                                                      case "Pendidikan Musik":
                                                        $marks1 = $row["marksMusik"];
                                                        break;
                                                      case "Reka bentuk teknologi":
                                                        $marks1 = $row["marksRBT"];
                                                        break;
                                                      case "Pendidikan Islam":
                                                        $marks1 = $row["marksPI"];
                                                        break;
                                                      case "Bahasa Arab":
                                                        $marks1 = $row["marksBA"];
                                                        break;
                                                      case "Tasmik":
                                                        $marks1 = $row["marksTasmik"];
                                                        break;
                                                       case "Sejarah":
                                                        $marks1 = $row["marksSejarah"];
                                                        break;
                                                      default:
                                                        echo "error";
                                                    }
                                                    switch ($sub2) {
                                                      case "Bahasa Melayu":
                                                        $marks2 = $row["marksBM"];
                                                        break;
                                                      case "Bahasa Inggeris":
                                                        $marks2 = $row["marksBI"];
                                                        break;
                                                      case "Sains":
                                                        $marks2 = $row["marksSains"];
                                                        break;
                                                      case "Matematik":
                                                        $marks2 = $row["marksMath"];
                                                        break;
                                                      case "Pendidikan Seni Visual":
                                                        $marks2 = $row["marksSeni"];
                                                        break;
                                                      case "Pendidikan Musik":
                                                        $marks2 = $row["marksMusik"];
                                                        break;
                                                      case "Reka bentuk teknologi":
                                                        $marks2 = $row["marksRBT"];
                                                        break;
                                                      case "Pendidikan Islam":
                                                        $marks2 = $row["marksPI"];
                                                        break;
                                                      case "Bahasa Arab":
                                                        $marks2 = $row["marksBA"];
                                                        break;
                                                      case "Tasmik":
                                                        $marks2 = $row["marksTasmik"];
                                                        break;
                                                       case "Sejarah":
                                                        $marks2 = $row["marksSejarah"];
                                                        break;
                                                      default:
                                                        break;
                                                    }
                                                    switch ($sub3) {
                                                      case "Bahasa Melayu":
                                                        $marks3 = $row["marksBM"];
                                                        break;
                                                      case "Bahasa Inggeris":
                                                        $marks3 = $row["marksBI"];
                                                        break;
                                                      case "Sains":
                                                        $marks3 = $row["marksSains"];
                                                        break;
                                                     case "Matematik":
                                                        $marks3 = $row["marksMath"];
                                                        break;
                                                      case "Pendidikan Seni Visual":
                                                        $marks3 = $row["marksSeni"];
                                                        break;
                                                      case "Pendidikan Musik":
                                                        $marks3 = $row["marksMusik"];
                                                        break;
                                                      case "Reka bentuk teknologi":
                                                        $marks3 = $row["marksRBT"];
                                                        break;
                                                      case "Pendidikan Islam":
                                                        $marks3 = $row["marksPI"];
                                                        break;
                                                      case "Bahasa Arab":
                                                        $marks3 = $row["marksBA"];
                                                        break;
                                                      case "Tasmik":
                                                        $marks3 = $row["marksTasmik"];
                                                        break;
                                                       case "Sejarah":
                                                        $marks3 = $row["marksSejarah"];
                                                        break;
                                                      default:
                                                        break;
                                                    }
                                                    
                                                    switch ($sub1) {
                                                      case "Bahasa Melayu":
                                                        $band1 = $row["bandBM"];
                                                        break;
                                                      case "Bahasa Inggeris":
                                                        $band1 = $row["bandBI"];
                                                        break;
                                                      case "Sains":
                                                        $band1 = $row["bandSains"];
                                                        break;
                                                      case "Pendidikan Seni Visual":
                                                        $band1 = $row["bandSeni"];
                                                        break;
                                                        case "Matematik":
                                                        $band1 = $row["bandMath"];
                                                        break;
                                                      case "Pendidikan Musik":
                                                        $band1 = $row["bandMusik"];
                                                        break;
                                                      case "Reka bentuk teknologi":
                                                        $band1 = $row["bandRBT"];
                                                        break;
                                                      case "Pendidikan Islam":
                                                        $band1 = $row["bandPI"];
                                                        break;
                                                      case "Bahasa Arab":
                                                        $band1 = $row["bandBA"];
                                                        break;
                                                      case "Tasmik":
                                                        $band1 = $row["bandTasmik"];
                                                        break;
                                                       case "Sejarah":
                                                        $band1 = $row["bandSejarah"];
                                                        break;
                                                      default:
                                                        echo "error";
                                                    }
                                                    switch ($sub2) {
                                                      case "Bahasa Melayu":
                                                        $band2 = $row["bandBM"];
                                                        break;
                                                      case "Bahasa Inggeris":
                                                        $band2 = $row["bandBI"];
                                                        break;
                                                        case "Matematik":
                                                        $band2 = $row["bandMath"];
                                                        break;
                                                      case "Sains":
                                                        $band2 = $row["bandSains"];
                                                        break;
                                                      case "Pendidikan Seni Visual":
                                                        $band2 = $row["bandSeni"];
                                                        break;
                                                      case "Pendidikan Musik":
                                                        $band2 = $row["bandMusik"];
                                                        break;
                                                      case "Reka bentuk teknologi":
                                                        $band2 = $row["bandRBT"];
                                                        break;
                                                      case "Pendidikan Islam":
                                                        $band2 = $row["bandPI"];
                                                        break;
                                                      case "Bahasa Arab":
                                                        $band2 = $row["bandBA"];
                                                        break;
                                                      case "Tasmik":
                                                        $band2 = $row["bandTasmik"];
                                                        break;
                                                       case "Sejarah":
                                                        $band2 = $row["bandSejarah"];
                                                        break;
                                                      default:
                                                        break;
                                                    }
                                                    switch ($sub3) {
                                                      case "Bahasa Melayu":
                                                        $band3 = $row["bandBM"];
                                                        break;
                                                      case "Bahasa Inggeris":
                                                        $band3 = $row["bandBI"];
                                                        break;
                                                      case "Sains":
                                                        $band3 = $row["bandSains"];
                                                        break;
                                                    case "Matematik":
                                                        $band3 = $row["bandMath"];
                                                        break;
                                                      case "Pendidikan Seni Visual":
                                                        $band3 = $row["bandSeni"];
                                                        break;
                                                      case "Pendidikan Musik":
                                                        $band3 = $row["bandMusik"];
                                                        break;
                                                      case "Reka bentuk teknologi":
                                                        $band3 = $row["bandRBT"];
                                                        break;
                                                      case "Pendidikan Islam":
                                                        $band3 = $row["bandPI"];
                                                        break;
                                                      case "Bahasa Arab":
                                                        $band3 = $row["bandBA"];
                                                        break;
                                                      case "Tasmik":
                                                        $band3 = $row["bandTasmik"];
                                                        break;
                                                       case "Sejarah":
                                                        $band3 = $row["bandSejarah"];
                                                        break;
                                                      default:
                                                        break;
                                                    }
                                            ?>
                                            <tr>
                                                <td><?php echo $row["stuName"];?></td>
                                                <td>
                                                
                                                <?php if ($marks1!=""){
                                                echo $marks1;?>
                                                (Tahap Penguasaan <?php echo $band1;?>)
                                           <?php }
                                                else
                                                {
                                                    echo "Markah tidak dimasukkan";
                                                }
                                                ?>
                                                </td>
                                                <?php if ($row["teacherSub2"] != ""){ ?>
                                                <td><?php if ($marks2!=""){
                                                echo $marks2;?>
                                                (Tahap Penguasaan <?php echo $band2;?>)
                                           <?php }
                                                else
                                                {
                                                    echo "Markah tidak dimasukkan";
                                                }
                                                ?></td>
                                            <?php }
                                                if ($row["teacherSub3"] != ""){ ?>
                                                <td><?php if ($marks3!=""){
                                                echo $marks3;?>
                                                (Tahap Penguasaan <?php echo $band3;?>)
                                           <?php }
                                                else
                                                {
                                                    echo "Marks not entered";
                                                }
                                                ?></td>
                                             <?php   }?>
                                            </tr><?php
                                            }
                                            ?>
                                                  
                                                   <tbody>
                                            
                                                
                                            
                                        </tbody>                           
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>    
                </section>

                <div class="row">
                    <div class="col-md-12 text-center">
                        <nav aria-label="Bootstrap Pagination" class="mt-5 text-center d-inline-block">
                            <ul class="pagination mb-0">
                                <li class="page-item">
                                    <a class="btn btn-outline-danger prev" href="#"><span class="ml-1 d-none d-xl-inline-block">Kembali</span></a>
                                </li>
                                <li class="page-item">
                                    <a class="btn btn-danger bg-gradient-blue text-white ml-4 mr-4" href="#">1</a>
                                </li>
                                <li class="page-item">
                                    <a class="btn btn-outline-danger next" href="#"><span class="mr-1 d-none d-xl-inline-block">Seterusnya</span></a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>

                        

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