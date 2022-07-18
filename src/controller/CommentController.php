<?php

class CommentController
{
    private object $db;

    public function createComment() : void
    {
        if (isset($_POST['createComment'])) {
            $variables = [];
            $variables['comment_content'] = htmlentities($_POST['commentField']);
            $variables['comment_article_id'] = $_GET['article'];
            $record = $this->db->getRecords(UsersTable::NAME, UsersTable::LOGIN_COLUMN, $_SESSION['login']);
            $variables['comment_author_id'] = $record[0]['user_id'];
            $newComment = [];
            foreach ($variables as $value) {
                $newComment[] = $value;
            }
            $this->db->createRecord(CommentsTable::NAME, CommentsTable::COLUMNS, $newComment);
        }
    }

    public function deleteComment() : void
    {
        if (isset($_POST['deleteComment'])) {
            $commentID = $_POST['deleteComment'];
            $this->db->deleteRecord(CommentsTable::NAME, CommentsTable::ID_COLUMN, $commentID);
        }
    }

    public function __construct($db)
    {
        $this->db = $db;
        $this->createComment();
        $this->deleteComment();
    }
}