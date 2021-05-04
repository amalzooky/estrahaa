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
        }

        .invoice table .unit {
        }

        .invoice table .total {
            color: #fff
        }

        .invoice table tbody tr:last-child td {
        }

        .invoice table tfoot td {
            background: 0 0;
            white-space: nowrap;
            text-align: right;
            padding: 10px 20px;
            font-size: 1.2em;
        }

        .invoice table tfoot tr:first-child td {
        }

        .invoice table tfoot tr:last-child td {
            color: #3989c6;
            font-size: 1.4em;
        }

        .invoice table tfoot tr td:first-child {
        }

        .invoice footer {
            width: 100%;
            text-align: center;
            color: #777;
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

                            <td class="text-left">{{$orders->send_name}}</td>
                            <td class="unit">{{$orders->send_addres}}</td>
                            <td class="tax">{{$orders->receiv_name}}</td>
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

                            <td class="text-left">{{$orders->send_phone}}</td>
                            <td class="unit">{{$orders->payment_method}}</td>
                            <td class="tax">{{$orders->no_order}}</td>
                            <td class="tax">{{$orders->receiv_phone}}</td>



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
