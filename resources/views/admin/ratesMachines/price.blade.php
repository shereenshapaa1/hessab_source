@extends('admin.layouts.app')
@section('tab_name', __('admin.Rates'))
@section('css')
<style>
.table td img,
.jsgrid .jsgrid-table td img {
    width: 200px;
    height: 200px;
    border-radius: 100%;
}
.sorting:before,  .sorting:after{
    display: none;
}

@media print {
    .btn {
        display: none;

    }

    .sidebar {
        display: none;

    }

    .navbar {
        display: none !important;

    }

    .footer {
        display: none;

    }

    .navbar-menu-wrapper {
        display: none;

    }

}
</style>

</style>

@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card px-2">

            <div id="dvContainer" class="card-body">
                <div class="container-fluid">
                    <h3 class="text-right my-5">
                        <center>
                            <img src="{{ $setting->imagePath('logo') ?? asset('/images/logo.png') }}" alt="logo"
                                width="200px" height="200px" />
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
                    <form method="post" >
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
                                        @if(!empty($price))
                                        <input type="text" name="notes" value="{{$price->notes}}">

                                        @else
                                        <input type="text" name="notes">



                                        @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-dark text-left ">أتعاب التقييم</td>
                                        <td class="text-left">
                                            @if(!empty($price))
                                            <input disabled type="text" value="{{$price->price}}" name="price"
                                                id="price">

                                            @else
                                            <input type="text" name="price" id="price">


                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-dark text-left ">نوع الخصم
                                        </td>
                                        <td class="text-left">
                                        @if(!empty($price))
                                        <select disabled name="discount_type" id="discount_type">
                                                <option {{($price->discount_type ==1)? 'selected' : ''}} value="1">نسبة</option>
                                                <option {{($price->discount_type ==2)? 'selected' : ''}}  value="2">مبلغ</option>
                                        </select>
                                        @else
                                        <select name="discount_type" id="discount_type">
                                                <option value="1">نسبة</option>
                                                <option value="2">مبلغ</option>
                                        </select>


                                        @endif
                                         

                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-dark text-left ">الخصم
                                        </td>
                                        <td class="text-left">
                                            @if(!empty($price))
                                            <input disabled type="text" value="{{$price->discount}}" name="discount"
                                                id="discount">

                                            @else
                                            <input type="text" name="discount" id="discount">


                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-dark text-left ">أتعاب بعد الخصم
                                        </td>
                                        <td class="text-left">
                                            @if(!empty($price))
                                            <input disabled type="text" value="{{$price->price_discount}}"
                                                name="price_discount" id="price_discount">

                                            @else
                                            <input disabled type="text" name="price_discount" id="price_discount">


                                            @endif
                                        </td>
                                    <tr>
                                    <tr>
                                        <td class="text-dark text-left "> (15%)الضريبة
                                        </td>
                                        <td class="text-left">
                                         @if(!empty($price))
                                        <input type="text" disabled  value="{{$price->price_tax}}" name="price_tax" id="price_tax">


                                            @else
                                            <input disabled type="text"  value="" name="price_tax" id="price_tax">


                                            @endif


                                        </td>
                                    <tr>

                                    <tr>
                                        <td class="text-dark text-left "> أتعاب التقييم بعد الضريبة
                                        </td>
                                        <td class="text-left">
                                            @if(!empty($price))
                                            <input disabled type="text" value="{{$price->total_price}}"
                                                name="total_price" id="total_price">

                                            @else
                                            <input disabled type="text" name="total_price" id="total_price">


                                            @endif
                                        </td>
                                    <tr>

                                        <td class="text-dark text-left ">خيارات الدفع
                                        </td>
                                        <td class="text-left">
                                        @if(!empty($price))
                                        <select disabled name="discount_type" id="payment_option">
                                                <option value="">أختر </option>
                                                <option {{($price->payment_option ==1)? 'selected' : ''}} value="1">50% - 50%</option>
                                                <option {{($price->payment_option ==2)? 'selected' : ''}} value="2">30% - 70%</option>
                                                <option {{($price->payment_option ==3)? 'selected' : ''}} value="3">100%</option>
                                                <option {{($price->payment_option ==4)? 'selected' : ''}} value="4">70% - 30%</option>
                                        </select>
                                        @else
                                        <select name="payment_option">
                                                <option value="">أختر </option>

                                                <option value="1">50% - 50%</option>
                                                <option value="2">30% - 70%</option>
                                                <option value="3">100%</option>
                                                <option value="4">70% - 30%</option>




                                            </select>



                                        @endif
                                          
                                        </td>
                                    <tr>
                                        <td class="text-dark text-left ">البنك
                                        </td>
                                        <td class="text-left">
                                        @if(!empty($price))
                                        <select disabled name="bank_id" id="bank_id">

                                                @foreach($banks as $bank)
                                                <option {{($price->bank_id ==$bank->id)? 'selected' : ''}} data-iban="{{$bank->iban}}" value="{{$bank->id}}">
                                                    {{$bank->title}}</option>
                                                @endforeach
                                            </select>
                                        @else
                                            <select name="bank_id" id="bank_id">
                                                <option value="">أختر البنك</option>

                                                @foreach($banks as $bank)
                                                <option data-iban="{{$bank->iban}}" value="{{$bank->id}}">
                                                    {{$bank->title}}</option>
                                                @endforeach
                                            </select>
                                            @endif
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-dark text-left ">رقم الأيبان </td>
                                        <td class="text-left">
                                            <input disabled class="form-control" type="text" name="" id="iban">
                                        </td>
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
                @if(empty($price))

<button type="submit" formaction="" action="{{url('admin/ratesMachine/addprice')}}" class="btn btn-success float-right mt-4"><i class="ti-export me-1"></i>حفظ</button>
<button type="button" onClick="window.print()" class="btn btn-primary float-right mt-4 ms-2"><i
    class="ti-printer me-1"></i>طباعة</button>

@else
<button type="button" onClick="window.print()" class="btn btn-primary float-right mt-4 ms-2"><i
    class="ti-printer me-1"></i>طباعة</button>



@endif
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script src=" https://code.jquery.com/jquery-3.5.1.js"></script>
<script>
function print1() {
    window.print();
    // var divContents = $("#dvContainer").html();
    // var printWindow = window.open('', '', 'height=400,width=800');
    // printWindow.document.write(divContents);
    // printWindow.document.close();
    // printWindow.print();

}
</script>
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>

<script>
$(document).ready(() => {
    var selected = $("#bank_id").find('option:selected');
    var iban = selected.data('iban');
    $('#iban').val(iban);
    $("#bank_id").on('change', function()

        {
            var selected = $(this).find('option:selected');
            var iban = selected.data('iban');
            $('#iban').val(iban);


        });
        $('#price').keyup(function(e) {
            var price = parseFloat($("#price").val() || 0);
            var tax=0.15 * price;
            $('#price_tax').val(tax);
            var total_price=price+tax;
            $('#total_price').val(total_price);

        });
    $('#discount').keyup(function(e) {

        let price = parseFloat($("#price").val() || 0);
        var selected = $("#discount_type").find('option:selected');
        let discount_type = selected.val();

        if (discount_type == 1) 
        {

        var discount=price-(($('#discount').val()/100)*(price));
        } else if (discount_type == 2) {
           var discount=price-$('#discount').val();

        }
        $('#price_discount').val(discount);
        var tax=0.15 * discount;
        $('#price_tax').val(tax);
        var total_price=discount+tax;
        $('#total_price').val(total_price);


    });
});
</script>
