<?php
include_once('includes/config.inc.php');
require_once('includes/article.class.php');

$article = new Article;
$articles = $article->fetch_all();

// print_r($articles);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>CMS</title>

  <link rel="stylesheet" href="assets/style.css" media="screen" title="no title" charset="utf-8">

</head>
<body>

  <div class="container">

    <a href ="index.php" id="logo">CMS</a>

    <ol>
      <?php foreach ($articles as $article) { ?>
        <li><a href="article.php?id=<?php echo $article['article_id']; ?>"><?php echo $article['title']; ?></a> - <small>posted <?php echo date('l jS', $article['timestamp']); ?></small></li>
      <?php } ?>
    </ol>

    <br />

    <small>
      <a href ="admin" >admin</a>
    </small>

  </div>

</body>
</html>
