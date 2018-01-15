<?php


/**
 * Generated with RoutingCacheManager
 *
 * on 2018-01-15 08:03:09
 */

$app = Yee\Yee::getInstance();

$app->map("/login", "LoginController::___indexAction")->via("GET")->name("login.index");
$app->map("/login", "LoginController::___postAction")->via("POST")->name("login.post");

