@extends('layouts.admin')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>

<link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
<script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>
<!-- (Optional) Latest compiled and minified JavaScript translation files -->


@section('content')

    <style>
        .selected-products {
            position: relative;
            box-shadow: 0 0 8px 5px #eee;
            padding: 10px;
            background: #fdfdfd;
            margin-bottom: 15px;
        }

        .selected-products h5:first-of-type {
            font-family: 'Cairo', sans-serif;
            position: absolute;
            top: -13px;
            left: 39%;
            right: 39%;
            background-color: #fff;
            padding: 2px 10px;
            border: 1px solid #cecece;
            border-radius: 15px;
            text-align: center;
            font-size: 14px;
        }

        .selected-products .box {
            padding: 10px;
        }

        .selected-products .box .col-md-6 div:first-of-type {
            height: 50%;
            margin-bottom: 5px
        }

        .selected-products .box .col-md-6 div:last-of-type {
            height: 50%;
        }

        .selected-products .box .col-md-6 div label {
            width: 75px;
            font-weight: bold;
        }

        .selected-products .box .col-md-6 .number-products-selected label {
            width: 110px;
        }
    </style>

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">الرئيسية</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{route('admin.orders.create')}}">أضافة اوردر
                                        جديد</a>
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
                                    <h4 class="card-title" id="basic-layout-form"> أضافة الاوردرات </h4>
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
                                    <div class="card-body" id="tab_logic">

                                        <form class="form" action="{{route('admin.orders.store')}}"

                                              method="POST"
                                              enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-body" id="tbody">

                                                <h4 class="form-section"><i class="ft-home"></i>بيانات الاوردرات </h4>
                                                <div class="row" id="tr">
                                                    <div class="col-lg-3">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> القناه الطلب </label>
                                                            <select name="sales_channel" class="form-control"
                                                                    id="select-state">
                                                                <option value="" >لا يوجد بيان</option>

                                                            @if(!empty($chanels) && count($chanels) > 0)
                                                                    @foreach($chanels as $chels)
                                                                        <option class=""
                                                                                value="{{$chels->id}}">{{$chels->chann_name}}
                                                                           </option>
                                                                    @endforeach
                                                                @else
                                                                @endif


                                                            </select>
                                                            @error("sales_channel")
                                                            <span class="text-danger"> هذا الحقل مطلوب</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> أسم العميل </label>

                                                            <input type="text" value="" id="name"
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
                                                                   name="num_phone"/>
                                                            @error("num_phone")
                                                            <span class="text-danger"> هذا الحقل مطلوب</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> حاله الاوردر </label>

                                                            <select name="status_order" class="form-control"
                                                                    id="select-state">
                                                                <option value="">اختر التقيم</option>
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
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> مكونات الاوردر </label>

                                                            <select class="choices-multiple-remove-button" multiple
                                                                    name="orders[]"
                                                                    id="products-selector" multiple="multiple">
                                                                @if(!empty($allsrors) && count($allsrors) > 0)
                                                                    @foreach($allsrors as $orders)
                                                                        <option class=""
                                                                                value="{{$orders->id}}">{{$orders->product_name}}
                                                                            / {{$orders->description}}</option>
                                                                    @endforeach
                                                                @else
                                                                    <option value="" >لا يوجد بيان</option>
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> الهدايا </label>

                                                            <select class="choices-multiple-remove-button" multiple
                                                                    name="gift[]"
                                                                    id="jform_params_foreignmanuf" multiple="multiple">
                                                                @if(!empty($allsrors) && count($allsrors) > 0)
                                                                    @foreach($allsrors as $orders)
                                                                        <option class=""
                                                                                value="{{$orders->id}}">{{$orders->product_name}}
                                                                            / {{$orders->description}}</option>
                                                                    @endforeach
                                                                @else
                                                                    <option value="">لا يوجد بيان</option>
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="selected-products">
                                                            <h5>تفاصيل مكونات الاوردر</h5>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> شركة الشحن </label>
                                                            <select name="shipping_company" class="form-control"
                                                                    id="select-state">

                                                                <option value="">اختر الشركة</option>
                                                                @if(!empty($allshipin) && count($allshipin) > 0)
                                                                    @foreach($allshipin as $shipin)
                                                                        <option
                                                                            value="{{$shipin->id}}"> {{$shipin->shipp_name}}</option>
                                                                    @endforeach
                                                                @else
                                                                    <option value="">لا يوجد شركات شحن</option>
                                                                @endif

                                                            </select>

                                                            @error("")
                                                            <span class="text-danger"> هذا الحقل مطلوب</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> أجمالي سعر المنتجات </label>
                                                            <input type="text" value="" id="total_products_price"
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
                                                            <label for="projectinput1"> الخصم </label>
                                                            <input type="text" value="" id="discount"
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
                                                            <label for="projectinput1"> الشحن </label>
                                                            <input type="text" value="" id="shipping_price"
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
                                                            <label for="projectinput1"> أجملي قيمة الاودر </label>
                                                            <input type="text" value="" id="total_value_order"
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
                                                            <label for="projectinput1"> صافي الشحن </label>
                                                            <input type="text" value="" id="net_shipping"
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
                                                            <label for="projectinput1"> تكلفة الاوردر </label>
                                                            <input type="text" value="" id="cost_order"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   name="cost_order" >

                                                            @error("cost_order")
                                                            <span class="text-danger"> هذا الحقل مطلوب</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> ربح الاوردر </label>
                                                            <input type="text" value="" id="order_won"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   name="order_won" >

                                                            @error("order_won")
                                                            <span class="text-danger"> هذا الحقل مطلوب</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> تقييم العميل </label>
                                                            <select name="customer_evaluation" class="form-control"
                                                                    id="select-state">
                                                                <option value="">اختر التقيم</option>
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
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">عنوان العميل</label>
                                                            <textarea id="froala-editor"
                                                                      class="form-control"
                                                                      placeholder="  "
                                                                      name="adress_clinte"> </textarea>
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
                                                                      name="nots"> </textarea>
                                                            @error("nots")
                                                            <span class="text-danger"> هذا الحقل مطلوب</span>
                                                            @enderror
                                                        </div>
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
    <script>
        $(document).ready(function () {

            let multipleCancelButton = new Choices('.choices-multiple-remove-button', {
                    removeItemButton: true,
                    // maxItemCount: 5,
                    // searchResultLimit: 5,
                    // renderChoiceLimit: 5
                }),
                productsSelector = document.getElementById('products-selector')

            $("#jform_params_foreignmanuf").on('click', function () {
                var count = $("select[id$=jform_params_foreignmanuf] option:selected").length;
                $("#jform_params_manucounter").val(count);

                var val = [];
                $("#jform_params_foreignmanuf option:selected").each(function () {
                    val.push($(this).text());
                });
                $("#jform_params_manuvalue").text(val.join(','));
            });

            // selected product handling
            // fetch product data info {When add item}
            $('#products-selector').on('change', function () {
                let selectedProducts = $(this).children('option:selected')
                $.each(selectedProducts, (index, item) => {
                    let productId = $(item).val()
                    if($(`#product-no-${productId}`).length === 0){
                        fetch(`/orders/get-product-info/${productId}`, {
                            type: 'get',
                        }).then(res => res.json()).then(data => {
                            $('.selected-products').append('<div class="box" id="product-no-'+data.id+'" data-id="'+productId+'">' +
                                '  <div class="row">' +
                                '   <input type="hidden" name="products['+index+'][id]" value="'+data.id+'">' +
                                '   <input type="hidden" name="products['+index+'][name]" value="'+data.product_name+'">' +
                                '   <input type="hidden" name="products['+index+'][description]" value="'+data.description+'">' +
                                '   <input type="hidden" name="products['+index+'][total_amount]" value="'+data.total_amount+'">' +
                                '   <input type="hidden" class="items-count-input" name="products['+index+'][count]" value="1">' +
                                // '   <input type="hidden" class="buy-price" name="products['+index+'][profit]" ' +
                                // '          data-buyval="'+data.buy_price+'" value="'+(parseInt(data.selling_price)-parseInt(data.buy_price))+'">' +
                                '       <div class="col-md-6">' +
                                '           <div class="product-name">' +
                                '               <label>اسم المنتج:</label>' +
                                '               <span>'+data.product_name+'</span>' +
                                '           </div>' +
                                '           <div class="product-price">' +
                                '               <label>سعر الوحدة:</label>' +
                                '               <span class="price">'+data.total_amount+'</span>' +
                                '           </div>' +
                                '       </div>' +
                                '       <div class="col-md-6">' +
                                '           <div class="number-products-selected d-flex">' +
                                '               <label for="number-products-selected'+productId+'">عددالوحدات</label>' +
                                '               <input class="items-count form-control" id="number-products-selected'+productId+'" ' +
                                '                      type="number" min="1" value="1">' +
                                '           </div>' +
                                '           <div class="product-total-price">' +
                                '               <label>اجمالى سعر هذا المنتج:</label>' +
                                '               <span class="item-total-price">'+data.total_amount+'</span>' +
                                '           </div>' +
                                '       </div>' +
                                '   </div>' +
                                '  <hr></div>')
                            // calculate total price
                            if($('#total_products_price').val() === ''){
                                $('#total_products_price').val(data.total_amount)
                            } else {
                                $('#total_products_price').val($('#total_products_price').val() + data.total_amount)
                            }
                        })
                    }
                })
                setTimeout(function () {
                    handlePrices()
                }, 600)
            })
            // remove product that selected
            productsSelector.addEventListener(
                'removeItem',
                function(event) {
                    let productRemovedId = $(`#product-no-${event.detail.value}`)
                    if(productRemovedId.length === 1){
                        productRemovedId.remove()
                    }
                    if($('.selected-products .box').length === 0){
                        $('#total_products_price').val(0)
                        $('#total_value_order').val(0)
                        $('#cost_order').val(0)
                        $('#order_won').val(0)
                    } else {
                        handlePrices()
                    }
                },
                false,
            );
            // calculate price with count
            $(document).on('keyup', '.number-products-selected input[type="number"]', function () {
                let currentCount = parseInt($(this).val())
                // check value
                if(currentCount === 0 || isNaN(currentCount)){
                    alert('عفوا .. لايمكنك ادخال عدد منتجات ب 0 او بلاقيمة .. قم بتحديد الرقم ثم ادخل الرقم المطلوب')
                    $(this).val(1)
                }
                handlePrices()
            })

            function handlePrices(){
                let productBoxes = $('.selected-products .box'),
                    totalPrice = 0

                $.each(productBoxes, (index, item) => {
                    let itemPrice = parseInt($(item).find('.price').text()),
                        itemCount = parseInt($(item).find('.items-count').val()),
                        buyPrice = parseInt($(item).find('.buy-price').data('buyval'))
                    // collect prices for all items
                    totalPrice += (itemPrice * itemCount)
                    // total price of one product
                    $(item).find('.item-total-price').text(itemPrice * itemCount)
                    $(item).find('.items-count-input').val(itemCount)

                    // $(item).find('.buy-price').val((itemPrice * itemCount) - (buyPrice * itemCount))
                })
                // calculate total products price
                $('#total_products_price').val(totalPrice)

                $('#discount').trigger('keyup')
            }

            $('#discount').on('keyup', function () {
                let totalProductPrice = parseInt($('#total_products_price').val()),
                    discount = parseInt($(this).val()) || 0,
                    shippingPrice = parseInt($('#shipping_price').val()) || 0

                $('#total_value_order').val((totalProductPrice-discount)+shippingPrice)
                $('#net_shipping').trigger('keyup')
            })
            $('#shipping_price').on('keyup', function () {
                let totalProductPrice = parseInt($('#total_products_price').val()),
                    discount = parseInt($('#discount').val()) || 0,
                    shippingPrice = parseInt($(this).val()) || 0

                if(totalProductPrice === 0 || isNaN(totalProductPrice)){
                    alert('يجب تحديد المنتجات اولا')
                } else {
                    $('#total_value_order').val((totalProductPrice-discount)+shippingPrice)
                    $('#discount').trigger('keyup')
                    $('#net_shipping').trigger('keyup')
                }
            })
            $('#net_shipping').on('keyup', function () {
                let netShipping = parseInt($(this).val()) || 0,
                    discount = parseInt($('#discount').val()) || 0,
                    totalProductPrice = parseInt($('#total_products_price').val()) || 0

                $('#cost_order').val(netShipping + totalProductPrice + discount)

                $('#order_won').val((netShipping + totalProductPrice)-totalProductPrice)
            })
        });

    </script>

@endsection
