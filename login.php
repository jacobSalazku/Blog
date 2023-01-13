<?php
    session_start();
    //als $_post register niet leeg is
    if(isset($_POST['login'])){
        //database connect
        require('./config/db.php');

       // beveiligen tegen xss en sql  
        $email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
        $password = htmlspecialchars($_POST['password'], ENT_QUOTES, 'UTF-8');
      
      // querry checken of email in de database voorkomt
        $stmt = $conn-> prepare('SELECT * FROM users WHERE email = ?');
        $stmt -> execute([$email]);
        $user = $stmt -> fetch();

        if(isset($user)){
            // checken of de input WW gelijk aan is aan de WW in de database
            if(password_verify($password,$user -> password )){
                echo "password is correct";
                $_SESSION['user_id'] = $user -> id;
                header('location: https://blog.test/index.php');
            } else {
                $wrongLogin = "the login email or password is wrong";
            }
        }



        /*
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            //query zoeken of de email al in de database voorkomt
            $stmt = $conn -> prepare('SELECT * FROM users WHERE email = ?');
            $stmt -> execute([$email]);
            $totalUsers = $stmt -> rowCount();
          
        }
        
        if($totalUsers> 0){
            
            $emailTaken= "Email already taken";
        }
        else{
            $stmt = $conn -> prepare('INSERT INTO users(username,email,password) VALUES (?,?,? )');
            $stmt -> execute([$username,$email,$passwordhashed]);
        }
        */
    }   



?>

<?php require('./includes/header.html'); ?>

<div class="container">
    <div class="card">
        <div class="card-header bg-light mb-3">Login</div>
        <div class="card-body">
            <form action="login.php" method ="POST">

                <div class="from-group">
                    <label for="email">E-mail</label>
                    <input required type="email" name="email"  class="form-control">
                    <br />
                    <?php if (isset($wrongLogin)) :?>
                        <p style="color:red"><?php echo  $wrongLogin; ?></p>
                        <?php endif; ?>
                </div>

                <div class="from-group">
                    <label for="password">Password</label>
                    <input required type="password" name="password"  class="form-control">
                </div>
                <button type="submit" name="login" class="btn btn-primary ">Login</button>
            </form>
        </div>
    </div>
</div>



<?php require('./includes/footer.html'); ?>
