<?php
include_once('includes/config.inc.php');
include_once('includes/article.class.php');

$article = new Article;

if (isset($_GET['id']))
  {
  //Artikel anzeigen lassen

  $id=$_GET['id'];
  $data = $article->fetch_data($id);
?>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>CMS</title>

  <link rel="stylesheet" href="assets/style.css" media="screen" title="no title" charset="utf-8">

</head>
<body>

  <div class="container">

    <a href ="index.php" id="logo">CMS</a>

    <h4>
      <?php echo $data['title']; ?> -
      <small>
        posted <?php echo date('l jS', $data['timestamp']); ?>
      </small>
    </h4>

    <p>
      <?php echo $data['content']; ?>
    </p>

    <a href="index.php">&larr; Back</a>

  </div>

</body>
</html>


<?php
  // print_r($data);
}else
  {
    header ('Location:index.php');
    exit();
  }
?>
