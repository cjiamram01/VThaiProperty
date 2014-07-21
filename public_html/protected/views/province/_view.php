<?php
/* @var $this ProvinceController */
/* @var $data province */
?>

<div class="col-sm-6">
<div class="panel panel-default">
	<div class="panel-heading">
	<?php echo CHtml::encode($data->getAttributeLabel('PROVINCE_ID')); ?>:<?php echo CHtml::link(CHtml::encode($data->PROVINCE_ID), array('view', 'id'=>$data->PROVINCE_ID)); ?><?php echo CHtml::link(CHtml::encode(''), array('update', 'id'=>$data->PROVINCE_ID),array('class'=>'fa fa-pencil fa-fw pull-right',
						'rel'=>'tooltip',
						'data-toggle'=>'tooltip',
		            	'data-placement'=>'top',
		            	'data-original-title'=>'Update')); ?><?php echo CHtml::link(CHtml::encode(''), array('view', 'id'=>$data->PROVINCE_ID),array('class'=>'fa fa-eye fa-fw pull-right',
						'rel'=>'tooltip',
						'data-toggle'=>'tooltip',
		            	'data-placement'=>'top',
		            	'data-original-title'=>'View')); ?></div><div class="panel-body">	<b><?php echo CHtml::encode($data->getAttributeLabel('PROVINCE_CODE')); ?>:</b>
	<?php echo CHtml::encode($data->PROVINCE_CODE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PROVINCE_NAME')); ?>:</b>
	<?php echo CHtml::encode($data->PROVINCE_NAME); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PROVINCE_NAME_ENG')); ?>:</b>
	<?php echo CHtml::encode($data->PROVINCE_NAME_ENG); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('GEO_ID')); ?>:</b>
	<?php echo CHtml::encode($data->GEO_ID); ?>
	<br />

</div>
</div>
</div>