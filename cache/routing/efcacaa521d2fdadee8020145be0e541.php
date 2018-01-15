<?php


/**
 * Generated with RoutingCacheManager
 *
 * on 2017-05-15 08:17:27
 */

$app = Yee\Yee::getInstance();

$app->map("/login", "LoginController::___indexAction")->via("GET")->name("login.index");
$app->map("/login", "LoginController::___postAction")->via("POST")->name("login.post");

