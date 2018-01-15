<?php


/**
 * Generated with RoutingCacheManager
 *
 * on 2017-04-05 10:21:22
 */

$app = Yee\Yee::getInstance();

$app->map("/home", "HomeController::___indexAction")->via("GET")->name("home.index");
$app->map("/home", "HomeController::___thumbnailAction")->via("POST")->name("home.post");

