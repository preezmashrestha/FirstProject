
<?php
include 'crudconn.php';

?>
<?php 
      if(isset($_POST['submit'])){
        $username=$_POST['username'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $confirm_password=$_POST['confirm_password'];


        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          echo "<script>alert(' :Invalid email address.');</script>";
        }

       
        elseif ($password != $confirm_password) {
           echo "<script>alert(' :match the password');</script>";
          
        }
        else {

           // Check if email already exists
        $sql_check_email = "SELECT c_id FROM users WHERE email = ?";
        $stmt_check_email = mysqli_prepare($conn, $sql_check_email);
        mysqli_stmt_bind_param($stmt_check_email, "s", $email);
        mysqli_stmt_execute($stmt_check_email);
        mysqli_stmt_store_result($stmt_check_email);
        
        if (mysqli_stmt_num_rows($stmt_check_email) > 0) {
            echo "<script>alert(' :email already taken');</script>";
                  } else {

          $sql="INSERT INTO users(
            username,email,password,confirm_password)
          VALUES ('$username','$email','$password','$confirm_password')
          ";
          if(mysqli_query($conn,$sql)){
            echo "Now Login!";
          }
          else {
            echo "error";
          }
        }
      }
    }
      
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <style type="text/css">
      .container{
            margin:50px auto ;
            max-width: 500px;
            background-color: lightgreen;
            padding: 30px;
            box-shadow: 0px 0px 10px 0px;
        }
        form{
            display: :flex;
            flex-direction: column;
            text-align: center;
            font-size: 25px;


        }
        p{
            font-size: 12px;
        }
  </style>
</head>

<body>
    <h1 style="color:black;text-align:center;padding-top: 110px;font-size: 50px;">
    Sign Up </h1>
  <div class="container">
      <div class="text">
        
      </div>
      <form method="post" action="">
        
               
               Name:<br>
               <input type="text" name=username ><br>
            
           
               Email Address:<br>
               <input type="Email" name=email ><br>
            
               password:<br>
               <input type="password" name=password ><br>

                Confirm Password:<br>
               <input type="password" name=confirm_password ><br>

            
         

                  <input type="submit" value="submit" name="submit" class="btn btn-light">
                   <input type="reset" value="Reset" class="btn btn-light">
            <p>Already have an account? <a href="loginhere.php">Login here</a>.</p>
      </form>
      </div>
  </body>
  </html>

