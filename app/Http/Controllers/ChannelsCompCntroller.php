<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use App\Models\ShippingCompanies;
use App\Models\Store;
use Illuminate\Http\Request;

class ChannelsCompCntroller extends Controller
{

    public function index()
    {
        $allchannal = Channel::all();
        return view ('admin.pages.channals.index', compact('allchannal'));
    }

    public function create()
    {
        return view('admin.pages.channals.create');
    }


    public function store(Request $request)
    {
//        dd($request);
        try {

            $shippcomps = Channel::create([

                'chann_name' => $request->chann_name,
                'active' => $request->active,



            ]);

//        dd($sliders);
            return redirect()->route('admin.channels')->with(['success' => 'تم الحفظ بنجاح']);
        } catch (\Exception $ex) {
            return redirect()->route('admin.channels')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);

        }
    }
    public function show($id)
    {
        try{
            $orders = Channel::find($id);
            // $vendor = DB::table('vendors')->select('vendors.*', 'schools_items.school_name')
            //     ->leftJoin('schools_items', 'schools_items.school_id', '=', 'vendors.school')
            //     ->where('vendors.id', $id)->first();
            if (empty($orders)){
                return redirect()->route('admin.channels')->with(['error' => 'الطلب غير موجود']);
            }

            return view('admin.pages.channals.invoice', compact('orders'));
        } catch (\Exception $ex) {
            DB::rollback();
            return redirect()->route('admin.channels')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }


    }

    public function edit($bll_id)
    {
        $allstament = Channel::find($bll_id);

        if (!$allstament)
            return redirect()->route('admin.channels')->with(['error' => 'هذا القسم غير موجود ']);

        return view('admin.pages.channals.edit', compact('allstament'));
    }
    public  function update($bill_id ,Request  $request)

    {
//        dd($request);
        try {

            if (!$request->active)
                $request->request->add(['active' => 0]);
            else
                $request->request->add(['active' => 1]);






            $allstament = Channel::find($bill_id);
            if (!$allstament)
                return redirect()->route('admin.channels')->with(['error' => 'هذا القسم غير موجود ']);
            //update data
            Channel::where('id', $bill_id)
                ->update([
                    'chann_name' => $request->chann_name,

                    'active' => $request->active,
                ]);
            $allstament->update($request->all());


            return redirect()->route('admin.channels')->with(['success' => 'تم ألتحديث بنجاح']);
        } catch (\Exception $ex) {

            return redirect()->route('admin.channels')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }
    public function destroy($id)
    {

        try {
            $billes = Channel::find($id);
            if (!$billes)
                return redirect()->route('admin.channels')->with(['error' => 'هذا القسم غير موجود ']);





            $billes->delete();
            return redirect()->route('admin.channels')->with(['success' => 'تم حذف القسم بنجاح']);

        } catch (\Exception $ex) {
            return redirect()->route('admin.channels')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }



    public function changeStatus($id)
    {
        try {
            $allstors = Channel::find($id);
            if (!$allstors)
                return redirect()->route('admin.channels')->with(['error' => 'هذا القسم غير موجود ']);

            $status =  $allstors -> active  == 0 ? 1 : 0;

            $allstors -> update(['active' =>$status ]);

            return redirect()->route('admin.channels')->with(['success' => ' تم تغيير الحالة بنجاح ']);

        } catch (\Exception $ex) {
            return redirect()->route('admin.channels')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }


}

