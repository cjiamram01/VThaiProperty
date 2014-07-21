<!-- Footer -->
    <footer class="footer-dark">
      <div class="container">
        <div class="row">
          <!-- Contact Us -->
          <div class="col-sm-4">
            <h3 class="text-color"><span class="border-color">Contact Us</span></h3>
            <div class="content">
              <a href="https://maps.google.com/maps/ms?ie=UTF8&msa=0&msid=215169416877664222545.0004f5f8e911bb451ca0d&t=m&ll=13.762312,100.650344&spn=0.003647,0.008583&z=17&iwloc=0004f5f8eca92ce919696&source=embed">
              <div class="img-responsive" style="background-image:
                     url('<?php echo Yii::app()->theme->baseUrl.'/img/googlemap.png'; ?>'); 
              width:471px; 
              height:150px; 
              background-position:center;">&nbsp;</div></a>
              <p>
              <?php echo Yii::app()->params['contact']['address']; ?><br />
              <i class="fa fa-apple"></i> Mobile: <?php echo Yii::app()->params['contact']['mobile']; ?><br />
              <i class="fa fa-phone-square"></i> Phone: <?php echo Yii::app()->params['contact']['phone']; ?><br />
              <i class="fa fa-envelope"></i> Email<span class="hidden-sm">: <a href="mailto:<?php echo Yii::app()->params['contact']['email']; ?>" class="first-child"><?php echo Yii::app()->params['contact']['email']; ?></span></a>
              </p>
            </div>
          </div>
          <!-- Social icons -->
          <div class="col-sm-4">
            <h3 class="text-color"><span>Go Social</span></h3>  
            <div class="content social">
              <p>Stay in touch with us:</p>
              <ul class="list-inline">
                <li><a href="<?php echo Yii::app()->params['social']['twitter']; ?>" class="twitter"><i class="fa fa-twitter"></i></a></li>
                <li><a href="<?php echo Yii::app()->params['social']['facebook']; ?>" class="facebook"><i class="fa fa-facebook"></i></a></li>
                <li><a href="<?php echo Yii::app()->params['social']['instagram']; ?>" class="instagram"><i class="fa fa-instagram"></i></a></li>
                <li><a href="<?php echo Yii::app()->params['social']['youtube']; ?>" class="youtube"><i class="fa fa-youtube"></i></a></li>
                <li><a href="<?php echo Yii::app()->params['social']['dropbox']; ?>" class="dropbox"><i class="fa fa-dropbox"></i></a></li>
                <li><a href="<?php echo Yii::app()->params['social']['gplus']; ?>" class="plus"><i class="fa fa-google-plus"></i></a></li>
              </ul>
              <div class="clearfix"></div>
            </div>
          </div>
          <!-- Subscribe -->
          <div class="col-sm-4">
            <?php Load::LastLogin(); ?>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12">
            <hr>
          </div>
        </div>
        <!-- Copyrights -->
        <div class="row">
          <div class="col-sm-6">
            <p>&copy; Copyright 2014 by <a href="<?php echo Yii::app()->request->baseUrl; ?>/"><?php echo Yii::app()->params['title']; ?></a> All Rights Reserved.</p>
          </div>
          <div class="col-sm-6">
            <p class="pull-right">
                <a href="<?php echo Yii::app()->request->baseUrl; ?>/site/setlanguage?lang=th"><?php echo Yii::t('home','flag_th'); ?></a> |
                <a href="<?php echo Yii::app()->request->baseUrl; ?>/site/setlanguage?lang=en"><?php echo Yii::t('home','flag_en'); ?></a>
            </p>
          </div>
        </div>
      </div>
    </footer>

    <?php //include "_toggle_style.php" ?>

<?php 
$page = $this->getId().'/'.Yii::app()->controller->action->id;
?>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.min.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/bootstrap.min.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/scrolltopcontrol.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.sticky.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/lightbox-2.6.min.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/custom.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/highlightjs/highlight.pack.js"></script>
    
    <?php if($this->getId()=='polygonSearch'): ?>
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/grss.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/mapAPI.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/PolygonSearch.js"></script>
    <?php endif; ?>
    <!--<?php if($this->getId()=='property'): ?>

    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/grss.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/mapAPI.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/PolygonSearch.js"></script>
    
    <script src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery-gmaps-latlon-picker.js"></script>
   
    <?php endif; ?> -->
    <!--<?php if($this->getId()=='streetview'): ?>
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/streetview.js"></script>
    <?php endif; ?>-->

    <script>hljs.initHighlightingOnLoad();</script>
    <script type="text/javascript">
	
  // (function () {
        
  //   $('form').on('submit',function(e){
  //     e.preventDefault();
  //     var dat = $(this).serialize(),
  //       act = $(this).attr('action'),
  //       tid = $(this).attr('id');
  //     $.ajax({
  //       url:act,
  //       data:dat,
  //       type:'POST',
  //       dataType:'html',
  //       success:function(res){
  //         $("#"+tid).html($("#"+tid,res).html());
  //       },
  //     });
  //   })
  // })();
  </script>
    
    