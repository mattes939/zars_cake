<?php
session_start();

function Kosik() {
    if (isset($_COOKIE["Kosik"])) {
        return $_COOKIE["Kosik"];
    } else {
        setcookie("Kosik", session_id(), time() + 14400);
        return session_id();
    }
}

$osoba = Kosik();  // nacte se cookies nebo vytvori



$hladresa = 'http://zars.cz';
$lokalniadresa = 'http://zars.cz';
include 'tajne.php';
$stranka = $_GET["stranka"];



/* rezervace automaticke mazani */
$datum = date("H");
$den = date("Y-m-d");
if ($datum <= '8') {
    $vypis3 = "SELECT * FROM rezervace";
    $akce3 = mysql_query($vypis3, $spoj);
    while ($row3 = mysql_fetch_object($akce3)) {
        if ($den == $row3->do) {
            include 'rezervace.php';

            $smaz = "DELETE FROM rezervace WHERE id='$row3->id'";
            $smazani = mysql_query($smaz, $spoj);
        }
    }
    /* automaticke posilani e-mailu o narozeninách */
    include 'narozeniny.php';
}









/* zapamatovani objektu */
$idobjekt = $_GET["idobjekt"];

$zpet = $_GET["h"];


/* vyhledavani */

$zeme = $_GET["zeme"];
$oblast = $_GET["oblast"];
$termin = $_GET["termin"];
$pocet = $_GET["pocet"];
$mistnosti = $_GET["mistnosti"];
$pes = $_GET["pes"];
$oploceni = $_GET["oploceni"];
$wifi = $_GET["wifi"];
$bazen = $_GET["bazen"];
$rybareni = $_GET["rybareni"];
$vyhledat = $_GET["vyhledat"];




if ($idobjekt != null) {

    $pomocna = 0;
    $vypis = "SELECT * FROM kosik where idzakaznik='$osoba'";
    $akce = mysql_query($vypis, $spoj);
    while ($row = mysql_fetch_object($akce)) {
        if ($row->idobjekt == $idobjekt) {
            $pomocna = 1;
        }
    }

    if ($pomocna == '0') {
        $pridej = "INSERT INTO kosik VALUES ('','$osoba','$idobjekt')";
        $pridej = mysql_query($pridej, $spoj);
    }
}

//          aktualni rok ceniku

$vypis = "SELECT * FROM `cenikroky` ORDER BY  `cenikroky`.`rok` asc ";
$akce = mysql_query($vypis, $spoj);
while ($row = mysql_fetch_object($akce)) {
    $aktualnirok = $dalsirok;
    $dalsirok = $row->rok;
}



// abychom byli schopni zobrazovat prihlasovaci formular nahore
// $info - zprava predavana do stranky o stavu prihlaseni
if ($_POST["prihlaseni-odeslano"] == 1) {
    $pokracuj = "true";

    $vypis = "SELECT * FROM prodejce ";
    $akce = mysql_query($vypis, $spoj);
    while ($row = mysql_fetch_object($akce)) {
        if ($_POST["prihlaseni-jmeno"] == $row->jmeno) {
            if ($_POST["prihlaseni-heslo"] == $row->heslo) {
                // prihlaseni OK
                $_SESSION["id"] = $row->id;
                $_SESSION["kdo"] = "prodejce";
                $info = "Přihlášen: $row->jmeno";
            } else
                $info = "Uživatelské jméno a/nebo heslo nesouhlasí!"; // spatne heslo
            $pokracuj = false;
        }
    }

    if ($pokracuj) {
        $vypis = "SELECT * FROM majitel ";
        $akce = mysql_query($vypis, $spoj);
        while ($row = mysql_fetch_object($akce)) {
            if ($_POST["prihlasenijmeno"] == $row->prjmeno) {
                if ($_POST["prihlaseniheslo"] == $row->heslo) {
                    $maj = 0;                    // overnei jestli neni majitel vyrazen
                    $vypis2 = "SELECT * FROM majitelvyrazeny where idm='$row->id' ";
                    $akce2 = mysql_query($vypis2, $spoj);
                    while ($row2 = mysql_fetch_object($akce2)) {
                        $maj = 1;
                    }

                    if ($maj == '0') {
                        // prihlaseni OK
                        $_SESSION["id"] = $row->id;
                        $_SESSION["kdo"] = "majitel";
                    }
                } else
                    $info = "Uživatelské jméno a/nebo heslo nesouhlasí!"; // spatne heslo
                $pokracuj = false;
            }
        }
    }




    if ($pokracuj)
        $info = "Uživatelské jméno a/nebo heslo nesouhlasí!"; // nebylo nikde nic nalezeno
}

$prihlaseni = 0;

if ((!isset($_SESSION["id"])) and ( !isset($_SESSION["kdo"]))) {
    
} else {
    $prihlaseni = 1;
    $uzivatelid = $_SESSION["id"];
    $uzivatelkdo = $_SESSION["kdo"];
}


if ($stranka == 'odhlaseni') {
    unset($_SESSION["id"]);
    unset($_SESSION["kdo"]);
    session_destroy();
// tohle je tady proto, aby se skrylo admin menu, kdyz uz budete odhlaseni
}
$limit = $_GET["limit"];

$cislostranky = $_GET["cislostranky"];
if ($cislostranky == null) {
    $cislostranky = '1';
}

$typ = $_GET["typ"];
if ($typ == null) {
    $pomocnatyp = '1';
}

/* titulek, keywords , discreption  id =1 chaty */
$vypis = "SELECT * FROM titulek where id=1";
$akce = mysql_query($vypis, $spoj);
while ($row = mysql_fetch_object($akce)) {
    $titulek = $row->t;
    $keywords = $row->k;
    $description = $row->d;
}

/* vypis objektu dle struktury objekty */

$vypis = "SELECT * FROM lokality";
$akce = mysql_query($vypis, $spoj);
while ($row = mysql_fetch_object($akce)) {
    if ($stranka == $row->kod) {
        $titulek = $row->t;
        $keywords = $row->k;
        $description = $row->d;
    }

    $vypis2 = "SELECT * FROM zeme";
    $akce2 = mysql_query($vypis2, $spoj);
    while ($row2 = mysql_fetch_object($akce2)) {
        $adresa = $row->kod . '/' . $row2->kod;
        if ($stranka == $adresa) {
            $titulek = $row2->t;
            $keywords = $row2->k;
            $description = $row2->d;
        }

        $vypis3 = "SELECT * FROM okresy where zeme='$row2->id'";
        $akce3 = mysql_query($vypis3, $spoj);
        while ($row3 = mysql_fetch_object($akce3)) {
            $adresa2 = $row->kod . '/' . $row2->kod . '/' . $row3->kod;
            if ($stranka == $adresa2) {
                $titulek = $row3->t;
                $keywords = $row3->k;
                $description = $row3->d;
            }

            $vypis4 = "SELECT * FROM objekty where okresy='$row3->id'";
            $akce4 = mysql_query($vypis4, $spoj);
            while ($row4 = mysql_fetch_object($akce4)) {
                $adresa4 = $row->kod . '/' . $row2->kod . '/' . $row3->kod . '/' . $row4->kod . '-' . $row4->cislo;
                if ($stranka == $adresa4) {
                    $titulek = $row4->t;
                    $keywords = $row4->k;
                    $description = $row4->d;
                }
            }
        }
    }
}


/* * ****** menu ******* */
$vypis = "SELECT * FROM slozky ";
$akce = mysql_query($vypis, $spoj);
while ($row = mysql_fetch_object($akce)) {
    if ($stranka == $row->kod) {
        $title = $row->nazev;
    }
}

/* * ****** info o oblastech ******* */
$vypis = "SELECT * FROM lokality ";
$akce = mysql_query($vypis, $spoj);
while ($row = mysql_fetch_object($akce)) {
    $ladresa = "informace-o-turistickych-oblastech/$row->kod";
    if ($stranka == $ladresa) {
        $title = $row->nazev;
        $vypis2 = "SELECT * FROM infoooblastech where lid='$row->id'";
        $akce2 = mysql_query($vypis2, $spoj);
        while ($row2 = mysql_fetch_object($akce2)) {
            $titulek = $row2->t;
            $keywords = $row2->k;
            $description = $row2->d;
        }
    }
}


/* tematicke vybery seo */
$vypis3 = "SELECT * FROM tematickevybery ";
$akce3 = mysql_query($vypis3, $spoj);
while ($row3 = mysql_fetch_object($akce3)) {

    $adresaxxx = $row3->kod;

    if ($stranka == $adresaxxx) {
        if ($row3->t != '') {
            $titulek = $row3->t;
        }
        $keywords = $row3->k;
        $description = $row3->d;
    }
}
?>

<!DOCTYPE html>
<html lang="cs">
    <head>
        <meta charset="windows-1250">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

<?php
if ($title == null) {
    echo "<title>$titulek</title>";
} else {
    echo "<title>$titulek</title>";
}
$description = SubStr($description, 0, 159);

if ($stranka == 'kosik' and $limit == null) {
    echo "<META HTTP-EQUIV=\"Refresh\" CONTENT=\"0; URL=$hladresa/kosik/?limit=null\" >";
}
?>   
        <meta name="keywords" content="<?php echo "$keywords"; ?>" /> 
        <meta name="description" content="<?php echo "$description"; ?>" /> 
        <meta name="Author" content="www.tvorime-weby.cz" /> 
        <meta name="robots" content="all" />
        <meta name="google-site-verification" content="JYVtv_laRFnX_BCsq5ek0V7Rhvi6-QnFmbQvNR5PXHE" /> 

        <link href="http://fonts.googleapis.com/css?family=Open+Sans:700,300,400&subset=latin,latin-ext" rel="stylesheet" type="text/css">
        <link href="http://fonts.googleapis.com/css?family=Capriola&subset=latin,latin-ext" rel="stylesheet" type="text/css">
        <!--<link href="http://zars.cz/css/bootstrap.min.css" rel="stylesheet" type="text/css">-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link href="http://zars.cz/css/main.css" rel="stylesheet" type="text/css">
        <link href="http://zars.cz/css/blog.css" rel="stylesheet" type="text/css">
<!--        <script src="http://zars.cz/lightbox/js/jquery-1.11.0.min.js"></script>
        <script src="http://zars.cz/lightbox/js/lightbox.min.js"></script>-->
        <link href="http://zars.cz/lightbox/css/lightbox.css" rel="stylesheet" />
<!--        <script src="https://www.google.com/recaptcha/api.js"></script>-->
        <!-- Extended CSS -->
        <link href="http://zars.cz/css/ekko-lightbox.min.css" rel="stylesheet" type="text/css">  
        <link href="http://zars.cz/css/detail-chalupy.css" rel="stylesheet" type="text/css"> 
        <link href="http://zars.cz/css/tisk.css" rel="stylesheet" type="text/css" media="print" />


        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <script>
            (function (i, s, o, g, r, a, m) {
                i['GoogleAnalyticsObject'] = r;
                i[r] = i[r] || function () {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
                a = s.createElement(o),
                        m = s.getElementsByTagName(o)[0];
                a.async = 1;
                a.src = g;
                m.parentNode.insertBefore(a, m)
            })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

            ga('create', 'UA-19596388-1', 'zars.cz');
            ga('require', 'displayfeatures');
            ga('send', 'pageview');

            /* zapamatovane stranky   */

            function AddCookieId(cn, id) {

                var idstr = "_" + id
                if ((fx = MyCookie.Read(cn)) == null)
                    fx = "";
                if (fx.indexOf(idstr) == -1) {
                    fx += idstr;
                    MyCookie.Write(cn, fx, 365);
                }
                alert("Objekt přidán do zapamatovaných objektů");
            }

            var MyCookie = {
                Write: function (name, value, days) {
                    var D = new Date();
                    D.setTime(D.getTime() + 86400000 * days)
                    document.cookie = escape(name) + "=" + escape(value) + ";path=/" +
                            ((days == null) ? "" : (";expires=" + D.toGMTString()))
                    return (this.Read(name) == value);
                },
                Read: function (name) {
                    var EN = escape(name)
                    var F = ' ' + document.cookie + ';', S = F.indexOf(' ' + EN);
                    return S == -1 ? null : unescape(F.substring(EN = S + EN.length + 2, F.indexOf(';', EN)));
                }
            }



        </script>


    </head>
    <body>
	<!-- Google Tag Manager -->
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-M57F3X"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-M57F3X');</script>
<!-- End Google Tag Manager -->
        <div id="fb-root"></div>
        <script>(function (d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id))
                    return;
                js = d.createElement(s);
                js.id = id;
                js.src = "http://connect.facebook.net/cs_CZ/sdk.js#xfbml=1&version=v2.0";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));</script>
        <div class="favourite-bar">

<?php
/* zapamatovane objekty */
$zapamatovane = $_COOKIE["zapamatovane"];
$pole = Explode('_', $zapamatovane);
$i = 1;
$poc = 1;
foreach ($pole as $key => $val) {

    $pomocna = 0;
    $vypis = "SELECT * FROM kosik where idzakaznik='$osoba'";
    $akce = mysql_query($vypis, $spoj);
    while ($row = mysql_fetch_object($akce)) {
        if ($row->idobjekt == $val) {
            $pomocna = 1;
        }
    }

    if ($pomocna == '0') {
        $pridej = "INSERT INTO kosik VALUES ('','$osoba','$val')";
        $pridej = mysql_query($pridej, $spoj);
    }


    $poc++;
    $i++;
}
$i = $i - 2;
echo "<a href=\"$hladresa/zapamatovane-objekty/\" title=\"Oblíbené chaty\"><span class=\"glyphicon glyphicon-heart\" aria-hidden=\"true\"></span>Oblíbené chaty ($i)</a>";
?>      
        </div>
        <div class="container">
            <div id="wrapper">
                <div id="header">
                    <div class="header-logo">
                        <a href="<?php echo "$hladresa/"; ?>" title="Úvodní stránka"><img src="<?php echo "$hladresa/"; ?>img/logo.png" width="129" height="60" /></a>
                    </div>
                    <div class="header-slogan hidden-xs hidden-sm hidden-md">
                        <h1><a href="<?php echo "$hladresa/"; ?>" title="Úvodní stránka">Chaty a chalupy k pronajmutí v ČR a SR</a></h1>
                    </div>
                    <div class="header-social hidden-xs hidden-sm hidden-md">
                        <a href="https://www.facebook.com/zars.cz" target="_blank"><img src="<?php echo "$hladresa/"; ?>img/facebook.png" width="35" height="35" /></a>
                    </div>

                </div>
                                           
                                <div class="hidden-xs banner">
                                    <b>Objednejte si dovolenou LÉTO 2017 s předstihem a využijte hned tří výhod - do konce roku zaplatíte zálohu pouze 10%, vyberete si z atraktivní nabídky ještě volných nejoblíbenějších chat a chalup, dovolenou můžete svým blízkým věnovat k vánocům:)</b> Požadavek na zálohu 10% napište do objednávky pobytu.
                    </div>
                    
                <nav class="navbar navbar-default">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a href="#" class="btn btn-secondary navbar-btn search-btn hidden-sm hidden-md hidden-lg"><span class="glyphicon glyphicon-search"></span></a>
                            <a href="http://zars.cz/hledat-podle-mapy/" class="btn btn-secondary navbar-btn hidden-sm hidden-md hidden-lg"><span class="glyphicon glyphicon-map-marker"></span></a>

                        </div>
                        <div class="collapse navbar-collapse" id="navbar-collapse">
                            <ul class="nav navbar-nav">
                                <li><a href="<?php echo "$hladresa"; ?>" title="Úvodní stránka">Úvod</a></li>
                                <li><a href="<?php echo "$hladresa/akcni-nabidka/"; ?>" title="Akce">Akce</a></li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Tematické výběry <span class="caret"></span></a>
                                    <ul class="dropdown-menu" role="menu">
<?php
$i = 1;
$vypis = "SELECT * FROM tematickevybery where h='1' order by poradi";
$akce = mysql_query($vypis, $spoj);
while ($row = mysql_fetch_object($akce)) {
    echo "<li><a href=\"$hladresa/$row->kod/\" title=\"$row->nazev\">$row->tlacitko</a></li>";
    if ($i == 4) {
        echo "<li class=\"divider\"></li>";
    }
    $i++;
}
?> 
                                        <li class="divider"></li>
                                        <li><a href="<?php echo "$hladresa/nove-zarazeno-v-nabidce/"; ?>" class="featured">Nově zařazeno v nabídce</a></li>

                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Informace <span class="caret"></span></a>
                                    <ul class="dropdown-menu" role="menu">
<?php
echo "<li><a href=\"$hladresa/o-nas/\" title=\"O nás\" >O nás</a></li>";
echo "<li><a href=\"$hladresa/caste-dotazy/\" title=\"O nás\" >Časté dotazy</a></li>";

$vypis = "SELECT * FROM slozky where h='1' ORDER BY poradi ASC";
$akce = mysql_query($vypis, $spoj);
while ($row = mysql_fetch_object($akce)) {
    if ($row->archiv == 1) {
        echo "<li><a href=\"$hladresa/$row->kod/\" title=\"$row->nazev\" >$row->nazev</a></li>";
    }
}
?>                

                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Pro ubytovatele <span class="caret"></span></a>
                                    <ul class="dropdown-menu" role="menu">




<?php
echo "

<li><a href=\"$hladresa/nabidnete-svou-chatu-k-pronajmu/\" title=\"O nás\" >Nabídněte svou chatu k pronájmu</a></li>
<li><a href=\"$hladresa/informace-o-spolupraci/\" title=\"Informace o spoluprácí\" >Informace o spoluprácí</a></li>
<li class=\"divider\"></li>
<li><a href=\"$hladresa/vstup-pro-partnery/\" title=\"Přihlášení pro majitele\" >Přihlášení pro majitele<span class=\"glyphicon glyphicon-lock text-muted pull-right\" aria-hidden=\"true\"></span></a></li>
";
?>                  
                                    </ul>
                                </li>
                <?php echo "<li><a href=\"$hladresa/kontakt/\" title=\"Kontakt\" >Kontakt</a></li>"; ?>
                <?php echo "<li><a href=\"$hladresa/clanky-a-rady/\" title=\"Články a rady\" >Články a rady</a></li>"; ?>
                            </ul>  
                            <!-- NEW-DETAIL START -->
                            <div class="navbar-buttons">
                                <a href="#" class="btn btn-secondary navbar-btn search-btn hidden-xs"><span class="glyphicon glyphicon-search"></span><span class="hidden-sm hidden-md"> Hledat</span></a>

<?php
if ($prihlaseni == '1') {
    echo "<a href=\"$hladresa/prihlasen/\" class=\"btn btn-secondary navbar-btn\" title=\"Menu majitele\">Menu majitele</a>";
} else {
    echo "<a href=\"$hladresa/hledat-podle-mapy/\" class=\"btn btn-secondary navbar-btn hidden-xs\"><span class=\"glyphicon glyphicon-map-marker\"></span><span class=\"hidden-sm hidden-md\"> Hledat podle mapy</span></a>";
}
?>

                            </div>
                        </div>
                        <div class="navbar-footer">
                            <form action="http://zars.cz/hledat-ubytovani/" method="get" class="navbar-form navbar-right hidden-sm hidden-md" role="search" >
                                <input type="hidden" name="oblast" value="0" />
                                <input type="hidden" name="termin" value="0" />
                                <input type="hidden" name="pocet" value="0" />
                                <input type="hidden" name="cislo"  value="" />
                                <input type="hidden" name="mistnosti" value="" />
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" name="fulltext" class="form-control" placeholder="Hledat ...">
                                        <span class="input-group-btn">
                                            <button class="btn btn-secondary" type="submit"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                                        </span>                 
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- NEW-DETAIL END -->
                    </div>
                </nav>


