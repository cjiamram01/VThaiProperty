<?php
/* @var $this StreetviewController */
/* @var $model Streetview */
/* @var $form CActiveForm */
?>

<script type="text/javascript">
function searchMap() {
    var currentLocation = window.location.href;
   
 	var uri = "../map/mapSearch";

 	if(currentLocation.split("/").length>7)
 		uri = "../../map/mapsearch?lat="+document.getElementById("lat").value+"&lng="+document.getElementById("lng").value;


    var options = "dialogWidth=730px; dialogHeight=450px";
    var w= window.showModalDialog(uri, null, options);
		
   

    if (w != null) {
      $("input[id=lat]").val(w.latitude);
      $("input[id=lng]").val(w.longtitude);
    }
  }
  </script>

<div class="form">



<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'streetview-form',
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
		<?php echo $form->labelEx($model,'order_no',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-2">
				<?php echo $form->textField($model,'order_no',
								array(	'id'=>'order_no',
										'value'=>$this->getOrderNo(),
										'class'=>'form-control',
										'placeholder'=>'Enter order',
										)); ?>
		<?php echo $form->error($model,'order_no',array('class'=>'text-danger')); ?>
		</div>
		<?php echo $form->labelEx($model,'title',array('class'=>'col-sm-1 control-label')); ?>
		<div class="col-sm-7">
			<?php echo $form->textField($model,'title',
								array(	'id'=>'title',
										'class'=>'form-control',
										'placeholder'=>'Enter title')); ?>
		<?php echo $form->error($model,'title',array('class'=>'text-danger')); ?>
		</div>

	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'originalimage',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
		<?php echo $form->fileField($model,'originalimage',array('class'=>'form-control','id'=>'originalimage')); ?>
		<?php echo $form->error($model,'originalimage',array('class'=>'text-danger')); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'lat',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-3">
			<?php echo $form->textField($model,'lat',
								array(	'id'=>'lat',
										'class'=>'form-control',
										'placeholder'=>'Enter lat')); ?>
		<?php echo $form->error($model,'lat',array('class'=>'text-danger')); ?>
		</div>
				<?php echo $form->labelEx($model,'lng',array('class'=>'col-sm-2 control-label')); ?>
		
		<div class="col-sm-3">
			<?php 
			echo $form->textField($model,'lng',
								array(	'id'=>'lng',
										'class'=>'form-control',
										'placeholder'=>'Enter lng')); ?>
		<?php echo $form->error($model,'lng',array('class'=>'text-danger')); ?>
		</div>



		<div class="col-sm-1">
				<a class="btn btn-default" onclick="searchMap();" >
					<i class="glyphicon glyphicon-globe"></i>
					<?php echo yii::t('app','Map'); ?>
				</a>
		</div>



	</div>

	<div class="form-group">
				<?php echo $form->labelEx($model,'headingRef',array('class'=>'col-sm-2 control-label')); ?>
				<div class="col-sm-3">
			<?php 
			echo $form->textField($model,'headingRef',
								array(	'id'=>'headingRef',
										'class'=>'form-control',
										'placeholder'=>'Enter headingRef')); ?>
		<?php echo $form->error($model,'lng',array('class'=>'text-danger')); ?>
		</div>	
				<?php echo $form->error($model,'headingRef',array('class'=>'text-danger')); ?>

	</div>

	

	

	<div class="well text-center">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-color')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->