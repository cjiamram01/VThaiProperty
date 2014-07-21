<?php
/* @var $this GalleryController */
/* @var $data Gallery */
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
		            	'data-original-title'=>'View')); ?></div><div class="panel-body">	<b><?php echo CHtml::encode($data->getAttributeLabel('path')); ?>:</b>
	<?php echo CHtml::encode($data->path); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('property_id')); ?>:</b>
	<?php echo CHtml::encode($data->property_id); ?>
	<br />

</div>
</div>
</div>