<?php

include("db.php");

session_start();

if(!isset($_SESSION["login"])){
    header("Location:uye_giris.php");
}


$i=0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>BASVURU</title>

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
        <h4>BAŞVURU</h4><br>

    </div>



    <?php

    echo "<div class='jumbotron'>";

    echo "<h3> MESAJLAR </h3><br>";


    $basvuru_firma="";
    $sql3="SELECT * FROM basvuru WHERE firma_aciklama!='' AND umail='".$_SESSION["mail"]."' ";
    $result3=$conn->query($sql3);

    if($result3->num_rows>0){

        while($row3=$result3->fetch_assoc()) {


            $basvuru_firma = $row3["fmail"];
            $basvuru_firma_aciklama=$row3["firma_aciklama"];





            $sql4 = "SELECT * FROM firma_uye WHERE fmail='$basvuru_firma' ";
            $result4 = $conn->query($sql4);



            if ($result4->num_rows > 0) {



                while ($row4 = $result4->fetch_assoc()) {






                    if ($basvuru_firma_aciklama == "cv") {


                        echo "*** {$row4['fisim']} FİRMASI YAPTIĞINIZ İŞ BAŞVURUSUNU DEĞERLENDİRDİ, SİZDEN AYRINTILI CV GÖNDERMENİZİ TALEP EDİYOR ***";

                        echo "<br><br>";

                    }

                    else if($basvuru_firma_aciklama== "gorusme"){

                        echo "*** {$row4['fisim']} FİRMASI YAPTIĞINIZ İŞ BAŞVURUSUNU DEĞERLENDİRDİ, SİZİNLE GÖRÜŞME TALEP EDİYOR ***";

                        echo "<br><br>";

                    }

                    else if($basvuru_firma_aciklama== "red"){

                        echo "*** {$row4['fisim']} FİRMASI YAPTIĞINIZ İŞ BAŞVURUSUNU DEĞERLENDİRDİ, MAALESEF BAŞVURUNUZU REDDETTİ ***";

                        echo "<br><br>";
                    }

                }}
                    }}


    echo "</div>";

    echo "<div class='container'>";
    echo "<table class='table table-striped'>";

    echo " <tr> ";

    echo "<th> FİRMA İSMİ </th>";
    echo " <th> SEKTÖR </th> ";
    echo " <th> E-MAİL </th> ";
    echo " <th> TELEFON </th> ";
    echo " <th> DEPARTMAN </th> ";
    echo " <th> TECRUBE </th> ";
    echo " <th> YABANCI DİL </th> ";
    echo " <th> SEÇ </th> ";



    echo "</tr>";



    $sql="SELECT *  FROM firma_uye WHERE fsektor='" . $_SESSION["sektor"] . "' ";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {

            echo "<tr>";
            echo "<td> ".$row["fisim"]." </td>";
            echo "<td> ".$row["fsektor"]." </td>";
            echo "<td> ".$row["fmail"]." </td>";
            echo "<td> ".$row["ftel"]." </td>";
            echo "<td> ".$row["departman"]." </td>";
            echo "<td> ".$row["tecrube"]." </td>";
            echo "<td> ".$row["yabanci"]." </td>";

            echo "<form method='post' name='form2'>";

            echo "<td><input type='radio' name='sec' value='".$row["fmail"]."'> </td> ";

            echo "</tr>";

            }

    }

    echo "</table>";

    echo "</div>";

    ?>

    <br>

    <h4>BAŞVURU YAPMAK İSTEDİĞİNİZ FİRMAYI SEÇİNİZ</h4> <br><br>

    <form method="post"  class="form-group" name="form1">

    AÇIKLAMA: <textarea name="aciklama" cols="50" rows="4"></textarea> <br><br>


        <button type="submit" class="btn btn-primary" >GÖNDER</button>

        <br><br>


    </form>

    <?php

      $aciklama="";

    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $aciklama=$_POST["aciklama"];

    }

    if(!empty($_POST["sec"])) {


        $sql5 = "SELECT * FROM basvuru WHERE umail='" . $_SESSION["mail"] . "' AND fmail='" . $_POST["sec"] . "' ";
        $result5 = $conn->query($sql5);



        if ($result5->num_rows == 0) {

            $i = 1;
        } else {
            $i = 0;
        }



        if ($i == 1) {


            $sql2 = "INSERT INTO basvuru (fmail,aciklama,umail) VALUES ('" . $_POST["sec"] . "' , '$aciklama' , '" . $_SESSION["mail"] . "') ";


            if (mysqli_query($conn, $sql2)) {
                echo "BAŞVURUNUZ İLETİLDİ";
            } else {
                echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
            }

        } else {
            echo "BU FİRMAYA ZATEN BAŞVURU YAPILMIŞ";
        }
    }
    else{
        echo "BAŞVURU YAPMAK İÇİN FİRMA SEÇMELİSİNİZ";
    }

    echo "<br><br>";





    ?>




</center>

</body>
</html>


