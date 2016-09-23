<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2016/9/24
 * Time: 6:53
 */

namespace Simon\Safe;


use SplObserver;
use SplSubject;

class a
{

    public function __construct()
    {
    }

    public function b()
    {
        //+ 加入观察模型
        new b(new c());



    }

    public function a()
    {
        (new b())->notify();
    }

}

class c implements \SplObserver
{

    public function update(SplSubject $subject)
    {
        // TODO: Implement update() method.
    }

}


class b implements \SplSubject
{

    protected $observers = [];

    public function attach(SplObserver $observer)
    {
        // TODO: Implement attach() method.
        $this->observers[get_class($observer)] = $observer;
    }

    public function detach(SplObserver $observer)
    {
        // TODO: Implement detach() method.
    }

    public function notify()
    {
        // TODO: Implement notify() method.
    }

}