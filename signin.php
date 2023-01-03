<?php
 include './functions/database.php';
 include './functions/helpers.php';
session_start();

$conn = dbConnect( 'root','','blog',);

if(isset($_POST["submit"])){

  $email = $_POST["email"];
 
  
    if(emptyInputSignup($email,$_POST['pw']) !== false){

    header("location: ./signin.php?error=emptyipnut");
    exit();
    }
    if(InvalidEmail($email) !== false){

      header("location: ./signin.php?error=invalidemail");
      exit();
    }

    if(emailExist($conn,$email)!== false){
      header("location: ./signin.php?error=existingemail");
      exit();
    }
    
    createUser($conn,$email,$_POST['pw']);
  
} 
else{
  header("location: ./signin.php");
}


?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sign in</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">



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
       
        <h1 class="h3 mb-3 font-weight-normal">Please Sign In</h1>
          <label for="">E-mail</label>
            <input type="text" name ="email">

          <label for=""> Passwoord</label>
            <input type="password"  name ="pw">
          
            <button type="submit" name ="submit">Button</button>
          
    </form>
    </div>
  </body>
</html>