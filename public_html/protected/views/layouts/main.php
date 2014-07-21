<?php
$session=new CHttpSession;
$session->open();
?>
<?php include "_header.php" ?>

<body class="<?php echo $this->bodyColor; ?>">

    <?php include "_extrabar.php" ?>

    <div class="navbar navbar-white navbar-static-top" role="navigation">
      <div class="container">

        <?php include "_navbar.php" ?>

    <!-- Wrapper -->
    <div class="wrapper">

		<?php echo $content; ?>

    </div> <!-- / .wrapper -->

    <?php include "_footer.php" ?>

</body></html>  
