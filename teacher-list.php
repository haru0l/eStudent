<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "estudent";
$connect = new mysqli($servername, $username, $password, $dbname);
$sql = "SELECT * FROM user GROUP BY teacherName ASC";
$result = mysqli_query($connect, $sql);
$row = mysqli_fetch_array($result);

$val=$connect->query($sql);    
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
        <h4 class="alert-heading"><i class="bi-exclamation-octagon-fill"></i> Oops! Something went wrong.</h4>
        <p>We have detected that are not logged in to an account.</p>
        <hr>
        <p class="mb-0">Click on the 'Go home' button to login.</p>
        <button type="button" class="btn btn-danger" data-toggle="modal" onclick="logout()">Go home</button>
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
<html>

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
                                        <span class="h3 mb-0"><i class="far fa-user-circle text-muted mr-3"></i></span> View Profile
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
                                <span class="u-sidebar-nav-menu__item-title">Teachers</span>
                                <span class="u-sidebar-nav-menu__indicator"></span>
                            </a>
                        </li>';
} ?>
                        <!-- End Classes -->

                        <!-- Marks -->
                        <!-- Classes -->
                        <?php if ($_COOKIE["type"] == "Guru kelas" || $_COOKIE["user_name"] == "admin") {
                        
                        echo '<li class="u-sidebar-nav-menu__item">
                            <a class="u-sidebar-nav-menu__link" href="classes-view.php">
                                <i class="fas fa-user-check u-sidebar-nav-menu__item-icon"></i>
                                <span class="u-sidebar-nav-menu__item-title">Classes</span>
                                <span class="u-sidebar-nav-menu__indicator"></span>
                            </a>
                        </li>';
                        
    
    
                        echo '<li class="u-sidebar-nav-menu__item">
                            <a class="u-sidebar-nav-menu__link" href="marks.php">
                                <i class="far fa-clipboard u-sidebar-nav-menu__item-icon"></i>
                                <span class="u-sidebar-nav-menu__item-title">Marks</span>
                                <span class="u-sidebar-nav-menu__indicator"></span>
                            </a>
                        </li>';
}
                        else {
                        echo '<li class="u-sidebar-nav-menu__item">
                            <a class="u-sidebar-nav-menu__link" href="marks-sub.php">
                                <i class="far fa-clipboard u-sidebar-nav-menu__item-icon"></i>
                                <span class="u-sidebar-nav-menu__item-title">Marks</span>
                                <span class="u-sidebar-nav-menu__indicator"></span>
                            </a>
                        </li>';
                        
                        }

                        echo
                        '<li class="u-sidebar-nav-menu__item">
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
                        </li>';
                        }
                        if ($_COOKIE["type"] == "student" ){
                            echo 
                            '<li class="u-sidebar-nav-menu__item">
                            <a class="u-sidebar-nav-menu__link" href="slip.php" target="_blank">
                                <i class="fas fa-user-check u-sidebar-nav-menu__item-icon"></i>
                                <span class="u-sidebar-nav-menu__item-title">Check results</span>
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
                            <h2 class="text-white">Manage Teachers</h2>
                        </div>
                        <div class="breadcumb-image ml-auto">
                            <img src="assets/img/breadcumb-manage-attendances.png" alt="">
                        </div>
                    </div>
                </section>
                <!-- End breadcumb-area -->

                <section class="es-form-area">
                    <div class="card">
                        
                        <div class="card-body">
                            

                            <div class="attendances-list-wrap mt-2">
                                <div class="show-option d-flex align-items-center mb-4">
                                    <div class="search-student ml-auto">
                                        <a href="teacher-add.php" class="btn btn-lg btn-pill bg-gradient-blue text-white">Add new</a>
                                    </div>
                                </div>

                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <thead class="bg-gradient-blue">
                                            <tr>
                                                <th scope="col" class="text-white">Login ID</th>
                                                <th scope="col" class="text-white">Login Password</th>
                                                <th scope="col" class="text-white">Teacher Name</th>
                                                <th scope="col" class="text-white">Gender</th>
                                                <th scope="col" class="text-white">Phone number</th>
                                                <th scope="col" class="text-white">Date of Birth</th>
                                                <th scope="col" class="text-white">Address</th>
                                                <th scope="col" class="text-white">Email</th>
                                                <th scope="col" class="text-white">Qualification</th>
                                                <th scope="col" class="text-white">Type</th>
                                                <th scope="col" class="text-white">Subject 1</th>
                                                <th scope="col" class="text-white">Subject 2</th>
                                                <th scope="col" class="text-white">Subject 3</th>
                                                <th scope="col" class="text-white">Class</th>
                                                <th scope="col" class="text-white text-center">Edit</th>
                                                <th scope="col" class="text-white text-center">Delete</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php while($row=$rows->fetch_assoc()):?>
                                            <tr>
                                                <td><?php echo $row["login_id"];?></td>
                                                <td><?php echo $row["teacherPassword"];?></td>
                                                <td><?php echo $row["teacherName"];?></td>
                                                <td><?php echo $row["gender"];?></td>
                                                <td><?php echo $row["teacher_phoneNum"];?></td>
                                                <td><?php echo $row["date_of_birth"];?></td>
                                                <td><?php echo $row["teacher_Address"];?></td>
                                                <td><?php echo $row["teacherEmail"];?></td>
                                                <td><?php echo $row["acaQualification"];?></td>
                                                <td><?php echo $row["teacherType"];?></td>
                                                <td><?php echo $row["teacherSub1"];?></td>
                                                <td><?php echo $row["teacherSub2"];?></td>
                                                <td><?php echo $row["teacherSub3"];?></td>
                                                <td><?php echo $row["class"];?></td>
                                                <td class="text-center"><a disabled href="" class="btn btn-outline-danger es-am-btn">Edit</a>
                                                <td class="text-center"><a disabled href="" class="btn btn-outline-danger es-am-btn">Delete</a>
                                            </tr>
                                            <?php endwhile; ?>
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
                                    <a class="btn btn-outline-danger prev" href="#"><span class="ml-1 d-none d-xl-inline-block">Previous</span></a>
                                </li>
                                <li class="page-item">
                                    <a class="btn btn-danger bg-gradient-blue text-white ml-4 mr-4" href="#">1</a>
                                </li>
                                <li class="page-item">
                                    <a class="btn btn-outline-danger next" href="#"><span class="mr-1 d-none d-xl-inline-block">Next</span></a>
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