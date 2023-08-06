<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="./signin.css">
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
              <a class="nav-link text-white" href="SignUp.php">Sign Up</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="signin">
        <div class="signup-container">
            <div class="form-box">
                <h1 id="signinn">Sign In</h1>
                <form action="SignIn.php"  method="post">
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Email address</label>
                      <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                      <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                    </div>
                   
                    <button type="submit" name="login_user" class="btn btn-primary" style="width: 100%;margin-top: 15px;">Submit</button>
                    
                    <p id="example">Didn't Sign Up?<span id="lefts"><a href="./SignUp.php">Sign Up</a></span></p>
                  </form>
            </div>
           
        </div>
    </div>

    <?php
    session_start();
    $servername = "localhost"; 
    $username = "root"; 
    $passwordd = "";
    $dbname = "cafe_restuarant"; 

   
     $errors = 0; 
     

    // Create connection 
    $conn = mysqli_connect($servername, $username, $passwordd, $dbname); 

    if (isset($_POST['login_user'])) {
        $mail = $_POST['email'];
        $passwordr = $_POST['password'];
       
      
        if (empty($mail)) {
           $errors++;
           echo $errors;
        }
        if (empty($passwordr)) {
            $errors++;
            echo $errors;
        }
      
        if ($errors== 0) {
    
            echo $mail;
        echo $passwordr;
      
            $query = "SELECT * FROM users WHERE Email='$mail' AND Passwordu='$passwordr' LIMIT 1";
            $results = mysqli_query($conn, $query);
            $user = mysqli_fetch_assoc($results);
            if ($user) {
              $_SESSION['Email'] = $mail;
              $_SESSION['login_user'] = $mail;
              
              header('location: Home.php');
             
            }else {
                $errors++;
                echo "Wrong";
            
  	}
  }
}

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