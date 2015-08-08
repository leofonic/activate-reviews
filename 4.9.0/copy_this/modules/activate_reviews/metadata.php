<?php
$aModule = array(
    'id'          => 'activate_reviews',
    'title'       => 'Activate Reviews',
    'description' =>  array(
        'de'=>'Erstellt neuen Men&uuml;punkt "Bewertungen freischalten"',
        'en'=>'Creates new Page in Backend "Activate Reviews"',
    ),
    'version'     => '1.0',
    'url'         => 'http://zunderweb.de',
    'email'       => 'info@zunderweb.de',
    'author'      => 'Zunderweb',
    'extend'      => array(
        'navigation' => 'activate_reviews/admin/activate_reviews_navigation',
    ),
    'files'    => array(
        'z_article_review_edit'     => 'activate_reviews/admin/z_article_review_edit.php',
        'z_list_review' => 'activate_reviews/admin/z_list_review.php',
        'z_review' => 'activate_reviews/admin/z_review.php',
    ),
    'templates' => array(
        'z_article_review_edit.tpl' => 'activate_reviews/views/admin/tpl/z_article_review_edit.tpl',
        'z_list_review.tpl' => 'activate_reviews/views/admin/tpl/z_list_review.tpl',
        'z_review.tpl' => 'activate_reviews/views/admin/tpl/z_review.tpl',
    ),
);