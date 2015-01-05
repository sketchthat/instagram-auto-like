<?php
    require_once('includes/instagram.php');
    require_once('includes/config.php');
?><html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Instagram Auto Like</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    </head>
    <body>  
        <div class="navbar navbar-inverse navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <i class="fa fa-bars fa-lg"></i>
                    </button>
                    <a href="http://sketchthat.com" class="navbar-brand">sketchthat</a>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="readme.txt">Read Me</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container">
            <h1>Instagram Auto-Like PHP</h1>

            <div class="row">
        <?php 
            if(isset($_SESSION['instagram'])) { 
                shuffle($tags);

                foreach($tags as $tag) {
                    $objTags = $instagram->getTagMedia($tag, 10);

                    foreach($objTags->data as $objTag) { ?>
                    <div class="col-xs-4">
                        <a href="<?php echo $objTag->link; ?>"><img src="<?php echo $objTag->images->thumbnail->url; ?>" class="img-responsive"></a>
                        <p>
                        <?php

                            $objLike = $instagram->likeMedia($objTag->id);

                            if($objLike->meta->code == 200) {
                                echo '<i class="glyphicon glyphicon-heart"></i>';
                            } else {
                                echo '<i class="glyphicon glyphicon-remove"></i>';
                                echo $objLike->meta->error_message;
                            }
                        ?>
                        </p>
                    </div>
                    <?php 
                    }    
                }
            } else { ?>
                <div class="col-xs-12"><a href="<?php echo $instagram->getLoginUrl(); ?>">Login with Instagram</a></div>
        <?php 
            } 
        ?>
            </div>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
    </body>
</html>