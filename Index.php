<?php
/**
 * Created by PhpStorm.
 * User: ckhero
 * Date: 2018/6/11
 * Time: 下午5:34
 */

require "./vendor/autoload.php";

$journey = new \src\design\template\GiftJourney();
$journey->takeTrip();
var_dump($journey->getThingsToDo());

$journey = new \src\design\template\NoGiftJourney();
$journey->takeTrip();
var_dump($journey->getThingsToDo());


