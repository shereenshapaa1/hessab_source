@if($result['RequestRate']->OwnerID==1)

<div class="form-group mb-3">
    <label class="wizard-form-text-label">  صورة هوية المالك</label>
    <input class="form-control" type="file" name="OwnerID_image[]" multiple accept="image/*" />
    <div class="wizard-form-error">
        <span class="mb-3">@lang('validation.required',['attribute'=>
            __('validation.attributes.OwnerID')])
        </span>
    </div>
</div>

@endif
@if($result['RequestRate']->CustomerID==1)

<div class="form-group mb-3">
    <label class="wizard-form-text-label">  صورة هوية العميل</label>
    <input class="form-control" type="file" name="CustomerID_image[]" multiple accept="image/*" />
    <div class="wizard-form-error">
        <span class="mb-3">@lang('validation.required',['attribute'=>
            __('validation.attributes.CustomerID')])
        </span>
    </div>
</div>

@endif
@if($result['RequestRate']->Instrument==1)

<div class="form-group mb-3">
    <label class="wizard-form-text-label">  صورة  الصك</label>
    <input class="form-control" type="file" name="Instrument_image[]" multiple accept="image/*" />
    <div class="wizard-form-error">
        <span class="mb-3">@lang('validation.required',['attribute'=>
            __('validation.attributes.Instrument')])
        </span>
    </div>
</div>

@endif
@if($result['RequestRate']->Planners==1)

<div class="form-group mb-3">
    <label class="wizard-form-text-label">  صورة  المخطاطات</label>
    <input class="form-control" type="file" name="Planners_image[]" multiple accept="image/*" />
    <div class="wizard-form-error">
        <span class="mb-3">@lang('validation.required',['attribute'=>
            __('validation.attributes.Planners')])
        </span>
    </div>
</div>

@endif
@if($result['RequestRate']->Determine_the_heirs==1)

<div class="form-group mb-3">
    <label class="wizard-form-text-label">  حصر الورثة  </label>
    <input class="form-control" type="file" name="Determine_the_heirs_image[]" multiple accept="image/*" />
    <div class="wizard-form-error">
        <span class="mb-3">@lang('validation.required',['attribute'=>
            __('validation.attributes.Determine_the_heirs')])
        </span>
    </div>
</div>

@endif
@if($result['RequestRate']->Technical_Inspection==1)

<div class="form-group mb-3">
    <label class="wizard-form-text-label"> الفحص الفنى</label>
    <input class="form-control" type="file" name="Technical_Inspection_image[]" multiple accept="image/*" />
    <div class="wizard-form-error">
        <span class="mb-3">@lang('validation.required',['attribute'=>
            __('validation.attributes.Technical_Inspection')])
        </span>
    </div>
</div>

@endif
@if($result['RequestRate']->Lease_contracts==1)

<div class="form-group mb-3">
    <label class="wizard-form-text-label">  عقود الإيجار</label>
    <input class="form-control" type="file" name="Lease_contracts_image[]" multiple accept="image/*" />
    <div class="wizard-form-error">
        <span class="mb-3">@lang('validation.required',['attribute'=>
            __('validation.attributes.Lease_contracts')])
        </span>
    </div>
</div>

@endif
@if($result['RequestRate']->Financial_Statements==1)

<div class="form-group mb-3">
    <label class="wizard-form-text-label">  القوائم المالية</label>
    <input class="form-control" type="file" name="Financial_Statements_image[]" multiple accept="image/*" />
    <div class="wizard-form-error">
        <span class="mb-3">@lang('validation.required',['attribute'=>
            __('validation.attributes.Financial_Statements')])
        </span>
    </div>
</div>

@endif
@if($result['RequestRate']->Feasibility_study==1)

<div class="form-group mb-3">
    <label class="wizard-form-text-label">دراسة جدوى</label>
    <input class="form-control" type="file" name="Feasibility_study_image[]" multiple accept="image/*" />
    <div class="wizard-form-error">
        <span class="mb-3">@lang('validation.required',['attribute'=>
            __('validation.attributes.Feasibility_study')])
        </span>
    </div>
</div>

@endif
@if($result['RequestRate']->Other_documents==1)

<div class="form-group mb-3">
    <label class="wizard-form-text-label">  مستندات أخرى</label>
    <input class="form-control" type="file" name="Other_documents_image[]" multiple accept="image/*" />
    <div class="wizard-form-error">
        <span class="mb-3">@lang('validation.required',['attribute'=>
            __('validation.attributes.Other_documents')])
        </span>
    </div>
</div>

@endif


<div class="form-group">
     <label class="wizard-form-text-label" for="entity_id">   طالب التقييم </label>
    <select required class="form-control wizard-required" id="sector" name="entity_id">
        <option value="" hidden selected></option>

        @if (!empty($result['entities']))
            @foreach ($result['entities'] as $entity)
                <option value="{{ $entity->id }}">{{ $entity->title }}</option>
            @endforeach
        @endif
    </select>
   
    <div class="wizard-form-error">
        <span class="mb-3">@lang('validation.required',['attribute'=>
            __('validation.attributes.entity_id')])
        </span>
    </div>


</div>



<div class="form-group mb-3">
    <label class="wizard-form-text-label">  موعد معاينة العقار</label>
    <input class="form-control" type="datetime-local" name="appointment"  />
    <div class="wizard-form-error">
        <span class="mb-3">@lang('validation.required',['attribute'=>
            __('validation.attributes.appointment')])
        </span>
    </div>
</div>

<!--<div class="form-group">-->
<!--    <div id="mapCanv" style="width:100%;height:400px"></div>-->
<!--    <input type="hidden" class="locationId" name="latitude" id="latitude" />-->
<!--    <input type="hidden" class="locationId" name="longitude" id="longitude" />-->

<!--</div>-->




