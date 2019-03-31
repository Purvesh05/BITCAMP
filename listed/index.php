<?php ob_start();session_start();
include("../includes/db.php");
include("../includes/function.php");?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Listed &mdash; Colorlib Website Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">

    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/rangeslider.css">

    <link rel="stylesheet" href="css/style.css">
    
  </head>
  <body>
  
  <div class="site-wrap">

    <div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>
    
    <header class="site-navbar py-2 bg-white" role="banner">

      <div class="container">
        <div class="row align-items-center">
          
          <div class="col-11 col-xl-2">
            <h1 class="mb-0 site-logo"><a href="index.html" class="text-black h2 mb-0">AASHRAY</a></h1>
          </div>
          <div class="col-12 col-md-10 d-none d-xl-block">
            <nav class="site-navigation position-relative text-right" role="navigation">

              <ul class="site-menu js-clone-nav mr-auto d-none d-lg-block">
                <li ><a href="index.html"><span>Home</span></a></li>
               <!-- <li >
                  <a href="#"><span>About</span></a>
                  
                </li>-->
                
                <li ><a href="../classic/index.php"><span>Logout</span></a></li>
              </ul>
            </nav>
          </div>


          <div class="d-inline-block d-xl-none ml-md-0 mr-auto py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>

          </div>

        </div>
     
	
	  </div>
    </header>

  

    <div class="site-blocks-cover overlay" style="background-image: url(images/hero_1.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">

          <div class="col-md-10">
            
            
            <div class="row justify-content-center mb-4">
              <div class="col-md-8 text-center">
                <h1 data-aos="fade-up">Help Nearby People</h1>
                <p data-aos="fade-up" data-aos-delay="100">Lend a helping hand to people around you.</p>
              </div>
            </div>

            <div class="form-search-wrap p-2" data-aos="fade-up" data-aos-delay="200">
              <form action="" method="post">
                <div class="row align-items-center">
                  <div class="col-lg-12 col-xl-4 no-sm-border border-right">
                    <select name="disease" class="form-control" placeholder="Disease">
								<?php
								$query = "select DISTINCT disc from help";
								$result = mysqli_query($conn,$query);
								if(!$result){
									die("error");
								}
								while($row = mysqli_fetch_array($result)){
									$disc = $row['disc'];
									if(!empty($disc)){
									echo "<option value='$disc'>$disc</option>";
									}
								}
								?>
							</select>
                  </div>
                  <div class="col-lg-12 col-xl-3 no-sm-border border-right">
                    <div class="wrap-icon">
                      <span class="icon icon-room"></span>
                      <select name="location" class="form-control" placeholder="Search Location">
								<?php 
								
								$query = "select DISTINCT location from help";
								$result = mysqli_query($conn,$query);
								if(!$result){
									die("error");
								}
								while($row = mysqli_fetch_array($result)){
									$location = $row['location'];
									echo "<option value='$location'>$location</option>";
								}
								
							?>

							</select>
                    </div>
                    
                  </div>
                  <div class="col-lg-12 col-xl-3">
                    <div class="select-wrap">
                      <span class="icon"></span>
                      <input type="date" name="date" class="form-control " placeholder="Date">
                    </div>
                  </div>
                  <div class="col-lg-12 col-xl-2 ml-auto text-right">
                    <input type="submit" name="submit" class="btn btn-primary" value="Search">
                  </div>
                  
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>  

<br>
<br>
<br>
   <div class="container">
			<div class="row justify-content-center mb-5">
				 <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Location</th>
                        <th>Discription</th>
                        <th>Dt. of requiremrnt</th>
                        <th>Applied</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                	
                	<?php

					
	if(isset($_POST['submit'])){
		  $location = string_check($_POST['location']);
		  $disease = string_check($_POST['disease']);
		 $date = $_POST['date'];
		 $newDate = date("d/m/Y", strtotime($date));
		$orderdate = explode('/',$newDate);
		  $day = $orderdate[0];
		  $month = $orderdate[1];
		  $year  = $orderdate[2];
		
		$query = "select * from help where `location` = '$location' and `disc` = '$disease' and `month` = '$month'";
		$result = mysqli_query($conn,$query);
        if(!$result){
            die(mysqli_error($conn));
        }
		 $count = mysqli_num_rows($result);
		
		if($count > 0){
			
			while($row = mysqli_fetch_array($result)){
				
				$location = $row['location'];
				$disc = $row['disc'];
				$date = $row['date'];
				$applied = $row['applied'];
				echo "<tr>";
				echo "<td>$location</td>";
				echo "<td>$disc</td>";
				echo "<td>$date</td>";
				echo "<td>$applied</td>";
				echo "<td>Action</td>";
				echo "</tr>";
			}
			
			
		}else{
			echo "not done";
		}
		
		
	}

?>
                </tbody>
				</table>
			</div>
		</div>
   
   
    
    <div class="site-section" data-aos="fade">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-md-7 text-center border-primary">
            <h2 class="font-weight-light text-primary">Services</h2>
                      </div>
        </div>

        <div class="row">
          <div class="col-md-6 mb-4 mb-lg-0 col-lg-4">
            
            <div class="listing-item">
              <div class="listing-image">
                <img src="images/medicine.jpg" alt="Image" class="img-fluid">
              </div>
              <div class="listing-item-content">
                <a href="#" class="bookmark" data-toggle="tooltip" data-placement="left" title="Bookmark"></a>
               
                <h2 class="mb-1"><a href="../ngo/medicine.php">Want to provide?</a></h2>
                
              </div>
            </div>

          </div>
          <div class="col-md-6 mb-4 mb-lg-0 col-lg-4">
            
            <div class="listing-item">
              <div class="listing-image">
                <img src="images/doctor.jpeg" alt="Image" class="img-fluid">
              </div>
              <div class="listing-item-content">
                <a href="#" class="bookmark"></a>
                <h2 class="mb-1"><a href="../ngo/doctors.php">Want to treat?</a></h2>
               </div>
            </div>

          </div>
          <div class="col-md-6 mb-4 mb-lg-0 col-lg-4">
            
            <div class="listing-item">
              <div class="listing-image">
                <img src="images/help.png" alt="Image" class="img-fluid">
              </div>
              <div class="listing-item-content">
                <a href="#" class="bookmark"></a>
               
                <h2 class="mb-1"><a href="../ngo/help.php">Want to help</a></h2>
                
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>

    

   

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/bootstrap-datepicker.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/rangeslider.min.js"></script>
  

  <script src="js/typed.js"></script>
            <script>
            var typed = new Typed('.typed-words', {
            strings: ["Appartments"," Restaurants"," Hotels", " Events"],
            typeSpeed: 80,
            backSpeed: 80,
            backDelay: 4000,
            startDelay: 1000,
            loop: true,
            showCursor: true
            });
            </script>

  <script src="js/main.js"></script>
    
  </body>
</html>