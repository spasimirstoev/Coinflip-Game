<?php


/**
 * Generated with RoutingCacheManager
 *
 * on 2018-02-22 07:22:10
 */

$app = Yee\Yee::getInstance();

$app->map("/home", "HomeController::___indexAction")->via("GET")->name("home.index");
$app->map("/home", "HomeController::___thumbnailAction")->via("POST")->name("home.post");

