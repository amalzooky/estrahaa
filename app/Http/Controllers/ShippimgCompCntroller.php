<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\ShippingCompanies;
use App\Models\Statments;
use Illuminate\Http\Request;

class ShippimgCompCntroller extends Controller
{
    public function index()
    {
        $allshipping = ShippingCompanies::all();
        return view ('admin.pages.shippcomps.index', compact('allshipping'));
    }

    public function create()
    {
        return view('admin.pages.shippcomps.create');
    }


    public function store(Request $request)
    {
//        return $request;
        try {

            $shippcomps = ShippingCompanies::create([

                'shipp_name' => $request->shipp_name,


            ]);

//        dd($sliders);
            return redirect()->route('admin.shippcomp')->with(['success' => 'تم الحفظ بنجاح']);
        } catch (\Exception $ex) {
            return redirect()->route('admin.shippcomp')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);

        }
    }
    public function show($id)
    {
        try{
            $orders = ShippingCompanies::find($id);
            // $vendor = DB::table('vendors')->select('vendors.*', 'schools_items.school_name')
            //     ->leftJoin('schools_items', 'schools_items.school_id', '=', 'vendors.school')
            //     ->where('vendors.id', $id)->first();
            if (empty($orders)){
                return redirect()->route('admin.shippcomp')->with(['error' => 'الطلب غير موجود']);
            }

            return view('admin.pages.allbills.invoice', compact('orders'));
        } catch (\Exception $ex) {
            DB::rollback();
            return redirect()->route('admin.shippcomp')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }


    }

    public function edit($bll_id)
    {
        $allstament = ShippingCompanies::find($bll_id);

        if (!$allstament)
            return redirect()->route('admin.shippcomp')->with(['error' => 'هذا القسم غير موجود ']);

        return view('admin.pages.shippcomps.edit', compact('allstament'));
    }
    public  function update($bill_id ,Request  $request)

    {

        try {
            $allstament = ShippingCompanies::find($bill_id);
            if (!$allstament)
                return redirect()->route('admin.shippcomp')->with(['error' => 'هذا القسم غير موجود ']);
            //update data
            $allstament->update($request->all());


            return redirect()->route('admin.shippcomp')->with(['success' => 'تم ألتحديث بنجاح']);
        } catch (\Exception $ex) {

            return redirect()->route('admin.shippcomp')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }
    public function destroy($id)
    {

        try {
            $billes = ShippingCompanies::find($id);
            if (!$billes)
                return redirect()->route('admin.shippcomp')->with(['error' => 'هذا القسم غير موجود ']);





            $billes->delete();
            return redirect()->route('admin.shippcomp')->with(['success' => 'تم حذف القسم بنجاح']);

        } catch (\Exception $ex) {
            return redirect()->route('admin.shippcomp')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }

}

