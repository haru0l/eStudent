<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "estudent";
$conn = new mysqli($servername, $username, $password, $dbname);

$username = $_COOKIE["user_name"];
$sql = "SELECT * FROM user WHERE login_id='$username'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

$val=$conn->query($sql);    
$rows=$val;
if (!isset($_COOKIE["user_name"]))
{
?>
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
			<h6 class="text" style="text-align: center; font-size: 16">Welcome, <?php echo $_COOKIE['teacherName']; ?>    </h6>
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

                <!-- Deal Overview -->
                <div class="card mb-4">
                    <!-- Card Header -->
                    <header class="card-header text-center">
                        <h2 class="h3 card-header-title text-dark pt-2">Prestasi murid</h2>
                    </header>
                    <!-- End Card Header -->

                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="row">
                            <!-- Chart -->
                            <div class="col-md-12 mb-4 mb-md-0" style="min-height: 300px;">
                                <canvas id="pie-chart" width="800" height="450"></canvas>

<script>
    
new Chart(document.getElementById("pie-chart"), {
    <?php
                                    # count a
                                   $result = $conn->query("SELECT marksBM FROM grades WHERE marksBM BETWEEN 80 AND 100;");
                                    $row = $result->fetch_assoc();
                                    $countA += mysqli_num_rows($result);
                                   $result = $conn->query("SELECT marksBI FROM grades WHERE marksBI BETWEEN 80 AND 100;");
                                    $row = $result->fetch_assoc();
                                    $countA += mysqli_num_rows($result);
                                   $result = $conn->query("SELECT marksMath FROM grades WHERE marksMath BETWEEN 80 AND 100;");
                                    $row = $result->fetch_assoc();
                                    $countA += mysqli_num_rows($result);
                                   $result = $conn->query("SELECT marksSains FROM grades WHERE marksSains BETWEEN 80 AND 100;");
                                    $row = $result->fetch_assoc();
                                    $countA += mysqli_num_rows($result);
                                   $result = $conn->query("SELECT marksSeni FROM grades WHERE marksSeni BETWEEN 80 AND 100;");
                                    $row = $result->fetch_assoc();
                                    $countA += mysqli_num_rows($result);
                                   $result = $conn->query("SELECT marksPI FROM grades WHERE marksPI BETWEEN 80 AND 100;");
                                    $row = $result->fetch_assoc();
                                    $countA += mysqli_num_rows($result);
                                   $result = $conn->query("SELECT marksBA FROM grades WHERE marksBA BETWEEN 80 AND 100;");
                                    $row = $result->fetch_assoc();
                                    $countA += mysqli_num_rows($result);
                                   $result = $conn->query("SELECT marksTasmik FROM grades WHERE marksTasmik BETWEEN 80 AND 100;");
                                    $row = $result->fetch_assoc();
                                    $countA += mysqli_num_rows($result);
                                   $result = $conn->query("SELECT marksMusik FROM grades WHERE marksMusik BETWEEN 80 AND 100;");
                                    $row = $result->fetch_assoc();
                                    $countA += mysqli_num_rows($result);
                                   $result = $conn->query("SELECT marksRBT FROM grades WHERE marksRBT BETWEEN 80 AND 100;");
                                    $row = $result->fetch_assoc();
                                    $countA += mysqli_num_rows($result);
                                   $result = $conn->query("SELECT marksSejarah FROM grades WHERE marksSejarah BETWEEN 80 AND 100;");
                                    $row = $result->fetch_assoc();
                                    $countA += mysqli_num_rows($result);
                                     # count b
                                   $result = $conn->query("SELECT marksBM FROM grades WHERE marksBM BETWEEN 70 AND 79;");
                                    $row = $result->fetch_assoc();
                                    $countB += mysqli_num_rows($result);
                                   $result = $conn->query("SELECT marksBI FROM grades WHERE marksBI BETWEEN 70 AND 79;");
                                    $row = $result->fetch_assoc();
                                    $countB += mysqli_num_rows($result);
                                   $result = $conn->query("SELECT marksMath FROM grades WHERE marksMath BETWEEN 70 AND 79;");
                                    $row = $result->fetch_assoc();
                                    $countB += mysqli_num_rows($result);
                                   $result = $conn->query("SELECT marksSains FROM grades WHERE marksSains BETWEEN 70 AND 79;");
                                    $row = $result->fetch_assoc();
                                    $countB += mysqli_num_rows($result);
                                   $result = $conn->query("SELECT marksSeni FROM grades WHERE marksSeni BETWEEN 70 AND 79;");
                                    $row = $result->fetch_assoc();
                                    $countB += mysqli_num_rows($result);
                                   $result = $conn->query("SELECT marksPI FROM grades WHERE marksPI BETWEEN 70 AND 79;");
                                    $row = $result->fetch_assoc();
                                    $countB += mysqli_num_rows($result);
                                   $result = $conn->query("SELECT marksBA FROM grades WHERE marksBA BETWEEN 70 AND 79;");
                                    $row = $result->fetch_assoc();
                                    $countB += mysqli_num_rows($result);
                                   $result = $conn->query("SELECT marksTasmik FROM grades WHERE marksTasmik BETWEEN 70 AND 79;");
                                    $row = $result->fetch_assoc();
                                    $countB += mysqli_num_rows($result);
                                   $result = $conn->query("SELECT marksMusik FROM grades WHERE marksMusik BETWEEN 70 AND 79;");
                                    $row = $result->fetch_assoc();
                                    $countB += mysqli_num_rows($result);
                                   $result = $conn->query("SELECT marksRBT FROM grades WHERE marksRBT BETWEEN 70 AND 79;");
                                    $row = $result->fetch_assoc();
                                    $countB += mysqli_num_rows($result);
                                   $result = $conn->query("SELECT marksSejarah FROM grades WHERE marksSejarah BETWEEN 70 AND 79;");
                                    $row = $result->fetch_assoc();
                                    $countB += mysqli_num_rows($result);
                                    # count c
                                   $result = $conn->query("SELECT marksBM FROM grades WHERE marksBM BETWEEN 60 AND 69;");
                                    $row = $result->fetch_assoc();
                                    $countC += mysqli_num_rows($result);
                                   $result = $conn->query("SELECT marksBI FROM grades WHERE marksBI BETWEEN 60 AND 69;");
                                    $row = $result->fetch_assoc();
                                    $countC += mysqli_num_rows($result);
                                   $result = $conn->query("SELECT marksMath FROM grades WHERE marksMath BETWEEN 60 AND 69;");
                                    $row = $result->fetch_assoc();
                                    $countC += mysqli_num_rows($result);
                                   $result = $conn->query("SELECT marksSains FROM grades WHERE marksSains BETWEEN 60 AND 69;");
                                    $row = $result->fetch_assoc();
                                    $countC += mysqli_num_rows($result);
                                   $result = $conn->query("SELECT marksSeni FROM grades WHERE marksSeni BETWEEN 60 AND 69;");
                                    $row = $result->fetch_assoc();
                                    $countC += mysqli_num_rows($result);
                                   $result = $conn->query("SELECT marksPI FROM grades WHERE marksPI BETWEEN 60 AND 69;");
                                    $row = $result->fetch_assoc();
                                    $countC += mysqli_num_rows($result);
                                   $result = $conn->query("SELECT marksBA FROM grades WHERE marksBA BETWEEN 60 AND 69;");
                                    $row = $result->fetch_assoc();
                                    $countC += mysqli_num_rows($result);
                                   $result = $conn->query("SELECT marksTasmik FROM grades WHERE marksTasmik BETWEEN 60 AND 69;");
                                    $row = $result->fetch_assoc();
                                    $countC += mysqli_num_rows($result);
                                   $result = $conn->query("SELECT marksMusik FROM grades WHERE marksMusik BETWEEN 60 AND 69;");
                                    $row = $result->fetch_assoc();
                                    $countC += mysqli_num_rows($result);
                                   $result = $conn->query("SELECT marksRBT FROM grades WHERE marksRBT BETWEEN 60 AND 69;");
                                    $row = $result->fetch_assoc();
                                    $countC += mysqli_num_rows($result);
                                   $result = $conn->query("SELECT marksSejarah FROM grades WHERE marksSejarah BETWEEN 60 AND 69;");
                                    $row = $result->fetch_assoc();
                                    $countC += mysqli_num_rows($result);
                                    # count d
                                   $result = $conn->query("SELECT marksBM FROM grades WHERE marksBM BETWEEN 40 AND 59;");
                                    $row = $result->fetch_assoc();
                                    $countD += mysqli_num_rows($result);
                                   $result = $conn->query("SELECT marksBI FROM grades WHERE marksBI BETWEEN 40 AND 59;");
                                    $row = $result->fetch_assoc();
                                    $countD += mysqli_num_rows($result);
                                   $result = $conn->query("SELECT marksMath FROM grades WHERE marksMath BETWEEN 40 AND 59;");
                                    $row = $result->fetch_assoc();
                                    $countD += mysqli_num_rows($result);
                                   $result = $conn->query("SELECT marksSains FROM grades WHERE marksSains BETWEEN 40 AND 59;");
                                    $row = $result->fetch_assoc();
                                    $countD += mysqli_num_rows($result);
                                   $result = $conn->query("SELECT marksSeni FROM grades WHERE marksSeni BETWEEN 40 AND 59;");
                                    $row = $result->fetch_assoc();
                                    $countD += mysqli_num_rows($result);
                                   $result = $conn->query("SELECT marksPI FROM grades WHERE marksPI BETWEEN 40 AND 59;");
                                    $row = $result->fetch_assoc();
                                    $countD += mysqli_num_rows($result);
                                   $result = $conn->query("SELECT marksBA FROM grades WHERE marksBA BETWEEN 40 AND 59;");
                                    $row = $result->fetch_assoc();
                                    $countD += mysqli_num_rows($result);
                                   $result = $conn->query("SELECT marksTasmik FROM grades WHERE marksTasmik BETWEEN 40 AND 59;");
                                    $row = $result->fetch_assoc();
                                    $countD += mysqli_num_rows($result);
                                   $result = $conn->query("SELECT marksMusik FROM grades WHERE marksMusik BETWEEN 40 AND 59;");
                                    $row = $result->fetch_assoc();
                                    $countD += mysqli_num_rows($result);
                                   $result = $conn->query("SELECT marksRBT FROM grades WHERE marksRBT BETWEEN 40 AND 59;");
                                    $row = $result->fetch_assoc();
                                    $countD += mysqli_num_rows($result);
                                   $result = $conn->query("SELECT marksSejarah FROM grades WHERE marksSejarah BETWEEN 40 AND 59;");
                                    $row = $result->fetch_assoc();
                                    $countD += mysqli_num_rows($result);
                                     # count e
                                   $result = $conn->query("SELECT marksBM FROM grades WHERE marksBM BETWEEN 0 AND 39;");
                                    $row = $result->fetch_assoc();
                                    $countE += mysqli_num_rows($result);
                                   $result = $conn->query("SELECT marksBI FROM grades WHERE marksBI BETWEEN 0 AND 39;");
                                    $row = $result->fetch_assoc();
                                    $countE += mysqli_num_rows($result);
                                   $result = $conn->query("SELECT marksMath FROM grades WHERE marksMath BETWEEN 0 AND 39;");
                                    $row = $result->fetch_assoc();
                                    $countE += mysqli_num_rows($result);
                                   $result = $conn->query("SELECT marksSains FROM grades WHERE marksSains BETWEEN 0 AND 39;");
                                    $row = $result->fetch_assoc();
                                    $countE += mysqli_num_rows($result);
                                   $result = $conn->query("SELECT marksSeni FROM grades WHERE marksSeni BETWEEN 0 AND 39;");
                                    $row = $result->fetch_assoc();
                                    $countE += mysqli_num_rows($result);
                                   $result = $conn->query("SELECT marksPI FROM grades WHERE marksPI BETWEEN 0 AND 39;");
                                    $row = $result->fetch_assoc();
                                    $countE += mysqli_num_rows($result);
                                   $result = $conn->query("SELECT marksBA FROM grades WHERE marksBA BETWEEN 0 AND 39;");
                                    $row = $result->fetch_assoc();
                                    $countE += mysqli_num_rows($result);
                                   $result = $conn->query("SELECT marksTasmik FROM grades WHERE marksTasmik BETWEEN 0 AND 39;");
                                    $row = $result->fetch_assoc();
                                    $countE += mysqli_num_rows($result);
                                   $result = $conn->query("SELECT marksMusik FROM grades WHERE marksMusik BETWEEN 0 AND 39;");
                                    $row = $result->fetch_assoc();
                                    $countE += mysqli_num_rows($result);
                                   $result = $conn->query("SELECT marksRBT FROM grades WHERE marksRBT BETWEEN 0 AND 39;");
                                    $row = $result->fetch_assoc();
                                    $countE += mysqli_num_rows($result);
                                   $result = $conn->query("SELECT marksSejarah FROM grades WHERE marksSejarah BETWEEN 0 AND 39;");
                                    $row = $result->fetch_assoc();
                                    $countE += mysqli_num_rows($result);
    
    ?>
    type: 'pie',
    data: {
      labels: ["A", "B", "C", "D", "E"],
      datasets: [{
        label: "Gred",
        backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
        data: [<?php echo $countA; ?>,<?php echo $countB; ?>,<?php echo $countC; ?>,<?php echo $countD; ?>,<?php echo $countE; ?>]
      }]
    },
    options: {
      title: {
        display: true,
        text: 'Prestasi murid pada tahun 2022'
      }
    }
});
</script>
                            </div>
                            <!-- End Chart -->
                        </div>
                    </div>
                    <!-- End Card Body -->
                </div>
                <!-- End Deal Overview -->


            <!-- highlight-area start -->
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="single-asset-counting-list-box bg-gradient bg-gradient-purple card border-0 text-center">
                            <div class="card-body">
                                <div class="single-asset-counting-list-image-wrap">
                                    <img src="assets/img/student.png" alt="">
                                </div>
                                <h2 class="text-white mb-0"><?php 
                                    
                                    $query = "SELECT * FROM student";
                                    $result = $conn->query($query);
                                    $row = $result->fetch_assoc();
                                    $count = mysqli_num_rows($result);
                                    
                                    
                                    
                                    
                                    
                                    
                                    echo $count?><small class="d-block mt-2">Murid</small></h2>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="single-asset-counting-list-box bg-gradient bg-gradient-blue card border-0 text-center">
                            <div class="card-body">
                                <div class="single-asset-counting-list-image-wrap">
                                    <img src="assets/img/teacher.png" alt="">
                                </div>
                                <h2 class="text-white mb-0"><?php 
                                    
                                    $query = "SELECT * FROM user WHERE teacherType !='admin'";
                                    $result = $conn->query($query);
                                    $row = $result->fetch_assoc();
                                    $count = mysqli_num_rows($result);
                                    
                                    
                                    
                                    
                                    
                                    
                                    echo $count?><small class="d-block mt-2">Guru</small></h2>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-4 col-md-6">
                        <div class="single-asset-counting-list-box bg-gradient bg-gradient-yellow card border-0 text-center">
                            <div class="card-body">
                                <div class="single-asset-counting-list-image-wrap">
                                    <img src="assets/img/staff.png" alt="">
                                </div>
                                <h2 class="text-white mb-0"><?php 
                                    
                                    $query = "SELECT * FROM user WHERE teacherType='admin'";
                                    $result = $conn->query($query);
                                    $row = $result->fetch_assoc();
                                    $count = mysqli_num_rows($result);
                                    
                                    
                                    
                                    
                                    
                                    
                                    echo $count?><small class="d-block mt-2">Staf</small></h2>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- highlight-area End -->
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