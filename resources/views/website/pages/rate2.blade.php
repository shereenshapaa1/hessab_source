@extends('website.layouts.app')
@section('title', 'طلب تقييم عقارى معتمد')

@section('content')


    <link rel="stylesheet" href="{{ asset('/rate/css/style.css') }}">


    <section class="wizard-section">
        <div class="row no-gutters  justify-content-center">
       
            <div class="col-11 col-sm-9 col-md-8 col-lg-6 text-center p-0 mt-3 mb-2">
         
                <div class="form-wizard">
             

              


                    <form id="form" role="form" action="{{ route('website.rate-request.checknumber') }}" method="post"
                        enctype='multipart/form-data'>
                        <h2 class=" ltn__secondary-color-3"><strong>تتبع طلب تقييم  </strong></h2>
                        @csrf
                        @include('flash::message')

                            <div class="col-xs-12">
                                <div class="row">
                                <div class="col-md-12">
                                    <h6 class="fs-title"> أدخل رقم تتبع الطلب</h6>

                                    <div class="form-group">
                                    <input placeholder="رقم التتبع" type="number" required class="form-control wizard-required" id="sector" name="request_no">
       
                                   <div class="wizard-form-error">
                                   <span class="mb-3">@lang('validation.required',['attribute'=>
                                         __('validation.attributes.request_no')])
                                    </span>
                                </div>
                                    </div>
                                </div>

                                <!--<div class="col-md-6">-->
                                <!--    <h6 class="fs-title">    أختار نوع التقييم</h6>-->

                                <!--    <div class="form-group">-->
                                <!--        <select aria-placeholder="رجاء اختيار نوع التقييم" name="type"  class="form-control" id="">-->
                                <!--            <option value="1">تقييم عقار</option>-->
                                <!--            <option value="2">تقييم ألات ومعدات</option>-->

                                <!--        </select>-->
       
                                <!--   <div class="wizard-form-error">-->
                                <!--   <span class="mb-3">@lang('validation.required',['attribute'=> __('validation.attributes.request_no')])-->
                                <!--    </span>-->
                                <!--</div>-->
                                <!--    </div>-->
                                <!--</div>-->

                            </div>
                                    <div class="form-group clearfix">
                                    <a href="{{url('/rate-request')}}" class="form-wizard-previous-btn float-left">إلغاء</a>

                                        <button type="submit"  class="form-wizard-next-btn float-right">أرسال</button>
                                    </div>
                            </div>
                                </div>
                                
                            </div>
                  
                    </form>
                </div>

            </div>

        </div>
    </section>

    <!-- End -->
@endsection
@section('js')



    <script src="{{ asset('/js/wizard.js') }}"></script>

 
      

@endsection
