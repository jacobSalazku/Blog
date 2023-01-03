<?php

include './functions/database.php';

$conn = dbConnect(
    user :'root',
    pass:'',
    db: 'blog',
);
if(!isset($conn)){
    echo '<h2> no Database Connection</h2>';
}

if(isset($_POST['submit'])){
    $title = htmlspecialchars($_POST['title'], ENT_QUOTES, 'UTF-8');
    $content  = htmlspecialchars($_POST['content'], ENT_QUOTES, 'UTF-8');

    $sql = " INSERT INTO Blog (title,content) VALUES('$title','$content')";

    
} try
{
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':title', $title, PDO::PARAM_STR);
    $stmt->bindParam(':content', $content, PDO::PARAM_INT);
    $stmt->execute();
}
catch(PDOException $e)
{
    echo "<h2> $e </h2>";
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/create.css">
    <title>Document</title>
</head>
<body>


<div>
    <div >
        <div >
            <div>
                <div">Add Post</div>

                <div >
                    <form  action="" method="POST">
                        <div c>
                            <div >
                                <input type="text"  name="title" placeholder="Title">
                            </div>
                        </div>
                        <div >
                            <div >
                                <textarea name="content"  cols="30" rows="10" placeholder="Content"></textarea>
                            </div>
                        </div>
                        <button type="submit" name ="submit" >
                            Add Post
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Order</div>

                <div class="panel-body">
                    <div class="post">
                        <h2>title</h2>
                        <p>content</p>
                        <hr/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
