<?php
session_start();
include_once('../includes/config.inc.php');

if(isset($_SESSION['logged_in']))
  {
    if(isset($_POST['title'], $_POST['content']))
      {
        $title = $_POST['title'];
        $content = nl2br($_POST['content']);

        if(empty($title) or empty($content))
          {
            $error = 'All fields are requierd!';
          }else
            {
              $query = $connection->prepare('INSERT INTO articles (title, content, timestamp) VALUES (?,?,?)');

              $query->bindValue(1, $title);
              $query->bindValue(2, $content);
              $query->bindValue(3, time());

              $query->execute();

              header('Location: index.php');
            }
      }
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

            <br/>

            <h4>Add Article</h4>

            <?php if(isset($error))
                    {
                      ?>
                      <small style ="color:#aa0000;"><?php echo $error; ?></small>
                      <br/><br/>

            <?php } ?>

            <form action="add.php" method="post" autocomplete="off">
              <input type="text" name="title" placeholder="Title" /><br/><br/>
              <textarea rows="20" cols="50" placeholder="Content" name="content"></textarea><br/><br/>
              <input type="submit" value="Add Article">

            </form>

          </div>

        </body>
    </html>

    <?php
    //anzeigen und hinzufügen von neuer Seite

  }else
    {
      //zurück zu index.php
      header('Location:index.php');
    }

?>
