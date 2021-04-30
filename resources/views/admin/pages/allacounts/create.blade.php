@extends('layouts.admin')

@section('content')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">الرئيسية</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{route('admin.acounts.create')}}">أضافة بوليصه جديد</a>
                                </li>
                                <li class="breadcrumb-item active">كل الاوردرات
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
                                    <h4 class="card-title" id="basic-layout-form"> أضافة بوليصة شحن </h4>
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

                                        <form class="form" action="{{route('admin.acounts.store')}}"

                                              method="POST"
                                              enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-body">

                                                <h4 class="form-section"><i class="ft-home"></i>بيانات بوليصة الشحن </h4>
                                                <div class="row">

                                                    <div class="col-lg-4">
                                                        <div class="form-group">

                                                            <label for="projectinput1"> مصروفات </label>
                                                            <input type="number" value="" id="name"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   name="expenses">
                                                            @error("expenses")
                                                            <span class="text-danger"> هذا الحقل مطلوب</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> أيرادات</label>

                                                            <input type="number" value="" id="name"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   name="income">
                                                            @error("income")
                                                            <span class="text-danger"> هذا الحقل مطلوب</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> عهد  </label>

                                                            <input type="number" value="" id="name"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   name="covenant">
                                                            @error("covenant")
                                                            <span class="text-danger"> هذا الحقل مطلوب</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">

                                                    <div class="form-group">
                                                    <label for="projectinput1"> اسم البيان
                                                         </label>
                                                    <select name="statement_id" class="form-control">
                                                        <option value="">اختر البيان</option>
                                                        @if(!empty($statments) && count($statments) > 0)
                                                            @foreach($statments as $statm)
                                                                    <option value="{{$statm->id}}">{{$statm->stament_name}}</option>
                                                            @endforeach
                                                        @else
                                                            <option value="" disabled>لا يوجد بيان  </option>
                                                        @endif
                                                    </select>
                                                    @error("stament_name")
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
