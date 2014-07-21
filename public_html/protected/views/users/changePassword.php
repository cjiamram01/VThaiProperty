<div class="container">
  <div class="row">
    <div class="col-sm-3">
      <div class="team-member user-avatar text-center">
        <?php echo CHtml::image(Load::Picture(Yii::app()->user->detail->picture),"picture",array("class"=>"img-responsive center-block")); ?>
        <?php echo Yii::app()->user->detail->display_name; ?>
        <p class="text-muted"><?php echo Load::UserLevel(Yii::app()->user->detail->level_user); ?></p>
      </div>
      <div class="user-menu">
        <ul>
          <li><?php echo CHtml::link('<i class="sign fa fa-user bg-green"></i>'.Yii::t('app','My Profile').'<i class="fa fa-chevron-right pull-right"></i>',array('users/profile')); ?></li>
          <li><?php echo CHtml::link('<i class="sign fa fa-edit bg-blue"></i>'.Yii::t('app','Edit Profile').'<i class="fa fa-chevron-right pull-right"></i>',array('users/editProfile')); ?></li>
          <li><?php echo CHtml::link('<i class="sign fa fa-key bg-turquoise"></i>'.Yii::t('app','Change Password').'<i class="fa fa-chevron-right pull-right"></i>',array('users/changePassword'),array('class'=>'active')); ?></li>
          <li><?php echo CHtml::link('<i class="sign fa fa-sign-out bg-red"></i>'.Yii::t('app','Logout').'<i class="fa fa-chevron-right pull-right"></i>',array('site/Logout')); ?></li>
        </ul>
      </div>
    </div>
    <div class="col-sm-9">
      <div class="row">
        <?php $this->renderPartial('_detailProfile'); ?>
        <div class="col-sm-12">
          <hr class="arrow-down">
			<?php if(Yii::app()->user->hasFlash('response')): ?>
			<div class="info-board info-board-green">Change Password complete.</div>
			<?php endif; ?>
          <?php $this->renderPartial('_changePassword',array('model'=>$model)) ?>
        </div>
      </div>
    </div>
  </div> <!-- / .row -->
</div>