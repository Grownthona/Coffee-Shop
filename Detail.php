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
    <link rel="stylesheet" href="Detail.css">
    <link rel="stylesheet" href="css/bootstrap.min.css" />
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

    
    <div class="Detail">
        <div class="Detail-container">



        <?php 
		$servername = "localhost"; 
		$username = "root"; 
		$password = "";
		$dbname = "coffeeshop"; 
        $var_value = $_GET['data'];
    
		// Create connection 
		$conn = mysqli_connect($servername, $username, $password, $dbname); 
		// Check connection 
		if (!$conn) 
		{ 
			die("Connection failed: " . mysqli_connect_error()); 
		} 
		$sql = "SELECT * FROM menu where id='$var_value'"; 
		$result = mysqli_query($conn, $sql); 
        $user = mysqli_fetch_assoc($result);
       
        if ($user) 
		{ 
            //echo "<h1>".$user['Name']."</h1>";
			 // output data of each row 

       $datee = date("Y-m-d");
       $name = $user['Name'];
       $price = $user['Price'];
       $image = $user['img'];
             echo "<div class='box-1'>";
             echo "<div class='img-boxx'>";
             echo '<img src="data:image;base64,'.base64_encode($user['img']).'" alt="Image">';
             echo "</div>";
             echo "</div>";
             echo "<div class='box-2'>";
             echo "<h1>".$user['Name']."</h1>";
             echo "<p id='prices'>".$user['Price']." Tk</p>";
             echo " <p id='description'>".$user['Description']."</p>";
             echo " <div class='icontainer'>";
             echo "<div class='box-1i'>";
             echo "<form method='post'>";
             echo "<input type='text' name='numberr'>";
             
             echo "</div>";
             echo "<div class='box-2i'>";
            
             echo "<input type='submit' name='submit' value='Add TO CART' onClick='document.location.href='checkcart.php''>";
             echo "</form>";
             echo "</div>";
             echo "</div>";
             echo "<p id='cat'>Catagory:".$user['Catagory']."</p>";


            

             if(isset($_POST['submit'])){
               $quantity = $_POST['numberr'];
               $dl_quiz1 = (double)$quantity;
               $dl2 = (double)$price;
               $p = ($dl_quiz1*$dl2);
  
              $sqll = "INSERT INTO cart (email,pid,product_name,product_price,quantity,datee,Singleprice ) VALUES ('$user_check', '$var_value' ,'$name','$p','$quantity', '$datee', '$price')"; 
              
              if (mysqli_query($conn, $sqll)) 
              { 
                echo "New record created successfully"; 
              
              } 
              else 
              { 
                echo "Error: " . $sqll . "<br>" . mysqli_error($conn); 
              } 
             }
		} 
		else 
		{ 
			echo "0 results"; 
		} 
		mysqli_close($conn); 
	?>      
          
        </div>
    </div>

    <div class="half-paragrapgh">
        <p>Cu mei liber postea, tritani conclusionemque sit ex. Illud nihil delicata nam id, ius at moderatius intellegam. Impetus scaevola vel ex, id usu affert dissentias, ius id alii moderatius. Eos ei liber choro rationibus, te senserit vulputate cotidieque est, appetere imperdiet eam neix nesan.</p>
    </div>

    <div class="related">
        <h1>Related Products</h1>
        <div class="menu-container">
        <?php 
		$servername = "localhost"; 
		$username = "root"; 
		$password = "";
		$dbname = "coffeeshop"; 
        $var_value = $_GET['data'];
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

		$sql = "SELECT * FROM menu where Catagory ='$cat'"; 
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