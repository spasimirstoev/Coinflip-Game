<?php


/**
 * Generated with RoutingCacheManager
 *
 * on 2017-04-13 09:02:30
 */

$app = Yee\Yee::getInstance();

$app->map("/statistics", "StatisticsController::___indexAction")->via("GET")->name("statistics.index");

