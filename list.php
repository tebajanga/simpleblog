<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Simple Blog - Listing Post</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <link href="https://fonts.googleapis.com/css?family=Lato|Roboto" rel="stylesheet">  
        <link rel="stylesheet" href="css/simpleblog.css">
    </head>
    <body>
        <h1>Simple Blog</h1>
        <hr />

        <div class="posts">
            <!-- Fetching posts from database -->
            <?php
                // Include config file
                require_once 'config/database.php';

                // Fetching all posts.
                $sql = "SELECT * FROM posts ORDER BY created_at DESC";
                if($posts = mysqli_query($link, $sql)){
                    if(mysqli_num_rows($posts) > 0){
                        while($post = mysqli_fetch_array($posts)){?>
                            <div class="post">
                                <div class="header">
                                    <h2><?= $post['title']; ?></h2>
                                </div>
                                <div class="content">
                                    <img src="uploads/images/<?= $post['image']; ?>" />
                                    <div class="date">
                                        <span><?= (new DateTime($post['created_at']))->format('M d, Y'); ?></span>
                                    </div>
                                    <p>
                                        <?php
                                            // Checking description length.
                                            if(strlen($post['description']) > 300){
                                                $description = substr($post['description'], 0, 300);
                                                $description .= "...";
                                                echo $description;
                                            }
                                            else echo $post['description'];
                                        ?>
                                    </p>
                                    <br />
                                    <center><a href="post.php?id=<?= $post['id']; ?>" class="btn-orange">Continue Reading</a></center>
                                </div>
                            </div><!-- close div .post -->
                        <?php }
                    }
                }
            ?>
        </div>
    </body>
</html>