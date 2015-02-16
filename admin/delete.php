<?php
session_start();

include_once('../includes/config.inc.php');
include_once('../includes/article.class.php');

$article = new Article;

if(isset($_SESSION['logged_in']))
{
  if(isset($_GET['id']))
  {
    $id = $_GET['id'];
    $query = $connection->prepare('DELETE FROM articles WHERE article_id = ?');
    $query->bindValue(1, $id);

    $query->execute();

    header('Location: delete.php');
  }

  $articles = $article->fetch_all();
  ?>

  <html lang="en">
    <head>
      <meta charset="UTF-8">
      <title>CMS</title>

      <link rel="stylesheet" href="../assets/style.css" media="screen" title="no title" charset="utf-8">

    </head>
      <body>

        <div class="container">

          <a href ="index.php" id="logo">CMS</a>

          <br/><br/>

          <h4>Select an Article to Delete</h4>

          <form action="delete.php" method="get">

            <select onchange="this.form.submit();" name="id">

              <?php foreach($articles as $article)
                    { ?>

                        <option value="<?php echo $article['article_id']; ?>"><?php echo $article['title']; ?></option>

                    <?php } ?>

            </select>


          </form>

        </div>

      </body>
  </html>

  <?php
  //Delete Page anzeigen
}else
  {
    header('Location:index.php');
  }
?>
