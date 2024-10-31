<?php

namespace App\Http\Controllers;

use PayPal\Api\Payer;
use PayPal\Api\Item;
use PayPal\Api\Amount;
use PayPal\Api\ItemList;
use PayPal\Api\Transaction;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Payment;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Exception\PayPalConnectionException;
use PayPal\Validation\UrlValidator;
use Illuminate\Support\Facades\Session;
use URL;
use Redirect;
use Illuminate\Http\Request;

class PaypalController extends Controller
{

    public function __construct() {
    /** PayPal api context **/
          $paypal_conf = \Config::get('paypal');
          $this->_api_context = new ApiContext(new OAuthTokenCredential(
              $paypal_conf['client_id'],
              $paypal_conf['secret'])
          );
          $this->_api_context->setConfig($paypal_conf['settings']);
    }

    public function payWithpaypal(Request $request) {
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');


        //Create twn items apo to checkout
        $products_quantity = $request->products_quantity;
        //Create ths listas me ta items tou checkout
        $item_list = new ItemList();
        for($i=0;$i<$products_quantity;$i++) {
          $item = new Item();
          $item->setName($request->get('product_name_'.$i))
                ->setCurrency('USD')
                ->setQuantity($request->get('product_quantity_'.$i))
                ->setPrice($request->get('product_price_'.$i));
          $item_list->addItem($item);
        }
        //dd($item_list);

        //Create tou telikou amount
        $amount = new Amount();
        $amount->setCurrency('USD')
                ->setTotal($request->get('amount'));
        $total_amount_gia_order_creation = $request->get('amount');

        $transaction = new Transaction();
        $transaction->setAmount($amount)
                    ->setItemList($item_list)
                    ->setDescription('Sample description');
        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(URL::route('shop.order_store',$total_amount_gia_order_creation))
                      ->setCancelUrl(URL::route('profile.checkout'));

        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));
        //dd($payment->create($this->_api_context));exit;
        try {
          $payment->create($this->_api_context);
          } catch (\PayPal\Exception\PPConnectionException $ex) {
          if (\Config::get('app.debug')) {
          \Session::put('error', 'Connection timeout');
                          return Redirect::route('paywithpaypal');
          } else {
          \Session::put('error', 'Some error occur, sorry for inconvenient');
                          return Redirect::route('paywithpaypal');
          }
          }
          foreach ($payment->getLinks() as $link) {
          if ($link->getRel() == 'approval_url') {
          $redirect_url = $link->getHref();
                          break;
          }
          }
          /** add payment ID to session **/
                  Session::put('paypal_payment_id', $payment->getId());
          if (isset($redirect_url)) {
          /** redirect to paypal **/
                      return Redirect::away($redirect_url);
          }
          \Session::put('error', 'Unknown error occurred');
                  return Redirect::route('paywithpaypal');
    }

    public function order_placed() {
      return view('order-placed');
    }

    public function getPaymentStatus()
    {
        /** Get the payment ID before session clear **/
        $payment_id = Session::get('paypal_payment_id');
        /** clear the session payment ID **/
                Session::forget('paypal_payment_id');
                if (empty(Input::get('PayerID')) || empty(Input::get('token'))) {
        \Session::put('error', 'Payment failed');
                    return Redirect::route('/');
        }
        $payment = Payment::get($payment_id, $this->_api_context);
                $execution = new PaymentExecution();
                $execution->setPayerId(Input::get('PayerID'));
        /**Execute the payment **/
                $result = $payment->execute($execution, $this->_api_context);
        if ($result->getState() == 'approved') {
        \Session::put('success', 'Payment success');
                    return Redirect::route('/');
        }
        \Session::put('error', 'Payment failed');
                return Redirect::route('/');
        }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
