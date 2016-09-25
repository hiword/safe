<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2016/9/25
 * Time: 7:49
 */

namespace Simon\Safe\Contracts;


interface SubjectInterface
{

    public function attach(ObserverInterface $observer);

    public function detach(ObserverInterface $observer);

    public function notify(ObserverInterface $observer);

}