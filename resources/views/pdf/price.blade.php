<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo&display=swap" rel="stylesheet">
    <!-- plugins:css -->
<link rel="stylesheet" href="{{ asset('/panel/vendors/feather/feather.css') }}">
<link rel="stylesheet" href="{{ asset('/panel/vendors/ti-icons/css/themify-icons.css') }}">
<link rel="stylesheet" href="{{ asset('/panel/vendors/css/vendor.bundle.base.css') }}">
<!-- endinject -->
<!-- Plugin css for this page -->
{{-- <link rel="stylesheet" href="{{ asset('/panel/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}"> --}}
<link rel="stylesheet" href="{{ asset('/panel/vendors/ti-icons/css/themify-icons.css') }}">
{{-- <link rel="stylesheet" type="text/css" href="{{ asset('/panel/js/select.dataTables.min.css') }}"> --}}
<!-- End plugin css for this page -->
<!-- inject:css -->

<link rel="stylesheet" href="{{ asset('/panel/vendors/font-awesome/css/font-awesome.min.css') }}" />
<link rel="stylesheet" href="{{ asset('/panel/vendors/simple-line-icons/css/simple-line-icons.css') }}" />
<link rel="stylesheet" href="{{ asset('/panel/css/vertical-layout-light/style.css') }}">
 <style>
     svg.w-5.h-5 {
    width: 20px !important;
}
 </style>
    <title>Document</title>
    <style>
        .table td img,
        .jsgrid .jsgrid-table td img {
            width: 200px;
            height: 200px;
            border-radius: 100%;
        }
      

</style>
</head>
<body style="font-family: 'Cairo', sans-serif;">
   

