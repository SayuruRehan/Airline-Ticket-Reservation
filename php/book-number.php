<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>AirCare</title>

    <!-- STYLE SHEETS -->
    <link rel="stylesheet" href="../css/HeaderFooter.css" />
    <link rel="stylesheet" href="../css/flight-style.css" />
    <link rel="stylesheet" href="../css/styleSubPopUp.css">
    <link
      href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet"
    />

    <!-- SCRIPT SHEETS -->
    <script
      src="https://kit.fontawesome.com/269c22c92a.js"
      crossorigin="anonymous"
    ></script>
  </head>
  <body>
    <header>
      <nav>
        <a href="#" class="logo">
          <h1 id="lgo">AIRCARE</h1>
        </a>

        <ul class="menu">
        <li><a href='Home.html'>Home</a></li>
        <li><a href='Flight Details.html'>Flight Details</a></li>
        <li><a href='booking.html'>Bookings</a></li>
        <li><a href='Contact Us.html'>Contact Us</a></li>
        <li><a href='AboutUs.html'>About Us</a></li>
        </ul>

        <div class="searchLogin">
          <div class="search-container">
            <div class="searchbox-container">
              <input type="search" placeholder="Search" id="searchbox" />
            </div>
            <div class="sbtn-container">
              <a href="#"
                ><span id="sbtn" class="material-icons">search</span></a
              >
            </div>
          </div>
          <div class="lgn">
            <button id="loginbtn">Log-in | Sign Up</button>
          </div>
        </div>
      </nav>
    </header>

    <!--Header ends-->
    <div class="keep-nev-space">

    <style>
      .select-btn {
        padding: 27px 75px;
        margin-top: 20px;
        margin-bottom: 20px;
        font-family: "proxima_novaregular", sans-serif;
        font-size: 20px;
        color: #ffffff;
        background-color: #003566;
        border: none;
        border-radius: 50px;
        cursor: pointer;
        transition: all 0.3s ease;
      }

      .select-btn:hover {
        background-color: #003566de;
      }
      </style>
    <h3 class="sub-headings-middle">Booking Number</h3>

    <?php
    $server = "localhost";
    $username = "root";
    $password = "";
    $dbname = "aircare_flight_details";
    
    $conn = mysqli_connect($server, $username, $password, $dbname);
    
    //if connection error
    if (!$conn){
      die ("Connection failed: ". mysqli_connect_error());
    }
    

    $sql = "SELECT id, name FROM confirmation WHERE id=(SELECT MAX(id) FROM confirmation)";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    
    if ($conn->query ($sql)){
     ?><h3 style="display:flex; justify-content:center; font-size:150px;"> <?php echo $row['id']; ?> </h3> 
     <h3 style="display:flex; justify-content:center; font-size:45px;"> <?php echo $row['name']; ?> </h3> <?php
    }else{
      echo "<script>alert('Error: Could not able to execute the query')</script>";
    }
    ?>
    <center><a href="../html/go-further.html"><button class="select-btn"> <<< Go Back</button></a></center>

    <!--Footer-->
    <div class = "line"><hr></div>
    <footer>
        <div class="ftcontainer">
            <div class="ftrow">
              <div class="ftcol">
                <h4>About Us</h4>
                <ul>
                  <li><a href="AboutUs.html">About AirCare</a></li>
                  <li><a href="#">Advertise With Us</a></li>
                  <li><a href="#">Privacy Policy</a></li>
                </ul>
              </div>
  
              <div class="ftcol">
                <h4>Contact Us</h4>
                <ul>
                  <li><a href="#">Help Center</a></li>
                  <li><a href="../html/FAQ.html">FAQ</a></li>
                  <li><a href="#">Live Chat</a></li>
                </ul>
              </div>
  
              <div class="ftcol">
                <h4>Terms & Conditions</h4>
                <ul>
                  <li><a href="#">Service Fees</a></li>
                  <li><a href="#">Conditions of Carriage</a></li>
                </ul>
              </div>
          
              <div class="ftcol">
                <h4>Follow Us on Social Media</h4>
                <div class="social-links">
                  
                  <a href="#"><i class="fab fa-twitter"></i></a>
                  <a href="#"><i class="fab fa-instagram"></i></a>
                  <a href="#"><i class="fab fa-facebook-f"></i></a>
                  <a href="#"><i class="fab fa-linkedin-in"></i></a>
                </div>
              </div>
  
                <div class="ftcol">
            
                  <div class = "subscribe">

                    <h4>Subscribe for Newsletter</h4>
                    <center>
                        <a class="subbtn" onclick="popupToggle();">Subscribe</a>
                    </center>
                    <div id="popup">
                    <div class="content">
                        <img src="../images/mail.png">
                        <h2>Subscribe to our Newsletter</h2>
                        <!-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit, suscipit eos. Quisquam assumenda neque, sit repellat velit quibusdam eligendi accusamus! Explicabo id dolorum ipsum nesciunt maxime corporis tenetur debitis magnam.</p> -->

                        <form  action = "subscribe.php" method = "POST">
                            <div class="inputBox">
                                <input type = "email" placeholder="Enter Your Email" name="email" required>
                            </div>
                            <div class="inputBox">
                                <input type = "submit" value="subscribe" class="btn">
                            </div>  
                        </form>

                    </div>
                    <a class="close" onclick="popupToggle();"><img src="../images/close.png"></a>
                    </div>
                  </div>
                </div>
            </div>
          </div>
          <div class = "copyrights">
            Created By SLIIT GROUP MLB_03.02_04 | ALL RIGHTS RESERVED
            <br>
            <div class="unsub">
              <a href="#" class = "unsubtxt">Unsubscribe</a>
            </div>
          </div>
    </footer>
    <script src = "../js/PopUp.js"></script>

</body>
</html>