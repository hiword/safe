<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2016/9/25
 * Time: 7:15
 */

namespace Simon\Safe;


use Simon\Safe\Contracts\ObserverInterface;
use Simon\Safe\Contracts\SubjectInterface;
use SplObserver;
use Illuminate\Contracts\Cache\Repository as Cache;

class Container implements SubjectInterface
{

    protected $observers = [];

    protected $cache = null;

    public function __construct(Cache $cache)
    {
        $this->cache = $cache;
    }

    protected function getObserverClass(ObserverInterface $observer)
    {
        return get_class($observer);
    }

    //你可以一个一个传，我都会记下来，但当你成功后必须要手动detach
    //notify是要有参数的，就是observer

    public function attach(ObserverInterface $observer)
    {
        // TODO: Implement attach() method.

        $class = $this->getObserverClass($observer);

        if ($this->cache->has($class))
        {
            $cache = $this->cache->get($class);
            $cache['frequency'] = $cache['frequency']+1;
        }
        else
        {
            $cache = [
                'frequency'=>1,
                'object'=>$observer,
            ];
        }

        $this->cache->forever($class,$cache);
    }

    public function detach(ObserverInterface $observer)
    {
        // TODO: Implement detach() method.
        $class = $this->getObserverClass($observer);

        if ($this->cache->has($class))
        {
            $this->cache->forget($class);
        }
    }

    public function notify(ObserverInterface $observer)
    {
        // TODO: Implement notify() method.
        $class = $this->getObserverClass($observer);

        if ($this->cache->has($class))
        {
            return $observer->handle($this);
        }

        return null;
    }


}