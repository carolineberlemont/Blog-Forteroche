<?php
class CommentManager
{
    public function getComments($postId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT id, author, content, DATE_FORMAT(comment_datetime, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_datetime_fr FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
        $comments->execute(array($postId));

        return $comments;
    }

    public function postComment($postId, $author, $comment)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
        $affectedLines = $comments->execute(array($postId, $author, $comment));

        return $affectedLines;
    }

    private function dbConnect()
    {
        $db = new PDO('mysql:host=localhost;dbname=blogforteroche;charset=utf8', 'root', '');
        return $db;
    }
}