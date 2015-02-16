<?php

 class Article
 {
    public function fetch_all()
    {
      global $connection;

      $query = $connection->prepare("SELECT * FROM articles");
      $query->execute();

      return $query->fetchAll();
    }

    public function fetch_data($article_id)
    {
      global $connection;

      $query = $connection->prepare("SELECT * FROM articles WHERE article_id = ?");
      $query->bindValue(1, $article_id);
      $query->execute();

      return $query->fetch();
    }
 }
?>
