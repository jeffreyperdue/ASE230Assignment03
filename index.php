<?php

    $content=file_get_contents('posts.json');
    $blog=json_decode($content, true);


?>


<!DOCTYPE html>
<html lang="en"> 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog World</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head> 
<body class="container">
<h1 class="mt-5">Blog World Blogs</h1>
<div class="row">
    <?php for($i = 0; $i < count($blog); $i++) { ?>
        <div class="col-12 col-md-6 mb-3">
            <a href="detail.php?index=<?= $i ?>" class="text-decoration-none">
                <h3 class="list-group-item list-group-item-action"><?= $blog[$i]['title'] ?></h3>
            </a>
        </div>
    <?php } ?>
</div>
</body>