@extends('admin.layouts.app')
@section('tab_name', __('admin.Rating'))
@section('css')
    <link rel="stylesheet" href="{{ asset('/panel/vendors/dropify/dropify.min.css') }}">
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-name">@lang('admin.Rating') /
                        @if ($item->id)
                            @lang('admin.Edit') #{{ $item->id }}
                        @else
                            @lang('admin.Add')
                        @endif
                    </h4>
                    <hr>
                    @if ($item->id)
                        <form class="needs-validation" action="{{ route('admin.rating.update', $item->id) }}"
                            method="POST" enctype='multipart/form-data' novalidate>
                            <input type="hidden" name="_method" value="PUT">
                        @else
                            <form class="needs-validation" action="{{ route('admin.rating.store') }}" method="POST"
                                enctype='multipart/form-data' novalidate>
                    @endif
                    @csrf

                    <div class="row">
                        <div class="col-md-6">

                            <div class="col-md-12">
                                <div class="form-group ">
                                    <label for="title-field"> @lang('admin.Title')</label>
                                    <input required id="title-field" type="text" class="form-control @if ($errors->has('name')) is-invalid @endif"
                                    name='name'
                                    value="{{ $item->name ?? old('name') }}" />
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback">{{ $errors->first('name') }}</span>
                                    @else
                                        <div class="invalid-feedback">please add name
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group ">
                                    <label for="title-field"> @lang('admin.Position_Rating')</label>
                                    <input required id="title-field" type="text" class="form-control @if ($errors->has('Position')) is-invalid @endif"
                                    name='Position'
                                    value="{{ $item->Position ?? old('Position') }}" />
                                    @if ($errors->has('Position'))
                                        <span class="invalid-feedback">{{ $errors->first('Position') }}</span>
                                    @else
                                        <div class="invalid-feedback">please add Position
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                        <div class="col-md-12">
                                    <div class="form-group ">
                                        <label for="description-field"> @lang('admin.commit')
                                        </label>
                                        <textarea id="description-field" rows="12" class="tinyMceExample form-control @if ($errors->has('commit')) is-invalid @endif"
                                                                            name='commit'>{{ $item->commit ?? old('commit') }}</textarea>
                                        @if ($errors->has('commit'))
                                            <span class="invalid-feedback">{{ $errors->first('commit') }}</span>
                                        @else
                                            <div class="invalid-feedback">please add commit </div>
                                        @endif
                                    </div>
                                </div>
                        <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="active-field">@lang('admin.Publish')</label>
                                        <select class="form-control" name="is_publish">
                                            <option {{ old('is_publish', $item->is_publish) == '1' ? 'selected' : '' }} value="1">
                                                @lang('admin.Yes')</option>
                                            <option {{ old('is_publish', $item->is_publish) == '0' ? 'selected' : '' }} value="0">
                                                @lang('admin.No')</option>
                                        </select>
                                        @if ($errors->has('is_publish'))
                                            <span class="invalid-feedback">{{ $errors->first('is_publish') }}</span>
                                        @endif
                                    </div>
                                </div>
                        </div>
                                

                            <div class="row">

                                <div class="col-md-12">
                                    <div class="form-group ">
                                        <label for="image-field">@lang('admin.UploadImage')</label>
                                        <input type="file" name="image" accept="image/png, image/jpeg, image/jpg"
                                            data-default-file="{{ old('image', asset($item->image)) }}" class="dropify"
                                            id="image-field">
                                        @if ($errors->has('image'))
                                            <span class="invalid-feedback">{{ $errors->first('image') }}</span>
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


