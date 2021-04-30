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
                                </li>
                                <li class="breadcrumb-item active">كل التقارير
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
                                    <h4 class="card-title">التقارير  </h4>
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

                                    <table id="sum_table"

                                    class="table display nowrap table-striped table-bordered scroll-horizontal" >

                                            <thead class="">
                                            <tr>
                                                <th> العملية  </th>
                                                <th> القيمة  </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                    <tr>
                                                        <th>  رصيد الخزنه  </th>
                                                        <td>{!!$balance!!}</td>
                                                    </tr> <tr>
                                                        <th> أجمالي الايرادات  </th>
                                                        <td>{!!$expenses!!}</td>
                                                    </tr>
                                             <tr>
                                                 <th>  أجمالي المصروفات </th>
                                                        <td>{!!$covenant!!}</td>
                                                    </tr>
                                             <tr>
                                                 <th>أجمالي العهد</th>
                                                        <td>{!!$covenant!!}</td>
                                                    </tr>
                                             <tr>
                                                 <th> أجمالي قيمة المخزون  </th>
                                                        <td>{!!$total_price!!}</td>
                                                    </tr>
                                             <tr>
                                                        <th> اجمالي عدد المخزون </th>
                                                        <td>{!!$counts!!}</td>
                                                    </tr>
                                             <tr>
                                                        <th> أجمالي سعر المخزون</th>
                                                        <td>{!!$buy_price!!}</td>
                                                    </tr>
                                             <tr>
                                                        <th> أجمالي ارباح وخسائر </th>
                                                        <td>{!!$profitLoss!!}</td>
                                                    </tr>
                                             <tr>
                                                        <th> الرصيد الحالي </th>
                                                        <td>{!!$current_balance!!}</td>
                                                    </tr>



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
