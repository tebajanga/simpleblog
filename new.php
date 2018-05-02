<!-- Adding new post -->
<?php
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

                var_dump($target_file);

                // Upload a file.
                if(move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)){
                    // Saving post to database.
                    // Include config file
                    require_once 'config/database.php';

                    $sql = "INSERT INTO posts (`title`, `description`, `image`) VALUES ('$title', '$description', '$image_name')";
                    if(mysqli_query($link, $sql)){
                        echo "Records added successfully.";
                    }
                    else{
                         // To Do. Fail to save post.
                    }

                    // close connection
                    mysqli_close($link);
                }
                else{
                    // To Do. Upload image failed.

                }
            }
            else{
                // To Do. Handling not image file.
            }
        }
        else{
            // To Do. No required values posted.
        }
    }
    else{
        // To Do. Handling no POST.

    }
?>
<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Simple Blog - New Post</title>
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

        <div class="posts" style="min-height: 100vh;">
            <div style="width:100%; margin-bottom: 50px;">
                <a href="list.php" class="btn-orange">
                    <span class="fa fa-arrow-left"></span>&nbsp;&nbsp;Posts
                </a>
            </div>
            <?php
                
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