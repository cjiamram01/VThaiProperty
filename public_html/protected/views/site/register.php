<div class="container">
<?php if(Yii::app()->user->hasFlash('response')): ?>
<div class="info-board info-board-green">Register complete.</div>
    
<?php endif; ?>  
  <div class="row">
    <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
      <div class="sign-form">
        <h3 class="first-child">Create New Account</h3>
        <hr>
<?php $form=$this->beginWidget('CActiveForm', array(
  'id'=>'users-form',
  'enableAjaxValidation'=>false,
  'clientOptions'=>array(
    'validateOnSubmit'=>true,
  ),
  'htmlOptions'=>array('class'=>'form-horizontal',
             'role'=>'form',
             'enctype' => 'multipart/form-data'),
)); ?>          
          <div class="form-group">
            <?php echo $form->labelEx($model,'picture',array('class'=>'col-sm-4 control-label')); ?>
            <div class="col-sm-8">
                  <?php echo $form->fileField($model,'picture',array('class'=>'form-control','id'=>'uploadFile')); ?>
                <?php echo $form->error($model,'picture',array('class'=>'text-danger')); ?>
              </div>
          </div>
          <div class="form-group">
            <?php echo $form->textField($model,'display_name',
                array(  'id'=>'name',
                        'class'=>'form-control',
                        'placeholder'=>'Enter display name',
                        'data-toggle'=>'popover',
                        'data-placement'=>'left',
                        'data-trigger'=>'focus',
                        'data-content'=>'Enter your display name.',
                        'data-original-title'=>'Display Name',)); ?>
            <?php echo $form->error($model,'display_name',array('class'=>'text-danger')); ?>
          </div>
          <div class="form-group">
            <?php $this->widget('CMaskedTextField',array(
                  'model'=>$model,
                  'attribute'=>'telephone',
                  'name'=>'telephone',
                  'mask'=>'(999)999-9999',
                  'htmlOptions'=>array(
                      'class'=>'form-control',
                      'placeholder'=>'Enter your telephone number',
                      'data-toggle'=>'popover',
                      'data-placement'=>'left',
                      'data-trigger'=>'focus',
                      'data-content'=>'Enter your telephone number',
                      'data-original-title'=>'Telephone',
                  )));?>
            <?php echo $form->error($model,'display_name',array('class'=>'text-danger')); ?>
          </div>
          <div class="form-group">
            <?php echo $form->textField($model,'email',
                array(  'id'=>'email',
                        'class'=>'form-control',
                        'placeholder'=>'Enter email',
                        'data-toggle'=>'popover',
                        'data-placement'=>'left',
                        'data-trigger'=>'focus',
                        'data-content'=>'Enter a valid email here.',
                        'data-original-title'=>'Email',)); ?>
            <?php echo $form->error($model,'email',array('class'=>'text-danger')); ?>
          </div>
          <div class="form-group">
            <?php echo $form->textField($model,'username',
                array(  'id'=>'username',
                        'class'=>'form-control',
                        'placeholder'=>'Enter username',
                        'data-toggle'=>'popover',
                        'data-placement'=>'left',
                        'data-trigger'=>'focus',
                        'data-content'=>'Enter your username.',
                        'data-original-title'=>'Username',
                        'autocomplete'=>'off',)); ?>
            <?php echo $form->error($model,'username',array('class'=>'text-danger')); ?>
          </div>
          
          <div class="form-group">
            <div class="row">
              <div class="col-sm-6">
                <?php echo $form->passwordField($model,'password',
                array(  'id'=>'password',
                        'class'=>'form-control',
                        'placeholder'=>'Enter password',
                        'data-toggle'=>'popover',
                        'data-placement'=>'left',
                        'data-trigger'=>'focus',
                        'data-content'=>'Three symbols minimum.',
                        'data-original-title'=>'Password',
                        'autocomplete'=>'off',)); ?>
            <?php echo $form->error($model,'password',array('class'=>'text-danger')); ?>
              </div>
              <div class="col-sm-6">
                 <?php echo $form->passwordField($model,'password2',
                array(  'id'=>'repeat-password',
                        'class'=>'form-control',
                        'placeholder'=>'Repeat Password',
                        'data-toggle'=>'popover',
                        'data-placement'=>'right',
                        'data-trigger'=>'focus',
                        'data-content'=>'Make sure you still remember it.',
                        'data-original-title'=>'Repeat Password',)); ?>
            <?php echo $form->error($model,'password2',array('class'=>'text-danger')); ?>
              </div>
            </div>
          </div>

    <div class="form-group">
    <div class="row">
      <div class="col-sm-12 control-label">
        <?php echo $form->textArea($model,'address',
                array(  'id'=>'address',
                    'class'=>'form-control',
                    'placeholder'=>'Enter address')); ?>
      </div>
    </div>
    </div>

    <div class="form-group">
      <div class="row">
        <div class="col-sm-12 control-label">
           <?php               
        $clients = country::model()->findAll();
        $opts = CHtml::listData($clients,'id','country_name');
         echo $form->dropDownList($model,'country_id',$opts,array('class'=>'form-control','empty'=>'----Choose Country---','id'=>'country_id')); 
        ?>
        </div>
      </div>
    </div>


    <div class="form-group">
    <div class="row">
      <div class="col-sm-6">
    
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
        <div class="col-sm-6">
        <?php               
        $clients = DataAmphur::model()->findAll();
        $opts = CHtml::listData($clients,'AMPHUR_CODE','AMPHUR_NAME');
         echo $form->dropDownList($model,'district_id',$opts,array('class'=>'form-control','empty'=>'----Choose District---','id'=>'district_id')); 
        ?>
        </div>
      </div>
    


    </div>

    <div class="form-group">
    <div class="row">
     <div class="col-sm-12">
        <?php echo $form->textField($model,'postal_code',
                  array(  'id'=>'postal_code',
                      'class'=>'form-control',
                      'placeholder'=>'Postal Code')); ?>
      <?php echo $form->error($model,'postal_code',array('class'=>'text-danger')); ?>
        </div>
      </div>
    </div>

          <?php if(CCaptcha::checkRequirements()): ?>
          <div class="row"> 
            <div class="col-md-12 text-center">
                <?php $this->widget('CCaptcha'); ?>
              </div>
            <div class="form-group">
              <div class="col-sm-12">
              
              <?php echo $form->textField($model,'verifyCode',
                          array(  'id'=>'verifyCode',
                                  'class'=>'form-control',
                                  'placeholder'=>'Enter Verify Code',
                                  'data-toggle'=>'popover',
                                  'data-placement'=>'left',
                                  'data-trigger'=>'focus',
                                  'data-content'=>'Enter Verify Code',
                                  'data-original-title'=>'Verify Code',
                          )); ?>
              </div>
            </div>
            <div class="col-md-12">
              <?php echo $form->error($model,'verifyCode',array('class'=>'text-danger')); ?>
            </div>
            </div>
            <?php endif; ?>
          
          <button type="submit" class="btn btn-color">Create Account</button>
<?php $this->endWidget(); ?>
      </div>
    </div>
  </div> <!-- / .row -->
</div>