<?php

namespace App\Http\Controllers\Users\AccountData;

use App\Http\Controllers\Controller;
use App\Http\Requests\DataAccount\DataRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UpdateController extends Controller
{
    //
    public function __invoke(DataRequest $request, User $users)
    {

       $data = $request->validated();
       unset($data['confirm_password']);
       if ($data['password']==null){
           unset($data['password']);
       }
       else{
           $data["password"]=Hash::make($data["password"]);
       }
       $users->update($data);
       return redirect()->route('accountdata.index');
    }
}