<?php
if ($stranka == null) {      // vse co je na uvodu
    ?>


                    <div id="jumbotron">
<!--                            <div class="row">
                                <div class="col-xs-12">
                        <p>Objednejte si dovolenou LÉTO 2017 s předstihem a využijte hned tří výhod - do konce roku zaplatíte zálohu pouze 10%, vyberete si z atraktivní nabídky ještě volných nejoblíbenějších chat a chalup, dovolenou můžete svým blízkým věnovat k vánocům:)</p>
<p>Požadavek na zálohu 10% napište do objednávky pobytu.</p>
                    </div>
                        </div>-->
                        <div class="row">
                            <div class="col-lg-7">
                                <div id="jumbotron-carousel" class="carousel slide" data-ride="carousel">
                                    <ol class="carousel-indicators">
    <?php
    $pom = 0;
    $i = 1;
    $vypis = "SELECT * FROM flash where zobrazit=1 order by poradi";
    $akce = mysql_query($vypis, $spoj);
    while ($row = mysql_fetch_object($akce)) {
        if ($pom == 0) {
            echo "<li data-target=\"#jumbotron-carousel\" data-slide-to=\"0\" class=\"active\"></li>";
            $pom = 1;
        } else {
            echo "<li data-target=\"#jumbotron-carousel\" data-slide-to=\"$i\"></li>";
        }
        $i++;
    }
    ?>
                                    </ol>
                                    <div class="carousel-inner" role="listbox">
                                                        <?php
                                                        $pom = 0;
                                                        $vypis = "SELECT * FROM flash flash where zobrazit=1 order by poradi";
                                                        $akce = mysql_query($vypis, $spoj);
                                                        while ($row = mysql_fetch_object($akce)) {
                                                            if ($pom == 0) {
                                                                echo "<div class=\"item active\">";
                                                                $pom = 1;
                                                            } else {
                                                                echo "<div class=\"item\">";
                                                            }
                                                            echo "<a href=\"$row->adresa\" title=\"$row->text\"><img src=\"http://zars.cz/flash/$row->obrazek\" alt=\"$row->text\" /></a>
                    <div class=\"carousel-caption\">
                      <p>$row->text</p>
                    </div>
                  </div>";
                                                        }
                                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div id="jumbotron-search-form">
                                    <h3>Základní vyhledávání chat a chalup</h3>
                                    <form action="http://zars.cz/hledat-ubytovani/" method="get">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Země</label>
                                                    <select name="zeme" class="form-control" id="country">
                                                        <option value="cesko">Celá ČR</option>
                                                        <option value="slovensko">Celá SR</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="form-group">
                                                    <label>Oblast</label>
                                                    <select name="oblast" class="form-control" id="region"> 
                                                        <option class="cesko" value="0">Celá ČR</option>
                                                        <option class="slovensko" value="0">Celá SR</option>
                                            <?php
                                            $vypis = "SELECT * FROM lokality where (lokality.id>60 and lokality.id<90) or (lokality.id>95 and lokality.id<98) ";
                                            $akce = mysql_query($vypis, $spoj);
                                            while ($row = mysql_fetch_object($akce)) {
                                                echo "<option class=\"cesko\" value=\"$row->id\">$row->nazev</option>";
                                            }
                                            $vypis = "SELECT * FROM lokality where lokality.id>89 and lokality.id<96";
                                            $akce = mysql_query($vypis, $spoj);
                                            while ($row = mysql_fetch_object($akce)) {
                                                echo "<option class=\"slovensko\" value=\"$row->id\">$row->nazev</option>";
                                            }
                                            ?>
                                                    </select>

                                                </div>
                                            </div>
                                        </div>




                                        <div class="form-group">
                                            <label>Termín</label>

    <?php
    echo "<select class=\"form-control\" name=\"termin\">";
    echo "<option value=\"0\">Vyberte ze seznamu ...</option>";
    $vypis = "SELECT * FROM terminy where archiv = '0' ORDER BY  `terminy`.`od` ASC ";
    $akce = mysql_query($vypis, $spoj);
    while ($row = mysql_fetch_object($akce)) {
        if ($dnesni < $row->do) {
            $d = substr($row->od, 8, 2);
            $m = substr($row->od, 5, 2);
            $r = substr($row->od, 0, 4);

            $do = substr($row->do, 8, 2);
            $mo = substr($row->do, 5, 2);
            $ro = substr($row->do, 0, 4);



            $vypis2 = "SELECT * FROM terminytyp where id = '$row->idtyp'";
            $akce2 = mysql_query($vypis2, $spoj);
            while ($row2 = mysql_fetch_object($akce2)) {
                $nazev = $row2->nazev;
            }


            echo "<option value=\"$row->id\">$d. $m $r - $do. $mo $ro - $nazev</option>";
        }
    }



    echo "</select>";
    ?>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Počet osob</label>
                                                    <select class="form-control" name="pocet">
                                                        <option value="0">Nerozhoduje</option>
                                                        <option value="1"> 1 až 8 </option>
                                                        <option value="2"> 9 až 15 </option>
                                                        <option value="3"> 16 a více </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Počet ložnic</label>
                                                    <select class="form-control" name="mistnosti">
                            <?php
                            echo "<option value=\"\">nerozhoduje</option>";
                            for ($c = 1; $c < 10; $c++) {
                                echo "<option value=\"$c\"> $c </option>";
                            }
                            ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                  
                  <!--<div class="row">
                    <div class="col-lg-12">
                      <label class="checkbox-inline">
                        <input type="checkbox" name="pes" value="1" > Pes
                      </label>
                      <label class="checkbox-inline">
                        <input type="checkbox" name="oploceni" value="1" > Oplocení
                      </label>
                      <label class="checkbox-inline">
                        <input type="checkbox" name="wifi" value="1" > Wifi
                      </label>
                      <label class="checkbox-inline">
                        <input type="checkbox" name="bazen" value="1" > Bazén
                      </label>
                      <label class="checkbox-inline">
                        <input type="checkbox" name="rybareni" value="1" > Rybaření
                      </label>
                    </div>
                  </div>-->
                      
                                        <div class="text-center">
                                            <input type="submit" class="btn btn-primary" name="tlacitko" value="Hledat" />
                                        </div>
                                        <div class="text-center">
                                            <a href="<?php echo "$hladresa/hledat-podle-mapy/"; ?>" title="Hledat podle mapy ČR a SR" class="btn btn-link">Hledat podle mapy ČR a SR</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="categories">
                        <div class="row">
                            <?php
                            $i = 1;
                            $vypis = "SELECT * FROM okna order by poradi asc limit 6";
                            $akce = mysql_query($vypis, $spoj);
                            while ($row = mysql_fetch_object($akce)) {
                                echo "<div class=\"col-xs-12 col-sm-6 col-md-3 col-lg-2\">
              <div class=\"panel panel-";


                                if ($i == '1') {
                                    echo "blue";
                                } else if ($i == '2') {
                                    echo "brown";
                                } else if ($i == '3') {
                                    echo "green";
                                } else if ($i == '4') {
                                    echo "vine";
                                } else if ($i == '5') {
                                    echo "night";
                                } else if ($i == '6') {
                                    echo "yellow";
                                }
                                $i++;
                                echo "\">";
                                echo "<div class=\"panel-heading\"><a href=\"$hladresa/$row->kod/\" title=\"$row->newnazev\">$row->newnazev</a></div>
                <div class=\"panel-body hidden-xs\">
                  <a href=\"$hladresa/$row->kod/\" title=\"$row->newnazev\"><img src=\"img/categories/$row->id.jpg\" class=\"img-responsive\" alt=\"$row->newnazev\" /></a>
                </div>
              </div>
            </div>";
                            }
                            ?>

                        </div>
                    </div>
                            <?php
                            include 'recenze-uvod.php';
                            ?>        
                    <div id="featuredGallery">
                        <h4>Akční nabídky chat a chalup</h4>


                        <div class="row">

                            <?php
                            $vypis2 = "SELECT * FROM  objekty, akcninabidka Where objekty.id=akcninabidka.cid and akcninabidka.h=1 ORDER BY `poradi`";

                            $akce2 = mysql_query($vypis2, $spoj);
                            while ($row2 = mysql_fetch_object($akce2)) {

                                if ($den <= $row2->datumdo) {
                                    if (1 == $row2->referencni) { /* vypis pouze referencnich na hlavni stranu */
                                        $akcee = 1;




                                        $vypis4 = "SELECT * FROM zeme where id='$row2->zeme' ";
                                        $akce4 = mysql_query($vypis4, $spoj);
                                        while ($row4 = mysql_fetch_object($akce4)) {
                                            $zemen = $row4->nazev;
                                            $zemek = $row4->kod;
                                        }

                                        $vypis4 = "SELECT * FROM lokality where id='$row2->lokalita' ";
                                        $akce4 = mysql_query($vypis4, $spoj);
                                        while ($row4 = mysql_fetch_object($akce4)) {
                                            $lokalitan = $row4->nazev;
                                            $lokalitak = $row4->kod;
                                        }

                                        $vypis4 = "SELECT * FROM okresy where id='$row2->okresy' ";
                                        $akce4 = mysql_query($vypis4, $spoj);
                                        while ($row4 = mysql_fetch_object($akce4)) {
                                            $okresn = $row4->nazev;
                                            $okresk = $row4->kod;
                                        }


                                        $vypis = "SELECT * FROM mistnosti where cid='$row2->cid' ";
                                        $akce = mysql_query($vypis, $spoj);
                                        while ($x = mysql_fetch_array($akce)) {
                                            $luzka = $x[9] + $x[19] + $x[29] + $x[39] + $x[49] + $x[59] + $x[69] + $x[79] + $x[89] + $x[99] + $x[109] + $x[119];
                                            $pristylky = $x[10] + $x[20] + $x[30] + $x[40] + $x[50] + $x[60] + $x[70] + $x[80] + $x[90] + $x[100] + $x[110] + $x[120];
                                            $kapacita = $luzka + $pristylky;
                                        }


                                        $vypis3 = "SELECT * FROM akcninabidka where cid=$row2->cid order by id desc limit 1";
                                        $akce3 = mysql_query($vypis3, $spoj);

                                        while ($row3 = mysql_fetch_object($akce3)) {
                                            $akcnitext = strip_tags($row3->text);
                                            $akcnitext = substr("$akcnitext", 0, 150);
                                        }


                                        Echo "
            <div class=\"col-md-3 col-sm-6\">
              <div class=\"thumbnail\">";

                                        $vypis3 = "SELECT * FROM fotky where cid=$row2->cid order by poradi limit 1";
                                        $akce3 = mysql_query($vypis3, $spoj);

                                        while ($row3 = mysql_fetch_object($akce3)) {
                                            echo "<a href=\"$hladresa/$lokalitak/$zemek/$okresk/$row2->kod-$row2->cislo/\" title=\"Detail - $row2->nazev - $row2->cislo\"><img src=\"$lokalniadresa/nahledy/$row3->adresa\" title=\"$row2->nazev\" /></a>";
                                        }
                                        echo "             
                <div class=\"caption\">
                  <h4 class=\"title\"><a href=\"$hladresa/$lokalitak/$zemek/$okresk/$row2->kod-$row2->cislo/\" title=\"Detail - $row2->nazev - $row2->cislo\">$row2->nazev <span class=\"cislo\">$row2->cislo</span><br />$lokalitan</a></h4>
                  <p>$akcnitext</p>
                  <ul class=\"list-unstyled\">  ";
                                        $d = substr($row2->datum, 8, 2);
                                        $m = substr($row2->datum, 5, 2);
                                        $r = substr($row2->datum, 0, 4);
                                        echo "     <li><span class=\"glyphicon glyphicon-time\"></span> Přidáno: $d.$m.$r</li> 
                    <li><span class=\"glyphicon glyphicon-user\"></span> $luzka lůžka + $pristylky přistýlky</li>   
                  </ul>
                  <a href=\"$hladresa/$lokalitak/$zemek/$okresk/$row2->kod-$row2->cislo/\" title=\"Detail - $row2->nazev - $row2->cislo\" class=\"btn btn-primary btn-block\">
                    <small>ZOBRAZIT</small><br>
                  </a>
                </div>
              </div>
            </div>
        ";
                                    }
                                } else {

                                    /* akce mimo datum posunuti do archivu */
                                    $pridej = "UPDATE akcninabidka SET `archiv` = '1' WHERE id='$row2->id'";
                                    $databaze = mysql_query($pridej, $spoj);

                                    /* opetovne serazeni akci */

                                    $vypis = "SELECT * FROM akcninabidka where archiv <>1 ORDER BY `poradi` ";
                                    $akce = mysql_query($vypis, $spoj);
                                    while ($row = mysql_fetch_object($akce)) {
                                        if (($row2->poradi < $row->poradi)) {

                                            $cislo = $row->poradi - 1;
                                        }
                                    }

                                    $vypis = "SELECT * FROM akcninabidka where archiv <>1 ORDER BY `poradi` ";
                                    $akce = mysql_query($vypis, $spoj);

                                    while ($row = mysql_fetch_object($akce)) {
                                        if ($row->poradi == $row->poradi) {
                                            $cislo = $row->poradi;
                                        }

                                        if ($aktualni < $row->poradi) {

                                            $pridej = "UPDATE `akcninabidka` SET  `poradi` = '$cislo' WHERE `id`='$row->id'";
                                            $databaze = mysql_query($pridej, $spoj);

                                            $cislo++;
                                        }
                                    }
                                }
                            }
                            ?>     



                        </div>
                        <div class="hidden-xs text-center"><a href="#" class="btn btn-default">Zobrazit kompletní nabídku akčních chat a chalup</a></div>
                        <div class="hidden-sm hidden-md hidden-lg text-center"><a href="#" class="btn btn-default">Zobrazit kompletní nabídku<br />akčních chat a chalup</a></div>
                    </div>
                    <div id="seo">
<strong>Chaty a chalupy k pronajmutí</strong> 
<p>Hledáte to pravé místo pro vaši dovolenou? Rádi byste našli chatu nebo chalupu, která vám poskytne vytoužený odpočinek v přírodě i náležitý komfort? V tom případě jsme tu právě pro vás.</p> 
<p>Přinášíme vám široký výběr chat a chalup k pronajmutí, ve všech oblastech naší republiky i na Slovensku. Můžete tak vybírat podle sympatií, nebo si nejprve zvolit lokalitu, kam byste chtěli jet. Velikou výhodou je možnost výběru podle různých požadavků, díky kterému velmi rychle najdete to, co hledáte. Váš výběr tak můžete zaměřit na dovolené pro rybáře, chaty v blízkosti vody, chalupy s vlastním bazénem, tu nejlepší dovolenou s dětmi, či možnost ubytování s domácím mazlíčkem.</p> 
<p>Máme pro vás ten nejširší výběr chat a chalup v ČR i na Slovensku přehledně na jednom místě. Vyberte si dovolenou přesně podle svého gusta, s mnoha výhodami.<br /> Přinášíme vám:</p>
<ul> 
<li>ceny bez navýšení - nezaplatíte o nic víc, než byste zaplatili přímo u majitele objektu</li> 
<li>možnost nákupu dovolené snadno a rychle on-line</li> 
<li>všechny potřebné informace zjišťujeme namísto vás</li> 
<li>vysoká kvalita a spolehlivost, díky více než 25 letým zkušenostem</li> 
<li>přehledné popisy objektů a fotogalerie, vše aktualizované přímo majiteli objektů</li> 
<li>98% kladných hodnocení od zákazníků</li> 
</ul>
                    
                        <div class="text-center">
                            <h5>Pronájem chat a chalup - výběr dle oblasti</h5>
                            <p>Hledejte pronájem chaty a chalupy, apartmány, sruby, roubenky nebo ubytování v těchto lokalitách:</p>
                    <?php
                    $vypis = "SELECT * FROM lokality ORDER BY  `lokality`.`nazev` ASC";
                    $akce = mysql_query($vypis, $spoj);

                    while ($row = mysql_fetch_object($akce)) {
                        $vypis2 = "SELECT * FROM zeme where id=$row->zeme";
                        $akce2 = mysql_query($vypis2, $spoj);
                        while ($row2 = mysql_fetch_object($akce2)) {
                            $kodzeme = $row2->kod;
                        }

                        echo "<a href=\"$hladresa/$row->kod/$kodzeme/\" title=\"$row->nazev\">$row->nazev</a>,";
                    }
                    ?>  


                        </div>
                    </div>
                    <div id="social">
                        <div class="text-center">
                            <div id="container" style="width:100%;">
                                <div class="fb-like-box" data-href="https://www.facebook.com/zars.cz" data-height="180" data-width="1110" data-colorscheme="light" data-show-faces="true" data-header="false" data-stream="false" data-show-border="false"></div>
                            </div>
                        </div>
                    </div>

                    <?php
                }
                // konec uvodu

                echo "<div id=\"content\" class=\"cottage-detail\">";

                $adresa = substr($stranka, 0, 7);

                if ($adresa == 'recenze') {
                    include 'recenze-formular.php';
                }

                $adresa = substr($stranka, 0, 8);
                if ($adresa == 'frecenze') {        
                    include 'frecenze-formular.php';       
                }
                
                 $adresa = substr($stranka, 0, 6); 
                if ($adresa == 'clanky') {        
                    include 'blog.php';       
                }


                if ($stranka == 'hledat-ubytovani') {
                    include 'hledat-ubytovani.php';
                }

                if ($stranka == "odhlaseni") { /* registrace */

                    echo "Nyní jste odhlášení";
                }

                if ($stranka == "prihlaseniterminy") { /* Prihlasovani terminu pres primy proklik */

                    include 'prihlaseniterminy.php';
                }


                if ($stranka == "novinky-na-email") { /* registrace */

                    include 'novinky-na-email.php';
                }


                if ($stranka == "objednavka") { /* registrace */

                    include 'objednavka.php';
                }

                if ($stranka == "registraceprodejce") { /* registrace */

                    include 'prodejce.php';
                }

                if ($stranka == "registracemajitele") { /* registrace */

                    include 'majitel.php';
                }

                if ($stranka == "nabidnete-svou-chatu-k-pronajmu") { /* reg chaty */

                    include 'vlozit-chatu.php';
                }

                if ($stranka == "vstup-pro-partnery") { /* registrace */

                    include 'vstup-pro-partnery.php';
                } else {
                    $vstup = 1;
                }

                if ($stranka == "prihlaseni") { /* registrace */

                    include 'prihlaseni.php';
                }

                include 'prihlasen.php';


                /*                 * ****** menu ******* */
                $vypis = "SELECT * FROM slozky ";
                $akce = mysql_query($vypis, $spoj);
                while ($row = mysql_fetch_object($akce)) {
                    if ($stranka == $row->kod) {
                        echo "       <ol class=\"breadcrumb\">
            <li><a href=\"http://zars.cz/\" title=\"Úvod\">Úvod</a></li>
            <li class=\"active\">$row->nazev</li>
            </ol>";
                        echo "<div id=\"orderPage\">";
                        echo "<h4>$row->nazev</h4>$row->text";
                        echo "</div>";
                    }
                }



                include 'informace.php';

                if ($stranka == "o-nas") {
                    $vypis = "SELECT * FROM onas ";
                    $akce = mysql_query($vypis, $spoj);
                    while ($row = mysql_fetch_object($akce)) {
                        echo "       <ol class=\"breadcrumb\">
            <li><a href=\"http://zars.cz/\" title=\"Úvod\">Úvod</a></li>
            <li class=\"active\">O nás</li>
            </ol>";
                        echo "<div id=\"orderPage\">";
                        echo "<h4>O nás</h4>$row->text";
                        echo "</div>";
                    }
                }

                if ($stranka == "caste-dotazy") {
                    $vypis = "SELECT * FROM faq ";
                    $akce = mysql_query($vypis, $spoj);
                    while ($row = mysql_fetch_object($akce)) {
                        echo "       <ol class=\"breadcrumb\">
            <li><a href=\"http://zars.cz/\" title=\"Úvod\">Úvod</a></li>
            <li class=\"active\">Časté dotazy</li>
            </ol>";
                        echo "<div id=\"orderPage\">";
                        echo "<h4>Časté dotazy</h4>$row->text";
                        echo "</div>";
                    }
                }

                if ($stranka == "informace-o-spolupraci") {
                    $vypis = "SELECT * FROM `slozky-staticke` where id=3";
                    $akce = mysql_query($vypis, $spoj);
                    while ($row = mysql_fetch_object($akce)) {
                        echo "       <ol class=\"breadcrumb\">
            <li><a href=\"http://zars.cz/\" title=\"Úvod\">Úvod</a></li>
            <li class=\"active\">Informace o spolupráci</li>
            </ol>";
                        echo "<div id=\"orderPage\">";
                        echo "<h4>Informace o spolupráci</h4>$row->text";
                        echo "</div>";
                    }
                }

                if ($stranka == "kontakt") {
                    ?>
                    <ol class="breadcrumb">
                        <li><a href="http://zars.cz/" title="Úvod">Úvod</a></li>
                        <li class="active">Kontakt</li>
                    </ol>
                    <div id="orderPage">
                        <h4>Kontakt</h4>
                        <div class="row" style="margin: 30px;">
                            <div class="col-md-3 text-center">
                                <h3><span class="glyphicon glyphicon-earphone"></span> TELEFON</h3>
                                <p>608 775 582 | 595 171 819</p>
                            </div>
                            <div class="col-md-3 text-center">
                                <h3><span class="glyphicon glyphicon-envelope"></span> E-MAIL</h3>
                                <p>info-zars@email.cz</p>
                            </div>
                            <div class="col-md-3 text-center">
                                <h3><span class="glyphicon glyphicon-home"></span> POŠTA</h3>
                                <p>ZARS, Ing.Tuza s.r.o,<br />Jičínská 543, 742 58 Příbor</p>
                            </div>
                            <div class="col-md-3 text-center">
                                <h3><span class="glyphicon glyphicon-globe"></span> WWW</h3>
                                <p>www.zars.cz</p>
                            </div>
                            <div class="col-md-12">
                                <div class="well text-center" style="margin-top: 20px;">
                                    Potřebujete poradit nebo získat podrobnější informace k pronájmu rekreačních chat a chalup? Neváhejte nás kontaktovat, rádi Vám pomůžeme.
                                </div>
                            </div>
                            <div class="col-md-12">
                                <h3 class="text-center"><a href="http://zars.cz/" title="ZARS - Dovolená Hezky Česky ®">ZARS - Dovolená Hezky Česky ®</a></h3>
                                <p class="text-center">IČO: 27810071</p>
                            </div>
                        </div>
    <?php
}

