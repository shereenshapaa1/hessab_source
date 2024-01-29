@extends('admin.layouts.app')
@section('tab_name', __('admin.Banks'))
@section('css')
    <link rel="stylesheet" href="{{ asset('/panel/vendors/dropify/dropify.min.css') }}">
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-name">@lang('admin.Banks') /
                        @if ($item->id)
                            @lang('admin.Edit') #{{ $item->id }}
                        @else
                            @lang('admin.Add')
                        @endif
                    </h4>
                    <hr>
                    @if ($item->id)
                        <form class="needs-validation" action="{{ route('admin.banks.update', $item->id) }}"
                            method="POST" enctype='multipart/form-data' novalidate>
                            <input type="hidden" name="_method" value="PUT">
                        @else
                            <form class="needs-validation" action="{{ route('admin.banks.store') }}" method="POST"
                                enctype='multipart/form-data' novalidate>
                                <input type="hidden" value="" name="category_id" />
                    @endif
                    @csrf

                    <div class="row">
                        <div class="col-md-6">

                            <div class="col-md-12">
                                <div class="form-group ">
                                    <label for="title-field"> @lang('admin.Title')</label>
                                    <input required id="title-field" type="text" class="form-control @if ($errors->has('title')) is-invalid @endif"
                                    name='title'
                                    value="{{ $item->title ?? old('title') }}" />
                                    @if ($errors->has('title'))
                                        <span class="invalid-feedback">{{ $errors->first('title') }}</span>
                                    @else
                                        <div class="invalid-feedback">please add title
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group ">
                                    <label for="title-field"> @lang('admin.iban')</label>
                                    <input required id="title-field" type="text" class="form-control @if ($errors->has('sub_title')) is-invalid @endif"
                                    name='iban'
                                    value="{{ $item->iban ?? old('iban') }}" />
                                    @if ($errors->has('iban'))
                                        <span class="invalid-feedback">{{ $errors->first('iban') }}</span>
                                    @else
                                        <div class="invalid-feedback">please add iban
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        
                        </div>
                           
                        <div class="col-md-12">
                            <hr>
                            <button type="submit" name="action" value="save"
                                class="btn btn-primary">@lang('admin.Save')</button>

                            <a class="btn btn-danger pull-right text-white"
                                href="{{ route('admin.sliders.index') }}">@lang('admin.Cancel') <i
                                    class="icon-arrow-left-bold"></i></a>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script src="{{ asset('/panel/js/validate.js') }}"></script>
    <script src="{{ asset('/panel/vendors/dropify/dropify.min.js') }}"></script>
    <script src="{{ asset('/panel/js/dropify.js') }}"></script>
    <script src="https://cdn.tiny.cloud/1/z4r871g6sjhoi8cm8vidvde8cedb47jwuhfdwxfdw1av9wpi/tinymce/5/tinymce.min.js"
        referrerpolicy="origin"></script>


    <script>
        tinymce.init({
            selector: '.tinyMceExample',
            plugins: 'lists',
            toolbar: ' bold italic numlist bullist'
        });

    </script>
@endsection


