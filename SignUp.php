<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Questrial&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@100;200;300;400;500;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Marcellus&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lora&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond&family=Lora&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Caudex&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Prata&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Ibarra+Real+Nova:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Italiana&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="./SignUp.css">
     
    <title>Document</title>
</head>
<body>
  
<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark p-md-3">
      <div class="container">
        <a class="navbar-brand" href="Home.php">CRAFT COFFEE</a>
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
              <a class="nav-link text-white" href="Home.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="#">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="Menu.php">Menu</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="#">Contact</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="SignIn.php">Sign In</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="signup">
      
        <div class="signup-container">
            <div class="form-box">
              
                <h1>Sign Up</h1>
                <form action="SignUp.php" method="post">
                    <div class="form-group">
                      <label for="exampleInputEmail1">User Name</label>
                      <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter username">
                    
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                      </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Password</label>
                      <input type="password" name="password_1" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword2">Confirm Password</label>
                        <input type="password" name="password_2" class="form-control" id="exampleInputPassword2" placeholder="Confirm Password">
                      </div>
                    <button type="submit" name="reg_user" class="btn btn-primary" style="width: 100%;margin-top: 45px;">Submit</button>
                  </form>
            </div>
            <div class="pic-box">
                <img src="./Images/sign-up.jpg" alt="">
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

		if(isset($_POST['reg_user'])){

      $usernameuser = $_POST["username"];
      $email    = $_POST["email"];
      $passworduser    = $_POST["password_1"];
      $passworduser2 = $_POST["password_2"];
		// Check connection 
		if(!$conn) 
		{ 
			die("Connection failed: " . mysqli_connect_error()); 
		} 

    if (empty($usernameuser)) { $errors++; echo  "Username is required"; }
    if (empty($email)) { $errors++ ;echo "Email is required"; }
    if (empty($passworduser)) { $errors++;echo "Password is required"; }
    if ($passworduser != $passworduser2) {
	   $errors++;
     echo "The two passwords do not match";
     }


     $user_check_query = "SELECT * FROM users WHERE Username='$usernameuser' OR Email='$email' LIMIT 1";
     $result = mysqli_query($conn, $user_check_query);
     $user = mysqli_fetch_assoc($result);
  
    if ($user) { // if user exists
    if ($user['Username'] === $usernameuser) {
       $errors++;
       echo "Username already exists";
    }

    if ($user['Email'] === $email) {
      $errors++;
      echo "email already exists";
    }
  }

  echo $errors;

    if ($errors == 0) {
		$sql = "INSERT INTO users (Username, Email,Passwordu ) VALUES ('$usernameuser', '$email' , '$passworduser' )"; 
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

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
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