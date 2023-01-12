<?php
require('./config/db.php');
    //als $_post register niet leeg is
    if(isset($_POST['register'])){
        //database connect


       // $username= $_POST['username'];
      //  $email= $_POST['email'];
       // $password= $_POST['password'];
        $username = htmlspecialchars($_POST['username'], ENT_QUOTES, 'UTF-8');
        $email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
        $password = htmlspecialchars($_POST['password'], ENT_QUOTES, 'UTF-8');



        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            $stmt = $conn -> prepare('SELECT * FROM users WHERE email = ?');
            $stmt -> execute([$email]);
            $totalUsers = $stmt -> rowCount();
            echo $totalUsers;
        }

    }



?>

<?php require('./includes/header.html'); ?>

<div class="container">
    <div class="card">
        <div class="card-header bg-light mb-3">Register</div>
        <div class="card-body">
            <form action="register.php" method ="POST">

                <div class="from-group">
                    <label for="username">User Name</label>
                    <input required type="text" name="username" class="form-control">
                </div>

                <div class="from-group">
                    <label for="email">E-mail</label>
                    <input required type="email" name="email"  class="form-control">
                </div>

                <div class="from-group">
                    <label for="password">Password</label>
                    <input required type="password" name="password"  class="form-control">
                </div>
                <button type="submit" name="register" class="btn btn-primary ">Register</button>
            </form>
        </div>
    </div>
</div>



<?php require('./includes/footer.html'); ?>
