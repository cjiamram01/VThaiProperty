<?php
/* @var $this StreetviewController */
/* @var $model Streetview */
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
		<?php echo $form->labelEx($model,'id',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->textField($model,'id',
								array(	'id'=>'id',
										'class'=>'form-control',
										'placeholder'=>'Enter id')); ?>
		<?php echo $form->error($model,'id',array('class'=>'text-danger')); ?>
		</div>
	</div>

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
		<?php echo $form->labelEx($model,'property_id',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->textField($model,'property_id',
								array(	'id'=>'property_id',
										'class'=>'form-control',
										'placeholder'=>'Enter property_id')); ?>
		<?php echo $form->error($model,'property_id',array('class'=>'text-danger')); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'originalimage',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->textField($model,'originalimage',
								array(	'id'=>'originalimage',
										'class'=>'form-control',
										'placeholder'=>'Enter originalimage')); ?>
		<?php echo $form->error($model,'originalimage',array('class'=>'text-danger')); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'worldSizeX',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->textField($model,'worldSizeX',
								array(	'id'=>'worldSizeX',
										'class'=>'form-control',
										'placeholder'=>'Enter worldSizeX')); ?>
		<?php echo $form->error($model,'worldSizeX',array('class'=>'text-danger')); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'worldSizeY',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->textField($model,'worldSizeY',
								array(	'id'=>'worldSizeY',
										'class'=>'form-control',
										'placeholder'=>'Enter worldSizeY')); ?>
		<?php echo $form->error($model,'worldSizeY',array('class'=>'text-danger')); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'tileSizeX',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->textField($model,'tileSizeX',
								array(	'id'=>'tileSizeX',
										'class'=>'form-control',
										'placeholder'=>'Enter tileSizeX')); ?>
		<?php echo $form->error($model,'tileSizeX',array('class'=>'text-danger')); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'tileSizeY',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->textField($model,'tileSizeY',
								array(	'id'=>'tileSizeY',
										'class'=>'form-control',
										'placeholder'=>'Enter tileSizeY')); ?>
		<?php echo $form->error($model,'tileSizeY',array('class'=>'text-danger')); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'lat',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->textField($model,'lat',
								array(	'id'=>'lat',
										'class'=>'form-control',
										'placeholder'=>'Enter lat')); ?>
		<?php echo $form->error($model,'lat',array('class'=>'text-danger')); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'lng',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->textField($model,'lng',
								array(	'id'=>'lng',
										'class'=>'form-control',
										'placeholder'=>'Enter lng')); ?>
		<?php echo $form->error($model,'lng',array('class'=>'text-danger')); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'panoID',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->textField($model,'panoID',
								array(	'id'=>'panoID',
										'class'=>'form-control',
										'placeholder'=>'Enter panoID')); ?>
		<?php echo $form->error($model,'panoID',array('class'=>'text-danger')); ?>
		</div>
	</div>

	<div class="text-center">
		<?php echo CHtml::submitButton('Search',array('class'=>'btn btn-color')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->