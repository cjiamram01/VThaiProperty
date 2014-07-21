<div class="container">
  <div class="row">
    <div class="col-sm-3">
      <div class="team-member user-avatar text-center">
        <?php echo CHtml::image(Load::Picture(Yii::app()->user->detail->picture),"picture",array("class"=>"img-responsive center-block")); ?>
        <?php echo Yii::app()->user->detail->display_name; ?>
        <p class="text-muted"><?php echo Load::UserLevel(Yii::app()->user->detail->level_user); ?></p>
      </div>
      <div class="user-menu">
        <ul>
          <li><?php echo CHtml::link('<i class="sign fa fa-user bg-green"></i>'.Yii::t('app','My Profile').'<i class="fa fa-chevron-right pull-right"></i>',array('users/profile')); ?></li>
          <li><?php echo CHtml::link('<i class="sign fa fa-edit bg-blue"></i>'.Yii::t('app','Edit Profile').'<i class="fa fa-chevron-right pull-right"></i>',array('users/editProfile'),array('class'=>'active')); ?></li>
          <li><?php echo CHtml::link('<i class="sign fa fa-key bg-turquoise"></i>'.Yii::t('app','Change Password').'<i class="fa fa-chevron-right pull-right"></i>',array('users/changePassword')); ?></li>
          <li><?php echo CHtml::link('<i class="sign fa fa-sign-out bg-red"></i>'.Yii::t('app','Logout').'<i class="fa fa-chevron-right pull-right"></i>',array('site/Logout')); ?></li>
        </ul>
      </div>
    </div>
    <div class="col-sm-9">
      <div class="row">
          <?php $this->renderPartial('_detailProfile'); ?>
        <div class="col-sm-12">
          <hr class="arrow-down">
          <?php if(Yii::app()->user->hasFlash('response')): ?>
          <div class="info-board info-board-green">Update Profile complete.</div>
          <?php endif; ?>
          <h4 class="primary-font">Edit Profile</h4>
