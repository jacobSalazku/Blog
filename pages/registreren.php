<form  action ="/pages/login.php" method="post">
            
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
                
         </form>
         </div>