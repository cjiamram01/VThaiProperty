<?php
$this->breadcrumbs=array(
	'Properties'=>array('index'),
	'MapSearch',
);


?>


</script>


<div id="mapSearch" ></div>
<div class="container">
<div class="table-responsive">
<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'property-grid',
    'dataProvider'=>$dataProvider,
    //'filter'=>$model,
    'itemsCssClass' => 'table',
    'summaryText'=>'Displaying {start}-{end} of {count} results.',
    'template'=>'{summary} {pager} {items} {pager}',
    'pagerCssClass'=>'text-center col-sm-12',
    'pager' => array('header'=>'','htmlOptions'=>array('class'=>'pagination',)),
    'columns'=>array(
        array(
            'name'=>'picture',
            'header'=>'Picture',
            'type'=>'raw',
            'value'=>'CHtml::image(Load::Picture($data->picture),"picture",array("width"=>"50px"))',
            'htmlOptions'=>array('style'=>'width:50px;'),
        ),
        'title',
        'description',
        'lat',
        'lng',
        'floor',
        /*
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
            'template'=>'{view} ', //{update} {delete}
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