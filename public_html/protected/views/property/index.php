<?php
/* @var $this PropertyController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Properties',
);

$this->menu=array(
	array('label'=>'Create Property', 'url'=>array('create')),
	array('label'=>'Manage Property', 'url'=>array('admin')),
);
?>
<div class="container">

<h2 class="headline first-child text-color"><span class="border-color">Properties</span></h2>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'template'=>"{pager}\n{items}\n{pager}",
	'pagerCssClass'=>'text-center col-sm-12',
	'pager' => array('header'=>'','htmlOptions'=>array('class'=>'pagination',)),
	'itemView'=>'_view',
)); ?>

</div>