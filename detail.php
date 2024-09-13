# Placeholder for detail.php
<?php
inlcude('index.php');
$index = $_GET['index'];
?>
<head>
  <title>Blog World</title>
</head>
<body>
  <h1><?= $blog[$index]['title'] ?> </h1>
  <h2><?= $blog[$index]['content']?> </h2>
  <p><?= $blog[$index]['author'] ?></p>
  <p><?= $blog[$index]['date'] ?></p>
</body>
