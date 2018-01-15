<?php


/**
 * Generated with RoutingCacheManager
 *
 * on 2018-01-15 08:03:09
 */

$app = Yee\Yee::getInstance();

$app->map("/random", "GameController::___test")->via("GET")->name("coinflip.random");
$app->map("/coinflip", "GameController::___indexAction")->via("GET")->name("coinflip.index");
$app->map("/coinflip", "GameController::___postAction")->via("POST")->name("coinflip.post");

