<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sliders;
use App\Http\Requests\SliderRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Str;

use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Sliders::all();
        return view ('admin.pages.sliders.index', compact('sliders'));
    }

    public function create()
    {
        return view('admin.pages.sliders.create');
    }


    public function store(SliderRequest $request)
    {
           try {
        $filePath = "";
        if ($request->has('photo')) {

            $filePath = uploadImage('sliders', $request->photo);
        }

        $sliders =Sliders::create([
            'photo' => $filePath,
            'title_ar' => $request->title_ar,
            'title_en' => $request->title_en,
            'text_ar' => $request->text_ar,
            'text_en' => $request->text_en,

        ]);

//        dd($sliders);
        return redirect()->route('admin.sliders')->with(['success' => 'تم الحفظ بنجاح']);
         } catch (\Exception $ex) {
         return redirect()->route('admin.sliders')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);

         }
    }
    public function show($id)
    {
        //
    }


    public function edit($slid_id)
    {
        $slider = Sliders::find($slid_id);

        if (!$slider)
            return redirect()->route('admin.sliders')->with(['error' => 'هذا القسم غير موجود ']);

        return view('admin.pages.sliders.edit', compact('slider'));
    }
    public  function update($slid_id ,SliderRequest  $request)

    {

       try {
            $sliders = Sliders::find($slid_id);
            if (!$sliders)
                return redirect()->route('admin.sliders')->with(['error' => 'هذا القسم غير موجود ']);
            //update data
            $sliders->update($request->all());

            if ($request->has('photo')) {
                $filePath = uploadImage('sliders', $request->photo);
                Sliders::where('id', $slid_id)
                    ->update([
                        'photo' => $filePath,
                    ]);
            }
            return redirect()->route('admin.sliders')->with(['success' => 'تم ألتحديث بنجاح']);
       } catch (\Exception $ex) {

           return redirect()->route('admin.sliders')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }
    public function destroy($id)
    {

        try {
            $sliders = Sliders::find($id);
            if (!$sliders)
                return redirect()->route('admin.sliders')->with(['error' => 'هذا القسم غير موجود ']);
            $images = explode(',', $sliders->photo);
            foreach ($images as $image){
                $fileExists = Storage::disk('public')->exists('/upimages/sliders/' . $image);
                if ($fileExists){
                    unlink('upimages/sliders/' . $image);
                }
            }



            $sliders->delete();
            return redirect()->route('admin.sliders')->with(['success' => 'تم حذف القسم بنجاح']);

        } catch (\Exception $ex) {
            return redirect()->route('admin.sliders')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }

}
