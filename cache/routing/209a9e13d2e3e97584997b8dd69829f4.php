<?php


/**
 * Generated with RoutingCacheManager
 *
 * on 2017-05-09 11:22:51
 */

$app = Yee\Yee::getInstance();

$app->map("/error429", "Error429Controller::___indexAction")->via("GET")->name("error.index");

