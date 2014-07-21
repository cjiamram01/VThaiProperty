<?php
/* @var $this TranslateController */
/* @var $model Translate */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
	'htmlOptions'=>array('class'=>'form-horizontal',
						 'role'=>'form',
						 'enctype' => 'multipart/form-data'),
)); ?>

	<div class="form-group">
		<?php echo $form->labelEx($model,'translate_id',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->textField($model,'translate_id',
								array(	'id'=>'translate_id',
										'class'=>'form-control',
										'placeholder'=>'Enter translate_id')); ?>
		<?php echo $form->error($model,'translate_id',array('class'=>'text-danger')); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'language',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->textField($model,'language',
								array(	'id'=>'language',
										'class'=>'form-control',
										'placeholder'=>'Enter language')); ?>
		<?php echo $form->error($model,'language',array('class'=>'text-danger')); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'name_key',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->textField($model,'name_key',
								array(	'id'=>'name_key',
										'class'=>'form-control',
										'placeholder'=>'Enter name_key')); ?>
		<?php echo $form->error($model,'name_key',array('class'=>'text-danger')); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'message',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->textField($model,'message',
								array(	'id'=>'message',
										'class'=>'form-control',
										'placeholder'=>'Enter message')); ?>
		<?php echo $form->error($model,'message',array('class'=>'text-danger')); ?>
		</div>
	</div>

	<div class="text-center">
		<?php echo CHtml::submitButton('Search',array('class'=>'btn btn-color')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->