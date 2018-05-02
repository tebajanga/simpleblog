<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Simple Blog - Listing Post</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Lato|Roboto" rel="stylesheet">  
        <link rel="stylesheet" href="css/simpleblog.css">
    </head>
    <body>
        <header>
            <h1><a href="index.php">Simple Blog</a></h1>
        </header>

        <div class="posts">
            <div style="width:100%; margin-bottom: 50px; text-align:right;">
                <a href="new.php" class="btn-green">
                    <span class="fa fa-plus"></span>&nbsp;&nbsp;New Post
                </a>
            </div>
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
                    else{
                        // No post to list.
                        ?>
                            <div class="alert alert-danger">
                                <span class="fa fa-ban"></span>
                                <span>There is no post to show.</span>
                            </div>
                        <?php
                    }
                }

                // Close connection
                mysqli_close($link);
            ?>
        </div>

        <footer>
            <span>&copy; 2018 - SimpleBlog</span>
        </footer>
    </body>
</html>