<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title><?php echo $title_for_layout; ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/smoothness/jquery-ui.css"/>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <?php if (Configure::read('GalleryOptions.App.interfaced')) { ?>
        <?php echo $this->Html->css(
            array(
                'Gallery.themes/' . Configure::read('GalleryOptions.App.theme') . '.min'
            )
        ); ?>
    <?php } ?>

    <?php echo $this->Html->script('Gallery.lib/modernizr') ?>
    <?php echo $this->fetch('css'); ?>
</head>
<body class="<?php echo $this->params->params['controller'] . '_' . $this->params->params['action'] ?>"
      data-base-url="<?php echo $this->params->webroot ?>"
      data-plugin-base-url="<?php echo $this->Html->url(
          array('plugin' => 'gallery', 'controller' => 'gallery', 'action' => 'index')
      ) ?>">
<!--[if lt IE 7]>
<p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser
    today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better
    experience this site.</p>
<![endif]-->

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
<script>window.jQuery || document.write('<script src="<?php echo $this->params->webroot ?>js/lib/jquery.min.js"><\/script>')</script>


<?php if (Configure::read('GalleryOptions.App.interfaced')) { ?>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<?php } ?>

<?php echo $this->fetch('js'); ?>

<?php if (Configure::read('GalleryOptions.App.interfaced')) { ?>
    <div class="container">
        <div class="navbar navbar-default" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand"
                       href="<?php echo $this->Html->url(
                           array('controller' => 'gallery', 'action' => 'index', 'plugin' => 'gallery')
                       ) ?>">CakeGallery</a>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav pull-right">
                        <li>
                            <?php 
//                            echo $this->Html->link( 'Albums', array('controller' => 'gallery', 'action' => 'index', 'plugin' => 'gallery')); 
//                            echo $this->Html->link($title)
                            ?>
                            <a href="javascript:window.open('','_self').close();"><span class="glyphicon glyphicon-remove"></span>&nbsp;zavřít okno</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <?php echo $this->Session->flash(); ?>
        <?php echo $this->fetch('content'); ?>

    </div>
<?php } else { ?>
    <?php echo $this->Session->flash(); ?>
    <?php echo $this->fetch('content'); ?>
<?php } ?>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>
