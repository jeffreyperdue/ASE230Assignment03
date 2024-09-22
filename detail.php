<?php

    $content=file_get_contents('posts.json');
    $blog=json_decode($content, true);

    $index = $_GET['index'];

    if (!file_exists('visitors.csv')){
        $fp = fopen('visitors.csv', 'w');
        fputcsv($fp, array('post_id', 'visits'));
        fclose($fp);
    }

    $post_id = $blog[$index]['title'];
    $visits = 1;
    if (file_exists('visitors.csv')) {
    $fp = fopen('visitors.csv', 'r+');
    $rows = array();
    while (($row = fgetcsv($fp)) !== FALSE) {
        if ($row[0] == $post_id) {
            $row[1] = (int) $row[1] + 1; 
        }
        $rows[] = $row;
    }
        fseek($fp, 0);
        foreach ($rows as $row) {
            fputcsv($fp, $row);
        }
        fclose($fp);
    }
    else{
        $fp = fopen('visitors.csv', 'w');
        fputcsv($fp, array($post_id, $visits));
        fclose($fp);
    }
?>




<!DOCTYPE html>
<html lang="en"> 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog World - <?= $blog[$index]['title'] ?></title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head> 
<body class="container">
    <h1 class="mt-5"><?= $blog[$index]['title'] ?></h1>
    <p><?= nl2br($blog[$index]['content']) ?></p>
    <h4 class="text-muted"><?= $blog[$index]['author'] ?></h4>
    <h4 class="text-muted"><?= $blog[$index]['date'] ?></h4>
    <p>Visitor counter = <?= $row[1]?> </p>
    <a href="index.php" class="btn btn-primary mt-3">Back to Blog List</a>
</body>
</html>
