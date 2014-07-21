<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <!--<meta http-equiv="X-UA-Compatible" content="IE=edge">-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo ($this->description=='')? Yii::app()->params['description'] : $this->description ; ?>">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php echo Yii::app()->theme->baseUrl; ?>/img/ico/favicon.ico">
    <link rel="apple-touch-icon" href="<?php echo Yii::app()->theme->baseUrl; ?>/img/ico/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo Yii::app()->theme->baseUrl; ?>/img/ico/apple-touch-icon-72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo Yii::app()->theme->baseUrl; ?>/img/ico/apple-touch-icon-114.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo Yii::app()->theme->baseUrl; ?>/img/ico/apple-touch-icon-144.png">

    <title><?php echo ($this->title=='')? Yii::app()->params['title'] : $this->title ; ?></title>

    <meta name="google-site-verification" content="a2pU2LdYeEWByopL77BIyVaiZR018UTfCcRr7S_BYJo" />

    <?php include "_social_meta_tags.php" ?>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/color-styles.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/ui-elements.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/lightbox.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/custom.css" rel="stylesheet">
    
    <!-- Resources -->
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/animate.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href='<?php echo Yii::app()->theme->baseUrl; ?>/fonts/Oswald/Oswald.css' rel='stylesheet' type='text/css'>
    <link href='<?php echo Yii::app()->theme->baseUrl; ?>/fonts/Roboto/Roboto.css' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/jquery-gmaps-latlon-picker.css"/>
    <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/highlightjs/styles/monokai_sublime.css">
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/PolygonSearch.css" rel="stylesheet">

    <?php if($this->getId()=='streetview'): ?>
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/streetview.js"></script>
    <?php endif; ?>

    <?php if($this->getId()=='property'): ?>
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/grss.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/mapAPI.js"></script>
    <?php endif; ?>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>