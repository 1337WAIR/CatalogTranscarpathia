<?php

namespace App\Http\Controllers\Admin\Address;

use App\Http\Controllers\Controller;
use App\Models\Address;

class DeleteController extends Controller
{
    //
    public function __invoke(Address $address)
    {
        $address->delete();
        return redirect()->route('address.index');
    }
}
