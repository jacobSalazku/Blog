
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
       
        <h1 class="h3 mb-3 font-weight-normal">Please Log In</h1>
          <label for="">E-mail</label>
            <input type="text" name ="email">
          <label for=""> Passwoord</label>
            <input type="text"name ="passwoord" a>
            <button type="submit">Button</button>
            <p>als je nog geen accouht hebt registreer <a href="/pages/registreren.php">hier</a></p>
    </form>
    </div>
  </body>
</html>