if ($stranka == "hledat-podle-mapy") {
    ?>
                        <div id="content">
                            <ol class="breadcrumb">
                                <li><a href="http://zars.cz/">Úvod</a></li>
                                <li class="active">Výběr dle mapy</li>
                            </ol>
                            <div id="orderPage">
                                <h4>Výběr dle mapy</h4>
                                <div>
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li role="presentation" class="active"><a href="#oblasti-cr" aria-controls="oblasti-cr" role="tab" data-toggle="tab">Oblasti ČR</a></li>
                                        <li role="presentation"><a href="#kraje-cr" aria-controls="kraje-cr" role="tab" data-toggle="tab">Kraje ČR</a></li>
                                        <li role="presentation"><a href="#oblasti-sr" aria-controls="oblasti-sr" role="tab" data-toggle="tab">Oblasti SR</a></li>
                                    </ul>
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane fade in active" id="oblasti-cr">
                                            <div class="row">
                                                <div class="col-lg-6 text-center">
                                                    <object type="application/x-shockwave-flash" data="http://zars.cz/flash/mapa_oblasti.swf" width="550" height="290" style="margin-bottom: 30px;"> 
                                                        <param name="movie" value="http://zars.cz/flash/mapa_oblasti.swf"> 
                                                    </object>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="well">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <ul class="list-unstyled">
                                                                    <li><a href="<?php echo "$hladresa"; ?>/karlovarsky-kraj/zapadoceske-lazne/" title="Západočeské lázně">1. Západočeské lázně</a></li>
                                                                    <li><a href="<?php echo "$hladresa"; ?>/plzensky-kraj/cesky-les-a-plzensko/" title="Český les a Plzeňsko">2. Český les a Plzeňsko</a></li>
                                                                    <li><a href="<?php echo "$hladresa"; ?>/jihocesky-kraj/sumava-a-posumavi-a-lipno/" title="Šumava, Pošumaví a Lipno">3. Šumava, Pošumaví a Lipno</a></li>
                                                                    <li><a href="<?php echo "$hladresa"; ?>/jihocesky-kraj/jizni-cechy/" title="Jižní Čechy">4. Jižní Čechy</a></li>
                                                                    <li><a href="<?php echo "$hladresa"; ?>/stredocesky-kraj/stredni-povltavi/" title="Střední Povltaví">5. Střední Povltaví</a></li>
                                                                    <li><a href="<?php echo "$hladresa"; ?>/stredocesky-kraj/povodi-berounky/" title="Povodí Berounky">6. Povodí Berounky</a></li>
                                                                    <li><a href="<?php echo "$hladresa"; ?>/stredocesky-kraj/dzban-a-podripsko/" title="Džbán a Podřipsko">7. Džbán a Podřipsko</a></li>
                                                                    <li><a href="<?php echo "$hladresa"; ?>/krusne-hory/ustecky-kraj/" title="Krušné hory">8. Krušné hory</a></li>
                                                                    <li><a href="<?php echo "$hladresa"; ?>/ustecky-kraj/ceske-stredohori/" title="České středohoří">9. České středohoří</a></li>
                                                                    <li><a href="<?php echo "$hladresa"; ?>/ustecky-kraj/ceske-svycarsko/" title="České Švýcarsko">10. České Švýcarsko</a></li>
                                                                    <li><a href="<?php echo "$hladresa"; ?>/luzicke-hory/liberecky-kraj/" title="Lužické hory">11. Lužické hory</a></li>
                                                                    <li><a href="<?php echo "$hladresa"; ?>/liberecky-kraj/jizerske-hory/" title="Jizerské hory">12. Jizerské hory</a></li>
                                                                    <li><a href="<?php echo "$hladresa"; ?>/liberecky-kraj/cesky-raj-a-ralsko/" title="Český ráj a Ralsko">13. Český ráj a Ralsko</a></li>
                                                                    <li><a href="<?php echo "$hladresa"; ?>/kralovehradecky-kraj/krkonose-a-podkrkonosi/" title="Krkonoše a Podkrkonoší">14. Krkonoše a Podkrkonoší</a></li>
                                                                    <li><a href="<?php echo "$hladresa"; ?>/kralovehradecky-kraj/broumovsko-a-nachodsko/" title="Broumovsko a Náchodsko">15. Broumovsko a Náchodsko</a></li>
                                                                    <li><a href="<?php echo "$hladresa"; ?>/orlicke-hory-a-podorlicko/pardubicky-kraj/" title="Orlické hory a Podorlicko">16. Orlické hory a Podorlicko</a></li>
                                                                </ul>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <ul class="list-unstyled">
                                                                    <li><a href="<?php echo "$hladresa"; ?>/stredocesky-kraj/polabi-a-zelezne-hory/" title="Polabí a Železné hory">17. Polabí a Železné hory</a></li>
                                                                    <li><a href="<?php echo "$hladresa"; ?>/stredocesky-kraj/posazavi/" title="Posázaví">18. Posázaví</a></li>
                                                                    <li><a href="<?php echo "$hladresa"; ?>/vysocina/ceskomoravska-vrchovina/" title="Českomoravská vrchovina">19. Českomoravská vrchovina</a></li>
                                                                    <li><a href="<?php echo "$hladresa"; ?>/jihomoravsky-kraj/jizni-morava-a-slovacko/" title="Jižní Morava a Slovácko">20. Jižní Morava a Slovácko</a></li>
                                                                    <li><a href="<?php echo "$hladresa"; ?>/moravsky-kras--drahanska-vrchovina/olomoucky-kraj/" title="Moravský kras, Drahanská vrchovina">21. Moravský kras, Drahanská vrchovina</a></li>
                                                                    <li><a href="<?php echo "$hladresa"; ?>/olomoucky-kraj/hana-a-oderske-vrchy/" title="Haná a Oderské vrchy">22. Haná a Oderské vrchy</a></li>
                                                                    <li><a href="<?php echo "$hladresa"; ?>/moravskoslezsky-kraj/jeseniky/" title="Jeseníky">23. Jeseníky</a></li>
                                                                    <li><a href="<?php echo "$hladresa"; ?>/moravskoslezsky-kraj/valassko-a-beskydy/" title="Valašsko a Beskydy">24. Valašsko a Beskydy</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div role="tabpanel" class="tab-pane fade" id="kraje-cr">
                                            <div class="row">
                                                <div class="col-lg-6 text-center">
                                                    <object type="application/x-shockwave-flash" data="http://zars.cz/flash/ceska-republika.swf" width="550" height="290" style="margin-bottom: 30px;"> 
                                                        <param name="movie" value="http://zars.cz/flash/ceska-republika.swf"> 
                                                    </object>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="well">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <ul class="list-unstyled">
    <?php
    $vypis = "SELECT * FROM zeme ORDER BY nazev asc limit 0,7";
    $akce = mysql_query($vypis, $spoj);
    while ($row = mysql_fetch_object($akce)) {
        echo "<li><a href=\"$hladresa/$row->kod/\" title=\"$row->nazev\">$row->nazev</a></li>";
    }
    ?>
                                                                </ul>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <ul class="list-unstyled">
    <?php
    $vypis = "SELECT * FROM zeme ORDER BY nazev asc limit 7,7";
    $akce = mysql_query($vypis, $spoj);
    while ($row = mysql_fetch_object($akce)) {
        echo "<li><a href=\"$hladresa/$row->kod/\" title=\"$row->nazev\">$row->nazev</a></li>";
    }
    ?>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div role="tabpanel" class="tab-pane fade" id="oblasti-sr">
                                            <div class="row">
                                                <div class="col-lg-6 text-center">
                                                    <object type="application/x-shockwave-flash" data="http://zars.cz/flash/slovenska-republika.swf" width="550" height="290" style="margin-bottom: 30px;"> 
                                                        <param name="movie" value="http://zars.cz/flash/slovenska-republika.swf"> 
                                                    </object>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="well">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <ul class="list-unstyled">
                                                                    <li><a href="<?php echo "$hladresa"; ?>/jizni-a-zapadni-slovensko/slovensko/" title="Jižní a západní Slovensko">25. Jižní a západní Slovensko</a></li>
                                                                    <li><a href="<?php echo "$hladresa"; ?>/stredni-slovensko/slovensko/" title="Střední Slovensko">26. Střední Slovensko</a></li>
                                                                    <li><a href="<?php echo "$hladresa"; ?>/velka-a-mala-fatra/slovensko/" title="Velká a Malá Fatra">27. Velká a Malá Fatra</a></li>
                                                                    <li><a href="<?php echo "$hladresa"; ?>/orava/slovensko/" title="Orava">28. Orava</a></li>

                                                                </ul>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <ul class="list-unstyled">
                                                                    <li><a href="<?php echo "$hladresa"; ?>/vysoke-a-nizke-tatry/slovensko/" title="Vysoké a Nízké Tatry">29. Vysoké a Nízké Tatry</a></li>
                                                                    <li><a href="<?php echo "$hladresa"; ?>/slovensky-raj/slovensko/" title="Slovenský ráj">30. Slovenský ráj</a></li>
                                                                    <li><a href="<?php echo "$hladresa"; ?>/vychodni-slovensko/slovensko/" title="Východní Slovensko">31. Východní Slovensko</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <?php
                    }





                    if ($stranka == 'poslat-odkaz') {

                        $emailprijemce = $_POST["emailprijemce"];
                        $emailodesilatel = $_POST["emailodesilatel"];
                        $jmeno = $_POST["jmeno"];
                        $text = $_POST["text"];


                        if ($emailprijemce != null) {
                            //   funkce e-mail   nacteni funkci
                            require("functions.php");
                            include("class.html.mime.mail.inc");


//     email start

                            $from = $emailodesilatel;
                            $komu = $emailprijemce;
                            $predmet = 'www.zars.cz';


                            $text = "          
Dobrý den:<br />
<br />
Uživatel: $jmeno s e-mailovou adresou: $emailodesilatel, Vám zasílá:<br /><br />
$text 
";

                            $hlavicka = "From:.$from.";
                            $hlavicka.="Content-Type: text/html; charset=utf-8\n";
                            $email = $from;
                            $subj = $predmet;

                            $telo = "
<!DOCTYPE html>
<html>
<head>
<meta charset=\"utf-8\">
<title>$predmet</title>
</head>
<body>
$text
</body>
</html>
";

                            $mail = new html_mime_mail("X-Mailer: Html Mime Mail Class");
                            $mail->add_html($telo, "");
                            $mail->set_charset('utf-8', TRUE);
                            $mail->build_message();
                            $mail->send($komu, $komu, $email, $email, $subj, "Return-Path: $email");
                            $p++;
                            If ($mail) {
                                echo "";
                            } else {
                                echo "";
                            }




                            echo "<div class=\"detail-hlavicka\"></div><div class=\"detail-opakovani\"><div class=\"detail-okraje\">";
                            echo "<br /><h2>E-mail odeslán</h2>

<br />&nbsp;";
                            echo "</div></div><div class=\"detail-paticka\"></div>";
                        } else {

                            $adresa = $_GET["adresa"];

                            echo "<div class=\"detail-hlavicka\"></div><div class=\"detail-opakovani\"><div class=\"detail-okraje\">";
                            echo "<br /><h2>Poslat odkaz známému</h2>

 <form action=\"http://zars.cz/poslat-odkaz/\" method=\"post\" enctype=\"multipart/form-data\" NOWRAP>

 <table>
<tr><td> E-mail příjemce: </td><td><input type=\"text\" name=\"emailprijemce\" size=\"40\"  value=\"@\" /></td></tr>
<tr><td> Vaše jméno: </td><td><input type=\"text\" name=\"jmeno\" size=\"40\"  /></td></tr>
<tr><td> Váš e-mail: </td><td><input type=\"text\" name=\"emailodesilatel\" size=\"40\" value=\"@\" /></td></tr>

<tr><td> Text e-mailu:: </td><td><textarea name=\"text\" cols=\"60\" rows=\"6\"  />Váš známý Vám prostřednictvím služby Poslat odkaz známému, posílá odkaz na internetové stránky: $hladresa/$adresa/</textarea></td></tr>
                                                          
<tr><td><input  class=\"zapamatovane-objekty\" name=\"tlacitko\" type=\"submit\" value=\"Odeslat\" /></td><td></td></tr>

</table>
<input type=\"hidden\" name=\"katalog\" value=\"1\" />
</form>




<br />&nbsp;";
                            echo "</div></div><div class=\"detail-paticka\"></div>";
                        }
                    }


                    if ($stranka == "zapamatovane-objekty") {

                        echo "
<ol class=\"breadcrumb\">
<li><a href=\"http://zars.cz/\">Úvod</a></li>
<li class=\"active\">Tematický výběr: Oblíbené chaty</li>
</ol>
<div id=\"categoryGallery\"><h4>Oblíbené chaty</h4>
";

                        $patro = 14;
                        vypisobjektu($hladresa, $spoj, $zemeid, $lokalitaid, $okresyid, $patro, $osoba, $stranka, $zeme, $oblast, $termin, $pocet, $mistnosti, $vyhledat, $pes, $oploceni, $wifi, $bazen, $rybareni);
                    }



                    if ($stranka == 'chaty-a-chalupy-s-bazenem') {
                        echo "
<ol class=\"breadcrumb\">
<li><a href=\"http://zars.cz/\">Úvod</a></li>
<li class=\"active\">Tematický výběr: Chaty a chalupy s bazénem</li>
</ol>
<div id=\"categoryGallery\"><h4>Chaty a chalupy s bazénem</h4>

";

                        $patro = 4;
                        vypisobjektu($hladresa, $spoj, $zemeid, $lokalitaid, $okresyid, $patro, $osoba, $stranka, $zeme, $oblast, $termin, $pocet, $mistnosti, $vyhledat, $pes, $oploceni, $wifi, $bazen, $rybareni);
                    }

                    if ($stranka == 'chaty-a-chalupy-blizko-koupani') {
                        echo "
<ol class=\"breadcrumb\">
<li><a href=\"http://zars.cz/\">Úvod</a></li>
<li class=\"active\">Tematický výběr: Chaty a chalupy blízko koupání</li>
</ol>
<div id=\"categoryGallery\"><h4>Chaty a chalupy blízko koupání</h4>

";

                        $patro = 5;
                        vypisobjektu($hladresa, $spoj, $zemeid, $lokalitaid, $okresyid, $patro, $osoba, $stranka, $zeme, $oblast, $termin, $pocet, $mistnosti, $vyhledat, $pes, $oploceni, $wifi, $bazen, $rybareni);
                    }

                    if ($stranka == 'chaty-a-chalupy-na-horach') {
                        echo "
<ol class=\"breadcrumb\">
<li><a href=\"http://zars.cz/\">Úvod</a></li>
<li class=\"active\">Tematický výběr: Chaty a chalupy na horách</li>
</ol>
<div id=\"categoryGallery\"><h4>Chaty a chalupy na horách</h4>

";

                        $patro = 6;
                        vypisobjektu($hladresa, $spoj, $zemeid, $lokalitaid, $okresyid, $patro, $osoba, $stranka, $zeme, $oblast, $termin, $pocet, $mistnosti, $vyhledat, $pes, $oploceni, $wifi, $bazen, $rybareni);
                    }

                    if ($stranka == 'chaty-a-chalupy-s-krbem') {
                        echo "
<ol class=\"breadcrumb\">
<li><a href=\"http://zars.cz/\">Úvod</a></li>
<li class=\"active\">Tematický výběr: Chaty a chalupy s krbem</li>
</ol>
<div id=\"categoryGallery\"><h4>Chaty a chalupy s krbem</h4>

";

                        $patro = 7;
                        vypisobjektu($hladresa, $spoj, $zemeid, $lokalitaid, $okresyid, $patro, $osoba, $stranka, $zeme, $oblast, $termin, $pocet, $mistnosti, $vyhledat, $pes, $oploceni, $wifi, $bazen, $rybareni);
                    }

                    if ($stranka == 'chaty-a-chalupy-blizko-lyzovani') {
                        echo "
<ol class=\"breadcrumb\">
<li><a href=\"http://zars.cz/\">Úvod</a></li>
<li class=\"active\">Tematický výběr: Chaty a chalupy blízko lyžovaní</li>
</ol>
<div id=\"categoryGallery\"><h4>Chaty a chalupy blízko lyžovaní</h4>

";

                        $patro = 8;
                        vypisobjektu($hladresa, $spoj, $zemeid, $lokalitaid, $okresyid, $patro, $osoba, $stranka, $zeme, $oblast, $termin, $pocet, $mistnosti, $vyhledat, $pes, $oploceni, $wifi, $bazen, $rybareni);
                    }

                    if ($stranka == 'chaty-a-chalupy-s-domacim-mazlickem') {
                        echo "
<ol class=\"breadcrumb\">
<li><a href=\"http://zars.cz/\">Úvod</a></li>
<li class=\"active\">Tematický výběr: Chaty a chalupy s domácím mazlíčkem</li>
</ol>
<div id=\"categoryGallery\"><h4>Chaty a chalupy s domácím mazlíčkem</h4>

";

                        $patro = 9;
                        vypisobjektu($hladresa, $spoj, $zemeid, $lokalitaid, $okresyid, $patro, $osoba, $stranka, $zeme, $oblast, $termin, $pocet, $mistnosti, $vyhledat, $pes, $oploceni, $wifi, $bazen, $rybareni);
                    }

                    if ($stranka == 'chaty-a-chalupy-vhodne-pro-rybare') {
                        echo "
<ol class=\"breadcrumb\">
<li><a href=\"http://zars.cz/\">Úvod</a></li>
<li class=\"active\">Tematický výběr: Chaty a chalupy vhodné pro rybáře</li>
</ol>
<div id=\"categoryGallery\"><h4>Chaty a chalupy vhodné pro rybáře</h4>

";

                        $patro = 10;
                        vypisobjektu($hladresa, $spoj, $zemeid, $lokalitaid, $okresyid, $patro, $osoba, $stranka, $zeme, $oblast, $termin, $pocet, $mistnosti, $vyhledat, $pes, $oploceni, $wifi, $bazen, $rybareni);
                    }

                    if ($stranka == 'chaty-a-chalupy-na-velikonoce') {
                        echo "
<ol class=\"breadcrumb\">
<li><a href=\"http://zars.cz/\">Úvod</a></li>
<li class=\"active\">Tematický výběr: Velikonoční pobyty</li>
</ol>
<div id=\"categoryGallery\"><h4>Velikonoční pobyty</h4>

";

                        $patro = 11;
                        vypisobjektu($hladresa, $spoj, $zemeid, $lokalitaid, $okresyid, $patro, $osoba, $stranka, $zeme, $oblast, $termin, $pocet, $mistnosti, $vyhledat, $pes, $oploceni, $wifi, $bazen, $rybareni);
                    }

                    if ($stranka == 'chaty-a-chalupy-na-silvestra') {
                        echo "
<ol class=\"breadcrumb\">
<li><a href=\"http://zars.cz/\">Úvod</a></li>
<li class=\"active\">Tematický výběr: Silvestr 2016 / 17- chaty a chalupy k pronajmutí</li>
</ol>
<div id=\"categoryGallery\"><h4>Silvestr 2016 / 17- chaty a chalupy k pronajmutí</h4>
";

                        $patro = 12;
                        vypisobjektu($hladresa, $spoj, $zemeid, $lokalitaid, $okresyid, $patro, $osoba, $stranka, $zeme, $oblast, $termin, $pocet, $mistnosti, $vyhledat, $pes, $oploceni, $wifi, $bazen, $rybareni);
                    }

                    if ($stranka == 'akcni-nabidka') {
                        echo "
<ol class=\"breadcrumb\">
<li><a href=\"http://zars.cz/\">Úvod</a></li>
<li class=\"active\">Tematický výběr: Akční nabídka</li>
</ol>
<div id=\"categoryGallery\"><h4>Akční nabídka</h4>";
                        $zpet = 1;
                        $patro = 15;
                        vypisobjektu($hladresa, $spoj, $zemeid, $lokalitaid, $okresyid, $patro, $osoba, $stranka, $zeme, $oblast, $termin, $pocet, $mistnosti, $vyhledat, $pes, $oploceni, $wifi, $bazen, $rybareni);
                    }



                    if ($stranka == 'levne-chaty-a-chalupy-leto') {
                        echo "
<ol class=\"breadcrumb\">
<li><a href=\"http://zars.cz/\">Úvod</a></li>
<li class=\"active\">Tematický výběr: Levné chaty a chalupy léto</li>
</ol>
<div id=\"categoryGallery\"><h4>Tematický výběr: Levné chaty a chalupy léto</h4>";
                        $patro = 20;
                        vypisobjektu($hladresa, $spoj, $zemeid, $lokalitaid, $okresyid, $patro, $osoba, $stranka, $zeme, $oblast, $termin, $pocet, $mistnosti, $vyhledat, $pes, $oploceni, $wifi, $bazen, $rybareni);
                    }

                    if ($stranka == 'levne-chaty-a-chalupy-zima') {
                        echo "
<ol class=\"breadcrumb\">
<li><a href=\"http://zars.cz/\">Úvod</a></li>
<li class=\"active\">Tematický výběr: Levné chaty a chalupy zima</li>
</ol>
<div id=\"categoryGallery\"><h4>Tematický výběr: Levné chaty a chalupy zima</h4>";
                        $patro = 21;
                        vypisobjektu($hladresa, $spoj, $zemeid, $lokalitaid, $okresyid, $patro, $osoba, $stranka, $zeme, $oblast, $termin, $pocet, $mistnosti, $vyhledat, $pes, $oploceni, $wifi, $bazen, $rybareni);
                    }

                    if ($stranka == 'vikendy-mimosezona-leto') {
                        echo "
<ol class=\"breadcrumb\">
<li><a href=\"http://zars.cz/\">Úvod</a></li>
<li class=\"active\">Tematický výběr: Víkendy mimosezóna léto</li>
</ol>
<div id=\"categoryGallery\"><h4>Tematický výběr: Víkendy mimosezóna léto</h4>";
                        $patro = 22;
                        vypisobjektu($hladresa, $spoj, $zemeid, $lokalitaid, $okresyid, $patro, $osoba, $stranka, $zeme, $oblast, $termin, $pocet, $mistnosti, $vyhledat, $pes, $oploceni, $wifi, $bazen, $rybareni);
                    }

                    if ($stranka == 'vikendy-mimosezona-zima') {
                        echo "
<ol class=\"breadcrumb\">
<li><a href=\"http://zars.cz/\">Úvod</a></li>
<li class=\"active\">Tematický výběr: Víkendy mimosezóna zima</li>
</ol>
<div id=\"categoryGallery\"><h4>Tematický výběr: Víkendy mimosezóna zima</h4>";
                        $patro = 23;
                        vypisobjektu($hladresa, $spoj, $zemeid, $lokalitaid, $okresyid, $patro, $osoba, $stranka, $zeme, $oblast, $termin, $pocet, $mistnosti, $vyhledat, $pes, $oploceni, $wifi, $bazen, $rybareni);
                    }


                    if ($stranka == 'vikendy-hlavni-sezona-leto') {
                        echo "
<ol class=\"breadcrumb\">
<li><a href=\"http://zars.cz/\">Úvod</a></li>
<li class=\"active\">Tematický výběr: Víkendy hlavní sezóna léto</li>
</ol>
<div id=\"categoryGallery\"><h4>Tematický výběr: Víkendy hlavní sezóna léto</h4>";
                        $patro = 32;
                        vypisobjektu($hladresa, $spoj, $zemeid, $lokalitaid, $okresyid, $patro, $osoba, $stranka, $zeme, $oblast, $termin, $pocet, $mistnosti, $vyhledat, $pes, $oploceni, $wifi, $bazen, $rybareni);
                    }

                    if ($stranka == 'vikendy-hlavni-sezona-zima') {
                        echo "
<ol class=\"breadcrumb\">
<li><a href=\"http://zars.cz/\">Úvod</a></li>
<li class=\"active\">Tematický výběr: Víkendy hlavní sezóna zima</li>
</ol>
<div id=\"categoryGallery\"><h4>Tematický výběr: Víkendy hlavní sezóna zima</h4>";
                        $patro = 33;
                        vypisobjektu($hladresa, $spoj, $zemeid, $lokalitaid, $okresyid, $patro, $osoba, $stranka, $zeme, $oblast, $termin, $pocet, $mistnosti, $vyhledat, $pes, $oploceni, $wifi, $bazen, $rybareni);
                    }


                    if ($stranka == 'chaty-a-chalupy-na-vanoce') {
                        echo "
<ol class=\"breadcrumb\">
<li><a href=\"http://zars.cz/\">Úvod</a></li>
<li class=\"active\">Tematický výběr: Chaty a chalupy na vánoce</li>
</ol>
<div id=\"categoryGallery\"><h4>Tematický výběr: Chaty a chalupy na vánoce</h4>";
                        $patro = 24;
                        vypisobjektu($hladresa, $spoj, $zemeid, $lokalitaid, $okresyid, $patro, $osoba, $stranka, $zeme, $oblast, $termin, $pocet, $mistnosti, $vyhledat, $pes, $oploceni, $wifi, $bazen, $rybareni);
                    }

                    if ($stranka == 'oplocene-chaty-a-chalupy') {
                        echo "
<ol class=\"breadcrumb\">
<li><a href=\"http://zars.cz/\">Úvod</a></li>
<li class=\"active\">Tematický výběr: Oplocené chaty a chalupy</li>
</ol>
<div id=\"categoryGallery\"><h4>Tematický výběr: Oplocené chaty a chalupy</h4>";
                        $patro = 25;
                        vypisobjektu($hladresa, $spoj, $zemeid, $lokalitaid, $okresyid, $patro, $osoba, $stranka, $zeme, $oblast, $termin, $pocet, $mistnosti, $vyhledat, $pes, $oploceni, $wifi, $bazen, $rybareni);
                    }

                    if ($stranka == 'chaty-a-chalupy-se-saunou') {
                        echo "
<ol class=\"breadcrumb\">
<li><a href=\"http://zars.cz/\">Úvod</a></li>
<li class=\"active\">Tematický výběr: Chaty a chalupy se saunou</li>
</ol>
<div id=\"categoryGallery\"><h4>Tematický výběr: Chaty a chalupy se saunou</h4>";
                        $patro = 26;
                        vypisobjektu($hladresa, $spoj, $zemeid, $lokalitaid, $okresyid, $patro, $osoba, $stranka, $zeme, $oblast, $termin, $pocet, $mistnosti, $vyhledat, $pes, $oploceni, $wifi, $bazen, $rybareni);
                    }

                    if ($stranka == 'chaty-a-chalupy-s-internetem') {
                        echo "
<ol class=\"breadcrumb\">
<li><a href=\"http://zars.cz/\">Úvod</a></li>
<li class=\"active\">Tematický výběr: Chaty a chalupy s internetem</li>
</ol>
<div id=\"categoryGallery\"><h4>Tematický výběr: Chaty a chalupy s internetem</h4>";
                        $patro = 27;
                        vypisobjektu($hladresa, $spoj, $zemeid, $lokalitaid, $okresyid, $patro, $osoba, $stranka, $zeme, $oblast, $termin, $pocet, $mistnosti, $vyhledat, $pes, $oploceni, $wifi, $bazen, $rybareni);
                    }

                    if ($stranka == 'stylove-chaty-a-chalupy') {
                        echo "
<ol class=\"breadcrumb\">
<li><a href=\"http://zars.cz/\">Úvod</a></li>
<li class=\"active\">Tematický výběr: Stylové chaty a chalupy</li>
</ol>
<div id=\"categoryGallery\"><h4>Tematický výběr:  Stylové chaty a chalupy</h4>";
                        $patro = 28;
                        vypisobjektu($hladresa, $spoj, $zemeid, $lokalitaid, $okresyid, $patro, $osoba, $stranka, $zeme, $oblast, $termin, $pocet, $mistnosti, $vyhledat, $pes, $oploceni, $wifi, $bazen, $rybareni);
                    }

                    if ($stranka == 'luxusni-chaty-a-chalupy') {
                        echo "
<ol class=\"breadcrumb\">
<li><a href=\"http://zars.cz/\">Úvod</a></li>
<li class=\"active\">Tematický výběr: Luxusní chaty a chalupy</li>
</ol>
<div id=\"categoryGallery\"><h4>Tematický výběr: Luxusní chaty a chalupy</h4>";
                        $patro = 29;
                        vypisobjektu($hladresa, $spoj, $zemeid, $lokalitaid, $okresyid, $patro, $osoba, $stranka, $zeme, $oblast, $termin, $pocet, $mistnosti, $vyhledat, $pes, $oploceni, $wifi, $bazen, $rybareni);
                    }

                    if ($stranka == 'bezbarierove-chaty-a-chalupy') {
                        echo "
<ol class=\"breadcrumb\">
<li><a href=\"http://zars.cz/\">Úvod</a></li>
<li class=\"active\">Tematický výběr: Bezbariérové chaty a chalupy</li>
</ol>
<div id=\"categoryGallery\"><h4>Tematický výběr: Bezbariérové chaty a chalupy</h4>";
                        $patro = 30;
                        vypisobjektu($hladresa, $spoj, $zemeid, $lokalitaid, $okresyid, $patro, $osoba, $stranka, $zeme, $oblast, $termin, $pocet, $mistnosti, $vyhledat, $pes, $oploceni, $wifi, $bazen, $rybareni);
                    }

                    if ($stranka == 'chaty-a-chalupy-umistene-na-samote-polosamote') {
                        echo "
<ol class=\"breadcrumb\">
<li><a href=\"http://zars.cz/\">Úvod</a></li>
<li class=\"active\">Tematický výběr: Chaty a chalupy umístěné na samotě, polosamotě</li>
</ol>
<div id=\"categoryGallery\"><h4>Tematický výběr: Chaty a chalupy umístěné na samotě, polosamotě</h4>";
                        $patro = 40;
                        vypisobjektu($hladresa, $spoj, $zemeid, $lokalitaid, $okresyid, $patro, $osoba, $stranka, $zeme, $oblast, $termin, $pocet, $mistnosti, $vyhledat, $pes, $oploceni, $wifi, $bazen, $rybareni);
                    }

                    if ($stranka == 'chaty-a-chalupy-u-vody') {
                        echo "
<ol class=\"breadcrumb\">
<li><a href=\"http://zars.cz/\">Úvod</a></li>
<li class=\"active\">Tematický výběr: Chaty a chalupy u vody</li>
</ol>
<div id=\"categoryGallery\"><h4>Tematický výběr: Chaty a chalupy u vody</h4>";
                        $patro = 41;
                        vypisobjektu($hladresa, $spoj, $zemeid, $lokalitaid, $okresyid, $patro, $osoba, $stranka, $zeme, $oblast, $termin, $pocet, $mistnosti, $vyhledat, $pes, $oploceni, $wifi, $bazen, $rybareni);
                    }

                    if ($stranka == 'chaty-a-chalupy-u-sjezdovky') {
                        echo "
<ol class=\"breadcrumb\">
<li><a href=\"http://zars.cz/\">Úvod</a></li>
<li class=\"active\">Tematický výběr: Chaty a chalupy u sjezdovky</li>
</ol>
<div id=\"categoryGallery\"><h4>Tematický výběr: Chaty a chalupy u sjezdovky</h4>";
                        $patro = 42;
                        vypisobjektu($hladresa, $spoj, $zemeid, $lokalitaid, $okresyid, $patro, $osoba, $stranka, $zeme, $oblast, $termin, $pocet, $mistnosti, $vyhledat, $pes, $oploceni, $wifi, $bazen, $rybareni);
                    }


                    if ($stranka == 'nove-zarazeno-v-nabidce') {
                        echo "
<ol class=\"breadcrumb\">
<li><a href=\"http://zars.cz/\">Úvod</a></li>
<li class=\"active\">Tematický výběr: Nově zařazeno v nabídce</li>
</ol>
<div id=\"categoryGallery\"><h4>Tematický výběr: Nově zařazeno v nabídce</h4>";
                        $patro = 43;
                        vypisobjektu($hladresa, $spoj, $zemeid, $lokalitaid, $okresyid, $patro, $osoba, $stranka, $zeme, $oblast, $termin, $pocet, $mistnosti, $vyhledat, $pes, $oploceni, $wifi, $bazen, $rybareni);
                    }


                    if ($stranka == 'termaly') {
                        echo "
<ol class=\"breadcrumb\">
<li><a href=\"http://zars.cz/\">Úvod</a></li>
<li class=\"active\">Tematický výběr: Termály</li>
</ol>
<div id=\"categoryGallery\"><h4>Tematický výběr: Termály</h4>";
                        $patro = 44;
                        vypisobjektu($hladresa, $spoj, $zemeid, $lokalitaid, $okresyid, $patro, $osoba, $stranka, $zeme, $oblast, $termin, $pocet, $mistnosti, $vyhledat, $pes, $oploceni, $wifi, $bazen, $rybareni);
                    }


                    if ($stranka == 'lazne') {
                        echo "
<ol class=\"breadcrumb\">
<li><a href=\"http://zars.cz/\">Úvod</a></li>
<li class=\"active\">Tematický výběr: Lázně</li>
</ol>
<div id=\"categoryGallery\"><h4>Tematický výběr: Lázně</h4>";
                        $patro = 45;
                        vypisobjektu($hladresa, $spoj, $zemeid, $lokalitaid, $okresyid, $patro, $osoba, $stranka, $zeme, $oblast, $termin, $pocet, $mistnosti, $vyhledat, $pes, $oploceni, $wifi, $bazen, $rybareni);
                    }
                    
                    
                    if ($stranka == 'chaty-a-chalupy-s-detskym-koutkem') {
                        echo "
<ol class=\"breadcrumb\">
<li><a href=\"http://zars.cz/\">Úvod</a></li>
<li class=\"active\">Tematický výběr: Chaty a chalupy s dětským koutkem</li>
</ol>
<div id=\"categoryGallery\"><h4>Tematický výběr: Chaty a chalupy s dětským koutkem</h4>";
                        $patro = 46;
                        vypisobjektu($hladresa, $spoj, $zemeid, $lokalitaid, $okresyid, $patro, $osoba, $stranka, $zeme, $oblast, $termin, $pocet, $mistnosti, $vyhledat, $pes, $oploceni, $wifi, $bazen, $rybareni);
                    }                    
 
                    if ($stranka == 'chaty-a-chalupy-s-detskou-postylkou') {
                        echo "
<ol class=\"breadcrumb\">
<li><a href=\"http://zars.cz/\">Úvod</a></li>
<li class=\"active\">Tematický výběr: Chaty a chalupy s dětskou postýlkou</li>
</ol>
<div id=\"categoryGallery\"><h4>Tematický výběr: Chaty a chalupy s dětskou postýlkou</h4>";
                        $patro = 47;
                        vypisobjektu($hladresa, $spoj, $zemeid, $lokalitaid, $okresyid, $patro, $osoba, $stranka, $zeme, $oblast, $termin, $pocet, $mistnosti, $vyhledat, $pes, $oploceni, $wifi, $bazen, $rybareni);
                    }                    




                    /*                     * * zobrazi se pri hledani** */ /*
                      if ( $zpet == '1' ) {echo "<div class=\"zpet\"><a href=\"javascript:history.go(-1)\" title=\"Zpět do vybraných chat a chalup\" >Zpět do vybraných chat a chalup</a></div>"; } */

