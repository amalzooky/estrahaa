@extends('layouts.admin')

@section('content')
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


    <style>
        #invoice{
            padding: 30px;
        }

        .invoice {
            position: relative;
            background-color: #FFF;
            min-height: 680px;
            padding: 15px
        }

        .invoice header {
            padding: 10px 0;
            margin-bottom: 20px;
            border-bottom: 1px solid #3989c6
        }

        .invoice .company-details {
            text-align: right
        }

        .invoice .company-details .name {
            margin-top: 0;
            margin-bottom: 0
        }

        .invoice .contacts {
            margin-bottom: 20px
        }

        .invoice .invoice-to {
            text-align: left
        }

        .invoice .invoice-to .to {
            margin-top: 0;
            margin-bottom: 0
        }

        .invoice .invoice-details {
            text-align: right
        }

        .invoice .invoice-details .invoice-id {
            margin-top: 0;
            color: #3989c6
        }

        .invoice main {
            padding-bottom: 50px
        }

        .invoice main .thanks {
            margin-top: -100px;
            font-size: 2em;
            margin-bottom: 50px
        }

        .invoice main .notices {
            padding-left: 6px;
            border-left: 6px solid #3989c6
        }

        .invoice main .notices .notice {
            font-size: 1.2em
        }

        .invoice table {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
            margin-bottom: 20px
        }

        .invoice table td,.invoice table th {
            padding: 15px;
            background: #eee;
            border-bottom: 1px solid #fff
        }

        .invoice table th {
            white-space: nowrap;
            font-weight: 400;
            font-size: 16px
        }

        .invoice table td h3 {
            margin: 0;
            font-weight: 400;
            color: #3989c6;
            font-size: 1.2em
        }

        .invoice table .qty,.invoice table .total,.invoice table .unit {
            text-align: right;
            font-size: 1.2em
        }

        .invoice table .no {
            color: #fff;
            font-size: 1.6em;
            background: #3989c6
        }

        .invoice table .unit {
            background: #ddd
        }

        .invoice table .total {
            background: #3989c6;
            color: #fff
        }

        .invoice table tbody tr:last-child td {
            border: none
        }

        .invoice table tfoot td {
            background: 0 0;
            border-bottom: none;
            white-space: nowrap;
            text-align: right;
            padding: 10px 20px;
            font-size: 1.2em;
            border-top: 1px solid #aaa
        }

        .invoice table tfoot tr:first-child td {
            border-top: none
        }

        .invoice table tfoot tr:last-child td {
            color: #3989c6;
            font-size: 1.4em;
            border-top: 1px solid #3989c6
        }

        .invoice table tfoot tr td:first-child {
            border: none
        }

        .invoice footer {
            width: 100%;
            text-align: center;
            color: #777;
            border-top: 1px solid #aaa;
            padding: 8px 0
        }

        @media print {
            .invoice {
                font-size: 11px!important;
                overflow: hidden!important
            }

            .invoice footer {
                position: absolute;
                bottom: 10px;
                page-break-after: always
            }

            .invoice>div:last-child {
                page-break-before: always
            }
        }
        /*--------------------------*/
        #inventory-invoice{
            padding: 30px;
        }
        #inventory-invoice a{text-decoration:none ! important;}
        .invoice {
            position: relative;
            background-color: #FFF;
            min-height: 680px;
            padding: 15px
        }

        .invoice header {
            padding: 10px 0;
            margin-bottom: 20px;
            border-bottom: 1px solid #3989c6
        }

        .invoice .company-details {
            text-align: left;
        }

        .invoice .company-details .name {
            margin-top: 0;
            margin-bottom: 0
        }

        .invoice .contacts {
            margin-bottom: 20px
        }

        .invoice .invoice-to {
            text-align: right;
        }

        .invoice .invoice-to .to {
            margin-top: 0;
            margin-bottom: 0
        }

        .invoice .invoice-details {
            text-align: left;
        }

        .invoice .invoice-details .invoice-id {
            margin-top: 0;
            color: #3989c6
        }

        .invoice main {
            padding-bottom: 50px
        }

        .invoice main .thanks {
            margin-top: -100px;
            font-size: 2em;
            margin-bottom: 50px
        }

        .invoice main .notices {
            padding-left: 6px;
            border-left: 6px solid #3989c6
        }

        .invoice main .notices .notice {
            font-size: 1.2em
        }

        .invoice table {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
            margin-bottom: 20px
        }

        .invoice table td,.invoice table th {
            padding: 15px;
            background: #eee;
            border-bottom: 1px solid #fff
        }

        .invoice table th{
            white-space: nowrap;
            font-weight: 400;
            font-size: 16px;
            border:1px solid #fff;
        }
        .invoice table td{
            border:1px solid #fff;
        }
        .invoice table td h3 {
            margin: 0;
            font-weight: 400;
            color: #3989c6;
            font-size: 1.2em
        }

        .invoice table .tax,.invoice table .total,.invoice table .unit {
            text-align: right;
            font-size: 1.2em
        }

        .invoice table .no {
            color: #fff;
            font-size: 1.6em;
            background: #17a2b8
        }

        .invoice table .unit {
            background: #ddd
        }

        .invoice table .total {
            background: #17a2b8;
            color: #fff
        }

        .invoice table tfoot td {
            background: 0 0;
            border-bottom: none;
            white-space: nowrap;
            text-align: right;
            padding: 10px 20px;
            font-size: 1.2em;
            border-top: 1px solid #aaa
        }

        .invoice table tfoot tr:first-child td {
            border-top: none
        }

        .invoice table tfoot tr:last-child td {
            color: #3989c6;
            font-size: 1.4em;
            border-top: 1px solid #3989c6
        }

        .invoice table tfoot tr td:first-child {
            border: none
        }

        .invoice footer {
            width: 100%;
            text-align: center;
            color: #777;
            border-top: 1px solid #aaa;
            padding: 8px 0
        }

        @media print {
            .content {margin-right: 0!important;}
           .footer{
                visibility: hidden !important;
               width: 0 !important;

            }
           .ft-menu{
               visibility: hidden;
           }
            .text-right {
                visibility: hidden;
            }
            .brand-logo{
                visibility: hidden;
            }
            .invoice {
                width: 100% !important;
                height: 100%;
            }
            .main-menu {
                visibility: hidden;
            }
            .invoice {
                font-size: 11px!important;
                overflow: hidden!important;
                width: 100% !important;
            }

            .invoice footer {
                position: absolute;
                bottom: 10px;
                page-break-after: always
            }

            .invoice>div:last-child {
                page-break-before: always
            }
        }
    </style>
    <div id="invoice">

        <div class="app-content content">
            <div class="content-wrapper">
                <div class="content-header row">
                    <div class="toolbar hidden-print">
                        <div class="text-right">

                            <button  id="printInvoice" class="btn btn-info"><i class="fa fa-print"></i> Print</button>
                            <button class="btn btn-info"><i class="fa fa-file-pdf-o"></i> Export as PDF</button>
                        </div>
                    </div>
                </div>

                <hr>
        </div>
        <div class="invoice overflow-auto">
            <div style="min-width: 600px">
                <header>
                    <div class="row">
                        <div class="col">
                            <a target="_blank" href="https://lobianijs.com">
                                <img src="{{asset('back/images/Picture1.png')}}">                              </a>
                        </div>
                        <div class="col company-details">
                            <h2 class="name">
                                <a target="_blank" href="https://lobianijs.com">
                                    موقع أستراحه للتسويق الالكتروني
                                </a>
                            </h2>
                            <div>المعادي</div>
                            <div>010932555145</div>
                            <div>company@example.com</div>
                        </div>
                    </div>
                </header>
                <main>
                    <div class="row contacts">
                        <div class="col invoice-to">
                            <div class="text-gray-light">معلومات الفاتوره:</div>
                            <h2 class="to">{{$orders->  name_clinte}}</h2>
                            <div class="address">{!! $orders->adress_clinte  !!}</div>
                            <div class="email"><a href="mailto:john@example.com">john@example.com</a></div>
                        </div>
                        <div class="col invoice-details">
                            <h1 class="invoice-id">{{$orders->num_order}}</h1>
                            <div class="date">{{$orders->date_order}}</div>
                        </div>
                    </div>
                    <table border="1" cellspacing="0" cellpadding="0">
                        @php
                            $products = !empty($orders->products_details) ? unserialize($orders->products_details) : null;
                        @endphp
                        <thead>
                        <tr>
                            <th>م</th>
                            <th class="">المنتج</th>
                            <th class="">البيان</th>
                            <th class="">العدد</th>
                            <th class="">سعر الوحده بالجنيه</th>

                        </tr>
                        </thead>
                        <tbody>
                        @if(!empty($products))
                            @foreach($products as $product)
{{--                                @php(var_dump($order))--}}
                                <tr>
                                    <td class="no">{{$product['id']}}</td>
                                    <td class="text-left">{{$product['name']}}</td>
                                    <td class="unit">{{$product['description']}}</td>
                                    <td class="tax">{{$product['count']}}</td>
                                    <td class="total">{{$product['selling-price'] * $product['count']}}</td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                        <tfoot>
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2">الاجمالي</td>
                            <td>{{$orders->total_price_products}}</td>
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2">الشحن</td>
                            <td>{{$orders->shipping_price}}</td>
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2">أجمالي الفاتوره</td>
                            <td>{{$orders->total_value_order}}</td>
                        </tr>
                        </tfoot>
                    </table>
                    <div class="thanks">شكرا لكم!</div>
                    <div class="notices">
                        <div>ملاحظه</div>
                        <div class="notice">للعميل الحق بالمطالبه بقيمة الاوردر او استبداله باي منتج متاح على الويب سايت  في خلال 14 يوم من تاريخ استلام الاوردر بشرط ان يكون المنتج والكرتونه بنفس حالة الاستلام - اذا كان بالمنتج عيب او غير مطابق لمواصفات المنتج على الويب سايت كان للعميل الحق في الاستبدال او الاسترجاع مجانا بدون مصاريف شحن - واذا كان مطابق للوصف والصور  يدفع العميل 55 جنية قيمة شحن الاوردر -- استرداد قيمة الاوردر عن طريق فودافون كاش او البريد المصري</div>
                    </div>
                </main>
                <hr>
                <div class="invoice overflow-auto">
                    <div style="min-width: 600px">


                        <table border="1"  cellpadding="0">
                            <thead>
                            <tr>
                                <th>  راسل الشحنه </th>
                                <th>عنوان الراسل</th>
                                <th>المرسل اليه  </th>
                                <th>عنوان المرسل اليه </th>
                            </tr>
                            </thead>

                            <tbody>
                            <tr>

                                <td class="text-left">{{$bilss->send_name}}</td>
                                <td class="unit">{{$bilss->send_addres}}</td>
                                <td class="tax">{{$orders->name_clinte}}</td>
                                <td class="tax">{{$orders->receive_addres}}</td>


                            </tr>
                            </tbody>
                            <thead>
                            <tr>
                                <th>رقم التليفون  </th>
                                <th>طريقة التحصيل </th>
                                <th>  رقم الطلب  </th>
                                <th>رقم التليفون المرسل اليه </th>


                            </tr>
                            </thead>
                            <tbody>
                            <tr>

                                <td class="text-left">{{$bilss->send_phone}}</td>
                                <td class="unit">{{$orders->payment_method}}</td>
                                <td class="tax">{{$orders->no_order}}</td>
                                <td class="tax">{{$orders->num_phone}}</td>



                            </tr>
                            </tbody>
                            <thead>
                            <tr>
                                <th> تاريخ التوصل </th>
                                <th>  </th>
                                <th> أجمالي قيمة التحصيل</th>
                                <th></th>

                            </tr>
                            </thead>
                            <tbody>
                            <tr>

                                <td class="text-left">{{$orders->date_arrive}}</td>
                                <td class="text-left"></td>

                                <td class="unit">{{$orders->paymen_total}}</td>
                                <td class="text-left"></td>




                            </tr>
                            </tbody>

                        </table>

                    </div>
                    <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
                    <div></div>
                </div>
                <footer>
{{--                    Invoice was created on a computer and is valid without the signature and seal.--}}
                </footer>
            </div>
            <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
            <div></div>
        </div>
    </div>

            </div>


    <script>
        $('#printInvoice').click(function(){
            Popup($('.invoice')[0].outerHTML);
            function Popup(data)
            {
                window.print();
                return true;
            }
        });
    </script>
    @stop
