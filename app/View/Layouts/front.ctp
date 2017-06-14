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
             '../plugins/datepicker/datepicker3.css',
            'main',
            'blog',
            'lightbox.min',
            'ekko-lightbox.min',
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
            <div id="wrapper">
                <div id="header">
                    <div class="header-logo">
                        <a href="<?php echo $this->webroot; ?>" title="Úvodní stránka"><img src="<?php echo $this->webroot; ?>img/logo.png" width="129" height="60" /></a>
                    </div>
                    <div class="header-slogan hidden-xs hidden-sm hidden-md">
                        <h1><a href="<?php echo $this->webroot; ?>" title="Úvodní stránka">Chaty a chalupy k pronajmutí v ČR a SR</a></h1>
                    </div>
                    <div class="header-social hidden-xs hidden-sm hidden-md">
                        <a href="https://www.facebook.com/zars.cz" target="_blank"><img src="<?php echo $this->webroot; ?>img/facebook.png" width="35" height="35" /></a>
                    </div>

                </div>
                <div class="hidden-xs banner">

                </div>

                <?php echo $this->Flash->render(); ?>

                <?php echo $this->fetch('content'); ?>
                <?php echo $this->element('sql_dump'); ?>
            </div>
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
            '../plugins/datepicker/bootstrap-datepicker.js',
            '../plugins/datepicker/locales/bootstrap-datepicker.cs.js',
            'jquery.backstretch.min',
            'jquery.chained.min',
            'lightbox.min',
            'zars.scripts',
            'misc'
        ]);
        ?>
        <script>
//            $("#HouseArea").chainedTo("#HouseCountry");
        </script>
<!--            <script type="text/javascript">
            tinyMCE.init({
                // General options
                language: "cs", // change language here
                mode: "textareas",
                theme: "advanced",
                entity_encoding: "raw",
                plugins: "safari,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,imagemanager,fullpage,wfpfile",
                // Theme options

                theme_advanced_buttons1: "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,formatselect,fontselect,fontsizeselect",
                theme_advanced_buttons2: "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
                theme_advanced_buttons3: "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
                theme_advanced_buttons4: "insertlayer,moveforward,movebackward,absolute,|,styleprops,spellchecker,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,blockquote,pagebreak,|,insertfile,insertimage|,insertimage,|,wfpfile",
                theme_advanced_toolbar_location: "top",
                theme_advanced_toolbar_align: "left",
                theme_advanced_statusbar_location: "bottom",
                theme_advanced_resizing: true,
                editor_deselector: "noedit",
                // Example content CSS (should be your site CSS)
//                    content_css: "css/content.css"
            height : "280",
            width: "100%"

            });
        </script>-->
    </body>
</html>


