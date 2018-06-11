<?php
/**
 * Created by PhpStorm.
 * User: ckhero
 * Date: 2018/6/11
 * Time: 下午3:50
 */

namespace src\design\template;


abstract class Journey
{
    protected $thingsToDo;

    abstract function enjoyJourney();

    final public function takeTrip()
    {
        $this->thingsToDo[] = $this->takePlan();
        $this->thingsToDo[] = $this->takeBus();
        $buyGift = $this->buyGift();
        if (!is_null($buyGift)) {
            $this->thingsToDo[] = $buyGift;
        }
        $this->thingsToDo[] = $this->goHome();
    }

    protected function takePlan()
    {
        return 'Take plan~!~';
    }

    protected function takeBus()
    {
        return 'Take Bus~!~';
    }

    protected function buyGift()
    {
        return null;
    }

    protected function goHome()
    {
        return 'go -Home ~!@';
    }
    public function getThingsToDo()
    {
        return $this->thingsToDo;
    }
}