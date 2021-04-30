<?php

namespace App\Http\Controllers;

use App\Models\Abalancs;
use App\Models\Store;
use App\Models\Acounte;
use Illuminate\Http\Request;
use DB;

class AllReportsCntroller extends Controller
{
    public function index()
    {

//        $expenses = DB::table('sum(expenses)')->get();

        $counts = DB::table('stores')->sum('count_proud');
        $buy_price = DB::table('stores')->sum('buy_price');
        $total_price = DB::table('stores')->sum('total_price');
        $expenses = DB::table('acountes')->sum('expenses');
        $income = DB::table('acountes')->sum('income');
        $covenant = DB::table('acountes')->sum('covenant');
        $balance = DB::table('balance')->sum('treasury_balance');
        $balances = Abalancs::all()->first();

        $profitLoss = $expenses + $income +$total_price - $income ;
        $current_balance = $profitLoss+$balance;






//        $expenses = DB::table('acountes')
//            ->selectRaw('sum(expenses)')
//            ->get();

//        $income = DB::table('acountes'
//        )->selectRaw('sum(income)')
//            ->get();

//        $covenant = DB::table('acountes')
//            ->selectRaw('sum(covenant)')
//            -> get();
        return view ('admin.pages.repotss.index', compact('profitLoss', 'balance', 'current_balance', 'counts', 'covenant', 'expenses',  'buy_price','total_price' ));
    }

}
