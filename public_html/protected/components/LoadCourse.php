<?php
class LoadCourse {
	public static function Tab($model){
		
    $CourseStudent=CourseStudent::model()->findByAttributes(array('user_id'=>Yii::app()->user->id,'course_id'=>$model->id));

        //Sign up button
        echo'<div class="btn-group btn-group-justified">';
		
        if($CourseStudent===null):

            echo '<a href="'.Yii::app()->request->baseUrl.'/course/signup/'.$model->id.'" class="btn btn-success">';
            echo '<i class="fa fa-pencil"></i><br>
            สมัครเรียน
            </a>';

        else:

            echo '<a href="'.Yii::app()->request->baseUrl.'/course/cancel/'.$CourseStudent->id.'" class="btn btn-danger" ';

            echo ($CourseStudent->status!=0)? 'disabled="disabled">' : '>';

            echo '<i class="fa fa-times"></i><br>
            ยกเลิกการสมัคร
            </a>';
        endif;

        if($CourseStudent===null):
            echo '<a class="btn btn-default">
            <i class="glyphicon glyphicon-question-sign"></i><br>
            สถานะการชำระเงิน
            </a>';

        else:

            if($CourseStudent->status):

                echo '<a id="course_status" class="btn btn-success"  data-container="body" data-toggle="popover" 
                data-placement="top" data-content="ชำระเงินเรียบร้อยแล้ว ขอบคุณที่ ให้ความสนใจครับ ไม่สามารถยกเลิกการสมัครได้" data-original-title="ชำระเงินเรียบร้อยแล้ว">
                <i class="fa fa-check-circle"></i><br>
                ชำระเงินแล้ว
                </a>';

            else:

                echo '<a id="course_status" class="btn btn-warning" data-container="body" data-toggle="popover" 
                data-placement="bottom" data-content="กรุณาโอนเงินเข้า บัญชี [ นายวิริยะ ลังกาวิเขต ] เลขบัญชี [ 526-237-5597 ] ธนาคาร [ กสิกรไทย ] ส่ง sms มาที่ [ 086-948-1230]"  data-original-title="รอการชำระเงิน">
                <i class="fa fa-money"></i><br>
                การชำระเงิน
                </a>';

            endif;
        endif;

        echo '
                <a class="btn btn-primary" data-toggle="modal" data-target="#ConfirmPayment">
                  <i class="fa fa-inbox"></i><br>
                  แจ้งชำระเงิน
                </a>
                <a id="course_howto" class="btn btn-info" data-container="body" data-toggle="popover" 
                data-placement="bottom" data-original-title="วิธีสมัครเรียน"
                data-content="กรุณาทำการสมัครสมาชิกก่อน เพื่อ Login เข้าสู่ระบบ แล้วจึงสามารถกดปุ่มสมัครเรียนได้ และ เมื่อชำระเงินแล้ว กรุณาแจ้งชำระเงินด้วย หลังจากนั้นจะติดต่อกลับไปครับ เมื่อชำระเงินแล้ว จะไม่สามารถยกเลิกการสมัครได้" >
                <i class="fa fa-question"></i><br>
                วิธีสมัคร
                </a>
              </div>';
	}

	public static function ProcessBar($model){
		$count=CourseStudent::model()->countByAttributes(array('status'=>1,'course_id'=>$model->id)); 

		$percent=$count*100/$model->amount;

		echo '<div class="progress"><div class="progress-bar" role="progressbar" aria-valuenow="'.$count.'" aria-valuemin="0" aria-valuemax="'.$model->amount.'" style="width: '.$percent.'%;">';
		echo $count.' คน';
		echo '</div></div>';
	}

	public static function Student($model){
		$query=Yii::app()->db->createCommand('SELECT * FROM CourseStudent WHERE course_id=\''.$model->id.'\'')->queryAll();
		foreach ($query as $key => $value) {
			echo '<div class="col-sm-1 col-xs-3" style="margin-top:5px;">';
	        echo '<div class="text-center">';
	        echo '<a href="'.Yii::app()->request->baseUrl.'/users/'.$value['user_id'].'"><img class="img-responsive center-block" src="'.Load::Picture(Load::UserDetail($value['user_id'])->picture).'" alt="...">';
	        echo Load::UserDetail($value['user_id'])->username;
	        echo '</a><br/>';
            echo $value['status']?
                  '<span class="label label-success">'.Yii::t('app','Paid').'</span>':
                  '<span class="label label-warning">'.Yii::t('app', 'Unpaid').'</span>';
            echo '</div></div>';
    	}
	}

    public static function Detail($id){
        $course = Course::model()->findByPk($id);
        return $course;
    }

    public static function Status($id){
        if (LoadCourse::Detail($id)->status==0){
            echo '<span class="label label-danger">ยังไม่เปิดรับสมัคร</span>';
        }
        if (LoadCourse::Detail($id)->status==1){
            echo '<span class="label label-success">เปิดรับสมัครแล้ว</span>';
        }
        
        if (LoadCourse::Detail($id)->status==2){
            echo '<span class="label label-danger">ปิดรับสมัครแล้ว</span>';
        }
    }

    public static function ConfirmPayment($cs_id){
        $criteria = new CDbCriteria();
        $criteria->condition = 'cs_id ='.$cs_id;
        $criteria->order = 'id DESC';
        $criteria->limit = 1;

        $model = CoursePayment::model()->findAll($criteria);

        return $model;
    }

}