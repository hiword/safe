<?php

/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2016/9/25
 * Time: 7:17
 */
namespace Simon\Safe\Listeners;

use Illuminate\Http\Request;
use Simon\Safe\Contracts\ObserverInterface;
use Simon\Safe\Contracts\SubjectInterface;

class VerifyCode implements ObserverInterface
{
    protected $request = null;

    public function __construct()
    {
        $this->request = app('request');
    }

    public function handle(array $data,SubjectInterface $subject)
    {
        // TODO: Implement handle() method.


        var_dump($data);

        if ($this->request->method() === 'POST') {

        }
        else
        {
            if ($data['frequency'] >= 6)
            {
                return true;
            }

            return false;
        }

    }


}