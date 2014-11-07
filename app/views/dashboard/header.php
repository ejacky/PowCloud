<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8">
    <title>POW Server</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Loading Bootstrap -->
    <link href="<?php echo URL::asset('css/bootstrap.css'); ?>" rel="stylesheet">
    <link href="<?php echo URL::asset('css/bootstrap-responsive.css'); ?>" rel="stylesheet">
    <link href="<?php echo URL::asset('css/pow_style.css'); ?>" rel="stylesheet">

    <!-- Loading Flat UI -->
    <!--    <link href="--><?php //echo URL::asset('css/flat-ui.css'); ?><!--" rel="stylesheet">-->

    <link rel="shortcut icon" href="<?php echo URL::asset('img/favicon.ico'); ?> ">

    <!--    <link href="--><?php //echo URL::asset('css/x-man.css'); ?><!-- " rel="stylesheet">-->

    <link href="<?php echo URL::asset('css/essage.css'); ?> " rel="stylesheet">

    <script src="<?php echo URL::asset('js/jquery-1.8.3.min.js'); ?>"></script>
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
    <script src="<?php echo URL::asset('js/html5shiv.js'); ?>"></script>
    <![endif]-->
    <script>
        document.domain = '<?php echo \Utils\Env::getRootDomain(); ?>';
    </script>
</head>
<body>
<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">

        <div class="container-fluid">
            <!--            <a data-target=".navbar-collapse" data-toggle="collapse" class="btn navbar-btn">-->
            <!--                <span class="glyphicon glyphicon-bar"></span>-->
            <!--                <span class="glyphicon glyphicon-bar"></span>-->
            <!--                <span class="glyphicon glyphicon-bar"></span>-->
            <!--            </a>-->
            <a class="navbar-brand" href="#" style="color:#ffffff;">POW Cloud</a>

            <div class="pull-right">
                <p class="navbar-text">
                    欢迎 <a
                        href="<?php echo URL::action('UserMessageController@viewReset') ?>"><?php echo Auth::user()->name; ?></a>
                    登陆，<a
                        href="<?php echo URL::action('LoginController@logout') ?>">注销</a>
                </p>
            </div>
            <!--/.navbar-collapse -->
        </div>
    </div>
</div>
<div style="overflow:hidden;">
    <div class="">

