<?php
if (!function_exists('safe'))
{
//    function safe(\Simon\Safe\Contracts\ObserverInterface $observer = null)
//    {
//        $container = app(\Simon\Safe\Contracts\SubjectInterface::class);
//
//        $container->attach

    function safe()
    {
        return app(\Simon\Safe\Contracts\SubjectInterface::class);
    }

}