<?php

/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2016/9/25
 * Time: 7:17
 */
namespace Simon\Safe\Listeners;

use Simon\Safe\Contracts\ObserverInterface;
use Simon\Safe\Contracts\SubjectInterface;

class VerifyCode implements ObserverInterface
{
    protected $request = null;

    public function __construct(\Illuminate\Http\Request $request)
    {
        $this->request = $request;
    }

    public function handle(SubjectInterface $subject)
    {
        // TODO: Implement handle() method.

        if ($this->request->method() === 'POST')
        {
            return 'POST';
        }
        else
        {
            return 'GET';
        }

    }


}