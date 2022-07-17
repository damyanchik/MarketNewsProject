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
            $record = $this->db->getRecords(DatabaseProperties::USERSTAB_NAME, DatabaseProperties::USERSTAB_LOGIN, $_SESSION['login']);
            $variables['comment_author_id'] = $record[0]['user_id'];
            $newComment = [];
            foreach ($variables as $value) {
                $newComment[] = $value;
            }
            $this->db->createRecord(DatabaseProperties::COMMENTSTAB_NAME, DatabaseProperties::COMMENTSTAB_COLUMNS, $newComment);
        }
    }

    public function deleteComment() : void
    {
        if (isset($_POST['deleteComment'])) {
            $commentID = $_POST['deleteComment'];
            $this->db->deleteRecord(DatabaseProperties::COMMENTSTAB_NAME, DatabaseProperties::COMMENTSTAB_ID, $commentID);
        }
    }

    public function __construct($db)
    {
        $this->db = $db;
        $this->createComment();
        $this->deleteComment();
    }
}