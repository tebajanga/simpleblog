<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Simple Blog - Viewing Post</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Lato|Roboto" rel="stylesheet">  
        <link rel="stylesheet" href="css/simpleblog.css">
    </head>
    <body>
        <header>
            <h1>Simple Blog</h1>
        </header>

        <div class="posts">
            <!-- Displaying a post -->
            <?php
                if(isset($_GET['id']) && !empty(trim($_GET['id']))){
                    // Include config file
                    require_once 'config/database.php';

                    // Fetching the post.
                    // Prepare a select statement
                    $sql = "SELECT * FROM posts WHERE id = ?";
                    
                    if($stmt = mysqli_prepare($link, $sql)){
                        mysqli_stmt_bind_param($stmt, "i", $param_id);

                        $param_id = trim($_GET["id"]);
                        
                        if(mysqli_stmt_execute($stmt)){
                            $result = mysqli_stmt_get_result($stmt);
                    
                            if(mysqli_num_rows($result) == 1){
                                // Displaying the post.
                                if($post = mysqli_fetch_array($result, MYSQLI_ASSOC)){?>
                                    <div style="width:100%; margin-bottom: 50px;">
                                        <a href="list.php" class="btn-orange">
                                            <span class="fa fa-arrow-left"></span>&nbsp;&nbsp;Posts
                                        </a>
                                    </div>
                                    <div class="post">
                                        <div class="header">
                                            <h2><?= $post['title']; ?></h2>
                                        </div>
                                        <div class="content">
                                            <img style="object-fit: unset; height: auto;" src="uploads/images/<?= $post['image'] ?>" />
                                            <div class="date">
                                                <span><?= (new DateTime($post['created_at']))->format('M d, Y'); ?><span>
                                            </div>
                                            <p>
                                                <?= $post['description']; ?>
                                            </p>
                                        </div>
                                    </div><!-- close div .post -->
                                <?php }
                            }
                            else{
                                // Redirect to post listing.
                                header("location: index.php");
                                exit();
                            }
                        }
                        else{
                            // Redirect to post listing.
                            header("location: index.php");
                            exit();
                        }
                    }
                }
                else{
                    // Redirect to post listing.
                    header("location: index.php");
                    exit();
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