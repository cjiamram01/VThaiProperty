<?php
/* @var $this PointlinkController */
/* @var $model Pointlink */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'pointlink-form',
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

	<!--<div class="form-group">
		<?php echo $form->labelEx($model,'Streetview_id',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->textField($model,'Streetview_id',
								array(	'id'=>'Streetview_id',
										'class'=>'form-control',
										'placeholder'=>'Enter Streetview_id')); ?>
		<?php echo $form->error($model,'Streetview_id',array('class'=>'text-danger')); ?>
		</div>
	</div>-->

	<div class="form-group">
		<?php echo $form->labelEx($model,'title',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-4">
			<?php echo $form->textField($model,'title',
								array(	'id'=>'title',
										'class'=>'form-control',
										'placeholder'=>'Enter title')); ?>
		<?php echo $form->error($model,'title',array('class'=>'text-danger')); ?>
		</div>
		<?php echo $form->labelEx($model,'pano_LinkID',array('class'=>'col-sm-2 control-label')); ?>
			<div class="col-sm-4">

			<?php 
				$property_id= Yii::app()->getRequest()->getQuery('property_id'); 	
				$criteria = new CDbCriteria();
				$criteria->addCondition('property_id=:property_id');
				$criteria->params=array(':property_id'=>$property_id);
				$clients = Streetview::model()->findAll($criteria);
				$opts = CHtml::listData($clients,'id','title');
			    echo $form->dropDownList($model,'pano_LinkID',$opts,array('class'=>'form-control','empty'=>'---Street view---',)); 
		    ?>

		<?php echo $form->error($model,'pano_LinkID',array('class'=>'text-danger')); ?>
		</div>			
				
	</div>

	


	<div class="well text-center">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-color')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->