<?php echo '<?xml version="1.0" encoding="UTF-8"?>' ?>

<places>
<?php foreach($places as $model): ?>
        <place>
         <id>
            <?php echo $model->id; ?>
        </id>
        <title>
        	<?php echo $model->title; ?>
    	</title>
    	<lat>
        	<?php echo $model->lat; ?>
    	</lat>
    	<lng>
        	<?php echo $model->lng; ?>
    	</lng>
    	<?php if(!empty($model->picture)): ?>
    		<picture><?php echo Yii::app()->request->baseUrl.$model->picture; ?></picture>
    	<?php else: ?>
    		<picture><?php echo Yii::app()->request->baseUrl. "/upload/PictureMaps/1398262530.jpg"; ?></picture>
    	<?php endif; ?>
        
        </place>
<?php endforeach; ?>
</places>

