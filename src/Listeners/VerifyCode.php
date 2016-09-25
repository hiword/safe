<?php

/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2016/9/25
 * Time: 7:17
 */
namespace Simon\Safe\Listeners;

class VerifyCode implements SplObserver
{
    protected $request = null;

    public function __construct(\Illuminate\Http\Request $request)
    {
        $this->request = $request;
    }

    public function update(SplSubject $subject)
    {
        // TODO: Implement update() method.
    }


}