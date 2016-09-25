<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2016/9/25
 * Time: 7:15
 */

namespace Simon\Safe;


use SplObserver;
use Illuminate\Contracts\Cache\Repository as Cache;

class Container implements \SplSubject
{

    protected $observers = [];

    protected $cache = null;

    public function __construct(Cache $cache)
    {
        $this->cache = $cache;
    }

    protected function getObserverClass(SplObserver $observer)
    {
        return get_class($observer);
    }

    //你可以一个一个传，我都会记下来，但当你成功后必须要手动detach
    //notify是要有参数的，就是observer

    public function attach(SplObserver $observer)
    {
        // TODO: Implement attach() method.

        $class = $this->getObserverClass($observer);

        $observer = [
            'frequency'=>1,
            'object'=>$observer,
        ];

        if ($this->cache->has($class))
        {
            $observer['frequency'] = $this->cache->get($class.'.frequency')+1;
        }


        $this->cache->put('abc',[]);
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