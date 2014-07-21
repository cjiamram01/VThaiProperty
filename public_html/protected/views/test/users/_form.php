<?php
/* @var $this UsersController */
/* @var $model Users */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'users-form',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
	'htmlOptions'=>array('class'=>'form-horizontal',
						 'role'=>'form',
						 'enctype' => 'multipart/form-data'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="form-group">
		<?php echo $form->labelEx($model,'username',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->textField($model,'username',
								array(	'id'=>'username',
										'class'=>'form-control',
										'placeholder'=>'Enter username')); ?>
		<?php echo $form->error($model,'username',array('class'=>'text-danger')); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'display_name',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->textField($model,'display_name',
								array(	'id'=>'display_name',
										'class'=>'form-control',
										'placeholder'=>'Enter display_name')); ?>
		<?php echo $form->error($model,'display_name',array('class'=>'text-danger')); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'telephone',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->textField($model,'telephone',
								array(	'id'=>'telephone',
										'class'=>'form-control',
										'placeholder'=>'Enter telephone')); ?>
		<?php echo $form->error($model,'telephone',array('class'=>'text-danger')); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'password',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->textField($model,'password',
								array(	'id'=>'password',
										'class'=>'form-control',
										'placeholder'=>'Enter password')); ?>
		<?php echo $form->error($model,'password',array('class'=>'text-danger')); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'email',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->textField($model,'email',
								array(	'id'=>'email',
										'class'=>'form-control',
										'placeholder'=>'Enter email')); ?>
		<?php echo $form->error($model,'email',array('class'=>'text-danger')); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'picture',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->textField($model,'picture',
								array(	'id'=>'picture',
										'class'=>'form-control',
										'placeholder'=>'Enter picture')); ?>
		<?php echo $form->error($model,'picture',array('class'=>'text-danger')); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'create_date',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->textField($model,'create_date',
								array(	'id'=>'create_date',
										'class'=>'form-control',
										'placeholder'=>'Enter create_date')); ?>
		<?php echo $form->error($model,'create_date',array('class'=>'text-danger')); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'last_login',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->textField($model,'last_login',
								array(	'id'=>'last_login',
										'class'=>'form-control',
										'placeholder'=>'Enter last_login')); ?>
		<?php echo $form->error($model,'last_login',array('class'=>'text-danger')); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'count_login',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->textField($model,'count_login',
								array(	'id'=>'count_login',
										'class'=>'form-control',
										'placeholder'=>'Enter count_login')); ?>
		<?php echo $form->error($model,'count_login',array('class'=>'text-danger')); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'level_user',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->textField($model,'level_user',
								array(	'id'=>'level_user',
										'class'=>'form-control',
										'placeholder'=>'Enter level_user')); ?>
		<?php echo $form->error($model,'level_user',array('class'=>'text-danger')); ?>
		</div>
	</div>

	<div class="well text-center">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-color')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->