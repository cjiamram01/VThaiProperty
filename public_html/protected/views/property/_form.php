<?php
/* @var $this PropertyController */
/* @var $model Property */
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
	'id'=>'property-form',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
	'htmlOptions'=>array('class'=>'form-horizontal',
						 'role'=>'form',
						 'enctype' => 'multipart/form-data'),
)); ?>


	<?php echo $form->errorSummary($model); ?>

	


	<div class="form-group">
		<?php echo $form->labelEx($model,'title',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->textField($model,'title',
								array(	'id'=>'title',
										'class'=>'form-control',
										'placeholder'=>'Enter title')); ?>
		<?php echo $form->error($model,'title',array('class'=>'text-danger')); ?>
		</div>
	</div>
	

	<div class="form-group">
		<?php echo $form->labelEx($model,'description',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->textArea($model,'description',
								array(	'id'=>'description',
										'class'=>'form-control',
										'placeholder'=>'Enter description')); ?>
		<?php echo $form->error($model,'description',array('class'=>'text-danger')); ?>
		</div>
	</div>


	<div class="form-group">
		<?php echo $form->labelEx($model,'lat',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-3">
			<?php echo $form->textField($model,'lat',
								array(	'id'=>'lat',
										'class'=>'form-control',
										'placeholder'=>'Enter latitude')); ?>
		<?php echo $form->error($model,'lat',array('class'=>'text-danger')); ?>
		
		</div>
		<?php echo $form->labelEx($model,'lng',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-3">
			<?php echo $form->textField($model,'lng',
								array(	'id'=>'lng',
										'class'=>'form-control gllpLatitude',
										'placeholder'=>'Enter longtitude')); ?>
		<?php echo $form->error($model,'lng',array('class'=>'text-danger')); ?>
		</div>



		<div class="col-sm-2">
				<a class="btn btn-default" onclick="searchMap();" >
					<i class="glyphicon glyphicon-globe"></i>
					<?php echo yii::t('app','Map'); ?>
				</a>
		</div>
	</div>

	

	<div class="form-group">
		<?php echo $form->labelEx($model,'floor',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-3">
			<?php echo $form->textField($model,'floor',
								array(	'id'=>'floor',
										'class'=>'form-control',
										'placeholder'=>'Enter floor')); ?>
		<?php echo $form->error($model,'floor',array('class'=>'text-danger')); ?>
		</div>
		<?php echo $form->labelEx($model,'room',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-3">
			<?php echo $form->textField($model,'room',
								array(	'id'=>'room',
										'class'=>'form-control',
										'placeholder'=>'Enter room')); ?>
		<?php echo $form->error($model,'room',array('class'=>'text-danger')); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'garage',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-3">
			<?php echo $form->textField($model,'garage',
								array(	'id'=>'garage',
										'class'=>'form-control',
										'placeholder'=>'Enter garage')); ?>
		<?php echo $form->error($model,'garage',array('class'=>'text-danger')); ?>
		</div>
		<?php echo $form->labelEx($model,'restroom',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-3">
			<?php echo $form->textField($model,'restroom',
								array(	'id'=>'restroom',
										'class'=>'form-control',
										'placeholder'=>'Enter restroom')); ?>
		<?php echo $form->error($model,'restroom',array('class'=>'text-danger')); ?>
		</div>
	</div>

	


	<div class="form-group">
		<?php echo $form->labelEx($model,'area',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-3">
			<?php echo $form->textField($model,'area',
								array(	'id'=>'area',
										'class'=>'form-control',
										'placeholder'=>'Enter area')); ?>
		<?php echo $form->error($model,'area',array('class'=>'text-danger')); ?>
		</div>
		<?php echo $form->labelEx($model,'swiming_pool',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-3">
			<?php echo $form->textField($model,'swiming_pool',
								array(	'id'=>'swiming_pool',
										'class'=>'form-control',
										'placeholder'=>'Enter swiming_pool')); ?>
		<?php echo $form->error($model,'swiming_pool',array('class'=>'text-danger')); ?>
		</div>
	</div>

	

	

	<div class="form-group">
		<?php echo $form->labelEx($model,'residentailtype_id',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-3">
			
			<?php 
				$criteria = new CDbCriteria();
				//$criteria->condition=array("property_id"=>);
				$clients = Residentailtype::model()->findAll();
				
				$opts = CHtml::listData($clients,'id','title_en');
			    echo $form->dropDownList($model,'residentailtype_id',$opts,array('class'=>'form-control','empty'=>'---Residential type---',)); 
		    ?>
		<?php echo $form->error($model,'residentailtype_id',array('class'=>'text-danger')); ?>
		</div>
	</div>

	<!--<div class="form-group">
		<?php echo $form->labelEx($model,'Project_id',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->textField($model,'Project_id',
								array(	'id'=>'Project_id',
										'class'=>'form-control',
										'placeholder'=>'Enter Project_id')); ?>
		<?php echo $form->error($model,'Project_id',array('class'=>'text-danger')); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'customers_id',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->textField($model,'customers_id',
								array(	'id'=>'customers_id',
										'class'=>'form-control',
										'placeholder'=>'Enter customers_id')); ?>
		<?php echo $form->error($model,'customers_id',array('class'=>'text-danger')); ?>
		</div>
	</div>-->

	<div class="well text-center">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-color')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->