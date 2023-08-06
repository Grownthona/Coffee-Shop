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
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="./Menu.css">
    <title>Menu</title>
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


    <div class="menu-header">
        <h1>MENU</h1>
    </div>


    <a href="" id="men">menu</a>

    <div class="menu">
        <div class="menu-head">
            <h1>Discover</h1>
        <h2>BEST COFFEE SELLERS</h2>
        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
        </div>
        
        <div class="nav">
            <ul>
            <h2>Catagories</h2>
        <?php 
              echo "<li><a href=submenu.php?dataa=1>Coffee</a></li>";
              echo "<li><a href=submenu.php?dataa=4>Shakes</a><li>";
           ?>
           </ul>
       </div>


        <div class="menu-container">
        <?php 
		$servername = "localhost"; 
		$username = "root"; 
		$password = "";
		$dbname = "coffeeshop"; 
        $var_value = $_GET['dataa'];
		// Create connection 
		$conn = mysqli_connect($servername, $username, $password, $dbname); 
		// Check connection 
		if (!$conn) 
		{ 
			die("Connection failed: " . mysqli_connect_error()); 
		} 
        $sql1 = "SELECT * FROM menu where id='$var_value'"; 
		$result1 = mysqli_query($conn, $sql1); 
        $user = mysqli_fetch_assoc($result1);
        $cat = $user['Catagory'];
		$sql = "SELECT * FROM menu where Catagory='$cat'"; 
		$result = mysqli_query($conn, $sql); 
        if (mysqli_num_rows($result) > 0) 
		{ 
			 // output data of each row 
			 while($row = mysqli_fetch_assoc($result)) 
			 { 
                $phpVariable = $row['id'];
                echo "<div class='box'>";
                echo "<div class='img-box'>";
                
                echo '<img src="data:image;base64,'.base64_encode($row['img']).'" alt="Image">';
                echo "</div>";
                echo "<a id='foodname' href=Detail.php?data=$phpVariable>".$row['Name']."</a>";
                echo "<p>".$row['Ingrediants']."</p>";
                echo "<p id='price'>".$row['Price']." Tk</p>";
                echo "<a id='cart' href=Detail.php?data=$phpVariable>Add to cart</a>";
                echo "</div>";
               
			 } 
		} 
		else 
		{ 
			echo "0 results"; 
		} 
		mysqli_close($conn); 
	?>      
    </div>

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