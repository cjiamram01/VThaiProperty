<div class="row">
<div class="col-sm-3">
  <div class="team-member user-avatar text-center">
    <?php echo CHtml::image(Load::Picture($data->picture),"picture",array("class"=>"img-responsive center-block")); ?>
    <?php echo $data->display_name; ?>
    <p class="text-muted"><?php echo Load::UserLevel($data->level_user); ?></p>
  </div>
</div>
<div class="col-sm-9">
  <div class="row">
    <div class="col-sm-7">
	  <h2 class="primary-font"><?php echo $data->display_name; ?></h2>
	  <p><i class="fa fa-user"></i> Username : <?php echo $data->username; ?></p>
	  <p><i class="fa fa-calendar-o"></i> Register Date : <span class="text-muted"><?php echo date_format(date_create($data->create_date), "j F Y"); ?></span></p>
	  <p><i class="fa fa-phone-square"></i> Telephone : <span class="text-muted"><?php echo $data->telephone; ?></span></p>
	  <p><i class="fa fa-envelope"></i> Email : <span class="text-muted"><?php echo CHtml::mailto($data->email, $data->email); ?></span></p>
	  
	  
	</div>
	<div class="col-sm-5">
	  <ul class="user-info">
	    <li>Count login : <span class="text-muted"><?php echo $data->count_login; ?></span></li>
	    <li>Last login : <span class="text-muted"><?php echo Load::TimePassed($data->last_login); ?></span></li>
	  </ul>
	</div>
    <div class="col-sm-12">
      <hr class="arrow-down">
      
    </div>
  </div>
</div>
</div>