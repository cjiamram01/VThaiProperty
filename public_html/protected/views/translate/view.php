<?php
/* @var $this TranslateController */
/* @var $model Translate */

$this->breadcrumbs=array(
	'Translates'=>array('index'),
	$model->translate_id,
);

$this->menu=array(
	array('label'=>'List Translate', 'url'=>array('index')),
	array('label'=>'Create Translate', 'url'=>array('create')),
	array('label'=>'Update Translate', 'url'=>array('update', 'id'=>$model->translate_id)),
	array('label'=>'Delete Translate', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->translate_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Translate', 'url'=>array('admin')),
);
?>

<div class="container">

<h2 class="headline first-child text-color"><span class="border-color">View Translate #<?php echo $model->translate_id; ?></span></h2>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'htmlOptions'=>array('class'=>'table table-hover table-condensed'),
	'attributes'=>array(
		'translate_id',
		'language',
		'name_key',
		'message',
	),
)); ?>
</div>