<!-- Adding new post -->
<?php
    // Global variables.
    $errors = false;
    $class = "";
    $fa = "";
    $message = "";
    
    if(isset($_POST['addpost'])){
        // Check passed values
        if( (isset($_POST['title']) && !empty($_POST['title'])) && 
            (isset($_FILES['image']) && !empty($_FILES['image'])) &&
            (isset($_POST['description']) && !empty($_POST['description'])) ){
            
            // is the file image?
            if(getimagesize($_FILES["image"]["tmp_name"])){
                // Prepare values.
                $title = $_POST['title'];
                $image_name = $_FILES["image"]["name"];
                $description = $_POST['description'];

                $target_dir = "uploads/images/";
                $target_file = $target_dir . basename($_FILES["image"]["name"]);

                // Upload a file.
                if(move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)){
                    // Saving post to database.
                    // Include config file
                    require_once 'config/database.php';

                    $sql = "INSERT INTO posts (`title`, `description`, `image`) VALUES ('$title', '$description', '$image_name')";
                    if(mysqli_query($link, $sql)){
                        // Post added.
                        $errors = true;
                        $class= "alert-success";
                        $fa = "fa-check";
                        $message = "Post added successfully.";
                    }
                    else{
                        // Fail to save post.
                        $errors = true;
                        $class= "alert-danger";
                        $fa = "fa-ban";
                        $message = "Can not add new post. Please try to add a new post again.";
                    }

                    // close connection
                    mysqli_close($link);
                }
                else{
                    // Upload image failed.
                    $errors = true;
                    $class= "alert-danger";
                    $fa = "fa-ban";
                    $message = "Can not upload the post image. Please try to add a new post again.";
                }
            }
            else{
                // File is not image.
                $errors = true;
                $class= "alert-warning";
                $fa = "fa-frown";
                $message = "The post image should be in a format of .png, .jpg, .jpeg etc.";
            }
        }
        else{
            // No required values posted.
            $errors = true;
            $class= "alert-warning";
            $fa = "fa-frown";
            $message = "To add new post submit title, image and description.";
        }
    }
    else{
        // Do nothing.
    }
?>
<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Simple Blog - New Post</title>
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
            <div style="width:100%; margin-bottom: 50px;">
                <a href="list.php" class="btn-orange">
                    <span class="fa fa-arrow-left"></span>&nbsp;&nbsp;Posts
                </a>
            </div>

            <?php
                // Handling errors.
                if($errors){?>
                    <div class="alert <?= $class; ?>">
                        <span class="fa <?= $fa; ?>"></span>
                        <span><?= $message; ?></span>
                    </div>
               <?php }
            ?>

            <h2>Adding new post</h2>
            <hr />
            <br />
            
            <form name="post-form" class="post-form" method="post" enctype="multipart/form-data" action="new.php">
                <div class="form-input">
                    <label>Title</title>
                    <input type="text" name="title" placeholder="Post Title" />
                </div>

                <div class="form-input">
                    <label>Image</title>
                    <input type="file" name="image" placeholder="Post Title" />
                </div>

                <div class="form-input">
                    <label>Description</title>
                    <textarea name="description" id="description"></textarea>
                </div>

                <div class="form-input">
                    <button type="submit" name="addpost" class="btn-green">Add Post</button>
                </div>
            </form>
        </div>

        <footer>
            <span>&copy; 2018 - SimpleBlog</span>
        </footer>
    </body>
</html>