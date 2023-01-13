<?php
    session_start();
    // logged in
    if(isset($_SESSION['user_id'])){
        require('./config/db.php');

        $userId = $_SESSION['user_id'];
        echo $userId."<br>";
        $stmt = $conn -> prepare('SELECT * FROM users WHERE id = ? ');
        $stmt -> execute([$userId]);
        $user = $stmt -> fetch();
        

        if($user -> role === 'moderator'){
            $message = "your role as a moderator";
        }
    }
    
?>

<?php require('./includes/header.html'); ?>

<div class="container">
    <div class="card bg-light mb-3">
       <div class="card-header">
         <?php if(isset($user)): ?>
            <h5> Welcome <?php echo $user-> username  ?></h5>
         <?php else:?>
                <h5>Welcome Guest</h5>
           <?php endif; ?>
           
       </div>
        <div class="card-body">
        <?php if(isset($user)): ?>
            <h5> Content only for logged in people </h5>
         <?php else:?>
               <h4> view content</h4>
        <?php endif; ?>
        </div>

    </div>
</div>



<?php require('./includes/footer.html'); ?>



