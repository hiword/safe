<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2016/9/25
 * Time: 7:54
 */

namespace Simon\Safe\Contracts;


interface ObserverInterface
{

    public function handle(SubjectInterface $subject);

}