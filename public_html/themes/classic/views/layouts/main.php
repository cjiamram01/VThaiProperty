<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <!--<meta http-equiv="X-UA-Compatible" content="IE=edge">-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="img/favicon.png.ico">

    <title>Mosaic - Homepage</title>


		<?php
		$themePath = Yii::app()->theme->baseUrl;
		?>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo $themePath ?>/assets/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
	 <link href="<?php echo $themePath ?>/assets/css/color-styles.css" rel="stylesheet">
      <!--<link href="<?php echo $themePath ?>/assets/css/ui-elements.css" rel="stylesheet">
    <link href="<?php echo $themePath ?>/assets/css/custom.css" rel="stylesheet">-->
    
    <!-- Resources -->
    <link href="<?php echo $themePath ?>/assets/css/animate.css" rel="stylesheet">
    <link href="<?php echo $themePath ?>/assets/fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>

  <body >
	<div class="container">
	<?php echo $content; ?>
	</div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="<?php echo $themePath ?>/assets/js/bootstrap.min.js"></script>
    <script src="<?php echo $themePath ?>/assets/js/scrolltopcontrol.js"></script>
    <script src="<?php echo $themePath ?>/assets/js/jquery.sticky.js"></script>
    <!--<script src="<?php echo $themePath ?>/assets/js/custom.js"></script>-->

</body>
</html>