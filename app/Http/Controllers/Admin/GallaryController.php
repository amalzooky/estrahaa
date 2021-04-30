<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AboutRequest;
use App\Http\Requests\GallarysRequest;
use App\Models\Category;
use App\Models\Gallary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GallaryController extends Controller
{
    public function index()
    {
        $gallars = Gallary::all();
        return view ('admin.pages.gallries.index', compact('gallars'));
    }

    public function create()
    {
        $categs = Category::all();
        return view('admin.pages.gallries.create' ,compact('categs'));
    }


    public function store(GallarysRequest $request)
    {
//        return $request;
        try {
            $filePath = "";
            if ($request->has('photo')) {

                $filePath = uploadImage('abouts', $request->photo);
            }

            $abouts =Gallary::create([
                'photo' => $filePath,
                'title_ar' => $request->title_ar,
                'title_en' => $request->title_en,
                'catphoto_id' => $request->catphoto_id,


            ]);

//        dd($sliders);
            return redirect()->route('admin.gallary')->with(['success' => 'تم الحفظ بنجاح']);
        } catch (\Exception $ex) {
            return redirect()->route('admin.gallary')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);

        }
    }
    public function show($id)
    {
        //
    }


    public function edit($gall_id)
    {
        $gallaris = Gallary::find($gall_id);
        $categs = Category::all();


        if (!$gallaris)
            return redirect()->route('admin.gallary')->with(['error' => 'هذا القسم غير موجود ']);

        return view('admin.pages.gallries.edit', compact('gallaris' ,'categs'));
    }
    public  function update($gall_id ,GallarysRequest  $request)

    {

//        try {
            $gallries = Gallary::find($gall_id);
            if (!$gallries)
                return redirect()->route('admin.gallary')->with(['error' => 'هذا القسم غير موجود ']);
            //update data
            $gallries->update($request->all());

            if ($request->has('photo')) {
                $filePath = uploadImage('abouts', $request->photo);
                Gallary::where('id', $gall_id)
                    ->update([
                        'photo' => $filePath,
                    ]);
            }
            return redirect()->route('admin.gallary')->with(['success' => 'تم ألتحديث بنجاح']);
//        } catch (\Exception $ex) {
//
//            return redirect()->route('admin.gallary')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
//        }
    }
    public function destroy($id)
    {

        try {
            $gallries = Gallary::find($id);
            if (!$gallries)
                return redirect()->route('admin.gallary')->with(['error' => 'هذا القسم غير موجود ']);
            $images = explode(',', $gallries->photo);
            foreach ($images as $image){
                $fileExists = Storage::disk('public')->exists('/upimages/abouts/' . $image);
                if ($fileExists){
                    unlink('upimages/abouts/' . $image);
                }
            }



            $gallries->delete();
            return redirect()->route('admin.gallary')->with(['success' => 'تم حذف القسم بنجاح']);

        } catch (\Exception $ex) {
            return redirect()->route('admin.gallary')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }

}