// ***************************************************************************    vypis objektu *************************************** //
                    $vypis = "SELECT * FROM zeme";
                    $akce = mysql_query($vypis, $spoj);
                    while ($row = mysql_fetch_object($akce)) {


                        $zemeid = $row->id;
                        $zemekod = $row->kod;
                        $zemenazev = $row->nazev;
                        $patro = 1;

                        if ($stranka == $row->kod) {
                            cesta($hladresa, $zemenazev, $zemekod, $lokalitanazev, $lokalitakod, $okresynazev, $okresykod, $objektnazev, $patro);
                            echo "
<ol class=\"breadcrumb\">
<li><a href=\"http://zars.cz/\">Úvod</a></li>
<li class=\"active\">Tematický výběr: $zemenazev</li>
</ol>
<div id=\"categoryGallery\"><h4>$zemenazev</h1>";

                            vypisobjektu($hladresa, $spoj, $zemeid, $lokalitaid, $okresyid, $patro, $osoba, $stranka, $zeme, $oblast, $termin, $pocet, $mistnosti, $vyhledat, $pes, $oploceni, $wifi, $bazen, $rybareni);
                        } // konec vypisu zeme
// vypis lokality             

                        $vypis2 = "SELECT * FROM lokality ";
                        $akce2 = mysql_query($vypis2, $spoj);
                        while ($row2 = mysql_fetch_object($akce2)) {

                            $adresa = $row->kod . '/' . $row2->kod;
                            $lokalitaid = $row2->id;
                            $lokalitakod = $row2->kod;
                            $lokalitanazev = $row2->nazev;
                            $patro = 2;

                            if ($stranka == $adresa) {

                                cesta($hladresa, $zemenazev, $zemekod, $lokalitanazev, $lokalitakod, $okresynazev, $okresykod, $objektnazev, $patro);
                                echo "
<ol class=\"breadcrumb\">
<li><a href=\"http://zars.cz/\">Úvod</a></li>
<li class=\"active\">Tematický výběr: Oblast - $lokalitanazev</li>
</ol>
<div id=\"categoryGallery\"><h4>Oblast - $lokalitanazev</h4>";

                                vypisobjektu($hladresa, $spoj, $zemeid, $lokalitaid, $okresyid, $patro, $osoba, $stranka, $zeme, $oblast, $termin, $pocet, $mistnosti, $vyhledat, $pes, $oploceni, $wifi, $bazen, $rybareni);
                            }


// vypis obejekty okresy
                            $vypis3 = "SELECT * FROM okresy where zeme='$zemeid'";

                            $akce3 = mysql_query($vypis3, $spoj);
                            while ($row3 = mysql_fetch_object($akce3)) {
                                $adresa2 = $row->kod . '/' . $row2->kod . '/' . $row3->kod;
                                $okresyid = $row3->id;
                                $okresykod = $row3->kod;
                                $okresynazev = $row3->nazev;


                                if ($stranka == $adresa2) {
                                    $patro = 3;
                                    cesta($hladresa, $zemenazev, $zemekod, $lokalitanazev, $lokalitakod, $okresynazev, $okresykod, $objektnazev, $patro);
                                    echo "
<ol class=\"breadcrumb\">
<li><a href=\"http://zars.cz/\">Úvod</a></li>
<li class=\"active\">Tematický výběr: Okres - $lokalitanazev</li>
</ol>
<div id=\"categoryGallery\"><h4>Okres - $okresynazev</h4>";


                                    vypisobjektu($hladresa, $spoj, $zemeid, $lokalitaid, $okresyid, $patro, $osoba, $stranka, $zeme, $oblast, $termin, $pocet, $mistnosti, $vyhledat, $pes, $oploceni, $wifi, $bazen, $rybareni);
                                }

// vypis konkretniho bóbjektu v okresech ( hlavni vypisy hlavnis struktura)
                                $vypis4 = "SELECT * FROM objekty where okresy='$okresyid'";
                                $akce4 = mysql_query($vypis4, $spoj);
                                while ($row4 = mysql_fetch_object($akce4)) {

                                    $adresa4 = $row->kod . '/' . $row2->kod . '/' . $row3->kod . '/' . $row4->kod . '-' . $row4->cislo;
                                    if ($stranka == $adresa4) {


                                        $patro = 5; // 4 patro skupiny s produktem
                                        $id = $row4->id;
                                        $objektnazev = $row4->nazev;



                                        cesta($hladresa, $zemenazev, $zemekod, $lokalitanazev, $lokalitakod, $okresynazev, $okresykod, $objektnazev, $patro);
                                        objekt($id, $spoj, $patro, $stranka);
                                    }
                                }
                            }
                        }
                    }

                    /*                    vypis objektu s prvi oblasti misto kraje !!!!!!!!!!!!!!                                                                                                             *
                     *                                                                                                                                 *
                     * 
                     *
                     *
                     *
                     *
                     *
                     *
                     *
                     *
                     *                                                                                                                                         */

                    $vypis = "SELECT * FROM lokality";
                    $akce = mysql_query($vypis, $spoj);
                    while ($row = mysql_fetch_object($akce)) {

                        $lokalitaid = $row->id;
                        $lokalitakod = $row->kod;
                        $lokalitanazev = $row->nazev;




                        if ($stranka == $row->kod) {
                            cesta($hladresa, $zemenazev, $zemekod, $lokalitanazev, $lokalitakod, $okresynazev, $okresykod, $objektnazev, $patro);
                            echo "
<ol class=\"breadcrumb\">
<li><a href=\"http://zars.cz/\">Úvod</a></li>
<li class=\"active\">Tematický výběr: Oblast - $lokalitanazev</li>
</ol>
<div id=\"categoryGallery\"><h4>Oblast - $lokalitanazev</h4>";
                            $patro = 2;
                            vypisobjektu($hladresa, $spoj, $zemeid, $lokalitaid, $okresyid, $patro, $osoba, $stranka, $zeme, $oblast, $termin, $pocet, $mistnosti, $vyhledat, $pes, $oploceni, $wifi, $bazen, $rybareni);
                        } // konec vypisu lokality
// vypis zeme             
                        /*  where id='$row->zeme' */
                        $vypis2 = "SELECT * FROM zeme";
                        $akce2 = mysql_query($vypis2, $spoj);
                        while ($row2 = mysql_fetch_object($akce2)) {

                            $adresa = $row->kod . '/' . $row2->kod;
                            $zemeid = $row2->id;
                            $zemekod = $row2->kod;
                            $zemenazev = $row2->nazev;




                            if ($stranka == $adresa) {

                                cesta($hladresa, $zemenazev, $zemekod, $lokalitanazev, $lokalitakod, $okresynazev, $okresykod, $objektnazev, $patro);
                                echo "
<ol class=\"breadcrumb\">
<li><a href=\"http://zars.cz/\">Úvod</a></li>
<li class=\"active\">Tematický výběr: Oblast - $lokalitanazev</li>
</ol>
<div id=\"categoryGallery\"><h4>Oblast - $lokalitanazev</h4>";
                                $patro = 2;
                                vypisobjektu($hladresa, $spoj, $zemeid, $lokalitaid, $okresyid, $patro, $osoba, $stranka, $zeme, $oblast, $termin, $pocet, $mistnosti, $vyhledat, $pes, $oploceni, $wifi, $bazen, $rybareni);
                            }


// vypis obejekty okresy
                            $vypis3 = "SELECT * FROM okresy where zeme='$zemeid'";

                            $akce3 = mysql_query($vypis3, $spoj);
                            while ($row3 = mysql_fetch_object($akce3)) {
                                $adresa2 = $row->kod . '/' . $row2->kod . '/' . $row3->kod;
                                $okresyid = $row3->id;
                                $okresykod = $row3->kod;
                                $okresynazev = $row3->nazev;


                                if ($stranka == $adresa2) {
                                    $patro = 3;
                                    cesta($hladresa, $zemenazev, $zemekod, $lokalitanazev, $lokalitakod, $okresynazev, $okresykod, $objektnazev, $patro);
                                    echo "
  <ol class=\"breadcrumb\">
<li><a href=\"http://zars.cz/\">Úvod</a></li>
<li class=\"active\">Tematický výběr: Okres - $okresynazev</li>
</ol>
<div id=\"categoryGallery\"><h4>Okres - $okresynazev</h4>";

                                    vypisobjektu($hladresa, $spoj, $zemeid, $lokalitaid, $okresyid, $patro, $osoba, $stranka, $zeme, $oblast, $termin, $pocet, $mistnosti, $vyhledat, $pes, $oploceni, $wifi, $bazen, $rybareni);
                                }

// vypis konkretniho bóbjektu v okresech ( hlavni vypisy hlavnis struktura)
                                $vypis4 = "SELECT * FROM objekty where okresy='$okresyid'";
                                $akce4 = mysql_query($vypis4, $spoj);
                                while ($row4 = mysql_fetch_object($akce4)) {

                                    $adresa4 = $row->kod . '/' . $row2->kod . '/' . $row3->kod . '/' . $row4->kod . '-' . $row4->cislo;

                                    if ($stranka == $adresa4) {

                                        $patro = 5; // 4 patro skupiny s produktem
                                        $id = $row4->id;
                                        $objektnazev = $row4->nazev;



                                        cesta($hladresa, $zemenazev, $zemekod, $lokalitanazev, $lokalitakod, $okresynazev, $okresykod, $objektnazev, $patro);
                                        objekt($id, $spoj, $patro, $stranka);
                                    }
                                }
                            }
                        }
                    }





                    /*                     * *************************************** vypis objektu ***************************************** */

                    function vypisobjektu($hladresa, $spoj, $zemeid, $lokalitaid, $okresyid, $patro, $osoba, $stranka, $zeme, $oblast, $termin, $pocet, $mistnosti, $vyhledat, $pes, $oploceni, $wifi, $bazen, $rybareni) {
                        $pocetpolozek = 0;
                        $dennahodnost = date("d");     //////// nahodnost podle dne
                        if ($dennahodnost >= '1' and $dennahodnost <= '5') {
                            $nahdat = " GROUP BY objekty.id ORDER BY objekty.id ASC";
                        }
                        if ($dennahodnost >= '6' and $dennahodnost <= '10') {
                            $nahdat = " GROUP BY objekty.id ORDER BY objekty.id DESC";
                        }
                        if ($dennahodnost >= '11' and $dennahodnost <= '15') {
                            $nahdat = " GROUP BY objekty.id ORDER BY objekty.cislo ASC";
                        }
                        if ($dennahodnost >= '16' and $dennahodnost <= '20') {
                            $nahdat = " GROUP BY objekty.id ORDER BY objekty.cislo DESC";
                        }
                        if ($dennahodnost >= '21' and $dennahodnost <= '25') {
                            $nahdat = " GROUP BY objekty.id ORDER BY objekty.nazev ASC";
                        }
                        if ($dennahodnost >= '26' and $dennahodnost <= '35') {
                            $nahdat = " GROUP BY objekty.id ORDER BY objekty.nazev DESC";
                        }

                        $vypis8 = "SELECT * FROM tematickevybery where h='1' order by poradi";
                        $akce8 = mysql_query($vypis8, $spoj);
                        while ($row8 = mysql_fetch_object($akce8)) {
                            if ($stranka == $row8->kod) {
                                echo "<p>$row8->d</p>";
                            }
                        }



                        $vypis7 = "SELECT * FROM lokality";                       /////////////////////////////////////////////   vypis do title oblasti
                        $akce7 = mysql_query($vypis7, $spoj);
                        while ($row7 = mysql_fetch_object($akce7)) {

                            $vypis8 = "SELECT * FROM zeme where id='$row7->zeme'";
                            $akce8 = mysql_query($vypis8, $spoj);
                            while ($row8 = mysql_fetch_object($akce8)) {
                                $adresa8 = $row7->kod . '/' . $row8->kod; //echo "$stranka == $adresa8<br />";
                                if ($stranka == $adresa8) {
                                    echo "<p style=\"font-size: 12px;\">$row7->d</p>";
                                }
                            }
                        }

                        $vypis8 = "SELECT * FROM lokality";                       /////////////////////////////////////////////   vypis do title oblasti
                        $akce8 = mysql_query($vypis8, $spoj);
                        while ($row8 = mysql_fetch_object($akce8)) {
                            if ($stranka == $row8->kod) {
                                echo "<p style=\"font-size: 12px;\">$row8->d</p>";
                            }
                        }

                        $vypis8 = "SELECT * FROM zeme";  // vypis do title kraje
                        $akce8 = mysql_query($vypis8, $spoj);
                        while ($row8 = mysql_fetch_object($akce8)) {
                            if ($stranka == $row8->kod) {
                                echo "<p style=\"font-size: 12px;\">$row8->d</p>";
                            }
                        }


                        echo "<p><strong>Nalezeno <span id=\"pocet\"></span> chat a chalup.</strong></p>";

                        if ($patro >= '1' and $patro <= '100' and $patro != '14') {
                            echo "<p>Pokud si nechcete prohlédnout všechny zobrazené objekty, můžete zadat další kritéria v tomto výběru:</p>";
                            include 'vyhledavaci-formular.php';
                        }

                        echo "<div class=\"row\">";
                        echo "<div class=\"box\" >";
                        $c = 0;

                        $hlavicka = "SELECT objekty.id, objekty.cislo, objekty.nazev, objekty.kod, objekty.lokalita, objekty.okresy, objekty.zeme, objekty.text, objekty.cenal, objekty.cenaz FROM objekty ";
                        //  ORDER BY RAND()
                        if ($patro == '1') {
                            $vypis2 = " Where objekty.zeme='$zemeid' ";
                        }
                        if ($patro == '2') {
                            $vypis2 = " Where objekty.lokalita='$lokalitaid' ";
                        }
                        if ($patro == '3') {
                            $vypis2 = " Where objekty.okresy='$okresyid' ";
                        }

                        if ($patro == '99') {
                            $vypis2 = " Where lokalita='$lokalitaid' ";
                        } // vypis oblasti prvnich 6

                        if ($patro == '4') { /* bazen */
                            $zpet = 1;
                            $hlavicka.=" ,vybaveni, vybavenitri";
                            $pom_vybaveni = 1;
                            $pom_vybavenitri = 1;
                            $vypis2 = " Where objekty.id=vybaveni.cid and  objekty.id=vybavenitri.cid and (vybavenitri.55='1' or vybaveni.62='1') ";
                        }

                        if ($patro == '5') {
                            $zpet = 1;
                            $hlavicka.=" ,aktivity ";
                            $vypis2 = " Where objekty.id=aktivity.cid and ( aktivity.58 = '1' or aktivity.59 = '1' or aktivity.60 = '1' or aktivity.61 = '1' or aktivity.62 = '1' or aktivity.63 = '1' ) ";
                            $pom_aktivity = 1;
                        }

                        if ($patro == '6') {
                            $zpet = 1;
                            $hlavicka.=" ,poloha ";
                            $vypis2 = " Where objekty.id=poloha.cid and poloha.36 = '1' ";
                        }

                        if ($patro == '7') {
                            $zpet = 1;
                            $hlavicka.=" ,vybavenidva, vybavenitri ";
                            $vypis2 = " Where objekty.id=vybavenidva.cid and objekty.id=vybavenitri.cid and (vybavenitri.15='1' or vybavenidva.53 ='1' or vybavenidva.54  ='1' or vybavenidva.55  ='1') ";
                            $pom_vybavenidva = 1;
                            $pom_vybavenitri = 1;
                        }

                        if ($patro == '8') {
                            $zpet = 1;
                            $hlavicka.=" ,aktivitydva ";
                            $vypis2 = " Where objekty.id=aktivitydva.cid and ( (aktivitydva.6 <= 5 and aktivitydva.6 > 0) or (aktivitydva.10 <= 5 and aktivitydva.10 > 0) ) ";
                        }

                        if ($patro == '9') {
                            $zpet = 1;
                            $hlavicka.=" ,informace ";
                            $pom_informace = 1;
                            $vypis2 = " Where objekty.id=informace.cid and informace.23 = '1' ";
                        }

                        if ($patro == '10') {
                            $zpet = 1;
                            $hlavicka.=" ,aktivity ";
                            $vypis2 = " Where objekty.id=aktivity.cid and aktivity.40 = '1'";
                            $pom_aktivity = 1;
                        }

                        if ($patro == '11') {
                            $zpet = 1;
                            $hlavicka.=" ,terminy, povoleneterminy ";
                            $vypis2 = " Where objekty.id=povoleneterminy.ido and povoleneterminy.idt = terminy.id and terminy.idtyp='7' ";
                        }

                        if ($patro == '12') {
                            $zpet = 1;
                            $hlavicka.=" ,terminy, povoleneterminy ";
                            $vypis2 = " Where objekty.id=povoleneterminy.ido and povoleneterminy.idt = terminy.id and terminy.idtyp='6' ";
                        }


                        if ($patro == '15') {
                            $zpet = 1;         ////           uprava pro hlavni poratal akcninabidka.h=1
                            $hlavicka.=" ,akcninabidka ";
                            $vypis2 = " Where objekty.id=akcninabidka.cid and akcninabidka.h=1 and akcninabidka.archiv<>1 ";
                        }


                        if ($patro == '20') {
                            $zpet = 1;         ////       levné chaty a chalupy léto (cena LÉTO OD za os/noc je od 0 do 300,-Kč)
                            $hlavicka.=" ,popis ";
                            $vypis2 = " Where objekty.id=popis.cid and ( popis.20='1' or popis.21='1' ) and objekty.cenal<='300' ";
                            $pom_popis = 1;
                        }

                        if ($patro == '21') {
                            $zpet = 1;         ////       levné chaty a chalupy zima (cena ZIMA OD za os/noc je od 0 do 300,-Kč)
                            $hlavicka.=" ,popis ";
                            $vypis2 = " Where objekty.id=popis.cid and ( popis.20='1' or popis.45='1' ) and objekty.cenaz<='300' ";
                            $pom_popis = 1;
                        }

                        if ($patro == '22') {
                            $zpet = 1;         ////       víkendy mimosezóna leto
                            $hlavicka.=" ,popis ";
                            $vypis2 = " Where objekty.id=popis.cid and popis.48='1' ";
                            $pom_popis = 1;
                        }

                        if ($patro == '23') {
                            $zpet = 1;         ////       víkendy mimosezóna zima
                            $hlavicka.=" ,popis ";
                            $vypis2 = " Where objekty.id=popis.cid and popis.52='1' ";
                            $pom_popis = 1;
                        }


                        if ($patro == '32') {
                            $zpet = 1;         ////       víkendy hlavni sezona leto
                            $hlavicka.=" ,popis ";
                            $vypis2 = " Where objekty.id=popis.cid and popis.53='1' ";
                            $pom_popis = 1;
                        }

                        if ($patro == '33') {
                            $zpet = 1;         ////       vikendy hlavni sezona zima
                            $hlavicka.=" ,popis ";
                            $vypis2 = " Where objekty.id=popis.cid and popis.54='1' ";
                            $pom_popis = 1;
                        }


                        if ($patro == '24') {
                            $zpet = 1;         ////      chaty a chalupy na vánoce (vánoce)
                            $hlavicka.=" ,popis ";
                            $vypis2 = " Where objekty.id=popis.cid and popis.49='1' ";
                            $pom_popis = 1;
                        }

                        if ($patro == '25') {
                            $zpet = 1;         ////      oplocené chaty a chalupy (v kategorii pozemek u objektu - "zcela oplocený")
                            $hlavicka.=" ,popis ";
                            $vypis2 = " Where objekty.id=popis.cid and popis.35='1' ";
                            $pom_popis = 1;
                        }

                        if ($patro == '26') {
                            $zpet = 1;         ////      chaty a chalupy se saunou 
                            $hlavicka.=" ,vybaveni ";
                            $pom_vybaveni = 1;
                            $vypis2 = " Where objekty.id=vybaveni.cid and ( vybaveni.50='1' or vybaveni.51='1' or vybaveni.61='1') ";
                        }

                        if ($patro == '27') {
                            $zpet = 1;         ////      chaty a chalupy s internetem 
                            $hlavicka.=" ,vybavenidva ";
                            $vypis2 = " Where objekty.id=vybavenidva.cid and ( vybavenidva.14='1' or vybavenidva.16='1') ";
                            $pom_vybavenidva = 1;
                        }

                        if ($patro == '28') {
                            $zpet = 1;  ////      stylové chaty a chalupy (v kategorii vybavení interiéru objektu: "stylové")
                            $hlavicka.=" ,vybaveni ";
                            $pom_vybaveni = 1;
                            $vypis2 = " Where objekty.id=vybaveni.cid and vybaveni.6='1' ";
                        }

                        if ($patro == '29') {
                            $zpet = 1;         ////      luxusní chaty a chalupy 
                            $hlavicka.=" ,vybaveni ";
                            $pom_vybaveni = 1;
                            $vypis2 = " Where objekty.id=vybaveni.cid and vybaveni.8='1' ";
                        }

                        if ($patro == '30') {
                            $zpet = 1;         ////      bezbarierové chaty
                            $hlavicka.=" ,informace ";
                            $pom_informace = 1;
                            $vypis2 = " Where objekty.id=informace.cid and informace.15='1' ";
                        }

                        if ($patro == '40') {
                            $zpet = 1;         ////      Umístění na samotě, polosamotě
                            $hlavicka.=" ,poloha ";
                            $vypis2 = " Where objekty.id=poloha.cid and ( poloha.35='1' or poloha.18='1' ) ";
                        }

                        if ($patro == '41') {
                            $zpet = 1;         ////      Umístění u vody
                            $hlavicka.=" ,poloha ";
                            $vypis2 = " Where objekty.id=poloha.cid and poloha.20='1' ";
                        }

                        if ($patro == '42') {
                            $zpet = 1;         ////      Umístění u sjezdovky
                            $hlavicka.=" ,poloha ";
                            $vypis2 = " Where objekty.id=poloha.cid and poloha.21='1' ";
                        }

                        if ($patro == '43') {
                            $zpet = 1;         ////      nove zarazeno v nabidce
                            $hlavicka.="";
                            $vypis2 = "";
                            $nahdat = " ORDER BY objekty.id DESC limit 20";
                        }

                        if ($patro == '44') {
                            $zpet = 1;         ////      termaly
                            $hlavicka.=" ,aktivity ";
                            $vypis2 = " Where objekty.id=aktivity.cid and aktivity.63='1' and aktivity.13>'0' and aktivity.13<='5' ";
                            $nahdat = "";
                            $pom_aktivity = 1;
                        }

                        if ($patro == '45') {
                            $zpet = 1;         ////      termaly
                            $hlavicka.=" ,vylet ";
                            $vypis2 = " Where objekty.id=vylet.cid and ( (vylet.39>'0' and vylet.39<'6') or (vylet.41>'0' and vylet.41<'6') or (vylet.43>'0' and vylet.43<'6') )";
                            $nahdat = "";
                        }      
                        
                        if ($patro == '46') {
                            $zpet = 1;         ////      Dětský koutek na zahradě
                            $hlavicka.=" ,vybavenitri ";
                            $vypis2 = " Where objekty.id=vybavenitri.cid and (vybavenitri.18='1' or vybavenitri.19='1' or vybavenitri.20='1') ";
                            $nahdat = "";
                            $pom_vybavenitri = 1;
                        } 
                        
                        
                        if ($patro == '47') {
                            $zpet = 1;         ////      Chaty a chalupy s dětskou postýlkou
                            $hlavicka.=" ,vybavenidva ";
                            $vypis2 = " Where objekty.id=vybavenidva.cid and vybavenidva.47='1'";
                            $nahdat = "";
                            $pom_vybavenidva = 1;
                        }
                        


                        if ($patro == '14') {

                            $zapamatovane = $_COOKIE["zapamatovane"];
                            $pole = Explode('_', $zapamatovane);
                            $i = 1;
                            $poc = 1;
                            foreach ($pole as $key => $val) {

                                $pomocna = 0;
                                $vypis = "SELECT * FROM kosik where idzakaznik='$osoba'";
                                $akce = mysql_query($vypis, $spoj);
                                while ($row = mysql_fetch_object($akce)) {
                                    if ($row->idobjekt == $val) {
                                        $pomocna = 1;
                                    }
                                }

                                if ($pomocna == '0') {
                                    $pridej = "INSERT INTO kosik VALUES ('','$osoba','$val')";
                                    $pridej = mysql_query($pridej, $spoj);
                                }


                                $poc++;
                                $i++;
                            }

                            $vypishledat = "SELECT objekty.id, objekty.cislo, objekty.nazev, objekty.kod, objekty.lokalita, objekty.okresy, objekty.zeme, objekty.text, objekty.cenal, objekty.cenaz FROM objekty, kosik Where objekty.id=kosik.idobjekt and kosik.idzakaznik='$osoba'";
                        }



                        /// vyhledavani 
                        if ($vyhledat == '1') {



                            if ($zeme == "cesko") {
                                $vypis2.=" and objekty.zeme >= '1' and objekty.zeme <= '13' ";
                                $and = 1;
                            }    //zeme cr
                            if ($zeme == "slovensko") {
                                $vypis2.=" and objekty.zeme = '14'";
                                $and = 1;
                            }                      //zeme sr
                            if ($oblast != '0') {
                                $vypis2.=" and objekty.lokalita = '$oblast' ";
                                $and = 1;
                            }  // oblast




                            if ($mistnosti != null) { //pocet mistnosti
                                if ($pom_vybaveni == '1') {} 
                                else { $hlavicka.=", vybaveni"; }
                                
                                $vypis2.=" and objekty.id=vybaveni.cid and vybaveni.71>='$mistnosti'";
                                $pom_vybaveni = 1;
                            }
                       
                    } // konec vhyledat 
                                
                             if ($pes == '1') { //pes povolen   
                                if ($pom_informace == '1') {} 
                                else { $hlavicka.=", informace"; }
                                
                                $vypis2.=" and objekty.id=informace.cid and (informace.23='1' or informace.25='1' or informace.26 ='1')";
                            }  
                            
                             if ($oploceni == '1') { // oploceni
                               /* if ($pom_popis == '1') {} 
                                else { $hlavicka.=", popis"; } */
                                
                                $vypis2.=" and objekty.id=popis.cid and (popis.35='1' or popis.40='1')";
                            }  
                                  
                             if ($wifi == '1') { // wifi internet
                                if ($pom_vybavenidva == '1') {} 
                                else { $hlavicka.=", vybavenidva"; }

                                $vypis2.=" and objekty.id=vybavenidva.cid and (vybavenidva.14='1' or vybavenidva.16='1')";
                            }  
                                                        
                             if ($bazen == '1') { // bazen 
                                if ($pom_vybaveni == '1') {} 
                                else { $hlavicka.=", vybaveni"; }
                                
                                if ($pom_vybavenitri == '1') {} 
                                else { $hlavicka.=", vybavenitri"; }                                
                                
                                $vypis2.=" and objekty.id=vybaveni.cid and objekty.id=vybavenitri.cid and (vybaveni.62='1' or vybavenitri.16='1')";
                            }  
                            
                            if ($rybareni == '1') { // rybareni
                                if ($pom_aktivity == '1') {} 
                                else { $hlavicka.=", aktivity"; }
                                
                                $vypis2.=" and objekty.id=aktivity.cid and aktivity.40='1'";
                            }  
                            
                                                                       

                              
                        
                        // slouceni prikazu s order by


                        $vypis2 = $hlavicka . $vypis2 . $nahdat;
                        if ($patro == '99') {
                            $vypis2 = $vypis2;
                        }
                        if ($patro == '14') {
                            $vypis2 = $vypishledat;
                        }


                        $c = 0;               // echo "$vypis2<br/>";
                        $akce2 = mysql_query($vypis2, $spoj);
                        while ($row2 = mysql_fetch_object($akce2)) {       // hlavni vypis
                            $idobjekt = $row2->id;


                            $akcee = 0;
                            $vypis8 = "SELECT * FROM akcninabidka where cid='$row2->id' and archiv <>1";
                            $akce8 = mysql_query($vypis8, $spoj);

                            while ($row8 = mysql_fetch_object($akce8)) {
                                $akcee = 1;
                            }


                            $vyrazene = 0;       // vyrazene objekty

                            $vypis8 = "SELECT * FROM  objektyvyrazene where objektyvyrazene.ido='$row2->id'";
                            $akce8 = mysql_query($vypis8, $spoj);

                            while ($row8 = mysql_fetch_object($akce8)) {
                                $vyrazene = 1;
                            }
                            if ($vyrazene == '0') {


                                $smlouva = 0;
                                $vypis8 = "SELECT * FROM majitelsmlouva, majitelobjekt where majitelobjekt.ido='$row2->id' and majitelsmlouva.idm=majitelobjekt.idm";
                                $akce8 = mysql_query($vypis8, $spoj);

                                while ($row8 = mysql_fetch_object($akce8)) {
                                    $smlouva = 1;
                                }

                                if ($smlouva == '1') {   //smlouva ano  
                                    $vyrazenymajitel = 0;
                                    $vypis8 = "SELECT * FROM majitelvyrazeny, majitelobjekt where majitelobjekt.ido='$row2->id' and majitelvyrazeny.idm=majitelobjekt.idm";
                                    $akce8 = mysql_query($vypis8, $spoj);
                                    while ($row8 = mysql_fetch_object($akce8)) {
                                        $vyrazenymajitel = 1;
                                    }
                                    if ($vyrazenymajitel == '0') {   //vyrazenimajitele neni vyrazeny  
                                        // počet osob  vyhledavaci modul    
                                        $kapacita = 0;
                                        $luzka = 0;
                                        if ($pocet == '0') {
                                            $kapacita = 100;
                                        } else {
                                            $vypis7 = "SELECT * FROM mistnosti where cid='$row2->id' ";
                                            $akce7 = mysql_query($vypis7, $spoj);
                                            while ($x = mysql_fetch_array($akce7)) {
                                                $luzka = $x[9] + $x[19] + $x[29] + $x[39] + $x[49] + $x[59] + $x[69] + $x[79] + $x[89] + $x[99] + $x[109] + $x[119];
                                                $kapacita = $luzka;
                                            }
                                        }
                                        if ($pocet == '0' or $pocet == null) {
                                            $pocetod = 0;
                                            $pocetdo = 200;
                                        }
                                        if ($pocet == '1') {
                                            $pocetod = 1;
                                            $pocetdo = 8;
                                        }
                                        if ($pocet == '2') {
                                            $pocetod = 9;
                                            $pocetdo = 15;
                                        }
                                        if ($pocet == '3') {
                                            $pocetod = 16;
                                            $pocetdo = 200;
                                        }


                                        if ($kapacita >= $pocetod and $kapacita <= $pocetdo) {    // rozliseni kapacity je li zadana
/////////////// terminy pro vyhledavaci formular
/// terminy
                                            if ($termin == '0' or $termin == '') {
                                                $terminzad = 1;
                                                $tervolny = 1;
                                            } // nezadanny termin
                                            else {



// vyber chaty podle data
                                                $terminzad = 0;
                                                $terobsazeny = 0;
                                                $tervolny = 0;

                                                $vypis = "SELECT terminy.id, terminy.od, terminy.do, terminy.idtyp, terminy.archiv FROM terminy, povoleneterminy where terminy.id=povoleneterminy.idt and .terminy.archiv='0' and povoleneterminy.ido='$idobjekt' and terminy.id ='$termin' ORDER BY  `terminy`.`od` ASC ";
                                                $akce = mysql_query($vypis, $spoj);
                                                while ($row = mysql_fetch_object($akce)) {
                                                    $stav = null;
                                                    $obsazeno = 0;
                                                    $vypis3 = "SELECT * FROM objednavka where datum='$row->id' and ido=$idobjekt";
                                                    $akce3 = mysql_query($vypis3, $spoj);
                                                    while ($row3 = mysql_fetch_object($akce3)) {
                                                        $stav = $row3->stav;
                                                        $stornovanadne = $row3->stornovanadne;
                                                    }

                                                    $terobsazeny = 0;                // obsazne terminy
                                                    $vypis15 = "SELECT * FROM terminyobsazene where ido='$idobjekt' and idt='$row->id'";
                                                    $akce15 = mysql_query($vypis15, $spoj);
                                                    while ($row15 = mysql_fetch_object($akce15)) {
                                                        $terobsazeny = 1;
                                                    }
                                                    if ($terobsazeny == '0') {
                                                        $tervolny = 1;
                                                    }

                                                    if (($stav == '1' and $stornovanadne == '0000-00-00') or ( $stav == '2' and $stornovanadne == '0000-00-00') and $terobsazeny == '0') {
                                                        $obsazeno = 1;
                                                    } else {
                                                        $terminzad = 1;
                                                    }
                                                }
                                            }
                                            if ($terobsazeny == '0' or $terminzad == '1') {
                                                if ($tervolny == '1') {
                                                    if ($obsazeno == '0' or $terminzad == '1') {


                                                        echo "<div class=\"col-md-3 col-sm-6\">";


                                                        $vypis4 = "SELECT * FROM zeme where id='$row2->zeme' ";
                                                        $akce4 = mysql_query($vypis4, $spoj);
                                                        while ($row4 = mysql_fetch_object($akce4)) {
                                                            $zemen = $row4->nazev;
                                                            $zemek = $row4->kod;
                                                        }

                                                        $vypis4 = "SELECT * FROM lokality where id='$row2->lokalita' ";
                                                        $akce4 = mysql_query($vypis4, $spoj);
                                                        while ($row4 = mysql_fetch_object($akce4)) {
                                                            $lokalitan = $row4->nazev;
                                                            $lokalitak = $row4->kod;
                                                        }

                                                        $vypis4 = "SELECT * FROM okresy where id='$row2->okresy' ";
                                                        $akce4 = mysql_query($vypis4, $spoj);
                                                        while ($row4 = mysql_fetch_object($akce4)) {
                                                            $okresn = $row4->nazev;
                                                            $okresk = $row4->kod;
                                                        }

                                                        echo "<div class=\"thumbnail ";
                                                        if ($stranka == 'akcni-nabidka') {
                                                            echo "akce";
                                                        } echo "\">
<a href=\"$lokalniadresa/$lokalitak/$zemek/$okresk/$row2->kod-$row2->cislo/";
                                                        if ($zpet == 1) {
                                                            echo "?h=1";
                                                        } echo "\" title=\"Detail - $row2->nazev - $row2->cislo\">";

                                                        $vypis3 = "SELECT * FROM fotky where cid=$row2->id order by poradi limit 1";
                                                        $akce3 = mysql_query($vypis3, $spoj);

                                                        while ($row3 = mysql_fetch_object($akce3)) {
                                                            echo "<img src=\"http://zars.cz/nahledy/$row3->adresa\" title=\"$row2->nazev\" /></a>";
                                                        }
                                                        echo "<div class=\"caption\">
         <h4 class=\"title\"><a href=\"$lokalniadresa/$lokalitak/$zemek/$okresk/$row2->kod-$row2->cislo/";
                                                        if ($zpet == 1) {
                                                            echo "?h=1";
                                                        } echo "\" title=\"Detail - $row2->nazev - $row2->cislo\">$row2->nazev <span class=\"cislo\">$row2->cislo</span><br />$lokalitan</a></h4>";

                                                        $vypis = "SELECT * FROM mistnosti where cid='$row2->id' ";
                                                        $akce = mysql_query($vypis, $spoj);
                                                        while ($x = mysql_fetch_array($akce)) {
                                                            $luzka = $x[9] + $x[19] + $x[29] + $x[39] + $x[49] + $x[59] + $x[69] + $x[79] + $x[89] + $x[99] + $x[109] + $x[119];
                                                            $pristylky = $x[10] + $x[20] + $x[30] + $x[40] + $x[50] + $x[60] + $x[70] + $x[80] + $x[90] + $x[100] + $x[110] + $x[120];
                                                            $kapacita = $luzka + $pristylky;
                                                        }

                                                        $vypis4 = "SELECT * FROM vybaveni where cid='$row2->id' ";
                                                        $akce4 = mysql_query($vypis4, $spoj);
                                                        while ($x = mysql_fetch_array($akce4)) {
                                                            $mistnosti = $x[70];
                                                        }


                                                        if ($stranka == 'akcni-nabidka') {
                                                            $vypis3 = "SELECT * FROM akcninabidka where cid=$row2->id order by id desc limit 1";
                                                            $akce3 = mysql_query($vypis3, $spoj);

                                                            while ($row3 = mysql_fetch_object($akce3)) {
                                                                $akcnitext = strip_tags($row3->text);
                                                                $akcnitext = substr("$akcnitext", 0, 150);

                                                                $d = substr($row3->datum, 8, 2);
                                                                $m = substr($row3->datum, 5, 2);
                                                                $r = substr($row3->datum, 0, 4);
                                                            }
                                                            echo "<p>$akcnitext</p>
                  <ul class=\"list-unstyled\">  ";
                                                            echo "     <li><span class=\"glyphicon glyphicon-time\"></span> Přidáno: $d.$m.$r</li> 
                    <li><span class=\"glyphicon glyphicon-user\"></span> $luzka lůžka + $pristylky přistýlky</li>   
                  </ul>";
                                                        } else {

                                                            echo "
<ul class=\"list-unstyled\">
<li>Lůžka: <strong>$luzka</strong></li>
<li>Přistýlky: <strong>$pristylky</strong></li>
<li>Místnosti ke spaní: <strong>$mistnosti</strong></li>
<li>Cena od: <strong>$row2->cenal Kč os/noc</strong></li>   
</ul>";
                                                        }
                                                        $pocetpolozek++;



                                                        echo "<div class=\"two-buttons ";
                                                        if ($stranka == 'akcni-nabidka') {
                                                            echo "akce";
                                                        } echo "\">"; /* vypnute skryvani */
                                                        if ($patro != "144") {
                                                            echo "<div><a href=\"javascript:AddCookieId('zapamatovane',$row2->id)\" title=\"Uložit do zapamatovaných objektů\" class=\"btn btn-default btn-block\"><span class=\"glyphicon glyphicon-heart\" aria-hidden=\"true\"></span></a></div>";
                                                        }
                                                        echo "<div><a href=\"$hladresa/$lokalitak/$zemek/$okresk/$row2->kod-$row2->cislo/";
                                                        if ($zpet == 1) {
                                                            echo "?h=1";
                                                        } echo "\" title=\"Detail - $row2->nazev - $row2->cislo\" class=\"btn btn-primary btn-block\"><small>VÍCE INFORMACÍ</small></a></div>";

                                                        echo "</div>
      </div>
      </div>
      </div>";
                                                    } // terminy pro vyhledavaci formular
                                                }  // terminy pro vyhledavaci formular
                                            }  // terminy pro vyhledavaci formular
                                        } // pocet osob vyhledavaci modul
                                    }     // vyrazenimajitele
                                }     // smlouva
                            }  // vyrazene objekty
                        }
                        ?>
                    </div>
                                <?php /*  <div class="text-center">
                                  <nav>
                                  <ul class="pagination">
                                  <li class="disabled"><a href="#" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
                                  <li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
                                  <li><a href="#">2</a></li>
                                  <li><a href="#">3</a></li>
                                  <li><a href="#">4</a></li>
                                  <li><a href="#">5</a></li>
                                  <li><a href="#" aria-label="Next"><span aria-hidden="true">»</span></a></li>
                                  </ul>
                                  </nav> */ ?>

                </div>   
            </div>
        </div>
                                <?php
                                echo '    
<script type="text/javascript" language="JavaScript"><!--      
window.onload=pocet();
function pocet() {
window.document.getElementById("pocet").innerHTML = ' . $pocetpolozek . ';
}
// --> 
</script>
';
                            }

                            /*                             * **************************************************** konkretni objekt   ************************************ */

                            function objekt($id, $spoj, $patro, $stranka) {


                                $vyrazene = 0;       // vyrazene objekty          
                                $vypis8 = "SELECT * FROM  objektyvyrazene where objektyvyrazene.ido='$id'";
                                $akce8 = mysql_query($vypis8, $spoj);
                                while ($row8 = mysql_fetch_object($akce8)) {
                                    $vyrazene = 1;
                                }
                                if ($vyrazene == '0') {
                                    $smlouva = 0;
                                    $vypis8 = "SELECT * FROM majitelsmlouva, majitelobjekt where majitelobjekt.ido='$id' and majitelsmlouva.idm=majitelobjekt.idm";
                                    $akce8 = mysql_query($vypis8, $spoj);

                                    while ($row8 = mysql_fetch_object($akce8)) {
                                        $smlouva = 1;
                                    }

                                    if ($smlouva == '1') {   //smlouva ano
                                        $vyrazenymajitel = 0;
                                        $vypis8 = "SELECT * FROM majitelvyrazeny, majitelobjekt where majitelobjekt.ido='$id' and majitelvyrazeny.idm=majitelobjekt.idm";
                                        $akce8 = mysql_query($vypis8, $spoj);
                                        while ($row8 = mysql_fetch_object($akce8)) {
                                            $vyrazenymajitel = 1;
                                        }


                                        if ($vyrazenymajitel == '0') {   //vyrazenimajitele neni vyrazeny 
                                            $vypis = "SELECT * FROM objekty where id=$id";
                                            $akce = mysql_query($vypis, $spoj);
                                            while ($row = mysql_fetch_object($akce)) {
                                                $objektnazev = $row->nazev;
                                                $objektcislo = $row->cislo;
                                                ?>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div id="carousel-detail-property" class="carousel slide" data-ride="carousel">                  
                                                <?php
                                                $vypis8 = "SELECT * FROM akcninabidka where cid='$id'  and archiv <>1";
                                                $akce8 = mysql_query($vypis8, $spoj);

                                                while ($row8 = mysql_fetch_object($akce8)) {
                                                    echo "<div class=\"sale-label\">
                      <a href=\"#sale\">AKCE</a>
                    </div>";
                                                }
                                                ?>                  

                                            <ol class="carousel-indicators">
                                                <?php
                                                $pom = 1;
                                                $i = 0;
                                                $vypis2 = "SELECT * FROM fotky where cid='$id' ORDER BY  `poradi`";
                                                $akce2 = mysql_query($vypis2, $spoj);
                                                while ($row2 = mysql_fetch_object($akce2)) {
                                                    echo "<li data-target=\"#carousel-detail-property\" data-slide-to=\"$i\" ";
                                                    if ($pom == '1') {
                                                        echo " class=\"active\" ";
                                                    } echo "></li>";
                                                    $pom = 0;
                                                    $i++;
                                                }
                                                $vypis2 = "SELECT * FROM fotkyzakaznici where ido='$id' and publikovat='1'";
                                                $akce2 = mysql_query($vypis2, $spoj);
                                                while ($row2 = mysql_fetch_object($akce2)) {
                                                    echo "<li data-target=\"#carousel-detail-property\" data-slide-to=\"$i\" ></li>";
                                                    $i++;
                                                }
                                                ?>
                                            </ol>
                                            <div class="carousel-inner">

                    <?php
                    $pom = 1;
                    $vypis2 = "SELECT * FROM fotky where cid='$id' ORDER BY  `poradi`";
                    $akce2 = mysql_query($vypis2, $spoj);
                    while ($row2 = mysql_fetch_object($akce2)) {
                        echo "
 <div class=\"item";
                        if ($pom == '1') {
                            echo " active ";
                        } echo "\">
    <img src=\"http://zars.cz/fotky/$row2->adresa\" class=\"img-responsive\" />
 </div>";
                        $pom = 0;
                    }     
                    $vypis2 = "SELECT * FROM fotkyzakaznici where ido='$id' and publikovat='1'";
                    $akce2 = mysql_query($vypis2, $spoj);
                    while ($row2 = mysql_fetch_object($akce2)) {
                        echo "
 <div class=\"item\">
    <img src=\"http://zars.cz/uploads/$row2->adresa\" class=\"img-responsive\" />
 </div>";
                        $pom = 0;
  
                    }
                    ?>

                                            </div>
                                            <a class="left carousel-control" href="#carousel-detail-property" role="button" data-slide="prev">
                                                <span class="glyphicon glyphicon-chevron-left"></span>
                                            </a>
                                            <a class="right carousel-control" href="#carousel-detail-property" role="button" data-slide="next">
                                                <span class="glyphicon glyphicon-chevron-right"></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row hidden-xs">
                                    <div class="col-md-12">
                                        <div id="thumbs-detail-property">
                                            <ul class="list-inline">

                                                            <?php
                                                            $pom = 1;
                                                            $i = 0;
                                                            $vypis2 = "SELECT * FROM fotky where cid='$id' ORDER BY  `poradi` limit 24";
                                                            $akce2 = mysql_query($vypis2, $spoj);
                                                            while ($row2 = mysql_fetch_object($akce2)) {
                                                                echo "
 <li data-target=\"#carousel-detail-property\" data-slide-to=\"$i\" ";
                                                                if ($pom == '1') {
                                                                    echo " class=\"active\" ";
                                                                } echo ">
    <img src=\"http://zars.cz/nahledy/$row2->adresa\" class=\"img-responsive\" />
 </li>";
                                                                $pom = 0;
                                                                $i++;
                                                            }
                                                            $vypis2 = "SELECT * FROM fotkyzakaznici where ido='$id' and publikovat='1'";
                                                            $akce2 = mysql_query($vypis2, $spoj);
                                                            while ($row2 = mysql_fetch_object($akce2)) {
                                                                echo "
 <li data-target=\"#carousel-detail-property\" data-slide-to=\"$i\" >
    <img src=\"http://zars.cz/uploads/thumb_$row2->adresa\" class=\"img-responsive\" />
 </li>";
                                                                $i++;
                                                            }
                                                            ?>

                                                </li>
                                            </ul>
                                        </div>    
                                    </div> 
                                </div> 
                            </div>
                            <div class="col-lg-6">
                                <table class="table table-condensed table-striped">
                                    <thead>
                                        <tr>
                                            <th colspan="2"> 
                                                            <?php
                                                            echo "<h1>$objektnazev</h1>
                  </th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Číslo</td>
                    <td>$objektcislo</td>
                  </tr>
                  <tr>
                    <td>Kraj</td>";
                                                            $vypis2 = "SELECT * FROM zeme where id='$row->zeme'";
                                                            $akce2 = mysql_query($vypis2, $spoj);
                                                            while ($row2 = mysql_fetch_object($akce2)) {
                                                                echo "<td>$row2->nazev</td>";
                                                            }

                                                            echo "
                  </tr>
                  <tr>
                    <td>Oblast</td>";                       $lid=$row->lokalita;
                                                            $vypis2 = "SELECT * FROM lokality where id='$row->lokalita'";
                                                            $akce2 = mysql_query($vypis2, $spoj);
                                                            while ($row2 = mysql_fetch_object($akce2)) {
                                                                echo "<td>$row2->nazev</td>";
                                                            }
                                                            echo "
                  </tr>
                  <tr>
                    <td>Okres</td>";
                                                            $vypis2 = "SELECT * FROM okresy where id='$row->okresy'";
                                                            $akce2 = mysql_query($vypis2, $spoj);
                                                            while ($row2 = mysql_fetch_object($akce2)) {
                                                                echo "<td>$row2->nazev</td>";
                                                            }
                                                            echo "
                  </tr>
                  <tr>
                    <th>Pronájem pro</th>";
                                                            $vypis = "SELECT * FROM mistnosti where cid='$id' ";
                                                            $akce = mysql_query($vypis, $spoj);
                                                            while ($x = mysql_fetch_array($akce)) {
                                                                $luzka = $x[9] + $x[19] + $x[29] + $x[39] + $x[49] + $x[59] + $x[69] + $x[79] + $x[89] + $x[99] + $x[109] + $x[119];
                                                                $pristylky = $x[10] + $x[20] + $x[30] + $x[40] + $x[50] + $x[60] + $x[70] + $x[80] + $x[90] + $x[100] + $x[110] + $x[120];
                                                                $kapacita = $luzka + $pristylky;
                                                            }

                                                            echo "  
                    <th>$kapacita osob <span class=\"text-muted\">($luzka lůžka + $pristylky přistýlky)</span></th>
                  </tr>
                  
                  <tr>
                    <th>Cena</th>
                    <th>

                        <a href=\"#tab-tab2\" id=\"open-tab2\" title=\"Ceník\">viz ceník</a>
                        </th>
                  </tr>
                  </tr>
                </tbody>
               </table> 
                  ";

                                                            include 'terminynahledy.php';

                                                            echo "
          <div class=\"primary-actions\">
                <a href=\"#tab-tab5\" id=\"open-tab5\" title=\"Rezervace\" class=\"btn btn-primary\" onClick=\"ga('send', 'event', 'ux', 'click', 'objednat');\"><span class=\"glyphicon glyphicon-ok-sign\" aria-hidden=\"true\"></span><br /><span>OBJEDNAT</span></a>
                <a href=\"$hladresa/poslat-odkaz/?adresa=$stranka\" title=\"Poslat přátelům\"  class=\"btn btn-default\" onClick=\"ga('send', 'event', 'ux', 'click', 'poslat pratelum');\"><span class=\"glyphicon glyphicon-envelope\" aria-hidden=\"true\"></span><br /><span>POSLAT PŘÁTELŮM</span></a>
                <a href=\"$hladresa/$stranka/?tisk=1\" title=\"Vytisknout\" class=\"btn btn-default\" onClick=\"ga('send', 'event', 'ux', 'click', 'vytisknout');\"><span class=\"glyphicon glyphicon-print\" aria-hidden=\"true\"></span><br /><span>VYTISKNOUT</span></a>
                <a href=\"javascript:AddCookieId('zapamatovane',$id)\" title=\"Uložit do oblíbených objektů\" class=\"btn btn-default\" onClick=\"ga('send', 'event', 'ux', 'click', 'oblibene');\"><span class=\"glyphicon glyphicon-heart\" aria-hidden=\"true\" onClick=\"ga('send', 'event', 'ux', 'click', 'oblibene');\"></span><br /><span>OBLÍBENÉ</span></a>
              </div>";

                                                            $vypis = "SELECT * FROM informace where cid='$id' ";
                                                            $akce = mysql_query($vypis, $spoj);
                                                            while ($row = mysql_fetch_array($akce)) {
                                                                $loc = $row[61]; //načtení lokace z db   
                                                                ?>                                
                                                    <div class="embed-responsive embed-responsive-16by9" style="padding-bottom: 250px;">
                                                        <div class="bily-ctverec"></div>
                                                                <?php
                                                                $coma = strpos($loc, ',');
                                                                $loc1 = substr($loc, 0, $coma);
                                                                $loc2 = substr($loc, $coma + 2);
                                                                $src = 'https://www.google.com/maps/embed/v1/place?q=' . $loc1 . '%2C%20' . $loc2 . '&key=AIzaSyD8mNLmybvOJIHYmpbOObfshG43-uUMIgk';
                                                                echo $src;
                                                                ?>


                                                        <iframe class="google-mapa" style="height:250px;" src="<?php echo $src; ?>"></iframe>
                                                    </div>  


                                                                <?php
                                                            }


                                                            echo "</div>
          </div>
          <br />
          
          
          <div class=\"row\">
             ";



                                                            $vypis8 = "SELECT * FROM akcninabidka where cid='$id'  and archiv <>1";
                                                            $akce8 = mysql_query($vypis8, $spoj);

                                                            while ($row8 = mysql_fetch_object($akce8)) {
                                                                echo "
            <div class=\"col-md-12\">
              <div id=\"sale\" class=\"well well-sale\" title=\"Akce\">
                $row8->text
              </div>
            </div>
           ";
                                                            }
                                                            ?>

                                                <div class="col-md-12">
                                                    <div role="tabpanel">
                                                        <ul class="nav nav-tabs properties" role="tablist">
                                                            <li role="presentation" class="active">
                                                                <a href="#tab1" aria-controls="tab1" role="tab" data-toggle="tab" onClick="ga('send', 'event', 'ux', 'click', 'tab-1 - zakladni informace');"><b><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span> Základní informace</b></a>
                                                            </li>
                                                            <li role="presentation">
                                                                <a href="#tab2" aria-controls="tab2" role="tab" data-toggle="tab" id="tab-tab2" onClick="ga('send', 'event', 'ux', 'click', 'tab-2 - cenik');"><b><span class="glyphicon glyphicon-piggy-bank" aria-hidden="true"></span> Ceník</b></a>
                                                            </li>
                                                            <li role="presentation">
                                                                <a href="#tab3" aria-controls="tab3" role="tab" data-toggle="tab" onClick="ga('send', 'event', 'ux', 'click', 'tab-3 - vybaveni');"><b><span class="glyphicon glyphicon-lamp" aria-hidden="true"></span> Vybavení</b></a>
                                                            </li>
                                                            <li role="presentation">
                                                                <a href="#tab4" aria-controls="tab4" role="tab" data-toggle="tab" onClick="ga('send', 'event', 'ux', 'click', 'tab-4 - lokalita');"><b><span class="glyphicon glyphicon-tree-deciduous" aria-hidden="true"></span> Aktivity v okolí</b></a>
                                                            </li>
                                                            <li role="presentation">
                                                                <a href="#tab5" aria-controls="tab5" role="tab" data-toggle="tab" id="tab-tab5"  onClick="ga('send', 'event', 'ux', 'click', 'tab-5 - objednavka');"><b><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> Objednávka termínu</b></a>
                                                            </li>
															
                                                            <?php
                                                            $poc = 0;
                                                            $vypis5 = "SELECT * FROM recenze where ido='$id' and vyplneno='1' and smazat!='1' order by id desc";
                                                            $akce5 = mysql_query($vypis5, $spoj);
                                                            while ($row5 = mysql_fetch_object($akce5)) {
                                                                $poc++;
                                                            }
                                                            echo "      <li role=\"presentation\">
                    <a href=\"#tab6\" aria-controls=\"tab6\" role=\"tab\" data-toggle=\"tab\" onClick=\"ga('send', 'event', 'ux', 'click', 'tab-6 - recenze');\" ><b><span class=\"glyphicon glyphicon-star\" aria-hidden=\"true\"></span> Recenze ($poc)</b></a>
                  </li>";
                                                            
                                                            $blogCountQuery="SELECT * FROM bloglokality, blogclanek where bloglokality.lid='$lid' and bloglokality.cid=blogclanek.id order by datum desc"; 
$blogCount=mysql_query($blogCountQuery,$spoj); 
?>
															<li role="presentation" >
                                                                                                                            <a href="#tab7" aria-controls="tab7" role="tab" data-toggle="tab" id="tab-tab7" onClick="ga('send', 'event', 'ux', 'click', 'tab-7 - blog');" ><b><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> Články z blogu (<?php echo mysql_num_rows($blogCount)?>)</b></a>
                                                            </li>
                                                            </ul>
<?php                                                         






                                                            include 'detail2.php';




// obsazenost

                                                            echo "
<div role=\"tabpanel\" class=\"tab-pane\" id=\"tab5\">
                    <table class=\"table table-bordered table-condensed table-hover\">
                      <thead>
                        <tr>
                          <th>Název</th>
                          <th>Termín od</th>
                          <th>Termín do</th>
                          <th>Stav</th>
                        </tr>
                      </thead>
                      <tbody>
                      ";
                                                            $vypis = "SELECT * FROM informace where cid='$id' ";
                                                            $akce = mysql_query($vypis, $spoj);
                                                            while ($row = mysql_fetch_array($akce)) {
                                                                if ($row[12] == 1) {
                                                                    $nedele = 1;
                                                                }
                                                            }

                                                            $vypis = "SELECT terminy.id, terminy.od, terminy.do, terminy.idtyp, terminy.archiv FROM terminy, povoleneterminy where terminy.id=povoleneterminy.idt and .terminy.archiv='0' and povoleneterminy.ido='$id' ORDER BY  `terminy`.`od` ASC ";
                                                            
                                                            $akce = mysql_query($vypis, $spoj);
//                                                            print_r($akce);
                                                            while ($row = mysql_fetch_object($akce)) {

                                                                $odden = substr($row->od, 8, 2);
                                                                $odmesic = substr($row->od, 5, 2);
                                                                $odrok = substr($row->od, 0, 4);
                                                                $od = $row->od;
                                                                /*
                                                                  if ( $nedele == 1 ) {
                                                                  if ( $odmesic == 01 or $odmesic == 03 or $odmesic == 05 or $odmesic == 07 or $odmesic == 08 or $odmesic == 10 or $odmesic == 12 ) { if ( $odden == 31 ) {$odden=1; $odmesic++;}  }   // 31
                                                                  if ( $odmesic == 04 or $odmesic == 06 or $odmesic == 09 or $odmesic == 11 ) { if ( $odden == 30 ) {$odden=1; $odmesic++;}  }   // 30
                                                                  if ( $odmesic == 02 ) { if ( $odden == 28 ) {$odden=1; $odmesic++;}  }   // 28
                                                                  }
                                                                 */
                                                                $doden = substr($row->do, 8, 2);
                                                                $domesic = substr($row->do, 5, 2);
                                                                $dorok = substr($row->do, 0, 4);
                                                                $do = $row->do;
                                                                /*
                                                                  if ( $nedele == 1 ) {
                                                                  if ( $domesic == 01 or $domesic == 03 or $domesic == 05 or $domesic == 07 or $domesic == 08 or $domesic == 10 or $domesic == 12 ) { if ( $doden == 31 ) {$doden=1; $domesic++;}  }   // 31
                                                                  if ( $domesic == 04 or $domesic == 06 or $domesic == 09 or $domesic == 11 ) { if ( $doden == 30 ) {$doden=1; $domesic++;}  }   // 30
                                                                  if ( $domesic == 02 ) { if ( $doden == 28 ) {$doden=1; $domesic++;}  }   // 28
                                                                  }
                                                                 */
                                                                $stav = null;
                                                                $dnesni = date("Y-m-d");

                                                                $vypis2 = "SELECT * FROM terminytyp where id='$row->idtyp'";
                                                                $akce2 = mysql_query($vypis2, $spoj);
                                                                while ($row2 = mysql_fetch_object($akce2)) {
                                                                    $nazevtermin = $row2->nazev;
                                                                }
                                                                $vypis2 = "SELECT * FROM objednavka where datum='$row->id' and ido=$id ORDER BY  `objednavka`.`datumobjednavky` ASC ";
                                                                $akce2 = mysql_query($vypis2, $spoj);
                                                                while ($row2 = mysql_fetch_object($akce2)) {
                                                                    $stav = $row2->stav;
                                                                    $stornovanadne = $row2->stornovanadne;
                                                                    $objcislo = $row2->prcislo;
                                                                    $idobj = $row2->id;
                                                                    $datumnastup = $row2->datumnastup;
                                                                    $datumukonceni = $row2->datumukonceni;
                                                                    $idtermin = $row2->datum;            
                                                                }


                                                                //  natvrdo obsazeny termin
                                                                $terobsazeny = 0;
                                                                $vypis15 = "SELECT * FROM terminyobsazene where ido='$id' and idt='$row->id'";
                                                                $akce15 = mysql_query($vypis15, $spoj);
                                                                while ($row15 = mysql_fetch_object($akce15)) {
                                                                    $terobsazeny = 1;
                                                                }

// rezervovany termin administratorem
                                                                $rezervace = 0;
                                                                $vypis15 = "SELECT * FROM rezervace where ido='$id' and  idt='$row->id' ";
                                                                $akce15 = mysql_query($vypis15, $spoj);
                                                                while ($row15 = mysql_fetch_object($akce15)) {
                                                                    $rezervace = 1;
                                                                }

                                                                $castecne = 0;
                                                                $castecneod = 0;
                                                                $castecnedo = 0;
                                                                $castecnestejny = 0;        // CASTENE OBSAZENI                      
                                                                $vypis2 = "SELECT * FROM objednavka, objednavkatermin where ((objednavka.datumnastup >= '$od' and objednavka.datumnastup < '$do') or ( objednavka.datumukonceni > '$od' and objednavka.datumukonceni <= '$do')) and objednavka.ido=$id and objednavkatermin.idobj=objednavka.id and objednavka.stornovanadne = '0000-00-00' ORDER BY  `objednavka`.`datumnastup` ASC ";
                                                                $akce2 = mysql_query($vypis2, $spoj);
                                                                while ($row2 = mysql_fetch_object($akce2)) {
                                                                    $castecne = 1;
                                                                }

                                                                $vypis2 = "SELECT * FROM objednavka, objednavkatermin where (objednavka.datumnastup < '$do' and objednavka.datumukonceni > '$od' ) and objednavka.ido=$id and objednavkatermin.idobj=objednavka.id and objednavka.stornovanadne = '0000-00-00' ORDER BY  `objednavka`.`datumnastup` ASC ";
                                                                $akce2 = mysql_query($vypis2, $spoj);
                                                                while ($row2 = mysql_fetch_object($akce2)) {
                                                                    /*                                                                     * **** vyreseni ze kdyz je stejny termin jak castecne obsazeny termnin tak je vlastne obsazeny plne */
                                                                    if ($row2->datumnastup == $od) {
                                                                        if ($row2->datumukonceni > $do) {
                                                                            $castecnestejny = 1;
                                                                        }
                                                                    }
                                                                    if ($row2->datumnastup < $od) {
                                                                        if ($row2->datumukonceni > $do) {
                                                                            $castecnestejny = 1;
                                                                        }
                                                                    }
                                                                    if ($row2->datumnastup < $od) {
                                                                        if ($row2->datumukonceni == $do) {
                                                                            $castecnestejny = 1;
                                                                        }
                                                                    }
                                                                }




                                                                $castecnemajitel = 0;           // CASTENE OBSAZENI majitel                     
                                                                $vypis2 = "SELECT * FROM terminycastecneobsazene where idt='$row->id' and ido='$id' ";
                                                                $akce2 = mysql_query($vypis2, $spoj);
                                                                while ($row2 = mysql_fetch_object($akce2)) {
                                                                    $castecnemajitel = 1;
                                                                }



                                                                // rozliseniviceapartmanu
                                                                $vice = 0;
                                                                $vypis10 = "SELECT * FROM viceapartman where ido='$id'";
                                                                $akce10 = mysql_query($vypis10, $spoj);
                                                                while ($row10 = mysql_fetch_object($akce10)) {
                                                                    $vice = 1;
                                                                }
                                                                if ($vice == '1') {   // je viceapartman
                                                                    $viceobs = 0;
                                                                    $vypis10 = "SELECT * FROM viceapartmanobsazenost where ido='$id' and idt='$row->id'";
                                                                    $akce10 = mysql_query($vypis10, $spoj);
                                                                    while ($row10 = mysql_fetch_object($akce10)) {
                                                                        $viceobs = 1;
                                                                    }
                                                                    if ($viceobs == '1') {
                                                                        echo "<tr class=\"danger\"><td >&nbsp;$nazevtermin</td><td>&nbsp; $odden. $odmesic. $odrok</td><td>&nbsp; $doden. $domesic. $dorok</td>
   <td> <button class=\"btn btn-xs btn-default\" disabled=\"disabled\">plně obsazeno</button>";
                                                                    } else {

                                                                        if ($terobsazeny == '1') {
                                                                            echo "<tr id=\"volny-obsazeny\">";
                                                                            $pom = 2;
                                                                        }
                                                                        if ($stav == null and ( $dnesni > $do ) and $terobsazeny == '0') {
                                                                            echo "<tr id=\"volny-termin\"><td >&nbsp;$nazevtermin</td><td>&nbsp; $odden. $odmesic. $odrok</td><td>&nbsp; $doden. $domesic. $dorok</td>
   <td> <button class=\"btn btn-xs btn-default\" disabled=\"disabled\">již nelze objednat</button>";
                                                                        }
                                                                        if ($stav == '1' and $stornovanadne != '0000-00-00' and ( $dnesni > $do) and $terobsazeny == '0') {
                                                                            echo "<tr><td >cc&nbsp;$nazevtermin</td><td>&nbsp; $odden. $odmesic. $odrok</td><td>&nbsp; $doden. $domesic. $dorok</td>
   <td> <button class=\"btn btn-xs btn-default\" disabled=\"disabled\">již nelze objednat</button>";
                                                                        }

                                                                        if (($stav == null or $stornovanadne != '0000-00-00' ) and ( $dnesni < $od ) and $terobsazeny == '0') {

                                                                            echo "<tr id=\"volny-termin\"><td >&nbsp;$nazevtermin</td><td>&nbsp; $odden. $odmesic. $odrok</td><td>&nbsp; $doden. $domesic. $dorok</td>
   <td><form method=\"post\" name=\"objednavka\" enctype=\"multipart/form-data\" action=\"$hladresa/objednavka/\" >
<input type=\"hidden\" name=\"objekt\" value=\"$id\" />
<input type=\"hidden\" name=\"datum\" value=\"$row->id\" />
<input  type=\"submit\" value=\"Objednat pobyt\" name=\"tlacitko\" />
</form>";
                                                                        } else {
                                                                            echo "<tr id=\"volny-termin\"><td >&nbsp;$nazevtermin</td><td>&nbsp; $odden. $odmesic. $odrok</td><td>&nbsp; $doden. $domesic. $dorok</td>
   <td><form method=\"post\" name=\"objednavka\" enctype=\"multipart/form-data\" action=\"$hladresa/objednavka/\" >
<input type=\"hidden\" name=\"objekt\" value=\"$id\" />
<input type=\"hidden\" name=\"datum\" value=\"$row->id\" />
<input  type=\"submit\" value=\"Objednat pobyt\" name=\"tlacitko\" />
</form>";
                                                                        }       // je tady error.. tohle je doohozene jen tak
                                                                    }
                                                                }    // je viceapartman 
                                                                else {    // viceapartman neni 
                                                                    $abc = 0;
                                                                    if ($terobsazeny == '1') {
                                                                        echo "<tr class=\"danger\">";
                                                                        $pom = 2;
                                                                        $abc = 5;
                                                                    }
                                                                    if ($stav == null or ( $stav == '1' and $stornovanadne != '0000-00-00' )) {
                                                                        if ($terobsazeny == '0') {
                                                                            echo "<tr>";
                                                                            $abc = 1;
                                                                        }
                                                                    }
                                                                    if (($stav == '1' and $stornovanadne == '0000-00-00') or ( $stav == '2' and $stornovanadne == '0000-00-00') and $terobsazeny == '0') {
                                                                        echo "<tr class=\"danger\">";
                                                                        $pom = 2;
                                                                        $abc = 2;
                                                                    }
                                                                    if (($stav == '0' and $terobsazeny == '0') or $rezervace == '1') {
                                                                        echo "<tr class=\"success\">";
                                                                        $pom = 1;
                                                                        $abc = 3;
                                                                    }
                                                                    if ($castecne == 1 or $castecnemajitel == '1' or $castecnestejny == '1') {
                                                                        echo "<tr class=\"danger\">";
                                                                        $pom = 0;
                                                                        $abc = 4;
                                                                    }
                                                                    echo "<td >$nazevtermin</td><td>$odden. $odmesic. $odrok</td><td>$doden. $domesic. $dorok</td>
   <td>";

//echo 'TEST';
//print_r($do);
                                                                    $vypis2 = "SELECT * FROM objednavka, objednavkatermin where ((objednavka.datumnastup >= '$od' and objednavka.datumnastup < '$do') or ( objednavka.datumukonceni > '$od' and objednavka.datumukonceni <= '$do')) and objednavka.ido=$id and objednavkatermin.idobj=objednavka.id and stornovanadne='0000-00-00' ORDER BY  `objednavka`.`datumnastup` ASC ";
                                                                    $akce2 = mysql_query($vypis2, $spoj);
                                                                    while ($row2 = mysql_fetch_object($akce2)) {
                                                                        if ($castecnestejny == 0) {
                                                                            $m = substr($row2->datumnastup, 5, 2);
                                                                            $d = substr($row2->datumnastup, 8, 2);
                                                                            $mo = substr($row2->datumukonceni, 5, 2);
                                                                            $de = substr($row2->datumukonceni, 8, 2);
                                                                            echo "Objekt&nbsp;je&nbsp;částečně&nbsp;obsazenod $d. $m. do $de. $mo.</strong><br />";
//if ( ($od <= $datumnastup) and  ($do >= $datumnastup) ) { echo "bbb"; }
//if ( ($od <= $datumukonceni) and  ($do >= $datumukonceni ) ) { echo "ccc"; } 
                                                                        }
                                                                    }

                                                                    // CASTENE OBSAZENI majitel  
                                                                    if ($castecnemajitel == 1) {
                                                                        echo "<strong>Objekt&nbsp;je&nbsp;částečně<br />obsazen&nbsp;ve&nbsp;dnech:</strong>";
                                                                        $vypis2 = "SELECT * FROM terminycastecneobsazene where idt='$row->id' and ido='$id' ";
                                                                        $akce2 = mysql_query($vypis2, $spoj);
                                                                        while ($row2 = mysql_fetch_object($akce2)) {
                                                                            $castecnemajitel = 1;
                                                                            $m = substr($row2->den, 5, 2);
                                                                            $d = substr($row2->den, 8, 2);
                                                                            echo "<br /> $d.$m";
                                                                        }
                                                                    }


                                                                    if ($stav == null and ( $dnesni > $do ) and $terobsazeny == '0') {
                                                                        echo "<button class=\"btn btn-xs btn-default\" disabled=\"disabled\">již nelze objednat</button>";
                                                                    }
                                                                    if ($stav == '1' and $stornovanadne != '0000-00-00' and ( $dnesni > $do) and $terobsazeny == '0') {
                                                                        echo "<button class=\"btn btn-xs btn-default\" disabled=\"disabled\">již nelze objednat</button>";
                                                                    }

                                                                    if ($castecne == 1 or $castecnemajitel == 1) {
                                                                        if ($castecnestejny == 0) {
                                                                            echo "<form method=\"post\" name=\"objednavka\" enctype=\"multipart/form-data\" action=\"$hladresa/objednavka/?castecne=1\" >
<input type=\"hidden\" name=\"objekt\" value=\"$id\" />
<input type=\"hidden\" name=\"datum\" value=\"$row->id\" />
<button class=\"btn btn-xs btn-primary\">Objednat částečný pobyt</button>
</form> ";
                                                                            $vyp = 1;
                                                                        }
                                                                    }

                                                                    if (($stav == null or $stornovanadne != '0000-00-00' ) and ( $dnesni < $do ) and $terobsazeny == '0' and $rezervace == '0') {
                                                                        if ($castecne == 0 and $castecnemajitel == 0) {
                                                                            if ($castecnestejny == 0) {
                                                                                echo "<form method=\"post\" name=\"objednavka\" enctype=\"multipart/form-data\" action=\"$hladresa/objednavka/\" >
<input type=\"hidden\" name=\"objekt\" value=\"$id\" />
<input type=\"hidden\" name=\"datum\" value=\"$row->id\" />
<button class=\"btn btn-xs btn-primary\">Objednat pobyt</button>
</form> ";
                                                                            }
                                                                        }
                                                                    }

                                                                    //<input  type=\"submit\" value=\"Objednat pobyt\" name=\"tlacitko\" />

                                                                    if ($pom == '1') {
                                                                        if ($rezervace == '0') {
                                                                            echo " &nbsp;rezervováno";
                                                                            $pom = 0;
                                                                        }
                                                                        if ($rezervace == '1') {
                                                                            echo "<form method=\"post\" name=\"objednavka\" enctype=\"multipart/form-data\" action=\"$hladresa/objednavka/?rezervace=1\" >
<input type=\"hidden\" name=\"objekt\" value=\"$id\" />
<input type=\"hidden\" name=\"datum\" value=\"$row->id\" />
<button class=\"btn btn-xs btn-default\">Objednat rezervovaný pobyt</button>
</form> ";
                                                                            $pom = 0;
                                                                        }
                                                                    }
                                                                    if ($pom == '2' or $vyp == '0' or $castecnestejny == 1) {
                                                                        echo "<button class=\"btn btn-xs btn-default\" disabled=\"disabled\">plně obsazeno</button>";
                                                                        $pom = 0;
                                                                    } /* doresit upravu */
                                                                }  // vice apartman neni




                                                                echo "
   </td>
   </tr>
  ";
                                                            }

                                                            echo "<tr id=\"volny-termin\" ><td colspan=\"3\"> Objednání jiného termínu: </td><td><form method=\"post\" name=\"objednavka\" enctype=\"multipart/form-data\" action=\"$hladresa/objednavka/\" >
<input type=\"hidden\" name=\"objekt\" value=\"$id\" />
<input type=\"hidden\" name=\"datum\" value=\"neni\" />
<button class=\"btn btn-xs btn-primary\">Objednat pobyt</button>
</form>
</td></tr>";
                                                        }

                                                        echo "</table>
                  </div>";
// obsazenost konec

                                                        include 'detail3.php';


                                                        echo "     </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>";
                                                    }
                                                }
                                            }
                                        }

                                        /*                                         * ************************************************ cesta ************************************************************************************ */

                                        function cesta($hladresa, $zemenazev, $zemekod, $lokalitanazev, $lokalitakod, $okresynazev, $okresykod, $objektnazev, $patro) {


                                            if ($patro == '1') {
                                                echo "<ol class=\"breadcrumb\"><li class=\"active\">$zemenazev</li></ol>";
                                            }
                                            if ($patro == '2') {
                                                echo "<ol class=\"breadcrumb\"><li><a href=\"$hladresa/$zemekod/\" title=\"$zemenazev\">$zemenazev</a></li><li class=\"active\">$lokalitanazev</li></ol>";
                                            }
                                            if ($patro == '3') {
                                                echo "<ol class=\"breadcrumb\"><li><a href=\"$hladresa/$zemekod/\" title=\"$zemenazev\">$zemenazev</a></li><li><a href=\"$hladresa/$lokalitakod/$zemekod/\" title=\"$lokalitanazev\">$lokalitanazev</a></li><li class=\"active\">$okresynazev</li></ol>";
                                            }
                                            if ($patro == '4') {
                                                echo "<ol class=\"breadcrumb\"><li><a href=\"$hladresa/$zemekod/\" title=\"$zemenazev\">$zemenazev</a></li><li><a href=\"$hladresa/$lokalitakod/$zemekod/\" title=\"$lokalitanazev\">$lokalitanazev</a></li><li class=\"active\">$objektynazev</li></ol>";
                                            }
                                            if ($patro == '5') {
                                                echo "<ol class=\"breadcrumb\"><li><a href=\"$hladresa/$zemekod/\" title=\"$zemenazev\">$zemenazev</a></li><li><a href=\"$hladresa/$lokalitakod/$zemekod/\" title=\"$lokalitanazev\">$lokalitanazev</a></li><li><a href=\"$hladresa/$lokalitakod/$zemekod/$okresykod/\" title=\"$okresynazev\">$okresynazev</a></li><li class=\"active\">$objektnazev</li></ol>";
                                            }
                                        }
                                        ?>   



                                        <div id="footer">
                                            <p class="text-center">&copy; 2015 ZARS - Dovolená hezky česky &reg; | Chaty a chalupy k pronajmutí - pronájem chat a chalup | Design: <a href="http://www.sensemedia.cz" target="_blank">SenseMedia</a></p>

                                            <a href="http://www.toplist.cz/stat/1102089"><script language="JavaScript" type="text/javascript">
                                                <!--
                                  document.write('<img src="http://toplist.cz/dot.asp?id=1102089&amp;http=' + escape(document.referrer) + '&amp;t=' + escape(document.title) +
                                                        '" width="1" height="1" border=0 alt="TOPlist" />');
                                                //--></script></a><noscript><img src="http://toplist.cz/dot.asp?id=1102089" border="0"
                                                                        alt="TOPlist" width="1" height="1" /></noscript> 


                                        </div>
                                </div>
                            </div>
                                                </div>
