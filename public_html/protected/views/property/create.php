<?php
/* @var $this PropertyController */
/* @var $model Property */

$this->breadcrumbs=array(
	'Properties'=>array('index'),
	'Create',
);

/*$this->menu=array(
	array('label'=>'List Property', 'url'=>array('index')),
	array('label'=>'Manage Property', 'url'=>array('admin')),
);*/
?>
<div class="container">
<div class="col-sm-12">
		<h2 class="headline first-child text-color"><span class="border-color"><?php echo yii::t('app','Create Property');?></span></h2>
	</div>
</div>
<div class="container">



<?php $this->renderPartial('_form', array('model'=>$model)); ?>



</div>