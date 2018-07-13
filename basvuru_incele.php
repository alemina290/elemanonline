<?php

session_start();

include ("db.php");


if(!isset($_SESSION["login"])){
    header("Location:firma_giris.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>BAŞVURU-İNCELE</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <style></style>
</head>
<body>

<center>


    <div class="alert alert-success">

        <h3>ELEMAN - ONLİNE</h3><br>
        <h4>BASVURU-İNCELE</h4><br>

    </div>

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

        <button type="submit" class="btn btn-primary" >ONAYLA</button>


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