<?php
$adresa = substr($stranka, 0, 8);
//echo 'ADRESA ' . $adresa;
if ($adresa != 'frecenze') {
  //  echo "SKRIPTY";
    ?>    
                                <!--<script src="<?php echo "$hladresa/"; ?>js/jquery.min.js"></script>-->
                            <script
  src="https://code.jquery.com/jquery-1.12.4.min.js"
  integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="
  crossorigin="anonymous"></script>
                                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
                                <!--<script src="<?php echo "$hladresa/"; ?>js/bootstrap.min.js"></script>-->
                                <script src="<?php echo "$hladresa/"; ?>js/jquery.backstretch.min.js"></script>
                                <script src="<?php echo "$hladresa/"; ?>js/jquery.chained.min.js"></script>

    <?php
}
?>     
                                <script src="http://zars.cz/lightbox/js/lightbox.min.js"></script>
                                
                                 <script src="https://www.google.com/recaptcha/api.js"></script>
                                 
                                
                                
                                

                            <script>
                                                $('#region').chained('#country');
                            </script>
                            <script>
                                $(document).ready(function () {
                                    $.backstretch("http://zars.cz/img/bg.jpg");
                                    $('#jumbotron-carousel').carousel({interval: 10000});
                                    $('#reviews-carousel').carousel({interval: 15000});
                                });
                            </script>

                            <script>
                                $(document).ready(function () {
                                    var url = window.location.href;
                                    if (url.indexOf('#') > -1) {
                                        var anchor = url.substring(url.indexOf('#') + 1);
                                        //                    console.log(anchor);
                                        $('#link-' + anchor).click();
                                    }

                                    $.backstretch("http://zars.cz/img/bg.jpg");
                                    $('#carousel-detail-property').on('slid.bs.carousel', function (e) {
                                        var carouselData = $(this).data('bs.carousel');
                                        var currentIndex = carouselData.getItemIndex(carouselData.$element.find('.item.active'));
                                        $('#thumbs-detail-property ul li').removeClass('active');
                                        $('#thumbs-detail-property ul li[data-slide-to="' + currentIndex + '"]').addClass('active');
                                    });
                                    $('#thumbs-detail-property ul li').on('click', function () {
                                        $('#thumbs-detail-property ul li').removeClass('active');
                                        $(this).addClass('active');
                                    });
                                    $(document).delegate('*[data-toggle="lightbox"]', 'click', function (event) {
                                        event.preventDefault();
                                        $(this).ekkoLightbox();
                                    });
                                    // NEW-DETAIL START
                                    $('.search-btn').on('click', function () {
                                        $('.navbar-footer').slideDown(function () {
                                            var search = $(this).find('input[type=text]');
                                            $(search).focus();
                                            $(search).blur(function () {
                                                $('.navbar-footer').slideUp();
                                            });
                                        });
                                    });
                                    // NEW-DETAIL END

                                });

                                //otevření rezervace
                                $(document).on('click', '#open-tab5', function (event) {
                                    $('#tab-tab5').click();
                                });
                                //otevření cenik
                                $(document).on('click', '#open-tab2', function (event) {
                                    $('#tab-tab2').click();
                                });


                            </script>



                            <script>
                                $(document).ready(function () {
                                    $.backstretch("http://zars.cz/img/bg.jpg");
                                    $("input[name$='zvire']").click(function () {
                                        if ($(this).val() == 1) {
                                            $("#zvirejake-block").fadeIn();
                                            $("#zvirejake").focus();
                                        } else {
                                            $("#zvirejake-block").fadeOut();
                                        }
                                    });
                                });
                            </script>


                            <script type="text/javascript">
//                                var _mfq = _mfq || [];
//                                (function () {
//                                    var mf = document.createElement("script");
//                                    mf.type = "text/javascript";
//                                    mf.async = true;
//                                    mf.src = "//cdn.mouseflow.com/projects/73bb1ebc-f73b-4179-ac4e-e64dbdfe51e9.js";
//                                    document.getElementsByTagName("head")[0].appendChild(mf);
//                                })();
                            </script>


                            </body>
                            </html>

<?php
$tiskk = $_GET["tisk"];
if ($tiskk == '1') {
    ?>
                                <script type="text/javascript" language="JavaScript"><!--    

                                    window.onload = print();

                                    // -->
                                </script>
    <?php
}


//z ceníku
//                    od $row->cenal Kč os/noc <span class=\"glyphicon glyphicon-info-sign\" data-toggle=\"tooltip\" data-placement=\"bottom\" title=\"Cena je pouze orientační. Odvíjí se od $row->cenal Kč os/noc\"></span> 
