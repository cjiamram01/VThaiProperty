<?php
/* @var $this StreetviewController */
/* @var $model Streetview */

$this->breadcrumbs=array(
	'Streetviews'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Streetview', 'url'=>array('index')),
	array('label'=>'Create Streetview', 'url'=>array('create')),
	array('label'=>'View Streetview', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Streetview', 'url'=>array('admin')),
);
?>

<div class="container">
<div class="col-sm-10">

<h2 class="headline first-child text-color"><span class="border-color">Update Streetview <?php echo $model->id; ?></span></h2>


	</div>
	<div class="col-sm-2">
		
		<a  data-toggle="modal" data-target="#myModal" class="btn btn-default">
		<i class="glyphicon glyphicon-search"></i>	
			Search		</a>
	</div>
</div>


<div class="container">






<?php if(Yii::app()->user->hasFlash('response')): ?>
<div class="info-board info-board-green">Update complete.</div>
    
<?php endif; ?>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>


<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="width:1010px" >
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Customer List</h4>
      </div>
      <div class="modal-body">
      	<?php $this->renderPartial('admin', array('model'=>$lists)); ?>	
    	 

		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</div>


</div>