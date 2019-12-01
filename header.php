 <!-- <?php
session_start();
?> -->
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  </head>
<style>
  .navi {
    background-image: url('images/morgan2.jpg');
    background-size: cover;
    text-align: center;
    color: white;
    font-size: 30px;
    /* padding-bottom: 10px; */
  }
  .logo{
    display: block;
    margin-left: auto;
    margin-right: auto;
    height:100px;
    cursor: pointer;
  }
  button{
    text-transform: uppercase;
    font-family: 'Alegreya Sans SC';
    position: absolute;
  }
  .bar{
    background-color: #2F3133;
    opacity: 0.8;
    margin-top: -46px;
  }

  #username {
    text-align: left;
    position:absolute;
    top:46px;
    font-size: 15px;
    margin-left: 10px;
    margin-right: 10px;
    margin-top: -25px;
    width: -webkit-fill-available;
    padding-top: 60px;
  }

  #logout {
    height: 30px;
    float: right;
  }
</style>
<!-- check Login; -->
<?php
  if (isset($_SESSION["username"])){
  }
  else{
    header("location: login.php");
  }
?>
    <div class='navi'>
      <a href="MainPage.php"><img class='logo' src="images/Morgan.png" alt="Morgan_Motor_Logo"></a>
      <div id="username">
        <span style="font-family: georgia;"><?php echo "Welcome, ".$_SESSION["username"]; ?></span>
        <a href="logout.php"><img id="logout" src="images/logout.png" alt="Logout_Button"></a>
      </div>
      <br><br>
      <div class="bar">
        <br><br>
      </div>
      <button onclick="window.location.href = 'MainPage.php';"
        style="cursor: pointer; margin-top: -46px; background-color: transparent; top: 165px; color: white; height: 50px; width: 120px; left: 0px; font-size: 25px;">HOME
      </button>
      <button onclick="window.location.href = 'cars.php';"
        style="cursor: pointer; margin-top: -46px; background-color: transparent; top: 165px; color: white; height: 50px; width: 120px; left: 230px; font-size: 25px;">CARS
      </button>
      <button onclick="window.location.href = 'specs.php';"
        style="cursor: pointer; margin-top: -46px; background-color: transparent; top: 165px; color: white; height: 50px; width: 120px; left: 460px; font-size: 25px;">Specs
      </button>
      <button onclick="window.location.href = 'dealership.php';"
        style="cursor: pointer; margin-top: -46px; background-color: transparent; top: 165px; color: white; height: 50px; width: 120px; left: 690px; font-size: 25px;">dealer
      </button>
    </div>
</html>
