<div class="form-body" id="tab_logic" >

    <h4 class="form-section"><i class="ft-home"></i>بيانات المخزون  </h4>
    <div class="row" id="tbody" >

        <div class="col-lg-4" id="tr">
            <div class="form-group" >

                <label for="projectinput1"> أسم المنتج </label>
                <input type="text" name='product_name'  placeholder='Enter Product Name' class="form-control"/>
                @error("product_name")
                <span class="text-danger"> هذا الحقل مطلوب</span>
                @enderror
            </div>
        </div>
        <div class="col-lg-4" id="tr">
            <div class="form-group" >
                <label for="projectinput1"> الوصف</label>

                <input type="text" name='description'  placeholder='Enter Product' class="form-control"/>
                @error("description")
                <span class="text-danger"> هذا الحقل مطلوب</span>
                @enderror
            </div>
        </div>

        <div class="col-lg-4" id="tr">
            <div class="form-group" >
                <label for="projectinput1"> العدد  </label>
                <input type="number" name='count_proud' placeholder='Enter Qty' class="form-control qty" step="0" min="0"/>
                @error("count_proud")
                <span class="text-danger"> هذا الحقل مطلوب</span>
                @enderror
            </div>
        </div>
        <div class="col-lg-4" id="tr">
            <div class="form-group " >
                <label for="projectinput1"> سعر الشراء  </label>
                <input type="number" name='buy_price' placeholder='Enter Unit Price' class="form-control price" step="0.00" min="0"/>

                @error("buy_price")
                <span class="text-danger"> هذا الحقل مطلوب</span>
                @enderror
            </div>
        </div>
        <div class="col-lg-4" id="tr">
            <div class="form-group" >
                <label for="projectinput1"> أضافة ال 20%   </label>
                <input type="number" class="form-control" id="tax" placeholder="0">

                @error("commision")
                <span class="text-danger"> هذا الحقل مطلوب</span>
                @enderror
            </div>
        </div>
        <div class="col-lg-4" id="tr">
            <div class="form-group " >
                <label for="projectinput1">  ال 20%   </label>
                <input type="number" name='tax_amount' id="tax_amount" placeholder='0.00' class="form-control" readonly/>

                @error("commision")
                <span class="text-danger"> هذا الحقل مطلوب</span>
                @enderror
            </div>
        </div>
        <div class="col-lg-4" id="tr">
            <div class="form-group ">
                <label for="projectinput1">اجمالي السعر  </label>
                <input type="number" name='total_price' id="total_amount" placeholder='0.00' class="form-control" readonly/>


                @error("total_pric")
                <span class="text-danger"> هذا الحقل مطلوب</span>
                @enderror
            </div>
        </div>
    </div>

    <div class="col-lg-4" id="tr">
        <div class="form-group " >
            <label for="projectinput1"> سعر البيع  </label>

            <input type="number" name='selling_price' placeholder='0.00' class="form-control" />
            @error("selling_price")
            <span class="text-danger"> هذا الحقل مطلوب</span>
            @enderror
        </div>
    </div>





    <div class="row">
        <div class="col-md-6">
            <div class="form-group mt-1">
                <input type="checkbox" value="1"
                       name="active"
                       id="switcheryColor4"
                       class="switchery" data-color="success"
                       checked/>
                <label for="switcheryColor4"
                       class="card-title ml-1">الحالة   </label>

                @error("active")
                <span class="text-danger"> </span>
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







    @extends('layouts.admin')
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>

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
                                <li class="breadcrumb-item"><a href="{{route('admin.stors.create')}}">أضافة مخزون جديد</a>
                                </li>
                                <li class="breadcrumb-item active">كل المخزون
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
                                    <h4 class="card-title" id="basic-layout-form"> أضافة مخزون  </h4>
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
                                <div class="card-content  show">
                                    <div class="card-body">

                                        <div class="card-body" >

                                            <form class="form"  action="{{route('admin.stors.store')}}"
                                                  method="POST"
                                                  enctype="multipart/form-data" >
                                                @csrf
                                                <div class="container">
                                                    <div class="row clearfix">
                                                        <div class="col-md-12">
                                                            <table class="table table-bordered table-hover" id="tab_logic">
                                                                <thead>
                                                                <tr>
                                                                    <th class="text-center"> # </th>
                                                                    <th class="text-center"> Product </th>
                                                                    <th class="text-center"> Qty </th>
                                                                    <th class="text-center"> Price </th>
                                                                    <th class="text-center"> Total </th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                <tr id='addr0'>
                                                                    <td>1</td>
                                                                    <td><input type="text" name='product[]'  placeholder='Enter Product Name' class="form-control"/></td>
                                                                    <td><input type="number" name='qty[]' placeholder='Enter Qty' class="form-control qty" step="0" min="0"/></td>
                                                                    <td><input type="number" name='price[]' placeholder='Enter Unit Price' class="form-control price" step="0.00" min="0"/></td>
                                                                    <td><input type="number" name='total[]' placeholder='0.00' class="form-control total" readonly/></td>
                                                                </tr>
                                                                <tr id='addr1'></tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="row clearfix">
                                                        <div class="col-md-12">
                                                            <button id="add_row" class="btn btn-default pull-left">Add Row</button>
                                                            <button id='delete_row' class="pull-right btn btn-default">Delete Row</button>
                                                        </div>
                                                    </div>
                                                    <div class="row clearfix" style="margin-top:20px">
                                                        <div class="pull-right col-md-4">
                                                            <table class="table table-bordered table-hover" id="tab_logic_total">
                                                                <tbody>
                                                                <tr>
                                                                    <th class="text-center">Sub Total</th>
                                                                    <td class="text-center"><input type="number" name='sub_total' placeholder='0.00' class="form-control" id="sub_total" readonly/></td>
                                                                </tr>
                                                                <tr>
                                                                    <th class="text-center">Tax</th>
                                                                    <td class="text-center"><div class="input-group mb-2 mb-sm-0">
                                                                            <input type="number" class="form-control" id="tax" placeholder="0">
                                                                            <div class="input-group-addon">%</div>
                                                                        </div></td>
                                                                </tr>
                                                                <tr>
                                                                    <th class="text-center">Tax Amount</th>
                                                                    <td class="text-center"><input type="number" name='tax_amount' id="tax_amount" placeholder='0.00' class="form-control" readonly/></td>
                                                                </tr>
                                                                <tr>
                                                                    <th class="text-center">Grand Total</th>
                                                                    <td class="text-center"><input type="number" name='total_amount' id="total_amount" placeholder='0.00' class="form-control" readonly/></td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
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

    <script>
        $(document).ready(function(){
            var i=1;


            $('#tab_logic tbody').on('keyup change',function(){
                calc();
            });
            $('#tax').on('keyup change',function(){
                calc_total();
            });


        });

        function calc()
        {
            $('#tab_logic tbody tr').each(function(i, element) {
                var html = $(this).html();
                if(html!='')
                {
                    var qty = $(this).find('.qty').val();
                    var price = $(this).find('.price').val();
                    $(this).find('.total').val(qty*price);

                    calc_total();
                }
            });
        }

        function calc_total()
        {
            total=0;
            $('.total').each(function() {
                total += parseInt($(this).val());
            });
            $('total').val(total.toFixed(2));
            tax_sum=total/100*$('#tax').val();
            $('#tax_amount').val(tax_sum.toFixed(2));
            $('#total_amount').val((tax_sum+total).toFixed(2));
        }
    </script>

    @endsection
