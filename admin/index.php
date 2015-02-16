<?php
session_start();

include_once('../includes/config.inc.php');

if(isset($_SESSION['logged_in']))
{
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

            <ol>
                <li><a href="add.php">Add Article</a></li>
                <li><a href="delete.php">Delete Article</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ol>

          </div>

        </body>
    </html>

    <?php
    //index anzeigen


}else
  {
    //login anzeigen
    if(isset($_POST['username'], $_POST['password']))
      {
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        if(empty($username) or empty($password))
          {
            $error = 'All fields are required!';
          }else
            {
              $query = $connection->prepare("SELECT * FROM users WHERE name = ? AND password = ?");

              $query->bindValue(1, $username);
              $query->bindValue(2, $password);

              $query->execute();
              $num = $query->rowCount();

              if ($num == 1)
                {
                  //richtige eingabe
                  $_SESSION['logged_in'] = true;

                  header('Location:index.php');
                  exit();//Sonst sieht man, die Fehlermeldungen
                }else
                  {
                    // falsche eingabe
                    $error = 'Incorrect details!';
                  }
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

        <br/><br/>

        <?php if(isset($error))
                {
                  ?>
                  <small style ="color:#aa0000;"><?php echo $error; ?></small>
                  <br/><br/>

        <?php } ?>


        <form action="index.php" method="post">
          <input type="text" name="username" placeholder="Username">
          <input type="password" name="password" placeholder="Password">
          <input type="submit" value="Login">

        </form>

      </div>

    </body>
</html>

    <?php
  }

?>
