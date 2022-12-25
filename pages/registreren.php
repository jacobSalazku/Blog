<?php
  include   './functions/database.php';

  $conn = dbConnect('root','','blog');


// Check if the form has been submitted
if (isset($_POST['email']) && isset($_POST['password'])) {
  // Get the email and password values from the form
  $email = $_POST['email'];
  $password = $_POST['password'];


  // Check if the email already exists in the database
  $result = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
  if (mysqli_num_rows($result) > 0) {
    // Email already exists, display an error message
    echo "Error: Email already exists.";
  } else {
    // Email does not exist, insert the new user into the database
    $insert = "INSERT INTO users (email, password) VALUES ('$email', '$password')";
    mysqli_query($conn, $insert);
    echo "Success: User registered.";
   
  }
}
?>
  <html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="./resources/css/signin.css" rel="stylesheet">
  </head>

  <body class="text-center">
<form  action ="" method="post">


            
            <?php
                /* if(!empty($msg = flash('msg')))
                 {
                     echo '<div class="alert alert-danger" role="alert">';
                     echo $msg;
                     echo '</div>';
                 }*/
             ?>   
            
             <h1 class="h3 mb-3 font-weight-normal">Registreer aub</h1>
               <label for="">E-mail</label>
                 <input type="text" name ="email">
               <label for=""> Passwoord</label>
                 <input type="text"name ="password" a>
                 <button type="submit">Button</button>
                
         </form>
         </div>
                </body>