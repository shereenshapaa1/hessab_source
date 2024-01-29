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
    <input class="form-control wizard-required" required type="number" name="mobile"  value="{{ old('mobile') }}"  />
   
    <div class="wizard-form-error">
        <span class="mb-3">@lang('validation.required',['attribute'=>
            __('validation.attributes.mobile')])
        </span>
    </div>
</div>
 
<div class="form-group">
<label class="wizard-form-text-label">  نوع العقار </label>

    <select class="form-control"  id="type_id" name="type_id">
        <option value="" hidden selected></option>

        @if (!empty($result['types']))
            @foreach ($result['types'] as $type)
                <option value="{{ $type->id }}">{{ $type->title }}</option>
            @endforeach
        @endif

    </select>

</div>
<div class="form-group">
      <label class="wizard-form-text-label" for="real_estate_area"> المساحة </label>
    <input class="form-control wizard-required"  type="number" name="real_estate_area" />
</div>



<div class="form-group">
      <label class="wizard-form-text-label" for="real_estate_area"> عدد الأدوار </label>
    <input value="0" class="form-control "  type="number" name="number_turns" />

</div>

<div class="form-group">
      <label class="wizard-form-text-label"> المنطقة - المدينة </label>
    <input  class="form-control" type="text" name="location" id="location" />
  
</div>

<div class="form-group">
    <label class="wizard-form-text-label">الغرض من التقييم</label>
    <select  class="form-control" id="sector" name="goal_id">
        <option hidden selected></option>
        @if (!empty($result['goals']))
            @foreach ($result['goals'] as $goal)
                <option value="{{ $goal->id }}">{{ $goal->title }}</option>
            @endforeach
        @endif
    </select>
  
</div>
@if(config('services.recaptcha.key'))
    <div class="g-recaptcha"
        data-sitekey="{{config('services.recaptcha.key')}}">
    </div>
@endif




