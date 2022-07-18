<?php

class CommentsTable
{
    const NAME = 'commentstab';
    const COLUMNS = [
        'comment_content',
        'comment_article_id',
        'comment_author_id'
    ];
    const ID_COLUMN = 'comment_id';
    const ARTICLE_ID_COLUMN = 'comment_article_id';
}