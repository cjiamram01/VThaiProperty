<div class="container">
<div class="table-responsive">

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'property-grid',
	'dataProvider'=>$dataProvider,
	'itemsCssClass' => 'table',
	'summaryText'=>'Displaying {start}-{end} of {count} results.',
	'template'=>'{summary} {pager} {items} {pager}',
	'pagerCssClass'=>'text-center col-sm-12',
	'pager' => array('header'=>'','htmlOptions'=>array('class'=>'pagination',)),
	

	'columns'=>array(
	
	
		'title',
		'description',
		'lat',
		'lng',
		
		array(
                    'name'=>'residentailtype_id',
                    'value'=>'$data->residentailtype->title_en',
          ),
		/*
		'floor',
		'room',
		'garage',
		'restroom',
		'area',
		'project_provider',
		'swiming_pool',
		'residentailtype_id',
		'Project_id',
		'customers_id',
		*/
		
		array(
			'class'=>'CButtonColumn',
			'htmlOptions'=>array('style'=>'width:150px;'),
		    'template'=>'{update}{gallery}{streetview}',
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
		    	'gallery' => array
		        (
		            'label'=>'',
		            'url'=>'Yii::app()->createUrl(\'Gallery/Create\', array(\'param\'=>$data->id))',

		            'options'=>array(
		            	'class'=>'glyphicon glyphicon-picture btn btn-default ',
		            	'rel'=>'tooltip',
		            	'data-toggle'=>'tooltip',
		            	'data-placement'=>'top',
		            ),
		            //'click'=>'function(){alert("Going down!");}',
		        ),

		        'streetview' => array
		        (
		            'label'=>'',
		            'url'=>'Yii::app()->createUrl(\'StreetView/create\', array(\'param\'=>$data->id))',
		            'options'=>array(
		            	'class'=>'glyphicon glyphicon-road btn btn-default ',
		            	'rel'=>'tooltip',
		            	'data-toggle'=>'tooltip',
		            	'data-placement'=>'top',
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