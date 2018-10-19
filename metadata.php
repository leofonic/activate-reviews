<?php

$sMetadataVersion = '2.0';
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
        \OxidEsales\Eshop\Application\Controller\Admin\NavigationController::class => \zunderweb\activate_reviews\Controller\Admin\NavigationController::class,
    ),
    'controllers'    => array(
        'z_article_review_edit'     => \zunderweb\activate_reviews\Controller\Admin\z_article_review_edit::class,
        'z_list_review' => \zunderweb\activate_reviews\Controller\Admin\z_list_review::class,
        'z_review' => \zunderweb\activate_reviews\Controller\Admin\z_review::class,
    ),
    'templates' => array(
        'z_article_review_edit.tpl' => 'zunderweb/activate_reviews/views/admin/tpl/z_article_review_edit.tpl',
        'z_list_review.tpl' => 'zunderweb/activate_reviews/views/admin/tpl/z_list_review.tpl',
        'z_review.tpl' => 'zunderweb/activate_reviews/views/admin/tpl/z_review.tpl',
    ),
);