<?php

namespace App\Http\Controllers;

use App\Http\Requests\AllOrdrsRequest;
use App\Models\Order;
use App\Models\OrderscClient;
use App\Models\OrdersGift;
use App\Models\ShippingCompanies;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use DB;

class AllOrdersCntroller extends Controller
{
    public function index()
    {
        $allorders = Order::all();
        return view ('admin.pages.allorders.index', compact('allorders'));
    }

    public function create()
    {
        $allsrors = Store::all();
        $allshipin = ShippingCompanies::all();
        return view('admin.pages.allorders.create' ,compact('allsrors' ,'allshipin'));
    }


    public function store(Request $request)
    {
//        dd($request);
//    try {
//            return $request;
        $producr = [];
        if (!empty($request->orders[0][0])){
            if (!empty($request->orders[0][0])){
                $allproduct = $request->orders;
                foreach ($allproduct as $producr){

                            $producrs[] = ['orders' => $producr[0] ];

                }
            }
        }

        $producr2 = [];
        if (!empty($request->gift[0][0])){
            if (!empty($request->gift[0][0])){
                $allproduct2 = $request->gift;
                foreach ($allproduct2 as $producr2){

                        $allproducrs2[] = ['gift' => $producr2[0] ];

                }
            }
        }
            $allorders =Order::create([
                'sales_channel' => $request->sales_channel,
                'name_clinte' => $request->name_clinte,
                'num_phone' => $request->num_phone,
                'adress_clinte' => $request->adress_clinte,
                'status_order' => $request->status_order,
                'shipping_price' => $request->shipping_price,
                'total_value_order' => $request->total_value_order,
                'shipping_company' => $request->shipping_company,
                'num_products' => $request->num_products,
                'total_price_products' => $request->total_price_products,
                'gifts' => $request->gifts,
                'discount' => $request->discount,
                'order_won' => $request->order_won,
                'cost_order' => $request->cost_order,
                'net_shipping' => $request->net_shipping,
                'nots' => $request->nots,
                'customer_evaluation' => $request->customer_evaluation,

            ]);
        if (!empty($producrs)){
            foreach ($producrs as $producr){
                OrderscClient::create([
                    'order_id' => $producr['orders'],
                    'stor_id'=>$request->name_clinte,


                ]);
            }
        }
        if (!empty($allproducrs2)){
            foreach ($allproducrs2 as $producr){
                OrdersGift::create([
                    'stor_id'=>$request->name_clinte,
                    'order_id' => $producr['gift'],

                ]);
            }
        }
//        dd($sliders);
            return redirect()->route('admin.orders')->with(['success' => 'تم الحفظ بنجاح']);
//        } catch (\Exception $ex) {
//            return redirect()->route('admin.orders')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
//
//        }
    }

    public function show($id)
    {
        try{
            $orders = Order::find($id);
            // $vendor = DB::table('vendors')->select('vendors.*', 'schools_items.school_name')
            //     ->leftJoin('schools_items', 'schools_items.school_id', '=', 'vendors.school')
            //     ->where('vendors.id', $id)->first();
            if (empty($orders)){
                return redirect()->route('admin.orders')->with(['error' => 'الطلب غير موجود']);
            }

            return view('admin.pages.allorders.invoice', compact('orders'));
        } catch (\Exception $ex) {
            DB::rollback();
            return redirect()->route('admin.orders')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }


    }



    public function edit($ord_id)
    {
        $allorders = Order::find($ord_id);

        if (!$allorders)
            return redirect()->route('admin.orders')->with(['error' => 'هذا القسم غير موجود ']);

        return view('admin.pages.allorders.edit', compact('allorders'));
    }
    public  function update($ord_id ,AllOrdrsRequest  $request)

    {
        try {

            $allorders = Order::find($ord_id);
            if (!$allorders)
                return redirect()->route('admin.orders')->with(['error' => 'هذا القسم غير موجود ']);
            //update data
            $allorders->update($request->all());


            return redirect()->route('admin.orders')->with(['success' => 'تم ألتحديث بنجاح']);
        } catch (\Exception $ex) {

            return redirect()->route('admin.orders')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }
    public function destroy($id)
    {

        try {
            $orders = Order::find($id);
            if (!$orders)
                return redirect()->route('admin.orders')->with(['error' => 'هذا القسم غير موجود ']);




            $orders->delete();
            return redirect()->route('admin.orders')->with(['success' => 'تم حذف القسم بنجاح']);

        } catch (\Exception $ex) {
            return redirect()->route('admin.orders')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }


}
