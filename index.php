<?php 
    include 'Database/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/bootstrap.min.css">
  <link rel="stylesheet" href="./css/style.css">
  <link rel="stylesheet" href="./css/slider1.css">


  <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/carousel/">
  <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/navbars/">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    

  <script src="./js/search.js"></script>
  <script src="./js/bootstrap.bundle.min.js"></script>

 
  <title>SAHYOG</title>
</head>

<body>
<?php
  include "./partials/navbar.php"
?>
 <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <svg class="bd-placeholder-img" width="100%" height="100%" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><img src="./img/main.jpg" alt="image"></svg>

        <div class="container">
          <div class="carousel-caption text-start">
            <h1>SAHYOG</h1>
            <p>Register as a user</p>
            <p><a class="btn btn-lg btn-primary" href="./user/user_login.php">REGISTER</a></p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <svg class="bd-placeholder-img" width="100%" height="100%" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><img src="./img/slide2.jpg" alt="image"></svg>

        <div class="container">
          <div class="carousel-caption">
            <h1>SAHYOG</h1>
            <p>Register as a Hospital</p>
            <p><a class="btn btn-lg btn-primary" href="./hospital/index.php">REGISTER</a></p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <svg class="bd-placeholder-img" width="100%" height="100%"  aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><img src="./img/slide1.jpg" alt="image"></svg>

        <div class="container">
          <div class="carousel-caption text-end">
            <h1>Blood Availability .</h1>
            <p> Get to know about Blood availability with data from Blood Bank</p>
            <p><a class="btn btn-lg btn-primary" href="#">Check Availability</a></p>
          </div>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
