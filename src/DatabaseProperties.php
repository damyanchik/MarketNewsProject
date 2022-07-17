<?php

class DatabaseProperties
{
    const ARTICLESTAB_NAME = 'articlestab';
    const ARTICLESTAB_COLUMNS = [
        'article_title',
        'article_header',
        'article_tag',
        'article_content',
        'article_author',
        'article_editeddate'
        ];
    const ARTICLESTAB_ID = 'article_id';
    const ARTICLESTAB_TAG = 'article_tag';
    const ARTICLESTAB_TAG_COUNTRY = 'country';
    const ARTICLESTAB_TAG_WORLD = 'world';
    const ARTICLESTAB_TAG_BUS = 'business';
    const ARTICLESTAB_TAG_POLICY = 'policy';
    const ARTICLESTAB_TAG_TRENDS = 'trends';
    const ARTICLESTAB_TAG_FIN = 'finances';
    const ARTICLESTAB_TAG_INVEST = 'investments';

    const COMMENTSTAB_NAME = 'commentstab';
    const COMMENTSTAB_ID = 'comment_id';
    const COMMENTSTAB_COLUMNS = [
        'comment_content',
        'comment_article_id',
        'comment_author_id'
        ];
    const COMMENTSTAB_ARTICLE_ID = 'comment_article_id';

    const USERSTAB_NAME = 'userstab';
    const USERSTAB_COLUMNS = [
        'user_login',
        'user_email',
        'user_password',
        'user_status'
        ];
    const USERSTAB_ID = 'user_id';
    const USERSTAB_LOGIN = 'user_login';
    const USERSTAB_PASSWORD = 'user_password';
    const USERSTAB_EMAIL = 'user_email';
}