
<?php

include("db.php");

session_start();

if(!isset($_SESSION["login"])){
    header("Location:firma_giris.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Welcome to CodeIgniter</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="css.css">
</head>
<body>

<center>


    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="firma_duzenle.php">ELEMAN-ONLİNE</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">

                <ul class="nav navbar-nav navbar-right">
                    <li><a href="firma_ayar.php"><span class="glyphicon glyphicon-user"></span> PROFİL AYARLARI</a></li>
                    <li><a href="ilan_ver.php"><span class="glyphicon glyphicon-hand-right"></span> İLAN VER</a></li>
                    <li><a href="giris.php"><span class="glyphicon glyphicon-log-out"></span> ÇIKIŞ</a></li>
                </ul>
            </div>
        </div>

        <h3 style="color: dimgray">FİRMA-DUZENLEME</h3><br>
    </nav>

    <br>

    <?php




    echo "<div class='container'>";
    echo "<table class='table table-striped'>";

    echo " <tr> ";

    echo " <th> SEÇ </th> ";
    echo " <th> İSİM</th>";
    echo " <th> SOYİSİM </th> ";
    echo " <th> E-MAİL </th> ";
    echo " <th> TELEFON </th> ";
    echo " <th> SEKTOR </th> ";
    echo " <th> ACIKLAMA </th> ";
    echo " <th> PROFİL </th> ";



    echo "</tr>";



    $sql="SELECT * FROM basvuru WHERE fmail='" . $_SESSION["fmail"] . "' ";
    $result=$conn->query($sql);

    if($result->num_rows>0){

        while($row=$result->fetch_assoc()){

            $basvuru_mail=$row["umail"];
            $basvuru_aciklama=$row["aciklama"];



            $sql2="SELECT * FROM uye WHERE mail='$basvuru_mail' ";

            $result2=$conn->query($sql2);

            if($result2->num_rows>0) {

                while ($row2 = $result2->fetch_assoc()) {


                    echo "<tr>";
                    echo "<form method='post' name='form2'>";

                    echo "<td><input type='radio' name='sec' value='".$row2["mail"]."'> </td> ";

                    echo "<td> " . $row2["isim"] . " </td>";
                    echo "<td> " . $row2["soyisim"] . " </td>";
                    echo "<td> " . $row2["mail"] . " </td>";
                    echo "<td> " . $row2["tel"] . " </td>";
                    echo "<td> " . $row2["sektor"] . " </td>";
                    echo "<td> " . $basvuru_aciklama . " </td>";
                    echo "<td> <img src='upload/".$row2["profil"]."' width='75' height='75'>";   "</td>";

                    echo "</tr>";


                }

            }}

    }
    echo "</table>";

    echo "</div>"

    ?>

    <br><br>
    <h4>GÖRÜŞMEK İSTEDİĞİNİZ KİŞİYİ SEÇİNİZ</h4> <br><br>

    <form method="post"  class="form-group">

        <input type="radio" name="mesaj" value="cv"> CV İSTE <br><br>
        <input type="radio" name="mesaj" value="gorusme"> GÖRÜŞME İSTE <br><br>
        <input type="radio" name="mesaj" value="red"> REDDET <br><br>
        <input type="radio" name="mesaj" value="sil"> HİÇBİR BİLGİ VERMEDEN BAŞVURUYU SİL <br><br>

        <button type="submit" class="btn btn-basic" >ONAYLA</button>


    </form>
    <br><br>

    <?php

    if(!empty($_POST["sec"])) {

        if (!empty($_POST["mesaj"])) {

            if ($_POST["mesaj"] != "sil") {


                $sql3 = "UPDATE  basvuru SET  firma_aciklama='" . $_POST["mesaj"] . "'  WHERE umail='" . $_POST["sec"] . "' AND  fmail='" . $_SESSION["fmail"] . "'";

                if (mysqli_query($conn, $sql3)) {
                    echo "İLETİLDİ";
                } else {
                    echo "Error: " . $sql3 . "<br>" . mysqli_error($conn);
                }

            }
            else{

                $sql3="DELETE FROM basvuru WHERE umail='" . $_POST["sec"] . "' AND fmail='" . $_SESSION["fmail"] . "' ";

                if (mysqli_query($conn, $sql3)) {
                    echo "SİLİNDİ";
                } else {
                    echo "Error: " . $sql3 . "<br>" . mysqli_error($conn);
                }

            }


        }
    }
    ?>


</center>

</body>
</html>


