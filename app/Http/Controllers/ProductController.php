<?php

namespace App\Http\Controllers;

use App\Customer;
use App\OderDetail;
use App\Oders;
use App\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use mysql_xdevapi\Session;
use function Psy\debug;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Products::all();
        $data =[
            'list' => $product,
        ];
        return view('admin.Product',$data);
    }
    public function viewcard(){
        return view('/client/insert');
    }
public function UpdateCart(){

        return view('/client/updateCart');

}
    public function checkout(){
        return view('/client/checkout');
    }
    public function postCheckout(Request $request ){
        try{

                DB::beginTransaction();
                session_start();
                $checkcard = $_SESSION['CheckCard'];
                $cart= $_SESSION['Card'];
//dd($cart);
//dd($cart[2]);

                $customer = new Customer();
                $customer->name = $request->name;
                $customer->address = $request->address;
                $customer->note = $request->note;
                $customer->save();
                $oder = new Oders();
                $oder->Customer_id = $customer->id;
                $oder->total_price = $checkcard['TotalPrice'];
                $oder->save();

                foreach ($cart as $key=>$value){
                    $oder_detail= new OderDetail();
                    $oder_detail->product_id = $key;
                    $oder_detail->order_id = $oder->id;
                    $oder_detail->quantity = $value['quantity'];
                    $oder_detail->unit_price =$value['price'];
                    $oder_detail->save();
                    echo "<pre>";
                }
            DB::commit();
                unset($_SESSION['Card']);
                unset($_SESSION['CheckCard']);
                return view('/client/finishCart');


        }
        catch (\Exception $exception) {
            DB::rollBack();
            return 'Có lỗi xảy ra.' . $exception->getMessage();
        }

    }
    public function show($id){
        session_start();
        $data = [
            'item' => Products::find($id),
        ];
        $newProduct = array();
        $product = Products::all()->toArray();
        $key = $id;
        $page = $id/4;
        (int)$int = (int)$page +1;
//        (double)$du = - (int)$page;
//if ($du >0.00001){
//    $intreal = $int+1;
//}
        foreach ($product as $item){
            $newProduct[$item['id']]= $item;
        }
        if (!isset($_SESSION['Card'])|| $_SESSION['Card'] == null){
            $newProduct[$key]['quantity']=1;
            $_SESSION['Card'][$key] = $newProduct[$key];
        }
        else{
            if (array_key_exists($key,$_SESSION['Card'])){
                $_SESSION['Card'][$key]['quantity'] += 1;
            }
            else{
                $_SESSION['Card'][$key] = $newProduct[$key];
                $_SESSION['Card'][$key]['quantity'] = 1;
            }
        }
        echo "<pre>";
        return redirect ('/admin/product');
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
//    public function show($id)
//    {
//        //
//    }

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
