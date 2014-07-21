<?php
/* @var $this SiteController */
/* @var $error array */

$this->pageTitle=Yii::app()->name . ' - Error';
$this->breadcrumbs=array(
	'Error',
);
?>
<div class="container">
	<h2 class="text-center"><?php echo CHtml::encode($message); ?></h2>

	<div id="not-found">
       <h2><?php echo $code; ?> <i class="fa fa-rocket"></i></h2>
    </div>
</div>