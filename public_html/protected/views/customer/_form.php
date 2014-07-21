<?php
/* @var $this CustomerController */
/* @var $model Customer */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'customer-form',
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
		<?php echo $form->labelEx($model,'customername',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->textField($model,'customername',
								array(	'id'=>'customername',
										'class'=>'form-control',
										'placeholder'=>'Enter customername')); ?>
		<?php echo $form->error($model,'customername',array('class'=>'text-danger')); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'description',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->textField($model,'description',
								array(	'id'=>'description',
										'class'=>'form-control',
										'placeholder'=>'Enter description')); ?>
		<?php echo $form->error($model,'description',array('class'=>'text-danger')); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'customertype_id',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
		

		<?php
				$clients = Customertype::model()->findAll();
				$opts = CHtml::listData($clients,'id','customertype');
				echo $form->dropDownList($model,'customertype_id',$opts,array('class'=>'form-control','empty'=>'----Choose Customer type---','id'=>'customertype_id')); 


		?>
		<?php echo $form->error($model,'customertype_id',array('class'=>'text-danger')); ?>
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
		<?php echo $form->labelEx($model,'tel',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->textField($model,'tel',
								array(	'id'=>'tel',
										'class'=>'form-control',
										'placeholder'=>'Enter tel')); ?>
		<?php echo $form->error($model,'tel',array('class'=>'text-danger')); ?>
		</div>
	</div>


	<div class="well text-center">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-color')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->