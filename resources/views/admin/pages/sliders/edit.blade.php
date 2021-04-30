@extends('layouts.admin')

@section('content')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="">الرئيسية </a>
                                </li>
                                <li class="breadcrumb-item"><a href=""> الصور المتحركه </a>
                                </li>
                                <li class="breadcrumb-item active">تعديل الصور المتحركه
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Basic form layout section start -->
                <section id="basic-form-layouts">
                    <div class="row match-height">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title" id="basic-layout-form"> تعديل  الصور المتحركة </h4>
                                    <a class="heading-elements-toggle"><i
                                            class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                @include('admin.includes.alerts.success')
                                @include('admin.includes.alerts.errors')
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <form class="form"
                                              action="{{route('admin.sliders.update',$slider -> id)}}"
                                              method="POST"
                                              enctype="multipart/form-data">
                                            @csrf
                                            <input name="id" value="{{$slider -> id}}" type="hidden">


                                            <div class="form-group">
                                                <div class="text-center">
                                                    <img
                                                    src="{{$slider->photo}}"
                                                        class="rounded-circle  height-150" alt="صورة   ">
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label> صوره القسم </label>
                                                <label id="projectinput7" class="file center-block">
                                                    <input type="file" id="file" name="photo">
                                                    <span class="file-custom"></span>
                                                </label>
                                                @error('photo')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>

                                            <h4 class="form-section"><i class="ft-home"></i>بيانات الصورالمتحركه </h4>


<div class="row">


<div class="col-lg-6">
<div class="form-group">
<label for="projectinput1"> العنوان - {{__('messages.ar')}} </label>
<input type="text" value="{{$slider->title_ar}}" id="name"
class="form-control"
placeholder="  "
name="title_ar">
@error("title_ar")
<span class="text-danger"> هذا الحقل مطلوب</span>
@enderror
</div>
</div>
<div class="col-lg-6">
<div class="form-group">
<label for="projectinput1"> العنوان - {{__('messages.en')}} </label>
<input type="text" value="{{$slider->title_en}}" id="name"
class="form-control"
placeholder="  "
name="title_en">
@error("title_en")
<span class="text-danger"> هذا الحقل مطلوب</span>
@enderror
</div>
</div>
<div class="col-lg-6">

<div class="form-group">
<label for="projectinput1"> النص - {{__('messages.ar')}} </label>
<textarea id="froala-editor"
class="form-control"
value="{{$slider->text_ar}}"placeholder="  "
name="text_ar">{{$slider->text_ar}} </textarea>
@error("text_ar")
<span class="text-danger"> هذا الحقل مطلوب</span>
@enderror
</div>
    </div>
<div class="col-lg-6">
<div class="form-group">
<label for="projectinput1"> النص - {{__('messages.en')}} </label>
<textarea id="froala-editor"
class="form-control"
value=""
placeholder="  "
name="text_en"> {{$slider->text_en}}</textarea>
@error("text_en")
<span class="text-danger"> هذا الحقل مطلوب</span>
@enderror
</div>
</div>



</div>





<div class="form-actions">
<button type="button" class="btn btn-warning mr-1"
onclick="history.back();">
<i class="ft-x"></i> تراجع
</button>
<button type="submit" class="btn btn-primary">
<i class="la la-check-square-o"></i> حفظ
</button>
</div>
</form>




</div>
</div>
</div>
</div>
</div>
</section>
<!-- // Basic form layout section end -->
</div>
</div>
</div>

@endsection
