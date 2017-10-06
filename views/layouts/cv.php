<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <title>Curriculum vitae</title>

    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="icon" href="favicon.ico">
</head>
<body>
<!-- cv header-->
<header class="header">
    <div class="container">
        <div class="row">
            <div class="col s2">
                <img class="responsive-img" src="img/Moi1.JPG" alt="Noramalement c'est ma photo">
            </div>
            <!-- /.col s8 -->

            <div class="col s6">
                <h1>Dussart Guillaume</h1>
            </div>

            <div class="col s2">
                <h2>Contact</h2>
                <table>


                    <tr>
                        <td class="icon"><i class="material-icons">phone</i></td>
                        <td class="address">+ 33 6 69 92 33 90</td>
                    </tr>
                    <tr>
                        <td class="icon"><i class="material-icons">room</i></td>
                        <td class="address">Lille France</td>
                    </tr>
                    <tr>
                        <td class="icon"><i class="material-icons">email</i></td>
                        <td class="address"><a href="mailto:dussartguillaume.dev@gmail.com">dussartguillaume.dev@gmail.com</a></td>
                    </tr>

                </table>
            </div>
            <!-- /.col s8 -->
        </div>

    </div>
</header>
<!-- content of cv -->
<div class="container">
<?php echo $content;?>


</div>
<footer class="footer">

    <div class="container">
        <p>Me suivre</p>
        <a href=""><img src="img/github.svg" alt="github"></a>
        <a href=""><img src="img/facebook.svg" alt="facebook"></a>
        <a href=""><img src="img/twitter.svg" alt="twitter"></a>
        <a href=""><img src="img/linkedin.svg" alt="linkedin"></a>
        <a href=""><img src="img/discord.png" alt="discord"></a>
    </div>

</footer>
</body>
</html>
