<div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" nav-item"><a href="{{route('admin.dashboard')}}"><i class="la la-home"></i><span class="menu-title" data-i18n="nav.dash.main">الرئسية</span></a>

            </li>
            <li class=" nav-item"><a href="#"><i class="la la-television"></i><span class="menu-title" data-i18n="nav.templates.main">العمليات </span></a>
                <ul class="menu-content">
                    <li><a class="menu-item" href="{{route('admin.statment')}}" data-i18n="nav.templates.vert.main">بيان العمليات الحسابية</a>
                        <ul class="menu-content">
                            <li><a class="menu-item" href="{{route('admin.statment')}}"
                                   data-i18n="nav.templates.vert.classic_menu">كل البيان</a>
                            </li>
                            <li><a class="menu-item" href="{{route('admin.statment.create')}}">أضافة بيان </a>
                            </li>

                        </ul>
                    </li>
                    <li><a class="menu-item" href="{{route('admin.shippcomp')}}" data-i18n="nav.templates.vert.main">شركات الشحن </a>
                        <ul class="menu-content">
                            <li><a class="menu-item" href="{{route('admin.shippcomp')}}"
                                   data-i18n="nav.templates.vert.classic_menu">كل البيان</a>
                            </li>
                            <li><a class="menu-item" href="{{route('admin.shippcomp.create')}}">أضافة بيان </a>
                            </li>

                        </ul>
                    </li>
                    <li><a class="menu-item" href="{{route('admin.channels')}}" data-i18n="nav.templates.vert.main">قنوات البيع  </a>
                        <ul class="menu-content">
                            <li><a class="menu-item" href="{{route('admin.channels')}}"
                                   data-i18n="nav.templates.vert.classic_menu">كل قنوات البيع</a>
                            </li>
                            <li><a class="menu-item" href="{{route('admin.channels.create')}}">أضافة قناه بيع </a>
                            </li>

                        </ul>
                    </li>
                </ul>
            </li>



            <li class=" nav-item"><a href="#"><i class="la la-television"></i><span class="menu-title" data-i18n="nav.templates.main">الاوردرات</span><span class="badge badge badge-info badge-pill float-right mr-2">{{App\Models\Order::count()}}</span></a>
                <ul class="menu-content">
                    <li><a class="menu-item" href="{{route('admin.orders')}}" data-i18n="nav.templates.vert.main">كل الاوردرات</a>

                    </li>
                    <li><a class="menu-item" href="{{route('admin.orders.create')}}" data-i18n="nav.templates.horz.main">أضافة اوردر</a>

                    </li>
                </ul>
            </li>
{{--            <li class=" nav-item"><a href="#"><i class="la la-columns"></i><span class="menu-title" data-i18n="nav.page_layouts.main">الفواتير</span><span class="badge badge badge-pill badge-danger float-right mr-2">New</span></a>--}}
{{--                <ul class="menu-content">--}}
{{--                    <li><a class="menu-item" href="layout-1-column.html" data-i18n="nav.page_layouts.1_column">الف</a>--}}
{{--                    </li>--}}
{{--                    <li><a class="menu-item" href="layout-2-columns.html" data-i18n="nav.page_layouts.2_columns">2 columns</a>--}}
{{--                    </li>--}}



{{--                </ul>--}}
{{--            </li>--}}
     <li class=" nav-item"><a href="#"><i class="la la-columns"></i><span class="menu-title" data-i18n="nav.page_layouts.main">بوليصة الشحن</span><span class="badge badge badge-info badge-pill float-right mr-2">{{App\Models\Bill::count()}}</span></a>
                <ul class="menu-content">
                    <li><a class="menu-item" href="{{route('admin.bills.create')}}" data-i18n="nav.page_layouts.1_column">عمل بوليضه</a>
                    </li>
                    <li><a class="menu-item" href="{{route('admin.bills')}}" data-i18n="nav.page_layouts.2_columns">كل بوليصه الشحن</a>
                    </li>



                </ul>
            </li>
<li class=" nav-item"><a href="#"><i class="la la-columns"></i><span class="menu-title" data-i18n="nav.page_layouts.main">حسابات </span><span class="badge badge badge-info badge-pill float-right mr-2">{{App\Models\Acounte::count()}}</span></a>
                <ul class="menu-content">
                    <li><a class="menu-item" href="{{route('admin.acounts.create')}}" data-i18n="nav.page_layouts.1_column">أضافه</a>
                    </li>
                    <li><a class="menu-item" href="{{route('admin.acounts')}}" data-i18n="nav.page_layouts.2_columns">تقارير</a>
                    </li> <li><a class="menu-item" href="{{route('admin.acounts.creatbalancee')}}" data-i18n="nav.page_layouts.2_columns">اضافة رصيد خزنه</a>
                    </li>



                </ul>
            </li>

<li class=" nav-item"><a href="#"><i class="la la-columns"></i><span class="menu-title" data-i18n="nav.page_layouts.main">المخزن </span><span class="badge badge badge-pill badge-danger float-right mr-2">{{App\Models\Store::count()}}</span></a>
                <ul class="menu-content">
                    <li><a class="menu-item" href="{{route('admin.stors.create')}}" data-i18n="nav.page_layouts.1_column">أضافه</a>
                    </li>
                    <li><a class="menu-item" href="{{route('admin.stors')}}" data-i18n="nav.page_layouts.2_columns">كل المخزون</a>
                    </li>



                </ul>
            </li>
<li class=" nav-item"><a href="{{route('admin.reports')}}"><i class="la la-columns"></i><span class="menu-title" data-i18n="nav.page_layouts.main">التقارير </span></a>

            </li>


        </ul>
    </div>
</div>


