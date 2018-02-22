<?php


/**
 * Generated with RoutingCacheManager
 *
 * on 2018-02-22 07:22:10
 */

$app = Yee\Yee::getInstance();

$app->map("/login", "LoginController::___indexAction")->via("GET")->name("login.index");
$app->map("/login", "LoginController::___postAction")->via("POST")->name("login.post");

