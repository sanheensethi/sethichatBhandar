<?php
  require 'db.php';
  $date = $_POST['date'];
?>
  <table class="table table-striped table-bordered table-hover">
  <thead>
    <th>Order ID</th>
    <th>Status</th>
    <th>Name</th>
    <th>Address</th>
    <th>Total Bill</th>
    <th>Golgappe</th>
    <th>Bhalla Chat</th>
    <th>Papdi Chat</th>
    <th>Tikki</th>
    <th>Date</th>
    <th>Time</th>
  </thead>
  <tbody>
      <?php
      /*
        0 - Preparing
        1 - Packing
        2 - On the way
        3 - Delivered
      */
        try{
         $stmt = $db->prepare("SELECT * FROM orders WHERE date = '".$date."'");
         $stmt->execute();
         $results = $stmt->fetchAll(PDO::FETCH_OBJ);
         if($results){
          for($i=0;$i<count($results);$i++){
            if($results[$i]->request == 0){
              $data = '<div class="progress">
  <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
</div>';
$data2="<p>Preparing</p>";
            }else if($results[$i]->request == 1){
              $data = '<div class="progress">
               <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
  <div class="progress-bar progress-bar-striped progress-bar-animated bg-info" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
</div>';
$data2="<p>Packing</p>";
            }else if($results[$i]->request == 2){
              $data = '<div class="progress">
              <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
  <div class="progress-bar progress-bar-striped progress-bar-animated bg-info" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
  <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
</div>';
$data2="<p>On the way</p>";
            }else if($results[$i]->request == 3){
              $data = '<div class="progress">
               <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
  <div class="progress-bar progress-bar-striped progress-bar-animated bg-info" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
  <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
  <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
</div>';
$data2="<p>Delivered</p>";
            }
            echo "<tr>";
            echo "<td>".$results[$i]->orderID."</td>";
            echo "<td>".$data.$data2."</td>";
            echo "<td>".$results[$i]->name."</td>";
            echo "<td>".$results[$i]->address."</td>";
            echo "<td style='color:green'>".$results[$i]->totalBill."</td>";
            echo "<td>".$results[$i]->golgappe."</td>";
            echo "<td>".$results[$i]->bhalla."</td>";
            echo "<td>".$results[$i]->papdi."</td>";
            echo "<td>".$results[$i]->tikki."</td>";
            echo "<td>".date("d-m-Y",strtotime($results[$i]->date))."</td>";
            echo "<td>".date("H:m:s",strtotime($results[$i]->time))."</td>";
          }
         }
        }catch(PDOException $e){
         echo $e->getMessage();
        }
      ?>
  </tbody>
</table>