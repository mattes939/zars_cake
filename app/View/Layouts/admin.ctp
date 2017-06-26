<?php
$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
    <head>
        <?php echo $this->Html->charset(); ?>
        <title>
            <?php echo $cakeDescription ?>:
            <?php echo $this->fetch('title'); ?>
        </title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

        <!--        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/dt-1.10.13/cr-1.3.2/fc-3.2.2/fh-3.1.2/kt-2.2.0/r-2.1.0/sc-1.4.2/datatables.min.css"/>-->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/jqc-1.12.4/dt-1.10.15/cr-1.3.3/fh-3.1.2/datatables.min.css"/>

        <?php
        echo $this->Html->meta('icon');

        echo $this->Html->css([
            '../plugins/datepicker/datepicker3.css',
            'admin',
        ]);

        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');
        ?>
    </head>
    <body>
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <?php echo $this->Html->link('ZARS', ['controller' => 'houses', 'action' => 'index'], ['class' => ['navbar-brand']]); ?>
                    <!--<a class="navbar-brand" href="#">Project name</a>-->
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <!--<li><?php echo $this->Html->link('Objednávky', ['controller' => 'orders', 'action' => 'index']); ?></li>-->
                        <li><?php echo $this->Html->link('Objekty', ['controller' => 'houses', 'action' => 'index']); ?></li>
                        <li><?php echo $this->Html->link('Objednávky', ['controller' => 'orders', 'action' => 'index']); ?></li>
                        <!--                        <li class="dropdown">
                                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                                                    <ul class="dropdown-menu">
                                                        <li><a href="#">Action</a></li>
                                                        <li><a href="#">Another action</a></li>
                                                        <li><a href="#">Something else here</a></li>
                                                        <li role="separator" class="divider"></li>
                                                        <li class="dropdown-header">Nav header</li>
                                                        <li><a href="#">Separated link</a></li>
                                                        <li><a href="#">One more separated link</a></li>
                                                    </ul>
                                                </li>-->
                    </ul>
                    <ul class="nav navbar-nav navbar-right">

                        <li><?php echo $this->Html->link('Odhlásit se', ['controller' => 'users', 'action' => 'logout', 'admin' => FALSE]); ?></li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </nav>
        <div class="container">



            <?php echo $this->Flash->render(); ?>

            <?php echo $this->fetch('content'); ?>


            <script
                src="https://code.jquery.com/jquery-1.12.4.min.js"
                integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="
            crossorigin="anonymous"></script>

            <!-- Latest compiled and minified JavaScript -->
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<!--            <script type="text/javascript" src="https://cdn.datatables.net/v/bs/dt-1.10.13/cr-1.3.2/fc-3.2.2/fh-3.1.2/kt-2.2.0/r-2.1.0/sc-1.4.2/datatables.min.js"></script>-->
            <script type="text/javascript" src="https://cdn.datatables.net/v/bs/jqc-1.12.4/dt-1.10.15/cr-1.3.3/fh-3.1.2/datatables.min.js"></script>
            <?php
            echo $this->Html->script([
//                '//cdn.datatables.net/plug-ins/1.10.13/i18n/Czech.json',
                '../plugins/datepicker/bootstrap-datepicker.js',
                '../plugins/datepicker/locales/bootstrap-datepicker.cs.js',
                'tinymce/tinymce.min',
                'misc'
            ]);
            ?>
            <?php $this->TinymceElfinder->defineElfinderBrowser() ?>
            <script>
                tinymce.init({
                    selector: 'textarea',
                    plugins: 'advlist autolink link image lists charmap print preview code',
                    language: 'cs',
                    file_browser_callback: elFinderBrowser
                            //     toolbar: false
                });
            </script>
    </body>
</html>

