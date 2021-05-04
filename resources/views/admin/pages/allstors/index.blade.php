@extends('layouts.admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script>

</script>
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
                                <li class="breadcrumb-item"><a href="{{route('admin.stors.create')}}">أضافة مخزن جديد</a>
                                </li>
                                <li class="breadcrumb-item active">كل المخازن
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
                                    <h4 class="card-title">المخازن  </h4>
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
                                    </div>
                                    <table   class="table table-bordered" style="width:95%;">

                                    <thead>

<tr>
<th>الكل</th>
    <td style="color: red">اجمالي عدد المخزون الكلي{{ $counts }}</td>

    <td style="color: red">أجمالي قيمة المخزون:{!!$total_price!!}</td>
                                            <td style="color: red">أجمالي سعر المخزون: {{ $buy_price }}</td>

</tr>

<tr>
    <th>الفعلي</th>
    <td style="color: red">اجمالي عدد المخزون الفعلي{{ $counactiv }}</td>

    <td style="color: red">أجمالي قيمة المخزون:{!!$totalpriactiv!!}</td>
{{--                                            <th style="color: red"> اجمالي عدد المخزون الكل{{ dd($countsactive) }}</th>--}}
                                            <td style="color: red">أجمالي سعر المخزون: {{ $pricactiv }}</td>

</tr>

                                        </thead><tbody></tbody>



                                    </table>
                                    <table id="sum_table"

                                    class="table display nowrap table-striped table-bordered scroll-horizontal" >

                                            <thead class="">
                                            <tr>
                                                <th> م  </th>
                                                <th> أسم المنتج  </th>
                                                <th>  الوصف </th>
                                                <th>العدد</th>

                                                <th> سعر الشراء  </th>
                                                <th> أجمالي السعر  </th>
                                                <th>  سعر البيع  </th>
                                                <th>  الحاله   </th>
                                                <th>  تاريخ البيع  </th>
                                                <th>  اليوم البيع  </th>


                                                <th>الإجراءات</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            @isset($allstors)

                                                @foreach($allstors as $stors)
                                                    <tr>
                                                        <td>{{$stors -> id}}</td>
                                                        <td>{{$stors -> product_name}}</td>
                                                        <td>{{$stors -> description}}</td>
                                                        <td>{{$stors -> count_proud}}</td>
                                                        <td>{{$stors -> buy_price}}</td>
                                                        <td>{{$stors -> total_price}}</td>
                                                        <td>{{$stors -> selling_price}}</td>
                                                        <td>{{$stors -> getActive()}}</td>
                                                        <td>{{ $stors->created_at->format('l') }}</td>
                                                        <td>{{ $stors->created_at->format('y/m/d') }}</td>


                                                        <td>
                                                            <div class="btn-group" role="group"
                                                                 aria-label="Basic example">
                                                                <a href="{{route('admin.stors.edit',$stors -> id)}}"
                                                                   class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">تعديل</a>


                                                                <a href="{{route('admin.stors.delete',$stors -> id)}}"
                                                                   class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1">حذف</a>

                                                                <a href="{{route('admin.stors.status',$stors -> id)}}"
                                                                   class="btn btn-outline-warning btn-min-width box-shadow-3 mr-1 mb-1">
                                                                    @if($stors -> active == 0)
                                                                        تفعيل
                                                                    @else
                                                                        الغاء تفعيل
                                                                    @endif
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endisset


                                            </tbody>
                                        <tfoot>
                                        <tr>
                                            <td>0</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>


                                        </tr>

                                        </tfoot>

                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>
                </section>
            </div>
        </div>
    </div>
{{--    <script>--}}
{{--        $(document).ready(function()--}}
{{--        {--}}
{{--            $('table thead th').each(function(i)--}}
{{--            {--}}
{{--                calculateColumn(i);--}}
{{--            });--}}
{{--        });--}}

{{--        function calculateColumn(index)--}}
{{--        {--}}
{{--            var total = 0;--}}
{{--            $('table tr').each(function()--}}
{{--            {--}}
{{--                var value = parseInt($('td', this).eq(index).text());--}}
{{--                if (!isNaN(value))--}}
{{--                {--}}
{{--                    total += value;--}}
{{--                }--}}
{{--            });--}}

{{--            $('table tfoot td').eq(index).html( total);--}}
{{--        }--}}
{{--    </script>--}}
@endsection
