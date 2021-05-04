<?php

namespace App\Http\Controllers;

use App\Http\Requests\AllOrdrsRequest;
use App\Models\Acounte;
use App\Models\Store;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;

class AllStorsCntroller extends Controller
{  public function index()
{
    $allstors = Store::all();

//        $expenses = DB::table('sum(expenses)')->get();
    $countsactive = Store::Active()->get();
    $counactiv = $countsactive->sum('count_proud');
    $pricactiv = $countsactive->sum('buy_price');
    $totalpriactiv = $countsactive->sum('total_price');

    $counts = Store::all()->sum('count_proud');

//    $countsactive = DB::table('stores')->selectRaw('sum(count_proud)')->where('', 1);
    $countsactive = DB::table('stores')->selectRaw('sum(amount)');

//        ->whereColumn('account_id', 'accounts.id')sum('')->where('active', '=' , 1 );




    $buy_price = DB::table('stores')->sum('buy_price');
    $total_price = DB::table('stores')->sum('total_price');


//        $expenses = DB::table('acountes')
//            ->selectRaw('sum(expenses)')
//            ->get();

//        $income = DB::table('acountes'
//        )->selectRaw('sum(income)')
//            ->get();

//        $covenant = DB::table('acountes')
//            ->selectRaw('sum(covenant)')
//            -> get();
    return view ('admin.pages.allstors.index', compact('allstors', 'totalpriactiv', 'pricactiv', 'counactiv', 'counts',  'buy_price','total_price' ));
}

    public function create()
    {
        return view('admin.pages.allstors.create');
    }


    public function store(Request $request)
    {
//        return $request;
        try {


            $product_name = $request->product_name;
            $count = $request->count_proud;
            $buy_price = $request->buy_price;
            $total_price = $request->total_price;
            $selling_price = $request->selling_price;
            $total_amount = $request->total_amount;
            $amout = $request->amout;
            $tax_amount = $request->tax_amount;
            $description = $request->description;
            $active = $request->active;


//            $total_covenant = sum($covenant);
//            $total_expenses = sum($expenses);

            $allorders = Store::create([
                'product_name' => $product_name,
                'count_proud' => $count,
                'description' => $description,
                'buy_price' => $buy_price,
                'selling_price' => $selling_price,
                'total_price' => $total_price,
                'tax_amount' => $tax_amount,
                'amout' => $amout,
                'total_amount' => $total_amount,
                'active' => $active,


//                'total_expenses' => $total_expenses,


            ]);

//        dd($sliders);
            return redirect()->route('admin.stors')->with(['success' => 'تم الحفظ بنجاح']);
        } catch (\Exception $ex) {
            return redirect()->route('admin.stors')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);

        }
    }


    public function show($id)
    {
        try{
            $orders = Store::find($id);
            // $vendor = DB::table('vendors')->select('vendors.*', 'schools_items.school_name')
            //     ->leftJoin('schools_items', 'schools_items.school_id', '=', 'vendors.school')
            //     ->where('vendors.id', $id)->first();
            if (empty($orders)){
                return redirect()->route('acounts.stors')->with(['error' => 'الطلب غير موجود']);
            }

            return view('admin.pages.allacounts.invoice', compact('orders'));
        } catch (\Exception $ex) {
            DB::rollback();
            return redirect()->route('admin.stors')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }


    }



    public function edit($ord_id)
    {
        $allstors = Store::find($ord_id);

        if (!$allstors)
            return redirect()->route('admin.stors')->with(['error' => 'هذا القسم غير موجود ']);

        return view('admin.pages.allstors.edit', compact('allstors'));
    }
    public  function update($sort_id ,Request  $request)

    {
//        try {

            $allsors = Store::find($sort_id);
            if (!$allsors)
                return redirect()->route('admin.stors')->with(['error' => 'هذا القسم غير موجود ']);
            //update data
            $allsors->update($request->all());


            return redirect()->route('admin.stors')->with(['success' => 'تم ألتحديث بنجاح']);
//        } catch (\Exception $ex) {
//
//            return redirect()->route('admin.stors')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
//        }
    }
    public function destroy($id)
    {

        try {
            $orders = Store::find($id);
            if (!$orders)
                return redirect()->route('admin.stors')->with(['error' => 'هذا القسم غير موجود ']);




            $orders->delete();
            return redirect()->route('admin.stors')->with(['success' => 'تم حذف القسم بنجاح']);

        } catch (\Exception $ex) {
            return redirect()->route('admin.stors')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }

    public function changeStatus($id)
    {
        try {
            $allstors = Store::find($id);
            if (!$allstors)
                return redirect()->route('admin.stors')->with(['error' => 'هذا القسم غير موجود ']);

            $status =  $allstors -> active  == 0 ? 1 : 0;

            $allstors -> update(['active' =>$status ]);

            return redirect()->route('admin.stors')->with(['success' => ' تم تغيير الحالة بنجاح ']);

        } catch (\Exception $ex) {
            return redirect()->route('admin.stors')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }


}

