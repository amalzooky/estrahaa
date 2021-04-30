<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsRequest;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public function index()
    {
        $allnews = News::all();
        return view ('admin.pages.news.index', compact('allnews'));
    }

    public function create()
    {
        return view('admin.pages.news.create');
    }


    public function store(NewsRequest $request)
    {
        try {
            $filePath = "";
            if ($request->has('photo')) {

                $filePath = uploadImage('sliders', $request->photo);
            }

            $sliders =News::create([
                'photo' => $filePath,
                'title_ar' => $request->title_ar,
                'title_en' => $request->title_en,
                'text_ar' => $request->text_ar,
                'text_en' => $request->text_en,

            ]);

//        dd($sliders);
            return redirect()->route('admin.newes')->with(['success' => 'تم الحفظ بنجاح']);
        } catch (\Exception $ex) {
            return redirect()->route('admin.newes')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);

        }
    }
    public function show($id)
    {
        //
    }


    public function edit($ne_id)
    {
        $news = News::find($ne_id);

        if (!$news)
            return redirect()->route('admin.news')->with(['error' => 'هذا القسم غير موجود ']);

        return view('admin.pages.news.edit', compact('news'));
    }
    public  function update($ne_id ,NewsRequest  $request)

    {

        try {
            $sliders = News::find($ne_id);
            if (!$sliders)
                return redirect()->route('admin.newes')->with(['error' => 'هذا القسم غير موجود ']);
            //update data
            $sliders->update($request->all());

            if ($request->has('photo')) {
                $filePath = uploadImage('news', $request->photo);
                News::where('id', $ne_id)
                    ->update([
                        'photo' => $filePath,
                    ]);
            }
            return redirect()->route('admin.newes')->with(['success' => 'تم ألتحديث بنجاح']);
        } catch (\Exception $ex) {

            return redirect()->route('admin.newes')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }
    public function destroy($id)
    {

        try {
            $news = News::find($id);
            if (!$news)
                return redirect()->route('admin.newes')->with(['error' => 'هذا القسم غير موجود ']);
            $images = explode(',', $news->photo);
            foreach ($images as $image){
                $fileExists = Storage::disk('public')->exists('/upimages/news/' . $image);
                if ($fileExists){
                    unlink('upimages/news/' . $image);
                }
            }



            $news->delete();
            return redirect()->route('admin.newes')->with(['success' => 'تم حذف القسم بنجاح']);

        } catch (\Exception $ex) {
            return redirect()->route('admin.newes')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }

}
