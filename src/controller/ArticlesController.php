<?php

class ArticlesController
{
    public object $db;

    public function createArticle() : void
    {
        if (isset($_POST['sendArticle'])) {
            $variables = [];
            $variables = $_POST;
            $variables['article_author'] = $_SESSION['login'];
            $variables['article_editeddate'] = date("Y-m-d");
            unset($variables['sendArticle']);
            $newArticle = [];
            foreach ($variables as $value) {
                $newArticle[] = $value;
            }
            $this->db->createRecord(ArticlesTable::NAME, ArticlesTable::COLUMNS, $newArticle);
        }
    }

    public function editArticle() : void
    {
        if (isset($_POST['editArticle'])){
            $editID = $_POST['editArticle'];
            $variables = [];
            $variables = $_POST;
            $variables['article_author'] = $_SESSION['login'];
            $variables['article_editeddate'] = date("Y-m-d");
            unset($variables['editArticle']);
            $newArticle = [];
            foreach ($variables as $value) {
                $newArticle[] = $value;
            }
            $this->db->editRecord(ArticlesTable::NAME, ArticlesTable::COLUMNS, $newArticle, ArticlesTable::ID_COLUMN, $editID);
        }
    }

    public function deleteArticle() : void
    {
        if (isset($_POST['deleteRecord'])) {
            $deleteID = $_POST['deleteRecord'];
            $this->db->deleteRecord(ArticlesTable::NAME, ArticlesTable::ID_COLUMN, $deleteID);
        }
    }

    public function __construct($db)
    {
        $this->db = $db;
        $this->createArticle();
        $this->deleteArticle();
        $this->editArticle();
    }

}