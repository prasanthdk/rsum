<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ManageSubscription extends Controller
{
    public function PaymentSubscription(){

        return view('admin.payment_subscription');
    }
}
