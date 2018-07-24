<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Crypt;
class ManageUser extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function ManageUser(Request $request){

        $users = User::where('user_type','=','end_user')
            ->orderBy('created_at','desc')
            ->get();

        return view('admin.manage_user',compact('users'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function ManageUserView(Request $request ,$id){

        $users = User::where('id',Crypt::decryptString($id))->get();

        return view('admin.manage_user_view',compact('users'));
    }
}
