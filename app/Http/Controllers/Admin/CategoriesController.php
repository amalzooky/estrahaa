<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoriesRequest;
use App\Models\Category;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class CategoriesController extends Controller
{
    public function index()
    {
        $categors = Category::all();
        return view ('admin.pages.categores.index', compact('categors'));
    }

    public function create()
    {
        return view('admin.pages.categores.create');
    }


    public function store(CategoriesRequest $request)
    {
        try {

            $abouts =Category::create([
                'namecat_en' => $request->namecat_en,
                'namecat_ar' => $request->namecat_ar,


            ]);

//        dd($sliders);
            return redirect()->route('admin.category')->with(['success' => 'تم الحفظ بنجاح']);
        } catch (\Exception $ex) {
            return redirect()->route('admin.category')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);

        }
    }
    public function show($id)
    {
        //
    }


    public function edit($cat_id)
    {
        $catigores = Category::find($cat_id);

        if (!$catigores)
            return redirect()->route('admin.category')->with(['error' => 'هذا القسم غير موجود ']);

        return view('admin.pages.categores.edit', compact('catigores'));
    }
    public  function update($cat_id , CategoriesRequest  $request)


    {
//        return $request;
        try {
            $categorys = Category::find($cat_id);
            if (!$categorys)
                return redirect()->route('admin.category')->with(['error' => 'هذا القسم غير موجود ']);
            //update data
            $categorys->update($request->all());


            return redirect()->route('admin.category')->with(['success' => 'تم ألتحديث بنجاح']);
        } catch (\Exception $ex) {

            return redirect()->route('admin.category')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }
    public function destroy($id)
    {

        try {
            $abouts = Category::find($id);
            if (!$abouts)
                return redirect()->route('admin.category')->with(['error' => 'هذا القسم غير موجود ']);
            $images = explode(',', $abouts->photo);
            foreach ($images as $image){
                $fileExists = Storage::disk('public')->exists('/upimages/abouts/' . $image);
                if ($fileExists){
                    unlink('upimages/abouts/' . $image);
                }
            }



            $abouts->delete();
            return redirect()->route('admin.category')->with(['success' => 'تم حذف القسم بنجاح']);

        } catch (\Exception $ex) {
            return redirect()->route('admin.category')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }

}
