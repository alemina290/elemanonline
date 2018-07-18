
<?php

include("db.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="css.css">

</head>
<body>

<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="giris.php">ELEMAN-ONLİNE</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">


            <ul class="nav navbar-nav navbar-right">
                <li><a href="firma_giris.php"><span class="glyphicon glyphicon-log-in"></span> FİRMA GİRİŞİ</a></li>
                <li><a href="uye_giris.php"><span class="glyphicon glyphicon-log-in"></span> UYE GİRİŞİ</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container-fluid text-center" >

    <div class="row content" style="height: 450px; overflow-x: hidden; overflow-y: scroll;">


        <div class="col-sm-2 sidenav ">



        </div>


        <div class="col-sm-8 text-left">


            <h1>ELEMAN-ONLİNE</h1>
            <p>İŞ Mİ ARIYORSUN?  LİSTEYE BİR GÖZAT </p>
            <hr>


            <?php


            echo "<input class=\"form-control\" id=\"myInput\" type=\"text\" placeholder=\"Ara...\"><br>";
            echo "<table class='table table-bordered table-striped' id='myTable'>";





            echo " <tr> ";

            echo "<th> FİRMA İSMİ </th>";
            echo " <th> SEKTÖR </th> ";
            echo " <th> E-MAİL </th> ";
            echo " <th> TELEFON </th> ";



            echo "</tr>";




            $sql = "SELECT * FROM firma_uye";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {




                    echo "<tr>";
                    echo "<td> ".$row["fisim"]." </td>";
                    echo "<td> ".$row["fsektor"]." </td>";
                    echo "<td> ".$row["fmail"]." </td>";
                    echo "<td> ".$row["ftel"]." </td>";


                    echo "</tr>";


                }

            }
            echo "</table>";

            echo "</div></div>";


            ?>


            <hr>
            <footer class="container-fluid text-center">
                <p>*** FİRMALARIN İLANLARINI GÖREBİLMEK VE İŞ BAŞVURUSU YAPABİLMEK İÇİN GİRİŞ YAPMANIZ GEREKMEKTEDİR ***</p>


            </footer>
            <div style="height: 150px">

                <img src="upload/find.png" height="100px";>

            </div>
            <p>Copyright © 2018 Tüm Hakları Saklıdır</p>

        </div>


        <script>
            $(document).ready(function(){
                $("#myInput").on("keyup", function() {
                    var value = $(this).val().toLowerCase();
                    $("#myTable tr").filter(function() {
                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                    });
                });
            });
        </script>
</body>
</html>
