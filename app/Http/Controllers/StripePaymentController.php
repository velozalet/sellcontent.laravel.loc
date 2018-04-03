<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

use function env;

class StripePaymentController extends Controller
{
    protected $request;
    protected $_stripe_test_secret_key;

    /** Create a new controller instance.
     * @param Request $request
    */
    public function __construct( Request $request ) {
        $this->request = $request;
        $this->_stripe_test_secret_key = env('STRIPE_TEST_SECRET_KEY');
    }

    /** Show the application dashboard.
     * @return \Illuminate\Http\Response
    */
    public function create_payment(){ //dd( $this->request->all() );

        //VALIDATION (if need)

        /* Set your secret key: remember to change this to your live secret key in production. See your keys here: https://dashboard.stripe.com/account/apikeys */
        \Stripe\Stripe::setApiKey( $this->_stripe_test_secret_key ); //$_stripe_test_secret_key - Secret key of Stripe

        /* Token is created using Checkout or Elements! Get the payment token ID submitted by the form: */
        $token = $this->request->stripeToken;
        $id_customer = $this->request->id_customer;
        $name_customer = $this->request->name_customer;
        $price_article = $this->request->price_article;
        $id_article = $this->request->id_article;
        $email_customer = $this->request->email_customer;
        $currency_name = $this->request->select_currency;

        /* Create a Customer:
            $customer = \Stripe\Customer::create([
                'source' => 'tok_mastercard',
                'email' => 'paying.user@example.com',
            ]);
        */
        try {
            /* Charge the user's card: */
            $charge = \Stripe\Charge::create(array(
                "amount" => $price_article, //( $price_article * 100 )
                "currency" => $currency_name,
                "description" => "buying a book",
                'receipt_email' => $email_customer,
                "metadata" => array("id_payment_content"=>$id_article, "id_customer"=>$id_customer, "name_customer"=>$name_customer, "email_customer"=>$email_customer, "price_article"=>$price_article),
                "source" => $token,
                //'customer' => $customer->id,
            ));

            //SAVE THIS INFO to DB (if need)

            //SUCCESSFUL
            $this->request->session()->flash('status', 'Your payment was successful! Thank you for your purchase');
            /* => Рендерим View */
            return redirect()->route('article_show_single', ['id' => $id_article]);
        }
        catch( \Stripe\Error\Card $e ) { //Payment was not accepted
            //ERROR
            return back()->with( 'Error', $e->getMessage() );
        }
    }

}  //__/class StripePaymentController
