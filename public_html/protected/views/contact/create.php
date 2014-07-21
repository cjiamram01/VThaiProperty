<?php
/* @var $this ContactController */
/* @var $model Contact */

$this->breadcrumbs=array(
	'Contacts'=>array('index'),
	'Create',
);

/*$this->menu=array(
	array('label'=>'List Contact', 'url'=>array('index')),
	array('label'=>'Manage Contact', 'url'=>array('admin')),
);*/
?>
<!--<div class="container">
<div class="col-sm-10">
		<h2 class="headline first-child text-color"><span class="border-color">Create Contact</span></h2>
	</div>
	<div class="col-sm-2">

		<a  data-toggle="modal" data-target="#myModal" class="btn btn-default">
		<i class="glyphicon glyphicon-search"></i>	
			<?php echo yii::t('app','Search')  ?>		</a>
		

	</div>
</div>-->
<div class="container">



<?php $this->renderPartial('_form', array('model'=>$model)); ?>



</div>