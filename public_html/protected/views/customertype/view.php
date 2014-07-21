<?php
/* @var $this CustomertypeController */
/* @var $model Customertype */

$this->breadcrumbs=array(
	'Customertypes'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Customertype', 'url'=>array('index')),
	array('label'=>'Create Customertype', 'url'=>array('create')),
	array('label'=>'Update Customertype', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Customertype', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Customertype', 'url'=>array('admin')),
);
?>

<div class="container">

<h2 class="headline first-child text-color"><span class="border-color">View Customertype #<?php echo $model->id; ?></span></h2>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'htmlOptions'=>array('class'=>'table table-hover table-condensed'),
	'attributes'=>array(
		'id',
		'customertype',
	),
)); ?>
</div>