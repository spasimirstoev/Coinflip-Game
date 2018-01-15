<?php


/**
 * Generated with RoutingCacheManager
 *
 * on 2018-01-15 08:03:09
 */

$app = Yee\Yee::getInstance();

$app->map("/statistics", "StatisticsController::___indexAction")->via("GET")->name("statistics.index");

