<?php

class ArticlesTable
{
    const NAME = 'articlestab';
    const COLUMNS = [
        'article_title',
        'article_header',
        'article_tag',
        'article_content',
        'article_author',
        'article_editeddate'
    ];
    const ID_COLUMN = 'article_id';
    const TAG_COLUMN = 'article_tag';
    const TAG_COUNTRY = 'country';
    const TAG_WORLD = 'world';
    const TAG_BUS = 'business';
    const TAG_POLICY = 'policy';
    const TAG_TRENDS = 'trends';
    const TAG_FIN = 'finances';
    const TAG_INVEST = 'investments';
}