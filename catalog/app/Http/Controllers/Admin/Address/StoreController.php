<?php

namespace App\Http\Controllers\Admin\Address;

use App\Http\Controllers\Controller;
use App\Http\Requests\Address\StoreRequest;
use App\Models\Address;

class StoreController extends Controller
{
    //
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        Address::firstOrCreate($data);
        return redirect()->route('address.index');
    }
}
