<?php
$this->title=$model->display_name;
$this->description=$model->display_name;

$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Users', 'url'=>array('index')),
	array('label'=>'Create Users', 'url'=>array('create')),
	array('label'=>'Update Users', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Users', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Users', 'url'=>array('admin')),
);
?>
<div class="container">
  <div class="row">
    <div class="col-sm-3">
      <div class="team-member user-avatar text-center">
        <?php echo CHtml::image(Load::Picture($model->picture),"picture",array("class"=>"img-responsive center-block")); ?>
        <?php echo $model->display_name; ?>
        <p class="text-muted"><?php echo Load::UserLevel($model->level_user); ?></p>
      </div>
    </div>
    <div class="col-sm-9">
      <div class="row">
        <div class="col-sm-7">
		  <h2 class="primary-font"><?php echo $model->display_name; ?></h2>
		  <p><i class="fa fa-user"></i> Username : <?php echo $model->username; ?></p>
		  <p><i class="fa fa-calendar-o"></i> Register Date : <span class="text-muted"><?php echo date_format(date_create($model->create_date), "j F Y"); ?></span></p>
		  <p><i class="fa fa-phone-square"></i> Telephone : <span class="text-muted"><?php echo $model->telephone; ?></span></p>
		  <p><i class="fa fa-envelope"></i> Email : <span class="text-muted"><?php echo CHtml::mailto($model->email, $model->email); ?></span></p>
		  
		  
		</div>
		<div class="col-sm-5">
		  <ul class="user-info">
		    <li>Count login : <span class="text-muted"><?php echo $model->count_login; ?></span></li>
		    <li>Last login : <span class="text-muted"><?php echo Load::TimePassed($model->last_login); ?></span></li>
		  </ul>
		</div>
        <div class="col-sm-12">
          <hr class="arrow-down">
          
        </div>
      </div>
    </div>
  </div> <!-- / .row -->
</div>