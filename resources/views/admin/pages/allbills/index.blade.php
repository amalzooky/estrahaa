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
                                    <h4 class="card-title">البوليصة  </h4>
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
                                                <th>  رقم الطلب  </th>
                                                <th>  راسل الشحنه </th>
                                                <th>عنوان الراسل</th>
                                                <th>المرسل اليه  </th>
                                                <th>عنوان المرسل اليه </th>

                                                <th>رقم التليفون الراسل </th>
                                                <th>رقم التليفون المرسل اليه </th>
                                                <th>طريقة التحصيل </th>
                                                <th> أجمالي قيمة التحصيل</th>
                                                <th> تاريخ التوصل </th>


                                                <th>الإجراءات</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            @isset($bills)

                                                @foreach($bills as $bil)
                                                    <tr>
                                                        <td>{{$bil -> no_order}}</td>
                                                        <td>{{$bil -> send_name}}</td>
                                                        <td>{{$bil -> send_addres}}</td>
                                                        <td>{{$bil -> receiv_name}}</td>
                                                        <td>{{$bil -> receive_addres}}</td>
                                                        <td> {{$bil-> send_phone  }} </td>
                                                        <td> {{$bil-> receiv_phone }} </td>
                                                        <td> {{$bil->payment_method  }} </td>
                                                        <td> {{$bil-> paymen_total }} </td>
                                                        <td> {{$bil->date_arrive  }} </td>

                                                        <td>
                                                            <div class="btn-group" role="group"
                                                                 aria-label="Basic example">
                                                                <a href="{{route('admin.bills.edit',$bil -> id)}}"
                                                                   class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">تعديل</a>


                                                                <a href="{{route('admin.bills.delete',$bil -> id)}}"
                                                                   class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1">حذف</a>

                                                                <a href="{{route('admin.bills.show',$bil -> id)}}"
                                                                   class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1">طباعه</a>
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
