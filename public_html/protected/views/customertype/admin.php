<?php
/* @var $this CustomertypeController */
/* @var $model Customertype */

$this->breadcrumbs=array(
	'Customertypes'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Customertype', 'url'=>array('index')),
	array('label'=>'Create Customertype', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#customertype-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<div class="container">

<h2 class="headline first-child text-color"><span class="border-color">Manage Customertypes</span></h2>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<div class="panel panel-default">
	<div class="panel-heading">
	  <h4 class="panel-title">
	    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" class="collapsed">
	      Advanced Search
	    </a>
	  </h4>
	</div>
	<div id="collapseOne" class="panel-collapse collapse" style="height: 0px;">
	  <div class="panel-body">
	    <?php $this->renderPartial('_search',array(
			'model'=>$model,
		)); ?>	  </div>
	</div>
</div>
<div class="table-responsive">
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'customertype-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'itemsCssClass' => 'table',
	'summaryText'=>'Displaying {start}-{end} of {count} results.',
	'template'=>'{summary} {pager} {items} {pager}',
	'pagerCssClass'=>'text-center col-sm-12',
	'pager' => array('header'=>'','htmlOptions'=>array('class'=>'pagination',)),
	'columns'=>array(
		'id',
		'customertype',
		array(
			'class'=>'CButtonColumn',
			'htmlOptions'=>array('style'=>'width:150px;'),
		    'template'=>'{view} {update} {delete}',
		    'buttons'=>array(
		    	'view'=>array(
		            'label'=>'',
		            'imageUrl'=>'',
		            //'url'=>'Yii::app()->createUrl("blog/$data->slug")',
		            'options'=>array(
		            	'class'=>'fa fa-eye btn btn-default',
		            	'rel'=>'tooltip',
		            	'data-toggle'=>'tooltip',
		            	'data-placement'=>'top',
		            	'data-original-title'=>'View'
		            ),
		        ),
		        'update'=> array(
		            'label'=>'',
		            'imageUrl'=>'',
		            'options'=>array(
		            	'class'=>'fa fa-pencil btn btn-default',
		            	'rel'=>'tooltip',
		            	'data-toggle'=>'tooltip',
		            	'data-placement'=>'top',
		            	'data-original-title'=>'Update'
		            ),
		        ),
		        'delete'=>array(
		            'label'=>'',
		            'imageUrl'=>'',
		            'options'=>array(
		            	'class'=>'fa fa-trash-o btn btn-default',
		            	'rel'=>'tooltip',
		            	'data-toggle'=>'tooltip',
		            	'data-placement'=>'top',
		            	'data-original-title'=>'Delete',
		            	
		            ),
		        ),
		    ),
		),
	),
)); ?>
</div>
</div>