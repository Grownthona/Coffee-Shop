<?php
   
		$servername = "localhost"; 
		$username = "root"; 
		$passwordd = "";
		$dbname = "cafe_restuarant"; 
		// Create connection 
		$conn = mysqli_connect($servername, $username, $passwordd, $dbname); 
   session_start();
  
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($conn,"SELECT * FROM users WHERE Email= '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql, MYSQLI_ASSOC);
   
   $login_session = $row['Username'];
   
   if(!isset($_SESSION['login_user'])){
      header("location: SignIn.php");
      die();
   }
?>