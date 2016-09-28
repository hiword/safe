<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2016/9/25
 * Time: 7:15
 */

namespace Simon\Safe;


use Illuminate\Http\Request;
use Illuminate\Queue\SerializesModels;
use Simon\Safe\Contracts\ObserverInterface;
use Simon\Safe\Contracts\SubjectInterface;
use SplObserver;
use Illuminate\Contracts\Cache\Repository as Cache;

class Container implements SubjectInterface
{

    protected $cache = null;

    protected $request = null;

    protected $ip = '';

    public function __construct(Cache $cache,Request $request)
    {
        $this->cache = $cache;
        $this->request = $request;
        $this->ip = $request->ip();
    }

    /**
     * @param string $className
     * @return string
     */
    protected function getCacheName(string $className)
    {
        return $className.'_'.$this->ip;
    }

    /**
     * @param string $className
     */
    public function attach(string $className)
    {
        // TODO: Implement attach() method.
        $cacheName = $this->getCacheName($className);

        if ($this->cache->has($cacheName))
        {
            $cache = $this->cache->get($cacheName);
            $cache['frequency'] = $cache['frequency']+1;
        }
        else
        {
            $cache = [
                'frequency'=>1,
                'ip'=>$this->ip,
            ];
        }

        $this->cache->forever($cacheName,$cache);
    }

    /**
     * @param string $className
     */
    public function detach(string $className)
    {
        // TODO: Implement detach() method.
        $cacheName = $this->getCacheName($className);

        if ($this->cache->has($cacheName))
        {
            $this->cache->forget($cacheName);
        }
    }

    /**
     * @param ObserverInterface $observer
     * @return null
     */
    public function notify(ObserverInterface $observer)
    {
        // TODO: Implement notify() method.
        $cacheName = $this->getCacheName(get_class($observer));

        if ($this->cache->has($cacheName))
        {
            return $observer->handle($this->cache->get($cacheName),$this);
        }

        return null;
    }

}