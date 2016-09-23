<?php

class A implements SplObserver
{
    public function update(SplSubject $subject)
    {
        // TODO: Implement update() method.
    }


}


class B implements \SplSubject
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
        unset($this->observers[get_class($observer)]);
    }

    public function notify()
    {
        // TODO: Implement notify() method.
        foreach ($this->observers as $observer)
        {
            $observer->update($this);
        }
    }


}