# Placeholder for detail.php
<?php
include('index.php');
$index = $_GET['index'];
?>
<head>
  <title>Blog World</title>
</head>
<body>
  <h1><?= $blog[$index]['title'] ?> </h1>
  <p><?= $blog[$index]['content']?> </p>
  <h4><?= $blog[$index]['author'] ?></h4>
  <h4><?= $blog[$index]['date'] ?></h4>
</body>
