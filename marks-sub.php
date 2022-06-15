<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "estudent";
$connect = new mysqli($servername, $username, $password, $dbname);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$class = $_POST['class'];
if (in_array($_POST['class'], array("1 Bijak", "1 Cerdik","2 Bijak", "2 Cerdik","3 Bijak", "3 Cerdik"), true)) {
$sql = "SELECT grades.stuIC, grades.marksBM, grades.marksBI, grades.marksMath, grades.marksSains, grades.marksSeni, grades.marksPI, grades.marksBA, grades.marksTasmik, grades.remarks, student.* FROM student INNER JOIN grades ON grades.stuIC=student.icNum WHERE class='$class' AND year='2022' GROUP BY stuName ASC";}
else
{
$sql = "SELECT grades.*, student.* FROM student INNER JOIN grades ON grades.stuIC=student.icNum WHERE class='$class' AND year='2022' GROUP BY stuName ASC";
}

}
$login_user = $_COOKIE["user_name"];
$sql = "SELECT * FROM user WHERE login_id='$login_user'";
$result = mysqli_query($connect, $sql);
$row = mysqli_fetch_array($result);
$val=$connect->query($sql);    
$rows=$val;
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

<head>
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

    <!-- Custom Charts -->
    <style>
        .js-doughnut-chart {
            width: 70px !important;
            height: 70px !important;
        }
    </style>
</head>
<!-- End Head -->

<body>
    <!-- Header (Topbar) -->
    <header class="u-header">
        <div class="u-header-left">
            <a class="u-header-logo" href="index.php">
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
                    <a class="u-sidebar-logo" href="index.php">
                        <img class="img-fluid" src="assets/img/logo_sk.png" width="124" alt="Stream Dashboard">
                    </a>
                </header>
                <nav class="u-sidebar-nav">
                    <ul class="u-sidebar-nav-menu u-sidebar-nav-menu--top-level">
                        <!-- Dashboard -->
                        <li class="u-sidebar-nav-menu__item">
                            <a class="u-sidebar-nav-menu__link" href="index.php">
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
                                <span class="u-sidebar-nav-menu__item-title">Senarai pelajar</span>
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
                                <span class="u-sidebar-nav-menu__item-title">Senarai pelajar</span>
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
                             echo '<a href="marks-add.php" class="btn btn-sm btn-pill btn-outline-light ml-auto">+ Tambah</a>';
                            }
                            else
                            {
                            echo    '<a href="marks-add-teacher.php" class="btn btn-sm btn-pill btn-outline-light ml-auto">+ Tambah</a>' ;
                            } ?>
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
                                        <button type="submit" class="es-form-btn btn btn-block bg-gradient-blue text-white">Lihat</button>
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
                                                if (in_array($_POST['class'], array("1 Bijak", "1 Cerdik","2 Bijak", "2 Cerdik","3 Bijak", "3 Cerdik"), true)) {
                                                echo
                                                '<th scope="col" class="text-white">Nama murid</th>
                                                <th scope="col" class="text-white text-center">Bahasa Melayu</th>
                                                <th scope="col" class="text-white text-center">Bahasa Inggeris</th>
                                                <th scope="col" class="text-white text-center">Matematik</th>
                                                <th scope="col" class="text-white text-center">Sains</th>
                                                <th scope="col" class="text-white text-center">Pendidikan Kesenian</th>
                                                <th scope="col" class="text-white text-center">Pendidikan Islam</th>
                                                <th scope="col" class="text-white text-center">Bahasa Arab</th>
                                                <th scope="col" class="text-white text-center">Tasmik</th>
                                                <th scope="col" class="text-white text-center">Remarks</th>
                                                <th scope="col" class="text-white text-center">Sunting</th>
                                                <th scope="col" class="text-white text-center">Buang</th>'
                                                ;}
                                                else echo
                                                '<th scope="col" class="text-white">Nama murid</th>
                                                <th scope="col" class="text-white text-center">Bahasa Melayu</th>
                                                <th scope="col" class="text-white text-center">Bahasa Inggeris</th>
                                                <th scope="col" class="text-white text-center">Matematik</th>
                                                <th scope="col" class="text-white text-center">Sains</th>
                                                <th scope="col" class="text-white text-center">Pendidikan Seni Visual</th>
                                                <th scope="col" class="text-white text-center">Pendidikan Musik</th>
                                                <th scope="col" class="text-white text-center">Reka bentuk teknologi</th>
                                                <th scope="col" class="text-white text-center">Pendidikan Islam</th>
                                                <th scope="col" class="text-white text-center">Bahasa Arab</th>
                                                <th scope="col" class="text-white text-center">Tasmik</th>
                                                <th scope="col" class="text-white text-center">Sejarah</th>
                                                <th scope="col" class="text-white text-center">Remarks</th>
                                                <th scope="col" class="text-white text-center">Sunting</th>
                                                <th scope="col" class="text-white text-center">Buang</th>'  
                                                ;}
                                                ?>
                                            </tr>
                                        </thead>

                                        <tbody>
                                           <?php if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                            while($row=$rows->fetch_assoc()):
                                            if (in_array($_POST['class'], array("1 Bijak", "1 Cerdik","2 Bijak", "2 Cerdik","3 Bijak", "3 Cerdik"), true)) {
                                            ?>
                                            <tr>
                                                <td><?php echo $row["stuName"];?></td>
                                                <td><?php echo $row["marksBM"];?></td>
                                                <td><?php echo $row["marksBI"];?></td>
                                                <td><?php echo $row["marksMath"];?></td>
                                                <td><?php echo $row["marksSains"];?></td>
                                                <td><?php echo $row["marksSeni"];?></td>
                                                <td><?php echo $row["marksPI"];?></td>
                                                <td><?php echo $row["marksBA"];?></td>
                                                <td><?php echo $row["marksTasmik"];?></td>
                                                <td><?php echo $row["remarks"];?></td>
                                                <td class="text-center"><a href="" class="btn btn-outline-danger es-am-btn">Sunting</a></td>
                                            </tr><?php }
                                            else
                                            { ?>
                                            <tr>
                                                <td><?php echo $row["stuName"];?></td>
                                                <td><?php echo $row["marksBM"];?></td>
                                                <td><?php echo $row["marksBI"];?></td>
                                                <td><?php echo $row["marksMath"];?></td>
                                                <td><?php echo $row["marksSains"];?></td>
                                                <td><?php echo $row["marksSeni"];?></td>
                                                <td><?php echo $row["marksMusik"];?></td>
                                                <td><?php echo $row["marksRBT"];?></td>
                                                <td><?php echo $row["marksPI"];?></td>
                                                <td><?php echo $row["marksBA"];?></td>
                                                <td><?php echo $row["marksTasmik"];?></td>
                                                <td><?php echo $row["marksSejarah"];?></td>
                                                <td><?php echo $row["remarks"];?></td>
                                                <td class="text-center"><a href="" class="btn btn-outline-danger es-am-btn">Sunting</a></td>
                                            </tr><?php
                                            }
                                            endwhile;
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