
    <?php
      header("Content-type:text/xml; charset=UTF-8");  
      
      $users=Yii::app()->db->createCommand('SELECT id,place,lat,lng FROM tbl_place ')->queryAll();
      echo "<places>";
      foreach ( $users as $data ) {
          echo "<place id='". $data['id'] ."'>";
          echo "<title>".$data['place']."</title>";
          echo "<lat>".$data['lat']."</lat>";
          echo "<lng>".$data['lng']."</lng>";
          echo "</place>";
      }
      echo "</places>";

  ?>