<h4 class="primary-font">Change Password</h4>
<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'updateProfile-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
	'htmlOptions'=>array('class'=>'form-horizontal',
						 'role'=>'form',
						 'enctype' => 'multipart/form-data'),
)); ?>

	  <div class="form-group">
	    <?php echo $form->labelEx($model,'currentPassword',array('class'=>'col-sm-4 control-label')); ?>
		    <div class="col-sm-8">
		    <?php echo $form->passwordField($model,'currentPassword',
									array(	'id'=>'currentPassword',
											'class'=>'form-control',
											'placeholder'=>'Enter Current Password')); ?>
			<?php echo $form->error($model,'currentPassword',array('class'=>'text-danger')); ?>
		  	</div>
	  </div>

	  <div class="form-group">
	    <?php echo $form->labelEx($model,'newPassword',array('class'=>'col-sm-4 control-label')); ?>
		    <div class="col-sm-8">
		    <?php echo $form->passwordField($model,'newPassword',
									array(	'id'=>'newPassword',
											'class'=>'form-control',
											'placeholder'=>'Enter New Password')); ?>
			<?php echo $form->error($model,'newPassword',array('class'=>'text-danger')); ?>
		  	</div>
	  </div>

	  <div class="form-group">
	    <?php echo $form->labelEx($model,'newPasswordRepeat',array('class'=>'col-sm-4 control-label')); ?>
		    <div class="col-sm-8">
		    <?php echo $form->passwordField($model,'newPasswordRepeat',
									array(	'id'=>'newPasswordRepeat',
											'class'=>'form-control',
											'placeholder'=>'Confirm Password')); ?>
			<?php echo $form->error($model,'newPasswordRepeat',array('class'=>'text-danger')); ?>
		  	</div>
	  </div>






		<div class="well text-center">
			  	<?php echo CHtml::submitButton('Update',array('class'=>'btn btn-sm btn-color')); ?>
		</div>

<?php $this->endWidget(); ?>
</div>