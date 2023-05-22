<?php

namespace App\Http\Controllers\Users\AccountData;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function __invoke()
    {
        return view('user.accountdata.index');
    }
}
