<?php
/* @var $this ProvinceController */
/* @var $model province */
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
		<?php echo $form->labelEx($model,'PROVINCE_ID',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->textField($model,'PROVINCE_ID',
								array(	'id'=>'PROVINCE_ID',
										'class'=>'form-control',
										'placeholder'=>'Enter PROVINCE_ID')); ?>
		<?php echo $form->error($model,'PROVINCE_ID',array('class'=>'text-danger')); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'PROVINCE_CODE',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->textField($model,'PROVINCE_CODE',
								array(	'id'=>'PROVINCE_CODE',
										'class'=>'form-control',
										'placeholder'=>'Enter PROVINCE_CODE')); ?>
		<?php echo $form->error($model,'PROVINCE_CODE',array('class'=>'text-danger')); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'PROVINCE_NAME',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->textField($model,'PROVINCE_NAME',
								array(	'id'=>'PROVINCE_NAME',
										'class'=>'form-control',
										'placeholder'=>'Enter PROVINCE_NAME')); ?>
		<?php echo $form->error($model,'PROVINCE_NAME',array('class'=>'text-danger')); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'PROVINCE_NAME_ENG',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->textField($model,'PROVINCE_NAME_ENG',
								array(	'id'=>'PROVINCE_NAME_ENG',
										'class'=>'form-control',
										'placeholder'=>'Enter PROVINCE_NAME_ENG')); ?>
		<?php echo $form->error($model,'PROVINCE_NAME_ENG',array('class'=>'text-danger')); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'GEO_ID',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->textField($model,'GEO_ID',
								array(	'id'=>'GEO_ID',
										'class'=>'form-control',
										'placeholder'=>'Enter GEO_ID')); ?>
		<?php echo $form->error($model,'GEO_ID',array('class'=>'text-danger')); ?>
		</div>
	</div>

	<div class="text-center">
		<?php echo CHtml::submitButton('Search',array('class'=>'btn btn-color')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->