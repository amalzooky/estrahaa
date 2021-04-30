<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AboutInRequest;
use App\Models\AboutIn;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutInController extends Controller
{
    public function index()
    {
        $aboutins = AboutIn::all();
        return view ('admin.pages.aboutin.index', compact('aboutins'));
    }

    public function create()
    {
        return view('admin.pages.aboutin.create');
    }


    public function store(AboutInRequest $request)
    {
        try {
            $filePath = "";
            if ($request->has('photo')) {

                $filePath = uploadImage('abouts', $request->photo);
            }

            $abouts =AboutIn::create([
                'photo' => $filePath,
                'title_ar' => $request->title_ar,
                'title_en' => $request->title_en,
                'text_ar' => $request->text_ar,
                'text_en' => $request->text_en,

            ]);

//        dd($sliders);
            return redirect()->route('admin.aboutin')->with(['success' => 'تم الحفظ بنجاح']);
        } catch (\Exception $ex) {
            return redirect()->route('admin.aboutin')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);

        }
    }
    public function show($id)
    {
        //
    }


    public function edit($about_id)
    {
        $aboutins = AboutIn::find($about_id);

        if (!$aboutins)
            return redirect()->route('admin.aboutin')->with(['error' => 'هذا القسم غير موجود ']);

        return view('admin.pages.aboutin.edit', compact('aboutins'));
    }
    public  function update($about_id ,AboutInRequest  $request)

    {

        try {
            $abouts = AboutIn::find($about_id);
            if (!$abouts)
                return redirect()->route('admin.aboutin')->with(['error' => 'هذا القسم غير موجود ']);
            //update data
            $abouts->update($request->all());

            if ($request->has('photo')) {
                $filePath = uploadImage('abouts', $request->photo);
                AboutIn::where('id', $about_id)
                    ->update([
                        'photo' => $filePath,
                    ]);
            }
            return redirect()->route('admin.aboutin')->with(['success' => 'تم ألتحديث بنجاح']);
        } catch (\Exception $ex) {

            return redirect()->route('admin.aboutin')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }
    public function destroy($id)
    {

        try {
            $abouts = AboutIn::find($id);
            if (!$abouts)
                return redirect()->route('admin.aboutin')->with(['error' => 'هذا القسم غير موجود ']);
            $images = explode(',', $abouts->photo);
            foreach ($images as $image){
                $fileExists = Storage::disk('public')->exists('/upimages/abouts/' . $image);
                if ($fileExists){
                    unlink('upimages/abouts/' . $image);
                }
            }



            $abouts->delete();
            return redirect()->route('admin.aboutin')->with(['success' => 'تم حذف القسم بنجاح']);

        } catch (\Exception $ex) {
            return redirect()->route('admin.aboutin')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }

}
