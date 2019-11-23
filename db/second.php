<!doctype html>
<html lang="en">
<body>
 <form action="third.php">
   <?php
     $conn = mysqli_connect ("localhost","root","","search_engine");
     if (!$conn) {
       die("Connection failed: " . mysqli_connect_error());
     }

     //Create Table: cars
     $sqlCars="CREATE TABLE cars (
       Cars_ID INT NOT NULL AUTO_INCREMENT,
       Name VARCHAR(255),
       Image LONGBLOB,
       Powers VARCHAR(50),
       Top_Speed VARCHAR(50),
       kmh VARCHAR(50),
       Combine_CO2 VARCHAR(50),
       Description VARCHAR(300),
       Update_Date TIMESTAMP,
       PRIMARY KEY (Cars_ID)
   );";
     if (mysqli_query($conn, $sqlCars)) {
       echo "TABLE: CARS created successfully";
     }
     else {
       echo "Error creating TABLE: " . mysqli_error($conn);
     }

     //Create Table: specs
     $sqlSpecs="CREATE TABLE specs(
       Specs_ID INT NOT NULL AUTO_INCREMENT,
       Type VARCHAR(20),
       Cars_ID INT,
       Engine VARCHAR(50),
       Gearbox VARCHAR(50),
       MaxPower VARCHAR(50),
       MaxTorque VARCHAR(50),
       Performance VARCHAR(50),
       TopSpeed VARCHAR(50),
       CombinedMPG VARCHAR(50),
       DryWeight VARCHAR(50),
       Price INT,
       PRIMARY KEY (Specs_ID),
       FOREIGN KEY (Cars_ID) REFERENCES cars(Cars_ID)
     );";
     if (mysqli_query($conn, $sqlSpecs)) {
       echo "TABLE: specs created successfully";
     }
     else {
       echo "Error creating TABLE: " . mysqli_error($conn);
     }

     mysqli_close($conn);
   ?>
     <input type="submit" value="next">
 </form>
</body>
 </html>