<!-- Navbar Header -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <?php if(!Yii::app()->user->isGuest): ?>
          <?php echo CHtml::link('<img src="'.Load::Picture(Yii::app()->user->detail->picture).'" class="img-circle" style="height:65px; margin-top:-20px;"/>'.' '.Yii::app()->user->detail->display_name,array('users/profile'),array('class'=>'navbar-brand')); ?> 
          <?php else: ?>
          <a class="navbar-brand" href="<?php echo Yii::app()->request->baseUrl; ?>/"><img src="<?php echo Yii::app()->request->baseUrl.'/upload/ProfilePicture/programmer.png'; ?>" class="img-circle" style="height:65px; margin-top:-20px;"/> <?php echo Yii::app()->params['title']; ?> <span class="hidden-sm">All about me <i class="fa fa-apple"></i> </span></a>
          <?php endif; ?>
        </div> <!-- / Navbar Header -->

<?php 
$page = $this->getId().'/'.Yii::app()->controller->action->id;
?>

        <!-- Navbar Links -->
        <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-right">

<?php   if($page === 'site/index'): 
  echo '<li class="active">'; 
  else: echo '<li>'; endif;
  echo CHtml::link('<i class="fa fa-home"></i> '.Yii::t('app','Home'),array('site/index'),array('class'=>'bg-hover-color')).'</li>'; 
?>

<?php   if($page === 'customer/index'): 
  echo '<li class="active">'; 
  else: echo '<li>'; endif;
  echo CHtml::link('<i class="fa fa-user"></i> '.Yii::t('app','Profile'),array('Contact/index'),array('class'=>'bg-hover-color')).'</li>'; 
?>

<?php   
if($page === 'translate/index'): 
echo '<li class="active">'; 
else: 
echo '<li>'; endif;
echo 
CHtml::link('<i class="fa fa-pencil"></i> '.Yii::t('app','Translate'),array('translate/index'),array('class'=>'bg-hover-color')).'</li>'; ?>

<?php if(Yii::app()->user->isAdmin()): ?>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle bg-hover-color" data-toggle="dropdown"><i class="fa fa-bars"></i> 
              <?php echo Yii::t('app','Dashboard'); ?><b class="caret"></b></a>
              <ul class="dropdown-menu">
                <?php   
                if($page === 'users/index'): 
                echo '<li class="active">'; 
                else: echo '<li>'; 
                endif;
                echo CHtml::link(Yii::t('app','Users'),array('users/index'),array('class'=>'bg-hover-color')).'</li>'; ?>

                <?php   
                if($page === 'translate/index'): 
                  echo '<li class="active">'; 
                else: echo '<li>'; 
                endif;
                echo CHtml::link(Yii::t('app','Translate'),array('translate/index'),array('class'=>'bg-hover-color')).'</li>'; 
                 ?>
              </ul>
            </li>
          <?php endif; ?>
          </ul>

          <!-- Search Form (xs) -->
          <form class="navbar-form navbar-left visible-xs" role="search" method="get" action="<?php echo Yii::app()->request->baseUrl; ?>/blog">
            <div class="form-group">
              <input type="text" class="form-control" name="search" placeholder="Search">
            </div>
            <button type="submit" class="btn btn-default">Go!</button>
          </form> <!-- / Search Form (xs) -->

        </div> <!-- / Navbar Links -->
      </div> <!-- / container -->
    </div> <!-- / navbar -->