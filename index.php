<?php 
include './vendor/autoload.php';
include './functions/helpers.php';
include './functions/database.php';

registerExpectionHandler();
$conn = dbConnect(
    user :'root',
    pass:'',
    db: 'blog',
);

if(!isset($conn)){
     echo '<h2> no Database Connection</h2>';
}

?>



<div>
    <div class="wrapper">
        <h2>Blog</h2>

        <table>
            <tr>
                <td width="20%"><b> title</b></td>

            </tr>
        
            <tr>
                <td>Row 2, Column 1</td>
                <td>Row 2, Column 2</td>
            </tr>
        </table>


    </div>
</div>



