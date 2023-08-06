<?php
   include('session.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Questrial&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@100;200;300;400;500;600&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Marcellus&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lora&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond&family=Lora&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Caudex&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300&family=Junge&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Gideon+Roman&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Prata&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Italiana&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Ibarra+Real+Nova:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="./Reservation.css">
    <title>Reservation</title>

</head>
<body>

<nav class="navbar fixed-top navbar-expand-lg navbar-dark p-md-3">
      <div class="container">
      <a class="navbar-brand" href="Home.php" style="font-size: 22px;">CRAFT COFFEE</a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNav"
          aria-controls="navbarNav"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
          <div class="mx-auto"></div>
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link text-white" href="Home.php" style="font-size: 18px;">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="Menu.php" style="font-size: 18px;">Menu</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="Reservation.php" style="font-size: 18px;">Reservation</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="#" style="font-size: 18px;"><?php echo $login_session; ?></a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="logout.php" style="font-size: 18px;">Sign Out</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="Reservartion">
        <h1>
            Reservation
        </h1>
        <p>Book your table online</p>
    </div>

    <div class="reservation-form animate1">
        <div class="heading">
            <div class="reservation-form-box-1">
                <h1>Reservations</h1>
                <p>Whether you drink coffee for the taste, the caffeine content,or just as a social activity, coffee brings people together.</p>
            </div>
        </div>
        <div class="formcontainer">

            <div class="reservation-input">
                <form action="Reservation.php" method="post">
                  <span id="star">*</span>
                  <label for="fname">Email</label>
                  
                  <input type="text" id="fname"  name="email" placeholder="Your Email..">
              
                  <span id="star">*</span>
                  <label for="lname">Name</label><br>
                  <input type="text" id="lname"  name="firstname" placeholder="Your name..">
                  <br>
                  <span id="star">*</span>
                  <label for="datee">Date</label>
                  <input type="date" id="lname" name="date" placeholder="Select your preffered date..">
                  <br>
                  <span id="star">*</span>
                  <label for="lname">Time</label>
                  <input type="time" id="lname" name="time" placeholder="Select your preffered time...">
                  <br>
                  <label for="lname">Number of People</label>
                  <input type="text" id="lname" name="people" placeholder="Number of People...">
                  <br>
                
                  <input type="submit" name="submit" value="Submit">
                </form>
              </div>

              <div class="box-2">
                  <h3>
                   
                    Make A Reservation
                  </h3>
                  <div class="ft-reservation-holder">
                      <ul>
                          <li>
                              Week Days
                              <span>09.00 - 24:00<span>
                          </li>
                          <li>
                            Week Days
                            <span>09.00 - 24:00<span>
                        </li>
                        <li>
                            Week Days
                            <span>09.00 - 24:00<span>
                        </li>
                      </ul>
                      <span class="btn-find-table"><input type="submit" value="Find Table"></span>
                  </div>
              </div>
            </div>
    </div>

    <?php 

$servername = "localhost"; 
$username = "root"; 
$passwordd = "";
$dbname = "cafe_restuarant"; 


$errors = 0; 

// Create connection 
$conn = mysqli_connect($servername, $username, $passwordd, $dbname); 

if(isset($_POST['submit'])){

$userfirst = $_POST["firstname"];
$lastname   = $_POST["email"];
$date    = $_POST["date"];
$time = $_POST["time"];
$pep = $_POST["people"];
// Check connection 
if(!$conn) 
{ 
    die("Connection failed: " . mysqli_connect_error()); 
} 

if (empty($userfirst)) { $errors++; echo  "Firstname is required"; }
if (empty($lastname)) { $errors++ ;echo "Lastname is required"; }
if (empty($date)) { $errors++;echo "Date is required"; }


if ($errors == 0) {
$sql = "INSERT INTO reservation (Email,Namee,Datee,Timee,People ) VALUES ('$lastname', '$userfirst' ,'$date', '$time', '$pep' )"; 
if (mysqli_query($conn, $sql)) 
{ 
  echo "New record created successfully"; 
  
} 
else 
{ 
    echo "Error: " . $sql . "<br>" . mysqli_error($conn); 
} 

mysqli_close($conn); 
}
}
?>

  
    <script src="./js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">
      var nav = document.querySelector('nav');

      window.addEventListener('scroll', function () {
        if (window.pageYOffset >=200) {
          nav.classList.add('bg-dark', 'shadow');
        } else {
          nav.classList.remove('bg-dark', 'shadow');
        }
      });
    </script>
</body>
</html>