<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<?php echo "<?php\n"; ?>
/* @var $this <?php echo $this->getControllerClass(); ?> */
/* @var $model <?php echo $this->getModelClass(); ?> */

<?php
$label=$this->pluralize($this->class2name($this->modelClass));
echo "\$this->breadcrumbs=array(
	'$label'=>array('index'),
	'Create',
);\n";
?>

$this->menu=array(
	array('label'=>'List <?php echo $this->modelClass; ?>', 'url'=>array('index')),
	array('label'=>'Manage <?php echo $this->modelClass; ?>', 'url'=>array('admin')),
);
?>
<div class="container">
<div class="col-sm-10">
		<h2 class="headline first-child text-color"><span class="border-color">Create <?php echo yii::t('app',$this->modelClass); ?></span></h2>
	</div>
	<div class="col-sm-2">

		<a  data-toggle="modal" data-target="#myModal" class="btn btn-default">
		<i class="glyphicon glyphicon-search"></i>	
			<?php echo "<?php echo yii::t('app','Search')  ?>"; ?>
		</a>
		

	</div>
</div>
<div class="container">



<?php echo "<?php \$this->renderPartial('_form', array('model'=>\$model)); ?>"; ?>

<div class="container">


<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="width:1010px" >
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Customer List</h4>
      </div>
      <div class="modal-body">
      	<?php   echo "<?php \$this->renderPartial('admin', array('model'=>\$model)); ?>";	?>	
    	 
	
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</div>


</div>