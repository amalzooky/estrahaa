<?php

namespace App\Http\Controllers;

use App\Http\Requests\billsRequest;
use App\Models\Bill;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BillsCntroller extends Controller
{
    public function index()
    {
        $bills = Bill::all();
        return view ('admin.pages.allbills.index', compact('bills'));
    }

    public function create()
    {
        return view('admin.pages.allbills.create');
    }


    public function store(billsRequest $request)
    {
//        return $request;
        try {


            $billes = Bill::create([

                'send_name' => $request->send_name,
                'receiv_name' => $request->receiv_name,
                'no_order' => $request->no_order,
                'send_addres' => $request->send_addres,
                'receive_addres' => $request->receive_addres,
                'payment_method' => $request->payment_method,
                'paymen_total' => $request->paymen_total,
                'date_arrive' => $request->date_arrive,
                'send_phone' => $request->send_phone,
                'receiv_phone' => $request->receiv_phone,

            ]);

//        dd($sliders);
            return redirect()->route('admin.bills')->with(['success' => 'تم الحفظ بنجاح']);
        } catch (\Exception $ex) {
            return redirect()->route('admin.bills')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);

        }
    }
    public function show($id)
    {
        try{
            $bilss = Bill::first();
            // $vendor = DB::table('vendors')->select('vendors.*', 'schools_items.school_name')
            //     ->leftJoin('schools_items', 'schools_items.school_id', '=', 'vendors.school')
            //     ->where('vendors.id', $id)->first();
            if (empty($orders)){
                return redirect()->route('admin.bills')->with(['error' => 'الطلب غير موجود']);
            }

            return view('admin.pages.allbills.invoice', compact('orders'));
        } catch (\Exception $ex) {
            DB::rollback();
            return redirect()->route('admin.bills')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }


    }

    public function edit($bll_id)
    {
        $allbill = Bill::find($bll_id);

        if (!$allbill)
            return redirect()->route('admin.bills')->with(['error' => 'هذا القسم غير موجود ']);

        return view('admin.pages.allbills.edit', compact('allbill'));
    }
    public  function update($bill_id ,BillsRequest  $request)

    {

        try {
            $bills = Bill::find($bill_id);
            if (!$bills)
                return redirect()->route('admin.bills')->with(['error' => 'هذا القسم غير موجود ']);
            //update data
            $bills->update($request->all());


            return redirect()->route('admin.bills')->with(['success' => 'تم ألتحديث بنجاح']);
        } catch (\Exception $ex) {

            return redirect()->route('admin.bills')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }
    public function destroy($id)
    {

        try {
            $billes = Bill::find($id);
            if (!$billes)
                return redirect()->route('admin.bills')->with(['error' => 'هذا القسم غير موجود ']);





            $billes->delete();
            return redirect()->route('admin.bills')->with(['success' => 'تم حذف القسم بنجاح']);

        } catch (\Exception $ex) {
            return redirect()->route('admin.bills')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }

}
