<?php

include ("db.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>UYE GİRİŞ</title>

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
                <a class="navbar-brand" href="giris.php">ELEMAN-ONLİNE</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">


                <ul class="nav navbar-nav navbar-right">

                    <li><a href="firma_giris.php"><span class="glyphicon glyphicon-log-in"></span> FİRMA GİRİŞİ</a></li>
                </ul>
            </div>
        </div>

        <h3 style="color: dimgray">UYE-GİRİŞ</h3><br>
    </nav>

    <div class="container" style="height: 50%; width: 30%; padding-top: 30px; margin:30px;">
        <form method="post" class="form-horizontal" name="myForm" action="uye_login.php">

            <div class="form-group">

                <label class="control-label col-sm-2" for="email">E-MAİL:</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" name="ka" pattern=".+@.+.com" placeholder="example@example.com">

                </div></div>

            <div class="form-group">

                <label class="control-label col-sm-2" for="email">PAROLA:</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" name="sifre"> <br><br>

                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default">GİRİŞ</button> <br><br>

                    YA DA <br><br>

                    <a href="uye_ol.php">    <button type="button" class="btn btn-basic">KAYDOL</button>  </a>
                </div>
            </div>

        </form>

        <hr>
        <footer class="container-fluid text-center">
            <p>*İŞ BAŞVURUSU YAPABİLMEK İÇİN ÜYE GİRİŞİ YAPMANIZ GEREKMEKTEDİR</p>


        </footer>
    </div>

    </div>






</center>

</body>
</html>


