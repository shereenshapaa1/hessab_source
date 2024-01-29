@extends('admin.layouts.app')
@section('tab_name', __('admin.Rates'))

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">تحديد الملفات المطلوبة من العميل /
                        @if ($item->id)
                            @lang('admin.Edit') #{{ $item->id }}
                        @else
                            Add
                        @endif
                    </h4>
                    <hr>
                    @if ($item->id)
                        <form class="needs-validation" action="{{ url('admin/rates/updatepeaper/'.$item->id.'') }}" method="POST"
                            enctype='multipart/form-data' novalidate>
                            <input type="hidden" name="_method" value="PUT">
                    @endif
                       
                    @csrf

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row ">
                                <label for="name-field" class="col-sm-3 col-form-label"> @lang('admin.OwnerID')
                                </label>
                                <div class="col-sm-9 ">
                                    <input {{ old('OwnerID', $item->OwnerID) == 1 ? 'checked' : '' }}  type="radio"  value="1" name="OwnerID" id=""> @lang('admin.Yes')
                                    <input {{ old('OwnerID', $item->OwnerID) == 0 ? 'checked' : '' }} type="radio" value="0" name="OwnerID" id=""> @lang('admin.No')


                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row ">
                                <label for="name-field" class="col-sm-3 col-form-label"> @lang('admin.CustomerID')
                                </label>
                                <div class="col-sm-9 ">
                                    <input {{ old('CustomerID', $item->CustomerID) == 1 ? 'checked' : '' }} type="radio" value="1" name="CustomerID" id=""> @lang('admin.Yes')
                                    <input {{ old('CustomerID', $item->CustomerID) == 0 ? 'checked' : '' }} type="radio" value="0" name="CustomerID" id=""> @lang('admin.No')


                                </div>
                            </div>
                        </div> 
                        <div class="col-md-6">
                            <div class="form-group row ">
                                <label for="name-field" class="col-sm-3 col-form-label"> @lang('admin.Planners')
                                </label>
                                <div class="col-sm-9 ">
                                    <input {{ old('Planners', $item->Planners) == 1 ? 'checked' : '' }} type="radio" value="1" name="Planners" id=""> @lang('admin.Yes')
                                    <input {{ old('Planners', $item->Planners) == 0 ? 'checked' : '' }} type="radio" value="0" name="Planners" id=""> @lang('admin.No')


                                </div>
                            </div>
                        </div>
                         <div class="col-md-6">
                            <div class="form-group row ">
                                <label for="name-field" class="col-sm-3 col-form-label"> @lang('admin.Determine_the_heirs')
                                </label>
                                <div class="col-sm-9 ">
                                    <input {{ old('Determine_the_heirs', $item->Determine_the_heirs) == 1 ? 'checked' : '' }} type="radio" value="1" name="Determine_the_heirs" id=""> @lang('admin.Yes')
                                    <input {{ old('Determine_the_heirs', $item->Determine_the_heirs) == 0 ? 'checked' : '' }} type="radio" value="0" name="Determine_the_heirs" id=""> @lang('admin.No')


                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row ">
                                <label for="name-field" class="col-sm-3 col-form-label"> @lang('admin.Technical_Inspection')
                                </label>
                                <div class="col-sm-9 ">
                                    <input {{ old('Technical_Inspection', $item->Technical_Inspection) == 1 ? 'checked' : '' }} type="radio" value="1" name="Technical_Inspection" id=""> @lang('admin.Yes')
                                    <input {{ old('Technical_Inspection', $item->Technical_Inspection) == 0 ? 'checked' : '' }} type="radio" value="0" name="Technical_Inspection" id=""> @lang('admin.No')


                                </div>
                            </div>
                        </div> 
                    <div class="col-md-6">
                            <div class="form-group row ">
                                <label for="name-field" class="col-sm-3 col-form-label"> @lang('admin.Lease_contracts')
                                </label>
                                <div class="col-sm-9 ">
                                    <input {{ old('Lease_contracts', $item->Lease_contracts) == 1 ? 'checked' : '' }} type="radio" value="1" name="Lease_contracts" id=""> @lang('admin.Yes')
                                    <input {{ old('Lease_contracts', $item->Lease_contracts) == 0 ? 'checked' : '' }} type="radio" value="0" name="Lease_contracts" id=""> @lang('admin.No')


                                </div>
                            </div>
                        </div> <div class="col-md-6">
                            <div class="form-group row ">
                                <label for="name-field" class="col-sm-3 col-form-label"> @lang('admin.Financial_Statements')
                                </label>
                                <div class="col-sm-9 ">
                                    <input {{ old('Financial_Statements', $item->Financial_Statements) == 1 ? 'checked' : '' }} type="radio" value="1" name="Financial_Statements" id=""> @lang('admin.Yes')
                                    <input {{ old('Financial_Statements', $item->Financial_Statements) == 0 ? 'checked' : '' }} type="radio" value="0" name="Financial_Statements" id=""> @lang('admin.No')


                                </div>
                            </div>
                        </div> <div class="col-md-6">
                            <div class="form-group row ">
                                <label for="name-field" class="col-sm-3 col-form-label"> @lang('admin.Feasibility_study')
                                </label>
                                <div class="col-sm-9 ">
                                    <input {{ old('Feasibility_study', $item->Feasibility_study) == 1 ? 'checked' : '' }} type="radio" value="1" name="Feasibility_study" id=""> @lang('admin.Yes')
                                    <input {{ old('Feasibility_study', $item->Feasibility_study) == 0 ? 'checked' : '' }} type="radio" value="0" name="Feasibility_study" id=""> @lang('admin.No')


                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group row ">
                                <label for="name-field" class="col-sm-3 col-form-label"> @lang('admin.Other_documents')
                                </label>
                                <div class="col-sm-9 ">
                                    <input {{ old('Other_documents', $item->Other_documents) == 1 ? 'checked' : '' }} type="radio" value="1" name="Other_documents" id=""> @lang('admin.Yes')
                                    <input {{ old('Other_documents', $item->Other_documents) == 0 ? 'checked' : '' }} type="radio" value="0" name="Other_documents" id=""> @lang('admin.No')


                                </div>
                            </div>
                        </div>

                    

                    


                     



                        <div class="col-md-12"></div>

                     

                        <div class="col-md-12">
                            <hr>
                            <button type="submit" name="action" value="save"
                                class="btn btn-primary">@lang('admin.Save')</button>

                            <a class="btn btn-danger pull-right text-white" href="{{ route('admin.rates.index') }}">
                                @lang('admin.Cancel')<i class="mdi mdi-arrow-left-bold"></i></a>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script src="{{ asset('/panel/js/upload.js') }}"></script>
    <script src="{{ asset('/panel/js/validate.js') }}"></script>
@endsection
