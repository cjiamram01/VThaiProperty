<?php
/* @var $this ContactController */
/* @var $model Contact */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'contact-form',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
	'htmlOptions'=>array('class'=>'form-horizontal',
						 'role'=>'form',
						 'enctype' => 'multipart/form-data'),
)); ?>

	

	<?php echo $form->errorSummary($model); ?>

	<!--<div class="form-group">
		<?php echo $form->labelEx($model,'user_id',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->textField($model,'user_id',
								array(	'id'=>'user_id',
										'class'=>'form-control',
										'placeholder'=>'Enter user_id')); ?>
		<?php echo $form->error($model,'user_id',array('class'=>'text-danger')); ?>
		</div>
	</div>-->

	<div class="form-group">
		<?php echo $form->labelEx($model,'province_id',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-4">
		
		   <?php 
				$clients = province::model()->findAll();
				$opts = CHtml::listData($clients,'PROVINCE_ID','PROVINCE_NAME');
			    echo $form->dropDownList($model,'province_id',$opts,array('class'=>'form-control','empty'=>'----Choose Province---','id'=>'province_id'
			    	,
			    	'ajax' => array(
                        'type' => 'POST',
                        'url'=>$this->createUrl('Contact/Province'),   
                        'update' => '#district_id',                        
                		'data'=>array('province_id'=>'js:this.value',),   
            			'success'=> 'function(data) {$("#district_id").empty();
                         $("#district_id").append(data);
						} ',
						),

			    	)); 
		    ?>
		<?php echo $form->error($model,'province_id',array('class'=>'text-danger')); ?>
		</div>
		<?php echo $form->labelEx($model,'district_id',array('class'=>'col-sm-1 control-label')); ?>
		<div class="col-sm-5">
		<?php								
		 $clients = DataAmphur::model()->findAll();
		 $opts = CHtml::listData($clients,'AMPHUR_ID','AMPHUR_NAME');
		  echo $form->dropDownList($model,'district_id',$opts,array('class'=>'form-control','empty'=>'----Choose District---','id'=>'district_id')); 
		?>
		<?php echo $form->error($model,'district_id',array('class'=>'text-danger')); ?>
		</div>
	</div>


	<div class="form-group">
		<?php echo $form->labelEx($model,'address',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->textField($model,'address',
								array(	'id'=>'address',
										'class'=>'form-control',
										'placeholder'=>'Enter address')); ?>
		<?php echo $form->error($model,'address',array('class'=>'text-danger')); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'postalcode',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-4">
			<?php echo $form->textField($model,'postalcode',
								array(	'id'=>'postalcode',
										'class'=>'form-control',
										'placeholder'=>'Enter postalcode')); ?>
		<?php echo $form->error($model,'postalcode',array('class'=>'text-danger')); ?>
		</div>
	</div>

	<div class="well text-center">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-color')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->