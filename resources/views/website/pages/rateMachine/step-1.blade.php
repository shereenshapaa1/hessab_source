<div class="form-group">
       <label class="wizard-form-text-label">الاسم <span>*</span></label>
    <input class="form-control wizard-required" required="required" type="text" name="name"
        value="{{ old('name') }}" />
 
    <div class="wizard-form-error">

        <span class="mb-3">@lang('validation.required',['attribute'=> __('validation.attributes.name')])
        </span>
    </div>
</div>
<div class="form-group">
     <label class="wizard-form-text-label">رقم الجوال يبدا ب 05 <span>*</span></label>
    <input class="form-control wizard-required" required type="tel" name="mobile" value="{{ old('mobile') }}"  />
   
    <div class="wizard-form-error">
        <span class="mb-3">@lang('validation.required',['attribute'=>
            __('validation.attributes.mobile')])
        </span>
    </div>
</div>
<div class="form-group">
     <label class="wizard-form-text-label"> البريد الاكتروني <span>*</span></label>
    <input class="form-control wizard-required" required type="email" name="email" value="{{ old('email') }}" />
   

    <div class="wizard-form-error">
        <span class="mb-3">@lang('validation.required',['attribute'=>
            __('validation.attributes.email')])
        </span>
    </div>
</div>
<div class="form-group">
<label class="wizard-form-text-label">  نوع الأصل <span>*</span></label>
    <input class="form-control wizard-required" required type="text" name="type_id" value="{{ old('type_id') }}" />

    <!--<select class="form-control"  id="type_id" name="type_id">-->
    <!--    <option value="" hidden selected></option>-->

    <!--    @if (!empty($result['types']))-->
    <!--        @foreach ($result['types'] as $type)-->
    <!--            <option value="{{ $type->id }}">{{ $type->title }}</option>-->
    <!--        @endforeach-->
    <!--    @endif-->

    <!--</select>-->
    <!--<label class="wizard-form-text-label" for="type_id"> نوع العقار محل التقييم<span>*</span></label>-->
    <div class="wizard-form-error">
        <span class="mb-3">@lang('validation.required',['attribute'=>
            __('validation.attributes.type_id')])
        </span>
    </div>


</div>

<div class="form-group">
    <label class="wizard-form-text-label">   تفاصيل الطلب  </label>
    <textarea class="form-control" rows="6" name="notes"></textarea>
    

    <div class="wizard-form-error">
        <span class="mb-3">@lang('validation.required',['attribute'=>
            __('validation.attributes.notes')])
        </span>
    </div>

</div>


<div class="form-group">
      <label class="wizard-form-text-label"> المنطقة - المدينة <span>*</span></label>
    <input required class="form-control wizard-required" type="text" name="location" id="location" />
  
    <div class="wizard-form-error">
        <span class="mb-3">@lang('validation.required',['attribute'=>
            __('validation.attributes.location')])
        </span>
    </div>
</div>

@if(config('services.recaptcha.key'))
    <div class="g-recaptcha"
        data-sitekey="{{config('services.recaptcha.key')}}">
    </div>
@endif


