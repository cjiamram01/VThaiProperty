<div class="container">
<div class="row">
  <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
    <div class="sign-form">
      <h3 class="first-child">Sign In To Your Account</h3>
      <hr>
      <div class="form">
		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'login-form',
			//'enableClientValidation'=>true,
			'clientOptions'=>array(
				'validateOnSubmit'=>true,
			),
		)); ?>
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-user"></i></span>
          <?php echo $form->textField($model,'username',
								array(	'id'=>'username',
										'class'=>'form-control',
										'placeholder'=>'Enter username')); ?>
        </div>
        <?php echo $form->error($model,'username',array('class'=>'text-danger')); ?>
        </br>

        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-lock"></i></span>
          <?php echo $form->passwordField($model,'password',
								array(	'id'=>'password',
										'class'=>'form-control',
										'placeholder'=>'Enter password')); ?>
        </div>
        <?php echo $form->error($model,'password',array('class'=>'text-danger')); ?>
        <div class="checkbox">
          <label>
            <?php echo $form->checkBox($model,'rememberMe'); ?> Remember me
          </label>
        </div>
        <?php echo CHtml::submitButton('Submit',array('class'=>'btn btn-color')); ?>
        <hr>
      <?php $this->endWidget(); ?>
      </div>
      <p>Not registered? <?php echo CHtml::link(Yii::t('app','Create an Account.'),array('site/register')); ?></p>
      <div class="pwd-lost">
        <div class="pwd-lost-q show">Lost your password? <?php echo CHtml::link(Yii::t('app','Click here to recover.'),array('site/recoverypassword')); ?></div>
        <div class="pwd-lost-f hidden">
          <p class="text-muted">Enter your email address and we will send you a link to reset your password.</p>
          <form class="form-inline" method="get" action="<?php echo Yii::app()->request->baseUrl; ?>/site/recoverypassword">
            <div class="form-group">
              <label class="sr-only" for="email-pwd">Email address</label>
              <input type="email" class="form-control" name="email" id="email-pwd" placeholder="Enter email">
            </div>
            <button type="submit" class="btn btn-color">Send</button>
          
        </div>
      </div> <!-- / .pwd-lost -->
    </div>
  </div>
</div>
</div>