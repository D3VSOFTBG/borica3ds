<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use VenelinIliev\Borica3ds\Enums\TransactionType;
use VenelinIliev\Borica3ds\SaleRequest;
use VenelinIliev\Borica3ds\StatusCheckRequest;
use Illuminate\Support\Facades\Session;
// use VenelinIliev\Borica3ds\SaleResponse;

class BoricaController extends Controller
{
    public function saleRequest($id)
    {
        $p = Payment::findOrFail($id);
        $sale = (new SaleRequest())
            ->setMerchantName('Example')
            ->setAmount($p->amount)
            ->setOrder($id)
            ->setCurrency('BGN')
            ->setDescription('Example: '.$p->note)
            ->setBackRefUrl('https://borica3d.example.com/ok')
            ->setTerminalID("V5200097")
            ->setMerchantId(5610002406)
            ->setPrivateKey('test.key')
            ->setPrivateKeyPassword('test')
            ->setSigningSchemaMacExtended() // use MAC_EXTENDED
            ->setEnvironment(false) // set to development
            ->inDevelopment(); // set to development
            // $formHtml = $sale->generateForm();
            // Log::info($formHtml);
            $sale->send(); // generate and send form with js
    }
    public function statusCheckRequest()
    {
        // dd($_POST);
        // $isSuccessfulPayment = (new SaleResponse())
        // ->setPublicKey('/home/wintrav/borica3d.wintravelbg.com/test_keys/wintravel-test.crt')
        // ->setResponseData($_POST); //Set POST data from borica response
        // return $isSuccessfulPayment;

        $statusCheckRequest = (new StatusCheckRequest())
        //->inDevelopment()
        ->setPublicKey('test.crt')
        ->setTerminalID("V5200097")
        ->setMerchantId(5610002406)
        ->setOrder($_POST['ORDER'])
        ->setPrivateKey('test.key')
        ->setPrivateKeyPassword('test')
        ->setSigningSchemaMacExtended() // use MAC_EXTENDED
        ->setEnvironment(false) // set to development
        ->inDevelopment() // set to development
        ->setOriginalTransactionType(TransactionType::SALE()); // transaction type


        //send to borica
        $statusCheckResponse = $statusCheckRequest->send();

        // get data from borica response
        $verifiedResponseData = $statusCheckResponse->getResponseData(false);

        // get field from borica response
        // if($verifiedResponseData['RC'] == 00){
        if($verifiedResponseData['RC'] == 00){
            $p = Payment::findOrFail($_POST['ORDER']);
            $p->paymentStatusId = 3; // paid
            $p->save();
            return '<script>window.history.replaceState&&window.history.replaceState(null,null,window.location.href);alert("Paid");location.replace("http://www.example.com/");</script>';
        }else{
            return '<script>window.history.replaceState&&window.history.replaceState(null,null,window.location.href);alert("RC: '.$verifiedResponseData['RC'].'");location.replace("http://www.example.com/");</script>';
        }
    }
}
