<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceRequest;
use App\Models\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServicesController extends Controller
{
    public function index()
    {
        $services = Services::all();
        return view ('admin.pages.servicess.index', compact('services'));
    }

    public function create()
    {
        return view('admin.pages.servicess.create');
    }


    public function store(ServiceRequest $request)
    {
        try {
            $filePath = "";
            if ($request->has('photo')) {

                $filePath = uploadImage('services', $request->photo);
            }

            $services =Services::create([
                'photo' => $filePath,
                'title_ar' => $request->title_ar,
                'title_en' => $request->title_en,
                'text_ar' => $request->text_ar,
                'text_en' => $request->text_en,

            ]);

//        dd($sliders);
            return redirect()->route('admin.service')->with(['success' => 'تم الحفظ بنجاح']);
        } catch (\Exception $ex) {
            return redirect()->route('admin.service')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);

        }
    }
    public function show($id)
    {
        //
    }


    public function edit($serv_id)
    {
        $services= Services::find($serv_id);

        if (!$services)
            return redirect()->route('admin.service')->with(['error' => 'هذا القسم غير موجود ']);

        return view('admin.pages.servicess.edit', compact('services'));
    }
    public  function update($serv_id ,ServiceRequest  $request)

    {

        try {
            $services = Services::find($serv_id);
            if (!$services)
                return redirect()->route('admin.service')->with(['error' => 'هذا القسم غير موجود ']);
            //update data
            $services->update($request->all());

            if ($request->has('photo')) {
                $filePath = uploadImage('services', $request->photo);
                Services::where('id', $serv_id)
                    ->update([
                        'photo' => $filePath,
                    ]);
            }
//            dd($services);

            return redirect()->route('admin.service')->with(['success' => 'تم ألتحديث بنجاح']);
        } catch (\Exception $ex) {

            return redirect()->route('admin.service')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }
    public function destroy($id)
    {

        try {
            $services = Services::find($id);
            if (!$services)
                return redirect()->route('admin.service')->with(['error' => 'هذا القسم غير موجود ']);
            $images = explode(',', $services->photo);
            foreach ($images as $image){
                $fileExists = Storage::disk('public')->exists('/upimages/services/' . $image);
                if ($fileExists){
                    unlink('upimages/services/' . $image);
                }
            }



            $services->delete();
            return redirect()->route('admin.service')->with(['success' => 'تم حذف القسم بنجاح']);

        } catch (\Exception $ex) {
            return redirect()->route('admin.service')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }

}

