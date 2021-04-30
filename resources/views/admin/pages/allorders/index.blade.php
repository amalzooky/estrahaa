@extends('layouts.admin')

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title"> الاقسام الرئيسية </h3>
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
                <!-- DOM - jQuery events table -->
                <section id="dom">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">الاوردرات  </h4>
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
                                    <div class="card-body card-dashboard">
                                        <table
                                            class="table display nowrap table-striped table-bordered scroll-horizontal">
                                            <thead class="">
                                            <tr>
                                                <th> رقم الاوردر </th>
                                                <th>تاريخ الطلب</th>
                                                 <th>قناه البيع  </th>
                                                 <th>اسم العميل </th>

                                                 <th>رقم التليفون </th>
                                                 <th>العنوان </th>
                                                 <th> حالة الاوردر</th>
                                                 <th>مكونات الاوردر </th>
                                                 <th>الهدية </th>
                                                 <th>عدد المنتجات  </th>
                                                 <th>اجمالي سعر المنتجات </th>
                                                 <th> الخصم</th>
                                                 <th>الشحن </th>
                                                 <th>اجمالي قيمة الاوردر </th>
                                                 <th>شركة الشحن</th>
                                                 <th> رقم البوليصه</th>
                                                 <th>صافي الشحن </th>
                                                 <th>تكلفة الاوردر </th>
                                                 <th>ربح الاوردر </th>
                                                 <th>ملاحظات </th>
                                                 <th>تقييم العميل </th>
                                                 <th>اجمالي المبيعات </th>
                                                 <th> ارباح </th>
                                                 <th> تاريخ الانشاء </th>

                                                <th>الإجراءات</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            @isset($allorders)

                                                @foreach($allorders as $order)
                                                    <tr>
                                                        <td>{{$order -> num_order}}</td>
                                                        <td>{{$order -> date_order}}</td>
                                                        <td>{{$order -> sales_channel}}</td>
                                                        <td>{{$order -> name_clinte}}</td>
                                                        <td> {{$order-> num_phone  }} </td>
                                                        <td> {{$order-> adress_clinte }} </td>
                                                        <td> {{$order->status_order  }} </td>
                                                        <td> {{$order-> components_order }} </td>
                                                        <td> {{$order->gifts  }} </td>
                                                        <td> {{$order-> num_products }} </td>
                                                        <td> {{$order-> total_price_products }} </td>
                                                        <td> {{$order->discount  }} </td>
                                                        <td> {{$order-> shipping_price }} </td>
                                                        <td> {{$order->total_value_order  }} </td>
                                                        <td> {{$order->shipping_company  }} </td>
                                                        <td> {{$order->policy_number  }} </td>
                                                        <td> {{$order-> net_shipping }} </td>
                                                        <td> {{$order-> cost_order }} </td>
                                                        <td> {{$order-> order_won }} </td>
                                                        <td> {{$order->nots  }} </td>
                                                        <td> {{$order-> customer_evaluation  }} </td>
                                                        <td> {{$order->total_sales  }} </td>
                                                        <td> {{$order->profits  }} </td>
                                                        <td> {{$order-> created_at }} </td>
                                                        <td>
                                                            <div class="btn-group" role="group"
                                                                 aria-label="Basic example">
                                                                <a href="{{route('admin.orders.edit',$order -> id)}}"
                                                                   class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">تعديل</a>


                                                                <a href="{{route('admin.orders.delete',$order -> id)}}"
                                                                   class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1">حذف</a>

                                                                <a href="{{route('admin.orders.show',$order -> id)}}"
                                                                   class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1">عرض</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endisset


                                            </tbody>
                                        </table>
                                        <div class="justify-content-center d-flex">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
