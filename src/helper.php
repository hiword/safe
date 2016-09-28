<?php
if (!function_exists('safe'))
{
    function safe()
    {
        return app('safe');
    }
}

if (!function_exists('safe_attach'))
{

    function attach(string $className)
    {
        return app('safe')->attach($className);
    }
}

if (!function_exists('safe_detach'))
{

    function attach(string $className)
    {
        return app('safe')->detach($className);
    }
}

if (!function_exists('safe_notify'))
{

    function attach(\Simon\Safe\Contracts\ObserverInterface $observer)
    {
        return app('safe')->notify($observer);
    }
}