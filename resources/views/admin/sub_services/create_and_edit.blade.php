@extends('admin.layouts.app')
@section('tab_name', __('admin.Sub_services'))
@section('css')
    <link rel="stylesheet" href="{{ asset('/panel/vendors/dropify/dropify.min.css') }}">
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-name">@lang('admin.Sub_services') /
                        @if ($item->id)
                            @lang('admin.Edit') #{{ $item->id }}
                        @else
                            @lang('admin.Add')
                        @endif
                    </h4>
                    <hr>
                    @if ($item->id)
                        <form class="needs-validation" action="{{ route('admin.sub_services.update', $item->id) }}"
                            method="POST" enctype='multipart/form-data' novalidate>
                            <input type="hidden" name="_method" value="PUT">
                        @else
                            <form class="needs-validation" action="{{ route('admin.sub_services.store') }}" method="POST"
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

                            <div class="row">

                                <div class="col-md-12">
                                    <div class="form-group ">
                                        <label for="image-field">@lang('admin.UploadImage')</label>
                                        <input type="file" name="image" accept="image/png, image/jpeg, image/jpg"
                                            data-default-file="{{ old('image',asset($item->image)) }}" class="dropify"
                                            id="image-field">
                                        @if ($errors->has('image'))
                                            <span class="invalid-feedback">{{ $errors->first('image') }}</span>
                                        @endif

                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
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

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="position-field">@lang('admin.Services')</label>
                                        <select class="form-control select2" name="service_id" id="">
                                            @foreach($services as $service)
                                            <option {{ old('service_id', $item->service_id) == $service->id ? 'selected' : '' }} value="{{$service->id}}">
                                            {{$service->title}}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('service_id'))
                                            <span class="invalid-feedback">{{ $errors->first('service_id') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group ">
                                        <label for="description-field"> @lang('admin.Description')
                                        </label>
                                        <textarea id="description-field" rows="12" class="form-control @if ($errors->has('description')) is-invalid @endif"
                                                            name='description'>{{ $item->description ?? old('description') }}</textarea>
                                        @if ($errors->has('description'))
                                            <span class="invalid-feedback">{{ $errors->first('description') }}</span>
                                        @else
                                            <div class="invalid-feedback">please add description </div>
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
                                href="{{ route('admin.services.index') }}">@lang('admin.Cancel') <i
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
@endsection
