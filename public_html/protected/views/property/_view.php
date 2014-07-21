<?php
/* @var $this PropertyController */
/* @var $data Property */
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
		            	'data-original-title'=>'View')); ?></div><div class="panel-body">	<b><?php echo CHtml::encode($data->getAttributeLabel('picture')); ?>:</b>
	<?php echo CHtml::encode($data->picture); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lat')); ?>:</b>
	<?php echo CHtml::encode($data->lat); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lng')); ?>:</b>
	<?php echo CHtml::encode($data->lng); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('floor')); ?>:</b>
	<?php echo CHtml::encode($data->floor); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('room')); ?>:</b>
	<?php echo CHtml::encode($data->room); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('garage')); ?>:</b>
	<?php echo CHtml::encode($data->garage); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('restroom')); ?>:</b>
	<?php echo CHtml::encode($data->restroom); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('area')); ?>:</b>
	<?php echo CHtml::encode($data->area); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('project_provider')); ?>:</b>
	<?php echo CHtml::encode($data->project_provider); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('swiming_pool')); ?>:</b>
	<?php echo CHtml::encode($data->swiming_pool); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('residentailtype_id')); ?>:</b>
	<?php echo CHtml::encode($data->residentailtype_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Project_id')); ?>:</b>
	<?php echo CHtml::encode($data->Project_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('customers_id')); ?>:</b>
	<?php echo CHtml::encode($data->customers_id); ?>
	<br />

	*/ ?>
</div>
</div>
</div>