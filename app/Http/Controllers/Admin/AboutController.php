<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\AboutRequest;
use App\Models\Abouts;
use App\Http\Requests;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Str;
class AboutController extends Controller
{
    public function index()
    {
        $abouts = Abouts::all();
        return view ('admin.pages.allorders.index', compact('abouts'));
    }

    public function create()
    {
        return view('admin.pages.allorders.create');
    }


    public function store(AboutRequest $request)
    {
        try {
            $filePath = "";
            if ($request->has('photo')) {

                $filePath = uploadImage('abouts', $request->photo);
            }

            $abouts =Abouts::create([
                'photo' => $filePath,
                'title_ar' => $request->title_ar,
                'title_en' => $request->title_en,
                'text_ar' => $request->text_ar,
                'text_en' => $request->text_en,

            ]);

//        dd($sliders);
            return redirect()->route('admin.about')->with(['success' => 'تم الحفظ بنجاح']);
        } catch (\Exception $ex) {
            return redirect()->route('admin.about')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);

        }
    }
    public function show($id)
    {
        //
    }


    public function edit($about_id)
    {
        $abouts = Abouts::find($about_id);

        if (!$abouts)
            return redirect()->route('admin.about')->with(['error' => 'هذا القسم غير موجود ']);

        return view('admin.pages.allorders.edit', compact('abouts'));
    }
    public  function update($about_id ,AboutRequest  $request)

    {

        try {
            $abouts = Abouts::find($about_id);
            if (!$abouts)
                return redirect()->route('admin.about')->with(['error' => 'هذا القسم غير موجود ']);
            //update data
            $abouts->update($request->all());

            if ($request->has('photo')) {
                $filePath = uploadImage('abouts', $request->photo);
                Abouts::where('id', $about_id)
                    ->update([
                        'photo' => $filePath,
                    ]);
            }
            return redirect()->route('admin.about')->with(['success' => 'تم ألتحديث بنجاح']);
        } catch (\Exception $ex) {

            return redirect()->route('admin.about')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }
    public function destroy($id)
    {

        try {
            $abouts = Abouts::find($id);
            if (!$abouts)
                return redirect()->route('admin.about')->with(['error' => 'هذا القسم غير موجود ']);
            $images = explode(',', $abouts->photo);
            foreach ($images as $image){
                $fileExists = Storage::disk('public')->exists('/upimages/abouts/' . $image);
                if ($fileExists){
                    unlink('upimages/abouts/' . $image);
                }
            }



            $abouts->delete();
            return redirect()->route('admin.about')->with(['success' => 'تم حذف القسم بنجاح']);

        } catch (\Exception $ex) {
            return redirect()->route('admin.about')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }

}
