<?php
/* @var $this GalleryController */
/* @var $model Gallery */

$this->breadcrumbs=array(
	'Galleries'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Gallery', 'url'=>array('index')),
	array('label'=>'Manage Gallery', 'url'=>array('admin')),
);
?>
<div class="container">
<div class="col-sm-12">
		<h2 class="headline first-child text-color"><span class="border-color">Create Gallery</span></h2>
	</div>
	
</div>
<div class="container">
<?php $this->renderPartial('_form', array('model'=>$model)); ?>
<?php $this->renderPartial('admin', array('model'=>$model)); ?>	
</div>