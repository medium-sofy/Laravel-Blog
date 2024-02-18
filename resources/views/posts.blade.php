<!DOCTYPE html>
<head>
  <link rel="stylesheet" href="/app.css">
</head>
<body>
<?php foreach($posts as $post):?>
  <article>
    <?= $post ?>
  </article>
<?php endforeach;?>
</body>