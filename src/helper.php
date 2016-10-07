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

    function safe_attach(string $className)
    {
        return app('safe')->attach($className);
    }
}

if (!function_exists('safe_detach'))
{

    function safe_detach(string $className)
    {
        return app('safe')->detach($className);
    }
}

if (!function_exists('safe_notify'))
{

    function safe_notify(\Simon\Safe\Contracts\ObserverInterface $observer)
    {
        return app('safe')->notify($observer);
    }
}