<div class="row">
    <div class="col-lg-12">
        <div class="card px-2">

            <div id="dvContainer" class="card-body">
                <div class="container-fluid">
                    <h3 class="text-right my-5">
                        <center>
                            <img src="{{ $setting->imagePath('logo') ?? asset('/images/logo.png') }}" alt="logo"
                                width="100%" height="100%" />
                        </center>
                        <!-- @lang('admin.RatesNo')&nbsp;&nbsp;#RR-{{ $item->id }} -->

                    </h3>

                    <hr>
                </div>
                <div class="container-fluid d-flex justify-content-between">
                    <div class="col-lg-3 ps-0">
                        <p>العميل: {{ $item->name }}</p>
                        <p>المملكة العربية السعودية</p>
                        <p>@lang('admin.date'): {{ \App\Helpers\ArabicDate::format(now(),'d M Y') }}</p>
                    </div>
                    <div class="col-lg-3 pr-0">

                        <p class="text-right">حساب الإستشارات المهنية</p>
                        <p class="mb-0 mt-1">طريق الأمير سعد بن عبد الرحمن الأول</p>
                        <p>الرياض
                            14215</p>

                        <p>الرقم :3612</p>
                    </div>
                </div>
                <br>

                <div class="container-fluid d-flex justify-content-between">
                    <div class="col-lg-3 ps-0">
                        <p>السادة: {{ $item->name }}</p>
                        <p> </p>
                        <p>السلام عليكم و رحمة الله و بركاته ....</p>
                    </div>
                    <div class="col-lg-3 pr-0">

                        <p class="text-right"> تحية طيبة و بعد .....</p>

                    </div>
                </div>
                <div class="container-fluid d-flex justify-content-between">
                    <div class="col-lg-12 ps-0">
                        <p>
                            بناءً على طلبكم يسعدنا تقديم هذا العرض لتقديم خدماتنا المهنية .
                            و نقدر لكم اهتمامكم بالخدمات التي تقدمها شركة حساب للاستشارات المهنية , ونؤكد أن خدمات
                            التقييم التي سيتم تقديمها لكم سيتم إعدادها وفقاً لنظام المقيمين المعتمدين ولوائحه التنفيذية
                            الصادرة من الهيئة السعودية للمقيمين المعتمدين كما أننا سنلتزم في إعدادنا لتقرير التقييم
                            بمعايير التقييم الصادرة من مجلس معايير التقييم الدولية IVSC . <br>
                            مرفق إليكم عرضنا لتقييم الأصول المرفق بياناتها ادناه ويشمل نطاق العمال وأتعاب التقييم وشرط
                            الدفع. نأمل منكم عند الموافقة على هذا العرض توقيعه إلكترونيا من قبل الشخص المخول وإعادة
                            إرساله لنا عن طريق البريد الإلكتروني لنضمن سرعة إنجاز المهمة. <br>

                            لكم خالص التحية .
                        </p>
                    </div>

                </div>

                <div class="container-fluid mt-5 d-flex justify-content-center w-100">
                    <div class="table-responsive w-100">
                        <form method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{$item->id}}">
                            <table class="table" id="example">
                                <thead>
                                    <tr class="bg-dark text-white">

                                        <th>م</th>
                                        <th class=""></th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-dark text-left ">تفاصيل الأصل</td>
                                        <td class="text-left">
                                        @if(!empty($request))
                                        <input type="text" name="notes" value="{{$request->notes}}">

                                        @elseif(!empty($price))
                                        <input type="text" name="notes" value="{{$price->notes}}">



                                        @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-dark text-left ">أتعاب التقييم</td>
                                        <td class="text-left">
                                            @if(!empty($request))
                                            <input disabled type="text" value="{{$request->price}}" name="price"
                                                id="price">

                                             @elseif(!empty($price))
                                            <input type="text" name="price" value="{{$price->price}}" id="price">


                                            @endif
                                        </td>
                                    </tr>
                                    @if((!empty($price) && $price->discount_type !=NULL)|| (!empty($request)&& $request->discount_type !=NULL))

                                    <tr>
                                        <td class="text-dark text-left ">نوع الخصم
                                        </td>
                                        <td class="text-left">
                                        @if(!empty($request))
                                        {{($request->discount_type ==1)? 'نسبة' : 'مبلغ'}}
                                     
                                        
                                        


                                        @endif
                                        @if(!empty($price))
                                        {{($price->discount_type ==1)? 'نسبة' : 'مبلغ'}}
                                     
                                        
                                        


                                        @endif
                                         

                                        </td>
                                    </tr>
                                    @endif
                                    @if((!empty($price) && $price->discount !=NULL)|| (!empty($request)&& $request->discount !=NULL))
                                    <tr>
                                        <td class="text-dark text-left ">الخصم
                                        </td>
                                        <td class="text-left">
                                            @if(!empty($request))
                                            <input disabled type="text" value="{{$request->discount}}" name="discount"
                                                id="discount">

                                           


                                            @endif
                                            @if(!empty($price))
                                            <input disabled type="text" value="{{$price->discount}}" name="discount"
                                                id="discount">                                     
                                        
                                        


                                        @endif
                                        </td>
                                    </tr>
                                    @endif
                                    @if((!empty($price) && $price->price_discount !=NULL)|| (!empty($request)&& $request->price_discount !=NULL))

                                    <tr>
                                        <td class="text-dark text-left ">أتعاب بعد الخصم
                                        </td>
                                        <td class="text-left">
                                            @if(!empty($request))
                                            <input disabled type="text" value="{{$request->price_discount}}"
                                                name="price_discount" id="price_discount">

                                           

                                            @endif
                                            @if(!empty($price))
                                            <input disabled type="text" value="{{$price->price_discount}}" name="discount"
                                                id="discount">                                     
                                        
                                        


                                        @endif
                                        </td>
                                    <tr>
                                        @endif
                                    <tr>
                                        <td class="text-dark text-left "> (15%)الضريبة
                                        </td>
                                        <td class="text-left">
                                         @if(!empty($request))
                                        <input type="text" disabled  value="{{$request->price_tax}}" name="price_tax" id="price_tax">


                                            @endif
                                            @if(!empty($price))
                                            <input disabled type="text" value="{{$price->price_tax}}" name="discount"
                                                id="discount">                                     
                                        
                                        


                                        @endif


                                        </td>
                                    <tr>

                                    <tr>
                                        <td class="text-dark text-left "> أتعاب التقييم بعد الضريبة
                                        </td>
                                        <td class="text-left">
                                            @if(!empty($request))
                                            <input disabled type="text" value="{{$request->total_price}}"
                                                name="total_price" id="total_price">

                                          


                                            @endif
                                            @if(!empty($price))
                                            <input disabled type="text" value="{{$price->total_price}}" name="discount"
                                                id="discount">                                     
                                        
                                        


                                        @endif
                                        </td>
                                    <tr>

                                        <td class="text-dark text-left ">خيارات الدفع
                                        </td>
                                        <td class="text-left">
                                        @if(!empty($request))
                                            @if($request->discount_type==1)
                                            50% - 50%
                                            @elseif($request->discount_type==2)
                                            30% - 70%
                                            @elseif($request->discount_type==3)

                                            100%
                                            @elseif($request->discount_type==4)
                                            70% - 30%

                                            @endif
                                              
                                        @endif

                                        @if(!empty($price))
                                            @if($price->discount_type==1)
                                            50% - 50%
                                            @elseif($price->discount_type==2)
                                            30% - 70%
                                            @elseif($price->discount_type==3)

                                            100%
                                            @elseif($price->discount_type==4)
                                            70% - 30%

                                            @endif
                                              
                                        @endif
                                  
                                          
                                        </td>
                                    <tr>
                                        <td class="text-dark text-left ">البنك
                                        </td>
                                        <td class="text-left">
                                        @if(!empty($bank))
                                        {{$bank->title}}
                                        @endif
                                       
                                      
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-dark text-left ">رقم الأيبان </td>
                                        <td class="text-left">
                                        @if(!empty($bank))
                                        {{$bank->iban}}
                                        @endif                                        </td>
                                    <tr>
                                        <td class="text-dark text-left ">الرقم الضريبى
                                        </td>
                                        <td class="text-left"> 310833742700003
                                        </td>
                                    </tr>




                                </tbody>
                            </table>
                    </div>
                </div>

                <div class="container-fluid w-100">
                   <!-- <a type="button"  onclick="print1()" id="btnPrint" class="btn btn-primary float-right mt-4 ms-2"><i
                        class="ti-printer me-1"></i>طباعة</a> -->
                    <!-- @if(empty($price))

                    <button type="submit" class="btn btn-success float-right mt-4"><i class="ti-export me-1"></i>حفظ
                    </button>
                    @endif -->
                    <!-- @if(empty($price))

                    <button type="submit" formaction="" action="{{url('admin/addprice')}}">حفظ</button>
                    @endif
                    <button type="submit" formaction="{{ url('admin/generatepdf') }}">طباعة</button> -->

                </div>
                </form>

            </div>
        </div>
    </div>
</div>

</body>
</html>