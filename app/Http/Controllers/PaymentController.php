<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class PaymentController extends Controller
{
    public function index(){
        return "<script>window.history.replaceState&&window.history.replaceState(null,null,window.location.href)
        </script>Developed by StudioWeb";
    }
    public function payment($id){
        $payments = Payment::findOrFail($id);
        return view('payment', ['payments' => $payments]);
    }
}
