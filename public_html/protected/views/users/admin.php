<?php
/* @var $this UsersController */
/* @var $model Users */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Users', 'url'=>array('index')),
	array('label'=>'Create Users', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#users-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<div class="container">

<h2 class="headline first-child text-color"><span class="border-color">Manage Users</span></h2>

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
	'id'=>'users-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'itemsCssClass' => 'table',
	'summaryText'=>'Displaying {start}-{end} of {count} results.',
	'template'=>'{summary} {pager} {items} {pager}',
	'pagerCssClass'=>'text-center col-sm-12',
	'pager' => array('header'=>'','htmlOptions'=>array('class'=>'pagination',)),
	'columns'=>array(
		array(
			'name'=>'id',
			'htmlOptions'=>array('style'=>'width:10px;'),
		),
		array(
			'name'=>'picture',
			'header'=>'Picture',
			'type'=>'raw',
			'value'=>'CHtml::image(Load::Picture($data->picture),"picture",array("width"=>"50px"))',
			'htmlOptions'=>array('style'=>'width:50px;'),
		),
		array(
			'name'=>'username',
			'htmlOptions'=>array('style'=>'width:100px;'),
		),
		array(
			'name'=>'display_name',
			'htmlOptions'=>array('style'=>'width:120px;'),
		),
		array(
			'name'=>'telephone',
			'htmlOptions'=>array('style'=>'width:120px;'),
		),
		//'password',
		array(
			'name'=>'create_date',
			'type'=>'raw',
			'value'=>'date_format(date_create($data->create_date), "j F Y")',
		),
		array(
			'name'=>'last_login',
			'type'=>'raw',
			'value'=>'Load::TimePassed($data->last_login)',
		),
		array(
			'name'=>'level_user',
			'type'=>'raw',
			'value'=>'Load::UserLevel($data->level_user)',
		),
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