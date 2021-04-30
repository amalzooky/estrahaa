<?php

namespace App\Http\Controllers;

use App\Http\Requests\AllOrdrsRequest;
use App\Models\Acounte;
use App\Models\Abalancs;
use App\Models\Statments;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;

class AllAcountsCntroller extends Controller
{

    public function index()
    {
        $allacount = Acounte::all();

        $balance = Abalancs::all()->first();


//        $expenses = DB::table('sum(expenses)')->get();

        $expenses = DB::table('acountes')->sum('expenses');
        $income = DB::table('acountes')->sum('income');
        $covenant = DB::table('acountes')->sum('covenant');

//        $expenses = DB::table('acountes')
//            ->selectRaw('sum(expenses)')
//            ->get();

//        $income = DB::table('acountes'
//        )->selectRaw('sum(income)')
//            ->get();

//        $covenant = DB::table('acountes')
//            ->selectRaw('sum(covenant)')
//            -> get();
        return view ('admin.pages.allacounts.index', compact('allacount' ,'balance','income' ,'expenses','covenant'));
    }

    public function create()
    {
        $statments = Statments::all();
        return view('admin.pages.allacounts.create' ,compact('statments'));
    }
    public function creatbalancee()
    {
        return view('admin.pages.allacounts.creatbalancee');
    }


    public function storetbalance(Request $request) {


        $treasury_balance = $request->treasury_balance;

        $allorders = Abalancs::create([

            'treasury_balance' => $treasury_balance,

//                'total_expenses' => $total_expenses,


        ]);

//        dd($sliders);
//        return redirect()->route('admin.acounts')->with(['success' => 'تم الحفظ بنجاح']);
//    } catch (\Exception $ex) {
return redirect()->route('admin.acounts')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);

}




    public function showbalancs($id)
    {

        $balance = Acounte::select('treasury_balance')->where('id', $id)->get();
        return view ('admin.pages.allacounts.index', compact('balance','income' ,'expenses','covenant'));


    }
    public function store(Request $request)
    {
        try {


            $expenses = $request->expenses;
            $income = $request->income;
            $covenant = $request->covenant;
            $statement = $request->statement_id;


//             = sum($covenant);
//            $total_expenses = sum($expenses);

            $allorders = Acounte::create([
                'expenses' => $expenses,
                'income' => $income,
                'covenant' => $covenant,
                'statement' => $statement,
                'statement_id' => $statement,

//                'total_expenses' => $total_expenses,


            ]);

//        dd($sliders);
            return redirect()->route('admin.acounts')->with(['success' => 'تم الحفظ بنجاح']);
        } catch (\Exception $ex) {
            return redirect()->route('admin.acounts')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);

        }
    }


    public function show($id)
    {
        try{

            $orders = Acounte::find($id);
            // $vendor = DB::table('vendors')->select('vendors.*', 'schools_items.school_name')
            //     ->leftJoin('schools_items', 'schools_items.school_id', '=', 'vendors.school')
            //     ->where('vendors.id', $id)->first();
            if (empty($orders)){
                return redirect()->route('acounts.orders')->with(['error' => 'الطلب غير موجود']);
            }

            return view('admin.pages.allacounts.invoice', compact('orders'));
        } catch (\Exception $ex) {
            DB::rollback();
            return redirect()->route('admin.acounts')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }


    }



    public function edit($ord_id)
    {
        $allorders = Acounte::find($ord_id);

        if (!$allorders)
            return redirect()->route('admin.acounts')->with(['error' => 'هذا القسم غير موجود ']);

        return view('admin.pages.allacounts.edit', compact('allorders'));
    }
    public  function update($ord_id ,AllOrdrsRequest  $request)

    {
        try {

            $allorders = Acounte::find($ord_id);
            if (!$allorders)
                return redirect()->route('admin.acounts')->with(['error' => 'هذا القسم غير موجود ']);
            //update data
            $allorders->update($request->all());


            return redirect()->route('admin.acounts')->with(['success' => 'تم ألتحديث بنجاح']);
        } catch (\Exception $ex) {

            return redirect()->route('admin.orders')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }
    public function destroy($id)
    {

        try {
            $orders = Acounte::find($id);
            if (!$orders)
                return redirect()->route('admin.acounts')->with(['error' => 'هذا القسم غير موجود ']);




            $orders->delete();
            return redirect()->route('admin.acounts')->with(['success' => 'تم حذف القسم بنجاح']);

        } catch (\Exception $ex) {
            return redirect()->route('admin.acounts')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }


}

