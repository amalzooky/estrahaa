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
                                <li class="breadcrumb-item"><a href="{{route('admin.orders.create')}}">أضافة اوردر جديد</a>
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
                                    <h4 class="card-title" id="basic-layout-form"> تعديل الاوردر  </h4>
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
                                              action="{{route('admin.orders.update',$allorders -> id)}}"
                                              method="POST"
                                              enctype="multipart/form-data">
                                            @csrf

                                            <h4 class="form-section"><i class="ft-home"></i>بيانات الاوردرات </h4>

                                            <div class="row">

                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> رقم الاودر </label>
                                                        <input type="number" value="{{$allorders->num_order}}" id="name"
                                                               class="form-control"
                                                               placeholder="  "
                                                               name="num_order">
                                                        @error("num_order")
                                                        <span class="text-danger"> هذا الحقل مطلوب</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <label for="projectinput1">  تاريخ الاوردر</label>

                                                        <input type="date" value="{{$allorders->num_order}}" id="name"
                                                               class="form-control"
                                                               placeholder="  "
                                                               name="date_order">
                                                        @error("date_order")
                                                        <span class="text-danger"> هذا الحقل مطلوب</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <label for="projectinput1">  القناه الطلب </label>
                                                        <select name="sales_channel" class="form-control" id="select-state"  >
                                                            <option value="{{$allorders->num_order}}"> {{$allorders->num_order}} </option>
                                                            <option value="الفيس بوك">الفيس بوك</option>
                                                            <option value="واتس اب">واتس اب</option>
                                                            <option value="جروب الفيس">جروب الفيس</option>

                                                        </select>
                                                        @error("sales_channel")
                                                        <span class="text-danger"> هذا الحقل مطلوب</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> أسم العميل </label>

                                                        <input type="text" value="{{$allorders->num_order}}" id="name"
                                                               class="form-control"
                                                               placeholder="  "
                                                               name="name_clinte">
                                                        @error("name_clinte")
                                                        <span class="text-danger"> هذا الحقل مطلوب</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <label for="projectinput1">رقم التليفون العميل </label>

                                                        <input id="froala-editor" type="tel"
                                                               class="form-control"
                                                               placeholder="  "
                                                               value="{{$allorders->num_order}}"                                                               name="num_phone"/>
                                                        @error("num_phone")
                                                        <span class="text-danger"> هذا الحقل مطلوب</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <label for="projectinput1">  حاله الاوردر </label>

                                                        <select name="status_order" class="form-control" id="select-state" >
                                                            <option value="{{$allorders->num_order}}" >{{$allorders->num_order}}</option>
                                                            <option value="A">A</option>
                                                            <option value="D">D</option>
                                                            <option value="0">0</option>
                                                            <option value="S">S</option>
                                                            <option value="R">R</option>

                                                        </select>
                                                        @error("status_order")
                                                        <span class="text-danger"> هذا الحقل مطلوب</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <label for="projectinput1">  مكونات الاوردر </label>

                                                        <input type="text" value="" id="name"
                                                               class="form-control"
                                                               placeholder="  "
                                                               value="{{$allorders->num_order}}"
                                                               name="components_order">
                                                        @error("components_order")
                                                        <span class="text-danger"> هذا الحقل مطلوب</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <label for="projectinput1">  الهدايا الاوردر </label>

                                                        <input type="text" value="" id="name"
                                                               class="form-control"
                                                               placeholder="  "
                                                               value="{{$allorders->num_order}}"
                                                               name="gifts">
                                                        @error("gifts")
                                                        <span class="text-danger"> هذا الحقل مطلوب</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <label for="projectinput1">  شركة الشحن    </label>
                                                        <select name="shipping_company" class="form-control" id="select-state" >
                                                            <option value="{{$allorders->num_order}}" > {{$allorders->num_order}}</option>
                                                            <option value="استراحه">استراحة</option>
                                                            <option value="أخري">أخري</option>
                                                        </select>

                                                        @error("")
                                                        <span class="text-danger"> هذا الحقل مطلوب</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <label for="projectinput1">  رقم البوليصة   </label>
                                                        <input type="text" value="{{$allorders->num_order}}" id="name"
                                                               class="form-control"
                                                               placeholder="  "
                                                               name="policy_number">

                                                        @error("policy_number")
                                                        <span class="text-danger"> هذا الحقل مطلوب</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <label for="projectinput1">  عدد المنتجات   </label>
                                                        <input type="number" value="{{$allorders->num_order}}" id="name"
                                                               class="form-control"
                                                               placeholder="  "
                                                               name="num_products">

                                                        @error("num_products")
                                                        <span class="text-danger"> هذا الحقل مطلوب</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <label for="projectinput1">  أجمالي سعر المنتجات   </label>
                                                        <input type="text" value="{{$allorders->num_order}}" id="name"
                                                               class="form-control"
                                                               placeholder="  "
                                                               name="total_price_products">

                                                        @error("total_price_products")
                                                        <span class="text-danger"> هذا الحقل مطلوب</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <label for="projectinput1">  الخصم    </label>
                                                        <input type="text" value="{{$allorders->num_order}}" id="name"
                                                               class="form-control"
                                                               placeholder="  "
                                                               name="discount">

                                                        @error("discount")
                                                        <span class="text-danger"> هذا الحقل مطلوب</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <label for="projectinput1">  الشحن    </label>
                                                        <input type="text" value="{{$allorders->num_order}}" id="name"
                                                               class="form-control"
                                                               placeholder="  "
                                                               name="shipping_price">

                                                        @error("shipping_price")
                                                        <span class="text-danger"> هذا الحقل مطلوب</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <label for="projectinput1">  أجملي قيمة الاودر    </label>
                                                        <input type="text" value="{{$allorders->num_order}}" id="name"
                                                               class="form-control"
                                                               placeholder="  "
                                                               name="total_value_order">

                                                        @error("total_value_order")
                                                        <span class="text-danger"> هذا الحقل مطلوب</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <label for="projectinput1">  صافي الشحن  </label>
                                                        <input type="text" value="{{$allorders->num_order}}" id="name"
                                                               class="form-control"
                                                               placeholder="  "
                                                               name="net_shipping">

                                                        @error("net_shipping")
                                                        <span class="text-danger"> هذا الحقل مطلوب</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <label for="projectinput1">  تكلفة الاوردر </label>
                                                        <input type="text" value="{{$allorders->num_order}}" id="name"
                                                               class="form-control"
                                                               placeholder="  "
                                                               name="cost_order">

                                                        @error("cost_order")
                                                        <span class="text-danger"> هذا الحقل مطلوب</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <label for="projectinput1">  ربح الاوردر </label>
                                                        <input type="text" value="{{$allorders->num_order}}" id="name"
                                                               class="form-control"
                                                               placeholder="  "
                                                               name="order_won">

                                                        @error("order_won")
                                                        <span class="text-danger"> هذا الحقل مطلوب</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> تقييم العميل </label>
                                                        <select name="customer_evaluation" class="form-control" id="select-state" >
                                                            <option value="{{$allorders->num_order}}" >{{$allorders->num_order}}</option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>

                                                        </select>

                                                        @error("")
                                                        <span class="text-danger"> هذا الحقل مطلوب</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <label for="projectinput1">  أجمالي المبيعات  </label>

                                                        <input type="text" value="{{$allorders->num_order}}" id="name"
                                                               class="form-control"
                                                               placeholder="  "
                                                               name="total_sales">
                                                        @error("total_sales")
                                                        <span class="text-danger"> هذا الحقل مطلوب</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <label for="projectinput1">  الارباح  </label>

                                                        <input type="text" value="{{$allorders->num_order}}" id="name"
                                                               class="form-control"
                                                               placeholder="  "
                                                               name="profits">
                                                        @error("profits")
                                                        <span class="text-danger"> هذا الحقل مطلوب</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">عنوان العميل</label>
                                                        <textarea id="froala-editor"
                                                                  class="form-control"
                                                                  placeholder="  "
                                                                  name="adress_clinte">{{$allorders->num_order}} </textarea>
                                                        @error("adress_clinte")
                                                        <span class="text-danger"> هذا الحقل مطلوب</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">ملاحظه </label>
                                                        <textarea id="froala-editor"
                                                                  class="form-control"
                                                                  placeholder="  "
                                                                  name="nots">{{$allorders->nots}} </textarea>
                                                        @error("nots")
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
