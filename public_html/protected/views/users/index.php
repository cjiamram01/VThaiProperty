<?php
/* @var $this UsersController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Users',
);

$this->menu=array(
	array('label'=>'Create Users', 'url'=>array('create')),
	array('label'=>'Manage Users', 'url'=>array('admin')),
);
?>
<div class="container">

<h2 class="headline first-child text-color"><span class="border-color">Agents Total : <?php echo Load::MemberTotal(); ?></span></h2>

<div class="row">
            <div class="col-md-offset-3 col-md-6">
                <form method="get" action="<?php echo Yii::app()->request->baseUrl; ?>/users">
                <div class="input-group">
                    
                    <?php
                        $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
                        'name'=>'search',
                        'htmlOptions'=>array('class'=>'form-control','placeholder'=>'Search agent name'),
                        'source'=>Load::Maps(),
                    ));
                    ?>

                    <span class="input-group-btn">
                    <input class="btn btn-default" type="submit" value="Go!" >
                    </span>
                </div>
                </form>
            </div>
        </div>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'template'=>"{pager}\n{items}\n{pager}",
	'pagerCssClass'=>'text-center col-sm-12',
	'pager' => array('header'=>'','htmlOptions'=>array('class'=>'pagination',)),
	'itemView'=>'_view',
)); ?>

</div>