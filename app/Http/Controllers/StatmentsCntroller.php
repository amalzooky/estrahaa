<?php

namespace App\Http\Controllers;

use App\Http\Requests\BillsRequest;
use App\Models\Bill;
use App\Models\Statments;
use Illuminate\Http\Request;

class StatmentsCntroller extends Controller
{

    public function index()
    {
        $allstatment = Statments::all();
        return view ('admin.pages.statments.index', compact('allstatment'));
    }

    public function create()
    {
        return view('admin.pages.statments.create');
    }


    public function store(Request $request)
    {
//        return $request;
        try {


            $billes = Statments::create([

                'stament_name' => $request->stament_name,


            ]);

//        dd($sliders);
            return redirect()->route('admin.statment')->with(['success' => 'تم الحفظ بنجاح']);
        } catch (\Exception $ex) {
            return redirect()->route('admin.statment')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);

        }
    }
    public function show($id)
    {
        try{
            $orders = Statments::find($id);
            // $vendor = DB::table('vendors')->select('vendors.*', 'schools_items.school_name')
            //     ->leftJoin('schools_items', 'schools_items.school_id', '=', 'vendors.school')
            //     ->where('vendors.id', $id)->first();
            if (empty($orders)){
                return redirect()->route('admin.statment')->with(['error' => 'الطلب غير موجود']);
            }

            return view('admin.pages.allbills.invoice', compact('orders'));
        } catch (\Exception $ex) {
            DB::rollback();
            return redirect()->route('admin.statment')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }


    }

    public function edit($bll_id)
    {
        $allstament = Statments::find($bll_id);

        if (!$allstament)
            return redirect()->route('admin.statment')->with(['error' => 'هذا القسم غير موجود ']);

        return view('admin.pages.statments.edit', compact('allstament'));
    }
    public  function update($bill_id ,Request  $request)

    {

        try {
            $allstament = Statments::find($bill_id);
            if (!$allstament)
                return redirect()->route('admin.statment')->with(['error' => 'هذا القسم غير موجود ']);
            //update data
            $allstament->update($request->all());


            return redirect()->route('admin.statment')->with(['success' => 'تم ألتحديث بنجاح']);
        } catch (\Exception $ex) {

            return redirect()->route('admin.statment')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }
    public function destroy($id)
    {

        try {
            $billes = Statments::find($id);
            if (!$billes)
                return redirect()->route('admin.statment')->with(['error' => 'هذا القسم غير موجود ']);





            $billes->delete();
            return redirect()->route('admin.statment')->with(['success' => 'تم حذف القسم بنجاح']);

        } catch (\Exception $ex) {
            return redirect()->route('admin.statment')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }

}

