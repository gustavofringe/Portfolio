<!doctype html>
<html class="no-js" lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?= $title; ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Maven+Pro" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Didact+Gothic|Maven+Pro" rel="stylesheet">

    <!-- Place favicon.ico in the root directory -->
    <link rel="icon" href="<?= BASE_URL; ?>/public/img/logo.ico"/>
    <link rel="stylesheet" href="<?= BASE_URL; ?>/public/css/bootstrap.css">
    <link rel="stylesheet" href="<?= BASE_URL; ?>/public/css/screen.css">
    <!--<link rel="stylesheet" href="<?/*= BASE_URL; */?>/public/scss/stylesheets/screen.css">-->
</head>
<body>
<div class="site-container">
    <div class="site-pusher">
        <header class="header">
            <div class="container-top">
                <a href="" class="header_icon" id="header_icon"></a>
                <a href="<?= BASE_URL; ?>" class="header_logo">
                        <img src="<?= BASE_URL; ?>/public/img/logo.svg" alt="ma photo" id="logo">
                </a>

                    <nav class="menu">
                        <a <?php if($_REQUEST['url'] == ''){echo "id='active'";}?> href="<?php echo BASE_URL; ?>">Accueil</a>
                        <a <?php if($_REQUEST['url'] == 'pages/competences'){echo "id='active'";}?> href="<?= BASE_URL; ?>/pages/competences">mes compétences</a>
                        <a <?php if($_REQUEST['url'] == 'pages/portfolio'){echo "id='active'";}?> href="<?= BASE_URL; ?>/pages/portfolio">mes réalisations</a>
                        <a <?php if($_REQUEST['url'] == 'posts'){echo "id='active'";}?> href="<?= BASE_URL; ?>/posts">me contacter</a>
                    </nav>
                    <!-- /.menu -->
                    <nav class="menu-desktop">
                        <a <?php if($_REQUEST['url'] == ''){echo "id='active'";}?> href="<?php echo BASE_URL; ?>">Accueil</a>
                        <a <?php if($_REQUEST['url'] == 'pages/competences'){echo "id='active'";}?> href="<?= BASE_URL; ?>/pages/competences">mes compétences</a>
                        <a <?php if($_REQUEST['url'] == 'pages/portfolio'){echo "id='active'";}?> href="<?= BASE_URL; ?>/pages/portfolio">mes réalisations</a>
                        <a <?php if($_REQUEST['url'] == 'posts'){echo "id='active'";}?> href="<?= BASE_URL; ?>/posts">me contacter</a>
                    </nav>
                <!-- /.menu-desktop -->
            </div>
            <!-- /.container -->
        </header>

        <!-- /.header -->
<?php echo App\Session::flash();?>


        <div class="site-content">
            <?php if($_REQUEST['url'] !== "pages/portfolio"):?>
            <main class="container">
                <?= $content; ?>
                <!--<p>Après plusieurs années en tant qu'électricien,
                    j'ai commencé le développement web en autodidacte et c'est très vite devenu une vraie vocation.
                    J'aime expérimenter, découvrir et apprendre au fur et à mesure des nouveaux projets.
                    Passionné et intrigué par l'informatique depuis toujours, j'ai entamé une reconversion professionnelle pour m'épanouir dans un métier d'avenir.
                    Rigoureux et déterminé je mets du coeur à l'ouvrage dans tout ce que j'entreprends.
                </p>-->
            </main><!--<p>Après plusieurs années en tant qu'électricien,
                    j'ai commencé le développement web en autodidacte et c'est très vite devenu une vraie vocation.
                    J'aime expérimenter, découvrir et apprendre au fur et à mesure des nouveaux projets.
                    Passionné et intrigué par l'informatique depuis toujours, j'ai entamé une reconversion professionnelle pour m'épanouir dans un métier d'avenir.
                    Rigoureux et déterminé je mets du coeur à l'ouvrage dans tout ce que j'entreprends.
                </p>-->
            <?php else:?>
            <main class="container-fluid">
                <?php echo $content;?>
            </main>
            <?php endif;?>
            <div class="site-cache" id="site-cache"></div>
            <!-- /.site-cache -->
            <footer>
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-sm-6 col-xl-4 dashed pt-3">
                            <article class="article-footer">
                                <h4>à propos</h4>
                                <p class="text-justify">Je m'appelle Guillaume Dussart, j'ai commencé le développement
                                    web pour développer des petits sites perso et c'est très vite devenu une vraie
                                    vocation. J'aime expérimenter, découvrir et apprendre au fur et à mesure de mes
                                    projets perso pour le moment.</p>
                            </article>
                        </div>
                        <div class="col-12 col-sm-6 col-xl-4 dashed pt-3">
                            <h4>Mes coordonées</h4>
                            <p class="mt-3">Téléphone: 06.69.92.33.90</p>
                            Mail: <a href="mailto:dussartguillaume.dev@gmail.com">dussartguillaume.dev@gmail.com</a>
                        </div>
                        <!-- /.col-12 col-sm-6 col-xl-4 dashed pt-3 -->
                        <div class="col-12 col-sm-6 col-xl-4 dashed pb-3 pt-3">
                            <h4>Où me trouver ?</h4>
                            <a href="https://github.com/"><img src="<?= BASE_URL; ?>/public/img/social/github.svg"
                                                               alt="github" class="d-inline social"></a>
                            <!-- /.d-inline -->
                            <a href="https://twitter.com/?lang=fr"><img
                                        src="<?= BASE_URL; ?>/public/img/social/twitter.svg" alt="twitter"
                                        class="d-inline social ml-1"></a>
                            <!-- /.d-inline -->
                            <a href="https://www.facebook.com/"><img
                                        src="<?= BASE_URL; ?>/public/img/social/facebook.svg" alt="facebook"
                                        class="d-inline social ml-1"></a>
                            <!-- /.d-inline -->
                            <a href="https://www.linkedin.com/"><img
                                        src="<?= BASE_URL; ?>/public/img/social/linkedin.svg" alt="linkedin"
                                        class="d-inline social ml-1"></a>
                            <!-- /.d-inline -->
                        </div>
                        <!-- /.col-xl-4 -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container -->
            </footer>
        </div>
        <!-- /.site-content -->
    </div>
    <!-- /.site-pusher -->
</div>
<!-- /.site-container -->

<script src="<?= BASE_URL; ?>/public/js/jquery-3.2.1.min.js"></script>
<script src="<?= BASE_URL; ?>/public/js/bootstrap.js"></script>
<script src="<?= BASE_URL; ?>/public/js/main.js"></script>

<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
<script>
    (function (b, o, i, l, e, r) {
        b.GoogleAnalyticsObject = l;
        b[l] || (b[l] =
            function () {
                (b[l].q = b[l].q || []).push(arguments)
            });
        b[l].l = +new Date;
        e = o.createElement(i);
        r = o.getElementsByTagName(i)[0];
        e.src = 'https://www.google-analytics.com/analytics.js';
        r.parentNode.insertBefore(e, r)
    }(window, document, 'script', 'ga'));
    ga('create', 'UA-XXXXX-X', 'auto');
    ga('send', 'pageview');
</script>

</body>
</html>
