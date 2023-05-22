<?php

namespace App\Http\Controllers\Admin\Address;

use App\Http\Controllers\Controller;
use App\Models\Address;

class IndexController extends Controller
{
    public function __invoke()
    {
        $addresses = Address::all();
        return view('admin.address.index', compact('addresses'));
    }
}
