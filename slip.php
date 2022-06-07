<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "estudent";
$connect = new mysqli($servername, $username, $password, $dbname);
$login_user = $_COOKIE["user_name"];
$sql = "SELECT report.*, grades.*, student.* FROM report
INNER JOIN grades on grades.stuIC = report.stuIC
INNER JOIN student on student.icNum = report.stuIC
WHERE report.stuIC = $login_user";

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

if (isset($_COOKIE["user_name"]))
{?>
<br>
<br>
<div align="center">
    <img src="assets/img/JBB5038.png" width="45" height="60"><br>
</div>
<div align="center">
    <b>SEKOLAH KEBANGSAAN KOTA RAJA</b>
</div><br>
<table width="700" border="1" align="center" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
    <tr>
        <td align="center"><strong>SLIP KEPUTUSAN - UJIAN 1 - 2022</strong></td>
    </tr>
</table><br>
<table width="700" border="0" align="center" cellpadding="3" cellspacing="0">
    <tr>
        <td width="80">&nbsp;Nama</font><br>
        </td>
        <td width="1">:</font><br>
        </td>
        <td width="388">&nbsp;<?php echo $row["teacherName"];?></font><br>
        </td>
        <td width="80">&nbsp;Kelas</td>
        <td width="1">:</font><br>
        </td>
        <td width="150">&nbsp;<?php echo $row["class"];?></font><br>
        </td>
    </tr>
    <tr>
        <td>&nbsp;No. KP</td>
        <td>:</td>
        <td>&nbsp;<?php echo $row["stuIC"];?></td>
        <td>&nbsp;Jantina</td>
        <td>:</td>
        <td>&nbsp;<?php echo $row["stuGender"];?></td>
    </tr>
</table><br>
<table width="700" border="0" align="center" cellpadding="3" cellspacing="0">
    <tr>
        <td colspan="4">
            <div align="center">
            </div>
            <div align="center">
                <hr align="center" noshade>
            </div>
        </td>
    </tr>
    <tr>
        <td>&nbsp;&nbsp;&nbsp;Bil</td>
        <td>Mata Pelajaran </td>
        <td>
            <div align="center">Markah
            </div>
        </td>
        <td>
            <div align="center">Gred
            </div>
        </td>
    </tr>
    <tr>
        <td colspan="4">
            <hr align="center" noshade>
        </td>
    </tr>
    <tr>
    </tr>
    <tr>
        <td>&nbsp;&nbsp;&nbsp;1.</td>
        <td>BAHASA MELAYU</td>
        <td>
            <center><?php echo $row["marksBM"];?></center>
        </td>
        <td>
            <center><?php echo $row["marksBM"];?></center>
        </td>
    </tr>
    <tr>
    </tr>
    <tr>
        <td>&nbsp;&nbsp;&nbsp;2.</td>
        <td>BAHASA INGGERIS</td>
        <td>
            <center><?php echo $row["marksBI"];?></center>
        </td>
        <td>
            <center><?php echo $row["marksBI"];?></center>
        </td>
    </tr>
    <tr>
    </tr>
    <tr>
        <td>&nbsp;&nbsp;&nbsp;3.</td>
        <td>MATEMATIK</td>
        <td>
            <center><?php echo $row["marksMath"];?></center>
        </td>
        <td>
            <center><?php echo $row["marksMath"];?></center>
        </td>
    </tr>
    <tr>
        <td>&nbsp;&nbsp;&nbsp;4.</td>
        <td>PENDIDIKAN ISLAM</td>
        <td>
            <center><?php echo $row["marksPI"];?></center>
        </td>
        <td>
            <center><?php echo $row["marksPI"];?></center>
        </td>
    </tr>
    <tr>
    </tr>
    <tr>
        <td>&nbsp;&nbsp;&nbsp;5.</td>
        <td>PENDIDIKAN SENI VISUAL</td>
        <td>
            <center><?php echo $row["marksSeni"];?></center>
        </td>
        <td>
            <center><?php echo $row["marksSeni"];?></center>
        </td>
    </tr>
    <tr>
        <td>&nbsp;&nbsp;&nbsp;6.</td>
        <td>BAHASA ARAB</td>
        <td>
            <center><?php echo $row["marksBA"];?></center>
        </td>
        <td>
            <center><?php echo $row["marksBA"];?></center>
        </td>
    </tr>
    <tr>
        <td>&nbsp;&nbsp;&nbsp;7.</td>
        <td>TASMIK</td>
        <td>
            <center><?php echo $row["marksTasmik"];?></center>
        </td>
        <td>
            <center><?php echo $row["marksTasmik"];?></center>
        </td>
    </tr>
    <tr>
        <td>&nbsp;&nbsp;&nbsp;8.</td>
        <td>SAINS</td>
        <td>
            <center><?php echo $row["marksSains"];?></center>
        </td>
        <td>
            <center><?php echo $row["marksSains"];?></center>
        </td>
    </tr>
    <?php
    if (in_array($row["class"], array("4 Bijak", "4 Cerdik","5 Bijak", "5 Cerdik","6 Bijak", "6 Cerdik"), true)) {
        echo '<tr>
        <td>&nbsp;&nbsp;&nbsp;9.</td>
        <td>PENDIDIKAN MUSIK</td>
        <td>
            <center><?php echo $row["marksMusik"];?></center>
        </td>
        <td>
            <center><?php echo $row["marksMusik"];?></center>
        </td>
    </tr>
    <tr>
        <td>&nbsp;&nbsp;&nbsp;10.</td>
        <td>REKA BENTUK TEKNOLOGI</td>
        <td>
            <center><?php echo $row["marksRBT"];?></center>
        </td>
        <td>
            <center><?php echo $row["marksRBT"];?></center>
        </td>
    </tr>
    <tr>
        <td>&nbsp;&nbsp;&nbsp;11.</td>
        <td>SEJARAH</td>
        <td>
            <center><?php echo $row["marksSejarah"];?></center>
        </td>
        <td>
            <center><?php echo $row["marksSejarah"];?></center>
        </td>
    </tr>';
    }?>
    
</table>
<table width="700" border="0" align="center" cellpadding="3" cellspacing="0">
    <tr>
        <td colspan="6">
            <hr align="center" noshade>
        </td>
    </tr>
    <tr>
        <td width="220">&nbsp;Bilangan Mata Pelajaran Daftar </td>
        <td width="1">:</td>
        <td width="179"><?php
            if (in_array($row["class"], array("1 Bijak", "1 Cerdik","2 Bijak", "2 Cerdik","3 Bijak", "3 Cerdik"), true)) {
                echo '8';
            }
 else {
     echo '11';
 }
            ?></td>
        <td width="214">Jumlah Markah </td>
        <td width="1">:</td>
        <td width="85">505</td>
    </tr>
    <tr>
        <td>&nbsp;Kedudukan Dalam Kelas </td>
        <td width="1">:</td>
        <td><?php echo $row["rankingClass"]?> / 26</td>
        <td>&nbsp; </td>
        <td>&nbsp; </td>
        <td>&nbsp; </td>
    <tr>
        <td>&nbsp;Kedudukan Dalam Tingkatan </td>
        <td width="1">:</td>
        <td><?php echo $row["rankingWhole"]?> / 116</td>
        <td>Peratus</td>
        <td width="1">:</td>
        <td>72.14</td>
    </tr>
    <tr>
        <td>&nbsp;Kehadiran</td>
        <td width="1">:</td>
        <td><?php echo $row["attendance"]?> / 999 Hari</td>
        <td>Gred Purata Pelajar </td>
        <td width="1">:</td>
        <td>2.71</td>
    </tr>
    <tr>
        <td>&nbsp;Pencapaian Gred Keseluruhan </td>
        <td width="1">:</td>
        <td>1[A] 2[B] 2[C] 2[D] </td>
        <td>Keputusan</td>
        <td width="1">:</td>
        <td>LULUS</td>
    </tr>
    
    <tr>
        <td colspan="6">
            <hr align="center" noshade>
        </td>
    </tr>
</table><br>
<table width="700" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
        <td width='120'>Nama Guru Kelas</td>
        <td width='1'>:</td>
        <td width='579'>&nbsp;<?php echo $row["teacherName"];?></td>
    </tr>
    <tr>
        <td colspan='3'>&nbsp;</td>
    </tr>
    <tr>
        <td>Ulasan Guru Kelas</td>
        <td>:</td>
        <td>&nbsp;<?php echo $row["remarks"];?></td>
    </tr>
</table>
<?php
}
?>