<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
  'id'=>'updateProfile-form',
  'enableClientValidation'=>true,
  'clientOptions'=>array(
    'validateOnSubmit'=>true,
  ),
  'htmlOptions'=>array('class'=>'form-horizontal',
             'role'=>'form',
             'enctype' => 'multipart/form-data'),
)); ?>
    <?php   if(!empty($model->picture)): echo '
  <div class="form-group">
  <div class="col-md-6 col-md-offset-4 ">
  <img src="'.Yii::app()->request->baseUrl.$model->picture.'" style="height:100px;">
  </div></div>';
      else :echo '<div class="form-group">
  <div class="col-md-6 col-md-offset-4 ">no image</div></div>';
      endif; ?>

  <div class="form-group">

    <?php echo $form->labelEx($model,'picture',array('class'=>'col-sm-4 control-label')); ?>
    <div class="col-sm-8">
          <?php echo $form->fileField($model,'picture',array('class'=>'form-control','id'=>'uploadFile')); ?>
        <?php echo $form->error($model,'picture',array('class'=>'text-danger')); ?>
      </div>
  </div>
    <div class="form-group">
      <?php echo $form->labelEx($model,'display_name',array('class'=>'col-sm-4 control-label')); ?>
        <div class="col-sm-8">
        <?php echo $form->textField($model,'display_name',
                  array(  'id'=>'display_name',
                      'class'=>'form-control',
                      'placeholder'=>'Enter Display Name')); ?>
      <?php echo $form->error($model,'display_name',array('class'=>'text-danger')); ?>
        </div>
    </div>

    <div class="form-group">
      <?php echo $form->labelEx($model,'username',array('class'=>'col-sm-4 control-label')); ?>
        <div class="col-sm-8">
        <?php echo $form->textField($model,'username',
                  array(  'id'=>'username',
                      'class'=>'form-control',
                      'placeholder'=>'Enter New Username')); ?>
      <?php echo $form->error($model,'username',array('class'=>'text-danger')); ?>
        </div>
    </div>

    <div class="form-group">
      <?php echo $form->labelEx($model,'email',array('class'=>'col-sm-4 control-label')); ?>
        <div class="col-sm-8">
        <?php echo $form->textField($model,'email',
                  array(  'id'=>'email',
                      'class'=>'form-control',
                      'placeholder'=>'Confirm Password')); ?>
      <?php echo $form->error($model,'email',array('class'=>'text-danger')); ?>
        </div>
    </div>

    <div class="form-group">
      <?php echo $form->labelEx($model,'telephone',array('class'=>'col-sm-4 control-label')); ?>
        <div class="col-sm-8">
        <?php $this->widget('CMaskedTextField',array(
                  'model'=>$model,
                  'attribute'=>'telephone',
                  'name'=>'telephone',
                  'mask'=>'(999)999-9999',
                  'htmlOptions'=>array(
                      'class'=>'form-control',
                      'placeholder'=>'Enter your telephone number',
                  )));?>
            <?php echo $form->error($model,'display_name',array('class'=>'text-danger')); ?>
        </div>
    </div>

    <div class="form-group">
      <div class="col-sm-4 control-label">
      <?php 
      echo $form->labelEx($model,'address',array('class'=>'control-label')); 
      ?>
      </div>
      <div class="col-sm-8 control-label">
        <?php echo $form->textArea($model,'address',
                array(  'id'=>'address',
                    'class'=>'form-control',
                    'placeholder'=>'Enter address')); ?>
      </div>
    </div>

    <div class="form-group">
      <div class="col-sm-4 control-label">
      <?php 
      echo $form->labelEx($model,'country_id',array('class'=>'control-label')); 
      ?>

      </div>
        <div class="col-sm-8 control-label">
           <?php               
        $clients = country::model()->findAll();
        $opts = CHtml::listData($clients,'id','country_name');
         echo $form->dropDownList($model,'country_id',$opts,array('class'=>'form-control','empty'=>'----Choose Country---','id'=>'country_id')); 
        ?>
        </div>
    </div>


    <div class="form-group">
      <div class="col-sm-4 control-label">
      <?php 
      echo $form->labelEx($model,'province_id',array('class'=>'control-label'))."/".$form->labelEx($model,'district_id',array('class'=>'control-label')); 
      ?>
      </div>
      <div class="col-sm-4">
    
       <?php 
        $clients = province::model()->findAll();
        $opts = CHtml::listData($clients,'PROVINCE_ID','PROVINCE_NAME');
          echo $form->dropDownList($model,'province_id',$opts,array('class'=>'form-control','empty'=>'----Choose Province---','id'=>'province_id'
            ,
            'ajax' => array(
                        'type' => 'POST',
                        'url'=>$this->createUrl('Contact/Province'),   
                        'update' => '#district_id',                        
                        'data'=>array('province_id'=>'js:this.value',),   
                        'success'=> 'function(data) {$("#district_id").empty();
                         $("#district_id").append(data);
            } ',
            ),

            )); 
        ?>
        </div>
        <div class="col-sm-4">
        <?php               
        $clients = DataAmphur::model()->findAll();
        $opts = CHtml::listData($clients,'AMPHUR_CODE','AMPHUR_NAME');
         echo $form->dropDownList($model,'district_id',$opts,array('class'=>'form-control','empty'=>'----Choose District---','id'=>'district_id')); 
        ?>
        </div>
    


    </div>

    <div class="form-group">
      <div class="col-sm-4 control-label">
      <?php 
      echo $form->labelEx($model,'postal_code',array('class'=>'control-label')); 
      ?>
    </div>
     <div class="col-sm-8">
        <?php echo $form->textField($model,'postal_code',
                  array(  'id'=>'postal_code',
                      'class'=>'form-control',
                      'placeholder'=>'Postal Code')); ?>
      <?php echo $form->error($model,'postal_code',array('class'=>'text-danger')); ?>
        </div>
    </div>
    <div class="well text-center">
          <?php echo CHtml::submitButton('Update',array('class'=>'btn btn-sm btn-color')); ?>
    </div>
<?php $this->endWidget(); ?>
</div>
        </div>
      </div>
    </div>
  </div> <!-- / .row -->
</div>