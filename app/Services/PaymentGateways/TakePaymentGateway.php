<?php

namespace App\Services\PaymentGateways;

use App\Models\Appointment;
use Exception;
use Illuminate\Http\Request;
use App\Services\PaymentGateways\TakePayments\Type;
use App\Services\PaymentGateways\TakePayments\Action;
use App\Services\PaymentGateways\TakePayments\Gateway;
use App\Services\PaymentGateways\PaymentGatewayInterface;

class TakePaymentGateway implements PaymentGatewayInterface
{

    protected $takePaymentsGateway;
    protected $accessKey;
    protected $currencyCode;
    protected $countryCode;

    public function __construct()
    {   
        $this->takePaymentsGateway = new Gateway;
        $this->accessKey =  config('takepayment.is_live') ? config('takepayment.access_key') : config('takepayment.test_access_key'); 
        $this->takePaymentsGateway::$hostedUrl = config('takepayment.hosted_url');
        $this->takePaymentsGateway::$directUrl = config('takepayment.direct_url');
        $this->takePaymentsGateway::$merchantID = config('takepayment.is_live') ? config('takepayment.merchant_id') : config('takepayment.test_merchant_id');
        $this->countryCode = config('takepayment.country_code'); 
        $this->currencyCode = config('takepayment.currency_code'); 

    }

    public function charge(array $paymentData)
    {
        $callbackUrl = route('takepayment.success');
        $cancelUrl = route('payment.cancelled');

        $total = floatval(preg_replace('/[^\d.]/', '', $paymentData['total_amount']));
        $total = number_format((float)$total, 2, '.', '');
        try{
            $tran = array (
                'merchantSecret' => $this->accessKey,
                'action' => Action::Sale->value,
                'type' => Type::Ecommerce->value,
                'countryCode' =>  $this->countryCode,
                'currencyCode' => $this->currencyCode,
                'amount' => $total,
                'customerName' => $paymentData['user_name'],
                'customerEmail' => $paymentData['user_email'],
                'customerAddress' => 'Your Address',
                'customerPostCode' => 'Post code',
                'orderRef' => $paymentData['ref'],
                'formResponsive' => 'Y',
                'transactionUnique' => uniqid(),
                'redirectURL' =>  $callbackUrl, 
                'remoteAddress' => $_SERVER['REMOTE_ADDR'],
                'merchantName' => 'NIN UK',
            
            );
            //dd($tran);
            echo '<script type="text/javascript">
                window.onload=function(){

                    document.getElementById("payButton").disabled=true; 
                    document.getElementById("payButton").value="Sending...";
                    window.setTimeout("document.myForm.submit()", 200)

                }
            </script>'.$this->takePaymentsGateway->hostedRequest($tran, [
                'formAttrs'  => 'name="myForm"','submitText' => 'Click To Pay Now', 'submitAttrs' => 'id=payButton']);
    
        } catch (Exception $e) {
            throw new Exception('TakePayments error: ' . $e->getMessage());
        }
    }


    public function paymentSuccess(Request $request)
    {
        try {
            // Example payload: adjust based on TakePayments response structure
            $transactionStatus = $request->get('status');
            $orderRef = $request->get('order_ref');
            $paymentRef = $request->get('payment_id');

            if ($transactionStatus !== 'success') {
                throw new Exception('Payment failed or was cancelled.');
            }

            $existing = Appointment::where('ref', $orderRef)->first();
            if ($existing) {
                return true; // Already processed
            }

            return true;
        } catch (Exception $e) {
            throw new Exception('TakePayments Success Error: ' . $e->getMessage());
        }
    }
}
