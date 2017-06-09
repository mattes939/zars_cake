<?php
$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html lang="cs">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="Author" content="www.tvorime-weby.cz" /> 
        <?php echo $this->Html->charset(); ?>
        <title>
            <?php echo $cakeDescription ?>:
            <?php echo $this->fetch('title'); ?>
        </title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">


        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/dt-1.10.13/cr-1.3.2/fc-3.2.2/fh-3.1.2/kt-2.2.0/r-2.1.0/sc-1.4.2/datatables.min.css"/>

        <?php
        echo $this->Html->meta('icon');

        echo $this->Html->css([
            'http://fonts.googleapis.com/css?family=Open+Sans:700,300,400&subset=latin,latin-ext',
            'http://fonts.googleapis.com/css?family=Capriola&subset=latin,latin-ext',
            'main',
            'blog',
//            'lightbox.min',
//            'ekko-lightbox.min',
            'detail-chalupy',
//            'tisk'
        ]);

        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');
        ?>
        <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
    </head>
    <body>

        <div class="container">
            <?php echo $this->fetch('content'); ?>
            <?php // echo $this->element('sql_dump'); ?>           
        </div>
        <script
            src="https://code.jquery.com/jquery-1.12.4.min.js"
            integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="
        crossorigin="anonymous"></script>

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<!--        <script type="text/javascript" src="https://cdn.datatables.net/v/bs/dt-1.10.13/cr-1.3.2/fc-3.2.2/fh-3.1.2/kt-2.2.0/r-2.1.0/sc-1.4.2/datatables.min.js"></script>-->
        <?php
        echo $this->Html->script([
//            '//cdn.datatables.net/plug-ins/1.10.13/i18n/Czech.json',
//                './tinymce/jscripts/tiny_mce/tiny_mce',
//            'jquery.backstretch.min',
//            'jquery.chained.min',
//            'lightbox.min',
            'zars.scripts',
            'misc'
        ]);
        ?>
    </body>
</html>



