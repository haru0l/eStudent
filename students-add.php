<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "estudent";
$conn = new mysqli($servername, $username, $password, $dbname);

$icNum = $_POST['icNum'];
$stuName = $_POST['stuName'];
$stuGender = $_POST['stuGender'];
$date_of_birth = $_POST['date_of_birth'];
$stuAddress = $_POST['stuAddress'];
$stu_phoneNum = $_POST['stu_phoneNum'];
$class = $_POST['class'];
$cocurricular = $_POST['cocurricular'];

$sql = "INSERT into student (icNum, stuName, stuGender, date_of_birth, stuAddress, stu_phoneNum, class, cocurricular)
VALUES ('$icNum', '$stuName', '$stuGender', '$date_of_birth', '$stuAddress', '$stu_phoneNum', '$class', '$cocurricular')";
$conn->query($sql);
//header ('Location: attendances-blank.html');
}
?>
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
            <a class="u-header-logo" href="index.html">
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
                                        <span class="h3 mb-0"><i class="far fa-user-circle text-muted mr-3"></i></span> View Profile
                                    </a>
                                </li>
                                <li class="mb-4">
                                    <a class="d-flex align-items-center link-dark" href="#!">
                                        <span class="h3 mb-0"><i class="far fa-list-alt text-muted mr-3"></i></span> Settings
                                    </a>
                                </li>
                                <li>
                                    <a class="d-flex align-items-center link-dark" href="logout.php">
                                        <span class="h3 mb-0"><i class="far fa-share-square text-muted mr-3"></i></span> Sign Out
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
                    <a class="u-sidebar-logo" href="index.html">
                        <img class="img-fluid" src="assets/img/logo_sk.png" width="124" alt="Stream Dashboard">
                    </a>
                </header>
                <nav class="u-sidebar-nav">
                    <ul class="u-sidebar-nav-menu u-sidebar-nav-menu--top-level">
                        <!-- Dashboard -->
                        <li class="u-sidebar-nav-menu__item">
                            <a class="u-sidebar-nav-menu__link active" href="index.html">
                                <i class="fas fa-tachometer-alt u-sidebar-nav-menu__item-icon"></i>
                                <span class="u-sidebar-nav-menu__item-title">Dashboard</span>
                            </a>
                        </li>
                        <!-- End Dashboard -->

                        <!-- Classes -->
                        <li class="u-sidebar-nav-menu__item">
                            <a class="u-sidebar-nav-menu__link" href="classes-view.html">
                                <i class="fas fa-user-check u-sidebar-nav-menu__item-icon"></i>
                                <span class="u-sidebar-nav-menu__item-title">Classes</span>
                                <span class="u-sidebar-nav-menu__indicator"></span>
                            </a>
                        </li>
                        <!-- End Classes -->

                        <!-- Marks -->
                        <li class="u-sidebar-nav-menu__item u-sidebar-nav">
                            <a class="u-sidebar-nav-menu__link" href="marks.php">
                                <i class="far fa-clipboard u-sidebar-nav-menu__item-icon"></i>
                                <span class="u-sidebar-nav-menu__item-title">Marks</span>
                                <span class="u-sidebar-nav-menu__indicator"></span>
                            </a>
                        </li>
                        <!-- End Marks -->

                        <!-- Profile -->
                        <li class="u-sidebar-nav-menu__item">
                            <a class="u-sidebar-nav-menu__link" href="#!" data-target="#profile">
                                <i class="fa fa-user u-sidebar-nav-menu__item-icon"></i>
                                <span class="u-sidebar-nav-menu__item-title">My Profile</span>
                                <i class="fa fa-angle-right u-sidebar-nav-menu__item-arrow"></i>
                                <span class="u-sidebar-nav-menu__indicator"></span>
                            </a>

                            <ul id="profile" class="u-sidebar-nav-menu u-sidebar-nav-menu--second-level" style="display: none;">
                                <li class="u-sidebar-nav-menu__item">
                                    <a class="u-sidebar-nav-menu__link" href="my-profile.php">
                                        <span class="u-sidebar-nav-menu__item-title">My Profile</span>
                                    </a>
                                </li>
                                <li class="u-sidebar-nav-menu__item">
                                    <a class="u-sidebar-nav-menu__link" disabled href="edit-my-profile.php">
                                        <span class="u-sidebar-nav-menu__item-title">Edit Profile</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
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
                            <h2 class="text-white mb-0">Add New Student</h2>
                        </header>
                        <div class="card-body">
                            <form action="students-add.php" method="post" class="es-form es-add-form">
                                <div class="row">
                                    <div class="col-lg-8 offset-lg-2 col-md-12 mb-4">
                                        <label for="title">Student Name</label>
                                        <input type="text" name="stuName">
                                    </div>
                                    <div class="col-lg-8 offset-lg-2 col-md-12 mb-4">
                                        <label for="title">Date of Birth</label>
                                        <input type="text" name="date_of_birth">
                                    </div>
                                    <div class="col-lg-8 offset-lg-2 col-md-12 mb-4">
                                        <label for="title">IC Number</label>
                                        <input type="text" name="icNum">
                                    </div>
                                    <div class="col-lg-8 offset-lg-2 col-md-12 mb-4">
                                        <label for="class">Gender</label>
                                        <select name="stuGender" id="gender" class="es-add-select">
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-8 offset-lg-2 col-md-12 mb-4">
                                        <label for="title">Phone number</label>
                                        <input type="tel" name="stu_phoneNum">
                                    </div>
                                    <div class="col-lg-8 offset-lg-2 col-md-12 mb-4">
                                        <label for="title">Address</label>
                                        <input type="text" name="stuAddress">
                                    </div>
                                    <div class="col-lg-8 offset-lg-2 col-md-12 mb-4">
                                        <label for="class">Class</label>
                                        <select name="class" id="class">
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
                                    <div class="col-lg-8 offset-lg-2 col-md-12 mb-4">
                                        <label for="title">Co-curricular</label>
                                        <input type="text" name="cocurricular">
                                    </div>
                                    <div class="col-lg-4 offset-lg-4 col-md-12 text-center">
                                        <button type=submit class="btn btn-danger btn-block bg-gradient-blue border-0 text-white">Add</button>        
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
</html>