<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2016/9/25
 * Time: 7:49
 */

namespace Simon\Safe\Contracts;


interface SafeSubjectInterface
{

    public function attach(string $className);

    public function detach(string $className);

    public function notify(ObserverInterface $observer);

}