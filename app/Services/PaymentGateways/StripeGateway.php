<?php
namespace App\Services\PaymentGateways;


use Exception;
use Stripe\Stripe;
use App\Models\Order;
use Illuminate\Http\Request;
use Stripe\Checkout\Session;
use App\Services\PaymentGateways\PaymentGatewayInterface;

class StripeGateway implements PaymentGatewayInterface
{


    public function __construct()
    {
         Stripe::setApiKey(config('stripe.secret'));
        
    }

    public function charge($paymentData)
    { 
        try 
        {   
           // $stripeCustomer = $user->createOrGetStripeCustomer();
           
             $session = Session::create([
                    'payment_method_types' => ['card'],
                    'line_items'           => $this->addLineItems($paymentData), // Pass the dynamically created array
                    'customer_email'       => $paymentData['user_email'],
                    'metadata'             => [
                                                'customer_email'       => $paymentData['user_email'],
                                                'customer_phone' => $paymentData['user_phone'], // Assuming you have this on your user model
                                                'customer_name' => $paymentData['user_name'],
                                            ],
                    'mode'                 => 'payment',
                    'success_url'          => route('stripe.success') . '?session_id={CHECKOUT_SESSION_ID}',
                    'cancel_url'           => route('payment.cancelled'),
                ]);
            //only products that are not subscription products
            //$session = $user->checkout($returnUrls);
            
            return redirect()->away($session->url)->send(); //redirect($session->url);

        }  catch (\Stripe\Exception\CardException $e) {
            // Since it's a decline, \Stripe\Exception\CardException will be caught
            throw new Exception('Card was declined: ' . $e->getDeclineCode());
        } catch (\Stripe\Exception\ApiErrorException $e) {
            // Display a generic error to the user for other Stripe API errors.
            throw new Exception('Something went wrong with the payment gateway: ' . $e->getMessage());
        } catch (Exception $e) {
            // Something else happened, completely unrelated to Stripe
            throw new Exception('An unexpected error occurred: ' . $e->getMessage());
        }
    }

    protected function addLineItems($paymentData)
    {
        $lineItems = [];
        $lineItems[] = [
            'price_data' => [
                'currency'     => strtolower(config('stripe.currency')),
                'product_data' => [
                    'name' => $paymentData['name'],
                    'description' => $paymentData['description'],

                ],
                // Price must be in the smallest currency unit (e.g., cents)
                // We multiply the price by 100 and cast to integer
                'unit_amount'  => (int)($paymentData['amount']  * 100),
            ],
            'quantity'   => $paymentData['quantity'],
        ];


        return $lineItems;
    }

    public function paymentSuccess(Request $request)
    {
        //Stripe::setApiKey(config('services.stripe.secret'));
        $sessionId = $request->get('session_id');

        try{ 
             $session = Session::retrieve($sessionId);
            //dd($session->metadata);
            //  Verify the session and payment status
            if ($session->status !== 'complete' || $session->payment_status !== 'paid') {
                // The payment was not successful, redirect to cancel page
                throw new Exception('An unexpected error occurred: Payment was not successful.');
            }
            $metadata = $session->metadata;
            //$customerNo = $metadata->customer_email;

            return true;

        }catch (Exception $e) {
            // Something else happened, completely unrelated to Stripe
            throw new Exception('An unexpected error occurred: ' . $e->getMessage());
        }

    }
}