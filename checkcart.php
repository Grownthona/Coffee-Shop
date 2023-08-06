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
    <link rel="stylesheet" href="./ContactUs.css">
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
        <h1 style="margin-left: 8rem;">Cart</h1>
    </div>

    <div class="cart" style="margin:6rem;">
    <table class=" table">
  <thead>
    <tr>
      <th scope="col">Product</th>
      <th scope="col">Price</th>
      <th scope="col">Quantity</th>
      <th scope="col">Total</th>
    </tr>
  </thead>
  <tbody>
  <?php 
		$servername = "localhost"; 
		$username = "root"; 
		$password = "";
        $dbname = "coffeeshop"; 
        $tydate = date("Y-m-d");
		// Create connection 
        $total = 0;
		$conn = mysqli_connect($servername, $username, $password, $dbname); 
		// Check connection 
		if (!$conn) 
		{ 
			die("Connection failed: " . mysqli_connect_error()); 
		} 
		$sql = "SELECT * FROM cart where datee='$tydate' and email='$user_check'"; 
		$result = mysqli_query($conn, $sql); 
        $i=0;
        if (mysqli_num_rows($result) > 0) 
		{ 
			 // output data of each row 
			 while($row = mysqli_fetch_assoc($result)) {?>
			 
    
                <tr style="height:90px;">
                <th scope="row"><?php echo $row["product_name"]; ?></th>
                <td><?php echo $row["Singleprice"];?></td>
                <td><?php echo $row["quantity"];?></td>
                <td><?php echo $row["product_price"]; $total+=$row["product_price"];echo " Taka";?></td>
              </tr>
             
              <?php
             $i++;
             }
            ?>
            <tr>
                <td></td>
                <td></td>
                <td>Subtotal</td>
                <td><?php echo $total;echo " Taka";?></td>
            </tr>
    
  </tbody>
</table>
<?php
}
else{
    echo "No result found";
}

mysqli_close($conn); 
?>
    </div>


    <div class="button-conter">
<button class="button button3"><?php echo "<a href=Payment.php?dataa=$total>Proceed to Payment</a>"?></button>
</div>
    


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