<div class="container my-5" style="max-width: 1350px;">  
  <span class="display-2">Hospitals</span> 
     
  
  <div class="d-flex justify-content-center align-items-center mb-3"> 
  <div class="col"></div>
    <form action="index.php" method="get">
    <div class="input-group ">
      <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" id="myInput" name="search"<?php if(isset($_GET["search"])){echo $_GET["search"];}?>/>
      <button type="submit" id="search" -class="btn btn-outline-dark">search</button>
       </div>
    </form>
  </div>
        
  <table class="table  table-striped table-bordered border-secondary table-hover border-4 mt-5">
    <thead class="tableHead bg-dark text-light">
      <tr>
        <th>Sr. No</th>
        <th>Hospital Name</th>
        <th>Address</th>
        <th>City</th>
        <th>State</th>
        <th>Pincode</th>
        <th>Emergency No</th>
        <th>Total Beds</th>
        <th>Available Beds</th>
        <th>Last Updated</th>
      </tr>
    </thead>
    <tbody>
      <?php
        if(isset($_GET['search'])){
          $searchq = $_GET['search'];
          $query = "SELECT * FROM `hospital_info` WHERE CONCAT(hospital_name,category,city,state) LIKE '%$searchq%'";
          $count = mysqli_query($con,$query);
          $sn = 0;
          if(mysqli_num_rows($count) > 0){
          while($row = mysqli_fetch_assoc($count)){
                $sn = $sn + 1;
                echo "<tr>
                  <td>" . $sn . "</td>
                  <td><a href ='./hospital_data.php?id=".$row['hospital_name']."'>" . $row['hospital_name'] ."</a></td> 
                  <td>" . $row['address'] . "</td>
                  <td>" . $row['city'] . "</td>
                  <td>" . $row['state'] . "</td>
                  <td>" . $row['pincode'] . "</td>
                  <td><ul><li>" . $row['phonenumber'] . "</li><li>" . $row['email'] . "</li><li>" . $row['website'] . "</li></ul></td>
                  <td>" . $row['beds'] . "</td>
                  <td>" . $row['available_bad'] . "</td>
                  <td>" . $row['last_updated'] . "</td>
                </tr>";
              }
            }
            else
              {
                ?>
                  <tr>
                    <td>No Records Found</td>
                  </tr>
                <?php 
              }
            }
          else if(isset($_POST['submit2'])){
            $searchq = 'Emeargency';
            $query = "SELECT * FROM `hospital_info` WHERE category = '$searchq'";
            $count = mysqli_query($con,$query);
            $sn = 0;
            if(mysqli_num_rows($count) > 0){

              while($row = mysqli_fetch_assoc($count)){
                $sn = $sn + 1;
                echo "<tr>
                  <td>" . $sn . "</td>
                  <td><a href ='./hospital_data.php?id=".$row['hospital_name']."'>" . $row['hospital_name'] ."</a></td> 
                  <td>" . $row['address'] . "</td>
                  <td>" . $row['city'] . "</td>
                  <td>" . $row['state'] . "</td>
                  <td>" . $row['pincode'] . "</td>
                  <td><ul><li>" . $row['phonenumber'] . "</li><li>" . $row['email'] . "</li><li>" . $row['website'] . "</li></ul></td>
                  <td>" . $row['beds'] . "</td>
                  <td>" . $row['available_bad'] . "</td>
                  <td>" . $row['last_updated'] . "</td>
                </tr>";
              }
            }else{
                  ?>
                  <tr>
                    <td>No Records Found</td>
                  </tr>
                <?php 
          }
          }
          else if(isset($_POST['submit3'])){
            $searchq = 'Multispeciality';
            $query = "SELECT * FROM `hospital_info` WHERE category = '$searchq'";
            $count = mysqli_query($con,$query);
            $sn = 0;
            if(mysqli_num_rows($count) > 0){

              while($row = mysqli_fetch_assoc($count)){
                $sn = $sn + 1;
                echo "<tr>
                  <td>" . $sn . "</td>
                  <td><a href ='./hospital_data.php?id=".$row['hospital_name']."'>" . $row['hospital_name'] ."</a></td> 
                  <td>" . $row['address'] . "</td>
                  <td>" . $row['city'] . "</td>
                  <td>" . $row['state'] . "</td>
                  <td>" . $row['pincode'] . "</td>
                  <td><ul><li>" . $row['phonenumber'] . "</li><li>" . $row['email'] . "</li><li>" . $row['website'] . "</li></ul></td>
                  <td>" . $row['beds'] . "</td>
                  <td>" . $row['available_bad'] . "</td>
                  <td>" . $row['last_updated'] . "</td>
                </tr>";
              }
            }else{
                  ?>
                  <tr>
                    <td>No Records Found</td>
                  </tr>
                <?php 
          }
          }
          else if(isset($_POST['submit4'])){
            $searchq = 'Obstetrics_and_Gynecology';
            $query = "SELECT * FROM `hospital_info` WHERE category = '$searchq'";
            $count = mysqli_query($con,$query);
            $sn = 0;
            if(mysqli_num_rows($count) > 0){

              while($row = mysqli_fetch_assoc($count)){
                $sn = $sn + 1;
                echo "<tr>
                  <td>" . $sn . "</td>
                  <td><a href ='./hospital_data.php?id=".$row['hospital_name']."'>" . $row['hospital_name'] ."</a></td> 
                  <td>" . $row['address'] . "</td>
                  <td>" . $row['city'] . "</td>
                  <td>" . $row['state'] . "</td>
                  <td>" . $row['pincode'] . "</td>
                  <td><ul><li>" . $row['phonenumber'] . "</li><li>" . $row['email'] . "</li><li>" . $row['website'] . "</li></ul></td>
                  <td>" . $row['beds'] . "</td>
                  <td>" . $row['available_bad'] . "</td>
                  <td>" . $row['last_updated'] . "</td>
                </tr>";
              }
            }else{
                  ?>
                  <tr>
                    <td>No Records Found</td>
                  </tr>
                <?php 
          }
          }
          else if(isset($_POST['submit5'])){
            $searchq = 'Cardiologist';
            $query = "SELECT * FROM `hospital_info` WHERE category = '$searchq'";
            $count = mysqli_query($con,$query);
            $sn = 0;
            if(mysqli_num_rows($count) > 0){

              while($row = mysqli_fetch_assoc($count)){
                $sn = $sn + 1;
                echo "<tr>
                  <td>" . $sn . "</td>
                  <td><a href ='./hospital_data.php?id=".$row['hospital_name']."'>" . $row['hospital_name'] ."</a></td> 
                  <td>" . $row['address'] . "</td>
                  <td>" . $row['city'] . "</td>
                  <td>" . $row['state'] . "</td>
                  <td>" . $row['pincode'] . "</td>
                  <td><ul><li>" . $row['phonenumber'] . "</li><li>" . $row['email'] . "</li><li>" . $row['website'] . "</li></ul></td>
                  <td>" . $row['beds'] . "</td>
                  <td>" . $row['available_bad'] . "</td>
                  <td>" . $row['last_updated'] . "</td>
                </tr>";
              }
            }else{
                  ?>
                  <tr>
                    <td>No Records Found</td>
                  </tr>
                <?php 
          }
          }
          else if(isset($_POST['submit6'])){
            $searchq = 'Neurologist';
            $query = "SELECT * FROM `hospital_info` WHERE category = '$searchq'";
            $count = mysqli_query($con,$query);
            $sn = 0;
            if(mysqli_num_rows($count) > 0){

              while($row = mysqli_fetch_assoc($count)){
                $sn = $sn + 1;
                echo "<tr>
                  <td>" . $sn . "</td>
                  <td><a href ='./hospital_data.php?id=".$row['hospital_name']."'>" . $row['hospital_name'] ."</a></td> 
                  <td>" . $row['address'] . "</td>
                  <td>" . $row['city'] . "</td>
                  <td>" . $row['state'] . "</td>
                  <td>" . $row['pincode'] . "</td>
                  <td><ul><li>" . $row['phonenumber'] . "</li><li>" . $row['email'] . "</li><li>" . $row['website'] . "</li></ul></td>
                  <td>" . $row['beds'] . "</td>
                  <td>" . $row['available_bad'] . "</td>
                  <td>" . $row['last_updated'] . "</td>
                </tr>";
              }
            }else{
                  ?>
                  <tr>
                    <td>No Records Found</td>
                  </tr>
                <?php 
          }
          }
          else if(isset($_POST['submit7'])){
            $searchq = 'Physical therapy';
            $query = "SELECT * FROM `hospital_info` WHERE category = '$searchq'";
            $count = mysqli_query($con,$query);
            $sn = 0;
            if(mysqli_num_rows($count) > 0){

              while($row = mysqli_fetch_assoc($count)){
                $sn = $sn + 1;
                echo "<tr>
                  <td>" . $sn . "</td>
                  <td><a href ='./hospital_data.php?id=".$row['hospital_name']."'>" . $row['hospital_name'] ."</a></td> 
                  <td>" . $row['address'] . "</td>
                  <td>" . $row['city'] . "</td>
                  <td>" . $row['state'] . "</td>
                  <td>" . $row['pincode'] . "</td>
                  <td><ul><li>" . $row['phonenumber'] . "</li><li>" . $row['email'] . "</li><li>" . $row['website'] . "</li></ul></td>
                  <td>" . $row['beds'] . "</td>
                  <td>" . $row['available_bad'] . "</td>
                  <td>" . $row['last_updated'] . "</td>
                </tr>";
              }  
            }else{
                  ?>
                  <tr>
                    <td>No Records Found</td>
                  </tr>
                <?php 
          }
          }
          else{
            $sql = "SELECT * FROM `hospital_info`";
            $result = mysqli_query($con, $sql);
            $sn = 0;
            while($row = mysqli_fetch_assoc($result)){
              $sn = $sn + 1;
              echo "<tr>
                <td>" . $sn . "</td>
                <td><a href ='./hospital_data.php?id=".$row['hospital_name']."'>" . $row['hospital_name'] ."</a></td> 
                <td>" . $row['address'] . "</td>
                <td>" . $row['city'] . "</td>
                <td>" . $row['state'] . "</td>
                <td>" . $row['pincode'] . "</td>
                <td><ul><li>" . $row['phonenumber'] . "</li><li>" . $row['email'] . "</li><li>" . $row['website'] . "</li></ul></td>
                <td>" . $row['beds'] . "</td>
                <td>" . $row['available_bad'] . "</td>
                <td>" . $row['last_updated'] . "</td>
              </tr>";
            }  
          }        
            ?>
    </tbody>
  </table>



</div>
<?php 
  include "./partials/footer.php"
?>
</div>
</body>
</html>