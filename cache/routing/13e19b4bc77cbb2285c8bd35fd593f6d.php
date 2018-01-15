<?php


/**
 * Generated with RoutingCacheManager
 *
 * on 2018-01-15 08:03:09
 */

$app = Yee\Yee::getInstance();

$app->map("/home", "HomeController::___indexAction")->via("GET")->name("home.index");
$app->map("/home", "HomeController::___thumbnailAction")->via("POST")->name("home.post");

