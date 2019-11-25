<!doctype html>
<html lang="en">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<?php
    include 'header(new).php';
    include 'DB.php';
?>
<style>
    h2{
      font-size: 40px;
      font-weight: 300;
      text-transform: uppercase;
      font-family: cursive;
      color: #ffffff;
    }
    h3{
      font-size: 15px;
      font-weight: bold;
      font-style: oblique;
      color: #ffffff;
    }
    h4{
      font-size: 15px;
      font-weight: normal;
      font-style: oblique;
      color: #ffffff;
    }
    p{
      font-size: 12px;
      font-weight: normal;
      font-style: oblique;
      color: #ffffff;
    }
    body {
      margin: 0;
      line-height: 1;
      font-family: Arial, Helvetica, sans-serif;
    }
</style>
<body>
  <?php
      //search for keyword
      if(isset($_POST['search-specs'])){
          $keyword= $_POST['search'];
          $search = mysqli_real_escape_string($conn, $keyword);
          $sql = "SELECT * FROM specs WHERE Type LIKE '%$search%' OR Cars_ID LIKE '%$search%' OR Engine LIKE '%$search%'
          OR Gearbox LIKE '%$search%' OR MaxPower LIKE '%$search%' OR MaxTorque LIKE '%$search%' OR Performance LIKE '%$search%'
          OR TopSpeed LIKE '%$search%' OR CombinedMPG LIKE '%$search%' OR DryWeight LIKE '%$search%' OR ListPrice LIKE '%$search%'
          OR VAT LIKE '%$search%' OR ListPriceIncVAT LIKE '%$search%'";//to add the row name of db
          $rows = mysqli_query($conn,$sql);
          $queryRows = mysqli_num_rows($rows);

          if($queryRows > 0){
              $results=array();
              $countResults=0;
              while($row = mysqli_fetch_assoc($rows)){
                  $results[$countResults]=$row;
                  $countResults++;
              }
          }
      }
      else{
            $keyword="Morgan Specifications";
            $sql="SELECT * FROM specs";
            $rows = mysqli_query($conn,$sql);
            $queryRows = mysqli_num_rows($rows);
            if($queryRows > 0){
                $results=array();
                $countResults=0;
                while($row = mysqli_fetch_assoc($rows)){
                    $results[$countResults]=$row;
                    $countResults++;
                }
            }
      }
      $j=1;
    ?>
    <div style="background-color: #fafafa;">
      <br><br>
      <p style="text-align: left; font-size: 20px; color: black;">RESULTS related with keyword '<?php echo $keyword ?>' : <?php echo $queryRows;?> </p>
      <form action="specs.php" method="post" style="float: right; background-color: transparent;">
        <input type="text" name="search" placeholder="<?php echo strtoupper($keyword) ?>" style="border-radius: 5px; width: 200px; height: 20px; top: 261px; right: 100px; position: absolute;">&nbsp
        <button type="submit" name= "search-specs" value="Go" style="border-radius: 5px; height:25px; width: 80px; top: 261px; right: 5px; position: absolute;">Go ..</button>
      </form>
      </div>
      <br>
      <?php if ($queryRows>0): ?>
        <?php foreach ($results as $result): ?>
              <?php if ($result['Cars_ID']==1): ?>
                <?php $name="3 Wheel"; $img="3wheel.jpg"; ?>
              <?php endif; ?>

              <?php if ($result['Cars_ID']==2): ?>
                <?php $name="4/4"; $img="44.jpg"; ?>
              <?php endif; ?>

              <?php if ($result['Cars_ID']==3): ?>
                <?php $name="Plus 4"; $img="plus4.jpg"; ?>
              <?php endif; ?>

              <?php if ($result['Cars_ID']==4): ?>
                <?php $name="Roadster"; $img="roadster.jpg"; ?>
              <?php endif; ?>

              <?php if ($result['Cars_ID']==5): ?>
                <?php $name="Plus 6"; $img="plus6.jpg"; ?>
              <?php endif; ?>

              <?php if ($j%2==0): ?>
                <div class="column" style="background-color:#704038; padding: 10px;">
                  <img src="images\<?php echo $img ?>" style="float:right;width: 650px;">
                  <h2><?php echo $name;?></h2>
                  <h3>Engine</h3>
                  <p><?php echo $result['Engine']?></p>
                  <h3>Gearbox</h3>
                  <p><?php echo $result['Gearbox']?></p>
                  <h3>Max Power</h3>
                  <p><?php echo $result['MaxPower']?></p>
                  <h3>Max Torque</h3>
                  <p><?php echo $result['MaxTorque']?></p>
                  <h3>Performance</h3>
                  <h4><?php echo $result['Performance']?></h4>
                </div>
              <?php endif; ?>

              <?php if ($j%2!=0): ?>
                <div class="column" style="background-color:#232323; padding: 10px;">
                    <img src="images\<?php echo $img ?>" style="float:right;width: 650px;">
                    <h2><?php echo $name;?></h2>
                    <h3>Engine</h3>
                    <p><?php echo $result['Engine']?></p>
                    <h3>Gearbox</h3>
                    <p><?php echo $result['Gearbox']?></p>
                    <h3>Max Power</h3>
                    <p><?php echo $result['MaxPower']?></p>
                    <h3>Max Torque</h3>
                    <p><?php echo $result['MaxTorque']?></p>
                    <h3>Performance</h3>
                    <h4><?php echo $result['Performance']?></h4>
                </div>
              <?php endif; ?>

              <br><br><br><br><br>
              <?php $j++;?>
        <?php endforeach; ?>
        <br>
      <?php endif; ?>
      <?php if ($queryRows<=0): ?>
          <h2 style="color:black;">No result found.. Try anothers keyword.</h2>
      <?php endif; ?>
    </div>
</div>
</body>
</html>
<?php include "footer.php" ?>