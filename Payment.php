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
        <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300&display=swap" rel="stylesheet">
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
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet">
    <title>Cart</title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
   
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="Payment.css">
    <style>
        .button3 {
  background-color: white; 
  color: black; 
  border: 2px solid #f44336;
  text-align: center;
  width: 200px;
  height: 50px;
  margin-bottom: 4rem;
  padding: 10px 5px;
}
.button-conter{
    display:flex;
    justify-content: center;
    align-items: center;
}
    </style>
</head>

<body>

<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark p-md-3">
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
            <li class="nav-item">
            <a class="nav-link text-white" href="checkcart.php" style="font-size: 18px;">
            <i class='fas fa-cart-plus' style='font-size:20px;color:red'></i>
            <?php 
	        	$servername = "localhost"; 
		        $username = "root"; 
		        $password = "";
		        $dbname = "coffeeshop"; 
                $tydate = date("Y-m-d");
           
		        $conn = mysqli_connect($servername, $username, $password, $dbname); 
		        if (!$conn) 
		        { die("Connection failed: " . mysqli_connect_error());} 
		        $sql = "SELECT COUNT(pid) as cartno FROM cart where datee='$tydate' and email='$user_check'"; 
		        $result = mysqli_query($conn, $sql); 
            $user = mysqli_fetch_assoc($result);
            if ($user) 
	        	{ 
              echo $user['cartno'];
            }
            else 
		        { echo "0 results";} 
		       mysqli_close($conn); 
	        ?>  
          </a>
          </li>    

          </ul>
        </div>
      </div>
    </nav>


    <div class="About-us-background">
        <p>Purchase</p>
        <h1 style="margin-left: 2rem;">Payment</h1>
    </div>

    <div class="payment">
        <div class="payment-container">
        <form>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Email</label>
      <input type="email" name="email" class="form-control" value="<?php echo $user_check?>" id="inputEmail4" placeholder="Email" style="width: 95%;">
    </div>
    <div class="form-group col-md-6">
    <label for="inputEmail4">Username</label>
      <input type="text" name="username" class="form-control" id="inputEmail4" value="<?php echo $login_session?>" placeholder="Username">
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">Address</label>
    <input type="text" name="address" class="form-control" id="inputAddress" placeholder="1234 Main St">
  </div>

  <div class="form-group">
    <label for="inputAddress2">Total Payment</label>
    <input type="text" name="otal" class="form-control" id="inputAddress2" value="123"placeholder="Apartment, studio, or floor">
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">City</label>
      <input type="text" name="city" class="form-control" id="inputCity" style="width: 95%;">
    </div>
    <div class="form-group col-md-4">
      <label for="inputCity">State</label>
      <input type="text" name="state" class="form-control" id="inputState" style="width: 95%;">
    </div>
    <div class="form-group col-md-2">
      <label for="inputZip">Zip</label>
      <input type="text" name="zip" class="form-control" id="inputZip">
    </div>
  </div>
  <button type="submit" class="btn btn-primary" name="submit" style="width: 95%;">Sign in</button>
</form>
        </div>
    </div>


    <?php 
		$servername = "localhost"; 
		$username = "root"; 
		$password = "";
		$dbname = "coffeeshop"; 
       
        $conn = mysqli_connect($servername, $username, $password, $dbname);

        if(isset($_POST['submit'])){

            $city = $_POST["city"];
            $state = $_POST["state"];  
            $var_value = $_POST["otal"];  
            $adress = $_POST["address"];
            $zip = $_POST["zip"];
              // Check connection 
              $sql = "INSERT INTO final_cart (email, Username,Addresss,Total_Payment,City,Stateee,Zip ) VALUES ('$user_check', '$login_session' , '$adress', '122233','$city','$state','$zip')"; 
              if (mysqli_query($conn, $sql)) 
              { 
                echo "New record created successfully"; 
              } 
              else 
              { 
                  echo "Error: " . $sql. "<br>" . mysqli_error($conn); 
              } 
            }
      
              mysqli_close($conn); 
	    ?>      

    
    <script src="./js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">
      var nav = document.querySelector('nav');

      window.addEventListener('scroll', function () {
        if (window.pageYOffset >=0) {
          nav.classList.add('bg-dark', 'shadow');
        } else {
          nav.classList.remove('bg-dark', 'shadow');
        }
      });
    </script>


</body>
</html>