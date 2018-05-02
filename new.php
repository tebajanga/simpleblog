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
            <!-- Adding new post -->
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
                    <label>Title</title>
                    <input type="text" name="title" placeholder="Post Title" />
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