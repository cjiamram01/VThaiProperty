<?php
/* @var $this StreetviewController */
/* @var $data Streetview */
?>

<div class="col-sm-6">
<div class="panel panel-default">
	<div class="panel-heading">
	<?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?><?php echo CHtml::link(CHtml::encode(''), array('update', 'id'=>$data->id),array('class'=>'fa fa-pencil fa-fw pull-right',
						'rel'=>'tooltip',
						'data-toggle'=>'tooltip',
		            	'data-placement'=>'top',
		            	'data-original-title'=>'Update')); ?><?php echo CHtml::link(CHtml::encode(''), array('view', 'id'=>$data->id),array('class'=>'fa fa-eye fa-fw pull-right',
						'rel'=>'tooltip',
						'data-toggle'=>'tooltip',
		            	'data-placement'=>'top',
		            	'data-original-title'=>'View')); ?></div><div class="panel-body">	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('property_id')); ?>:</b>
	<?php echo CHtml::encode($data->property_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('originalimage')); ?>:</b>
	<?php echo CHtml::encode($data->originalimage); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('worldSizeX')); ?>:</b>
	<?php echo CHtml::encode($data->worldSizeX); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('worldSizeY')); ?>:</b>
	<?php echo CHtml::encode($data->worldSizeY); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tileSizeX')); ?>:</b>
	<?php echo CHtml::encode($data->tileSizeX); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('tileSizeY')); ?>:</b>
	<?php echo CHtml::encode($data->tileSizeY); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lat')); ?>:</b>
	<?php echo CHtml::encode($data->lat); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lng')); ?>:</b>
	<?php echo CHtml::encode($data->lng); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('panoID')); ?>:</b>
	<?php echo CHtml::encode($data->panoID); ?>
	<br />

	*/ ?>
</div>
</div>
</div>