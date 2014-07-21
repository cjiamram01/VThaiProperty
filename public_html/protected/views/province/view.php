<?php
/* @var $this ProvinceController */
/* @var $model province */

$this->breadcrumbs=array(
	'Provinces'=>array('index'),
	$model->PROVINCE_ID,
);

$this->menu=array(
	array('label'=>'List province', 'url'=>array('index')),
	array('label'=>'Create province', 'url'=>array('create')),
	array('label'=>'Update province', 'url'=>array('update', 'id'=>$model->PROVINCE_ID)),
	array('label'=>'Delete province', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->PROVINCE_ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage province', 'url'=>array('admin')),
);
?>

<div class="container">

<h2 class="headline first-child text-color"><span class="border-color">View province #<?php echo $model->PROVINCE_ID; ?></span></h2>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'htmlOptions'=>array('class'=>'table table-hover table-condensed'),
	'attributes'=>array(
		'PROVINCE_ID',
		'PROVINCE_CODE',
		'PROVINCE_NAME',
		'PROVINCE_NAME_ENG',
		'GEO_ID',
	),
)); ?>
</div>