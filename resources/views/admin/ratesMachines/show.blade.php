@extends('admin.layouts.app')
@section('tab_name', __('admin.ratesMachine'))
@section('css')
    <style>
        .table td img,
        .jsgrid .jsgrid-table td img {
            width: 200px;
            height: 200px;
            border-radius: 100%;
        }

    </style>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card px-2">
                <div class="card-body">
                    <div class="container-fluid">
                        <h3 class="text-right my-5">@lang('admin.RatesNo')&nbsp;&nbsp;#RR-{{ $item->id }}
                        <a href="{{url('admin/ratesMachine/peaper/'.$item->id.'')}}" class="btn btn-primary float-left"></i>تحديد الأوراق المطلوبة</a> 

                        </h3>

                        <hr>
                    </div>
                    <div class="container-fluid d-flex justify-content-between">
                        <div class="col-lg-3 ps-0">
                            <p class="mt-5 mb-2"><b>@lang('admin.Customer')</b></p>
                            <p>@lang('admin.Name'): {{ $item->name }}</p>
                            <p>@lang('admin.E-mail'): {{ $item->email }}</p>
                            <p>@lang('admin.Mobile'): {{ $item->mobile }}</p>
                            <p>@lang('admin.ApartmentAddress'): {{ $item->address }}</p>
                        </div>
                        <div class="col-lg-3 pr-0">
                            <p class="mt-5 mb-2 text-right"><b>@lang('admin.RatesNo')</b></p>

                            <p class="text-right">{{ $item->request_no }}<br> {!! $item->status_span !!}</p>
                            <p class="mb-0 mt-1">@lang('admin.CreationDate') :
                                {{ \App\Helpers\ArabicDate::format($item->created_at, 'd M Y') }}</p>
                            <p>@lang('admin.LastUpdate') :
                                {{ \App\Helpers\ArabicDate::format($item->updated_at, 'd M Y') }}</p>

                                <p style="
    font-weight: bold;
">@lang('admin.appointment') :
                                {{ \App\Helpers\ArabicDate::format($item->appointment, 'd M Y') }}</p>
                        </div>
                    </div>

                    <div class="container-fluid mt-5 d-flex justify-content-center w-100">
                        <div class="table-responsive w-100">
                            <table class="table"  id="example">
                                <thead>
                                    <tr class="bg-dark text-white">

                                        <th>@lang('admin.Title')</th>
                                        <th class="text-right">@lang('admin.Description')</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-dark text-left ">@lang('admin.ApartmentGoal')</td>
                                        <td class="text-left">{{ $item->goal ? $item->goal->title : '' }} </td>
                                    </tr>
                                    <tr>
                                        <td class="text-dark text-left ">@lang('admin.ApartmentType')</td>
                                        <td class="text-left">                     {{$item->type_id}}

                                            <!--{{ $item->type ? $item->type->title : '' }}-->
                                            </td>
                                    </tr>
                                    <tr>
                                        <td class="text-dark text-left ">@lang('admin.ApartmentEntity')
                                        </td>
                                        <td class="text-left">{{ $item->entity ? $item->entity->title : '' }} </td>
                                    </tr>
                                    <tr>
                                        <td class="text-dark text-left ">@lang('admin.ApartmentAge')
                                        </td>
                                        <td class="text-left">{!! $item->real_estate_age !!} </td>
                                    <tr>
                                        <td class="text-dark text-left ">@lang('admin.ApartmentArea')
                                        </td>
                                        <td class="text-left"> {!! $item->real_estate_area !!} </td>
                                    <tr>
                                        <td class="text-dark text-left ">@lang('admin.ApartmentUsed')
                                        </td>
                                        <td class="text-left"> {{ $item->usage ? $item->usage->title : '' }}</td>
                                    </tr>

                                    <tr>
                                        <td class="text-dark text-left ">@lang('admin.ApartmentNotes')
                                        </td>
                                        <td class="text-left"> {!! $item->real_estate_details !!} </td>
                                    </tr>

                                    <tr>
                                        <td class="text-dark text-left ">@lang('admin.Notes')
                                        </td>
                                        <td class="text-left"> {!! $item->notes !!} </td>
                                    </tr>

                                    <tr>
                                        <td>عروض الأسعار</td>
                                        <td>
                                        @if(count($prices)>0)
                @foreach($prices as $price)
                <p>
                    <a class="text-dark " href="{{url('admin/ratesMachine/showprice/'.$price->id.'/')}}">  عرض السعر  </a>
                 </p>

                @endforeach  
                @else
                <p>
                    <a class="text-dark " href="{{url('admin/ratesMachine/addprice/'.$item->id.'')}}"> أضافة السعر جديد </a>
                 </p>            
                @endif
                                        </td>
                                    </tr>
                                              <!--  -->
                                              @if($item->OwnerID==1)
                                    <tr>
                                        <td class="text-dark text-left ">@lang('admin.OwnerID')
                                        </td>
                                        <td class="text-left">
                                            @if (!empty($item->OwnerID_image))
                                                @foreach ($item->OwnerID_image as $file)
                                                        <a href="{!! $file !!}" download>
                                                        <img class="img-lg rounded" src="{!! $file !!}" />
                                                    </a>
                                                @endforeach
                                            @endif
                                        </td>
                                    </tr>
                                    @endif
                                    @if($item->CustomerID==1)
                                    <tr>
                                        <td class="text-dark text-left ">@lang('admin.CustomerID')
                                        </td>
                                        <td class="text-left">
                                            @if (!empty($item->CustomerID_image))
                                                @foreach ($item->CustomerID_image as $file)
                                                        <a href="{!! $file !!}" download>
                                                        <img class="img-lg rounded" src="{!! $file !!}" />
                                                    </a>
                                                @endforeach
                                            @endif
                                        </td>
                                    </tr>
                                    @endif
                                    @if($item->Instrument==1)
                                    <tr>
                                        <td class="text-dark text-left ">@lang('admin.Instrument')
                                        </td>
                                        <td class="text-left">
                                            @if (!empty($item->Instrument_image))
                                                @foreach ($item->Instrument_image as $file)
                                                        <a href="{!! $file !!}" download>
                                                        <img class="img-lg rounded" src="{!! $file !!}" />
                                                    </a>
                                                @endforeach
                                            @endif
                                        </td>
                                    </tr>
                                    @endif
                                    @if($item->Planners==1)
                                    <tr>
                                        <td class="text-dark text-left ">@lang('admin.Planners')
                                        </td>
                                        <td class="text-left">
                                            @if (!empty($item->Planners_image))
                                                @foreach ($item->Planners_image as $file)
                                                        <a href="{!! $file !!}" download>
                                                        <img class="img-lg rounded" src="{!! $file !!}" />
                                                    </a>
                                                @endforeach
                                            @endif
                                        </td>
                                    </tr>
                                    @endif
                                    @if($item->Determine_the_heirs==1)
                                    <tr>
                                        <td class="text-dark text-left ">@lang('admin.Determine_the_heirs')
                                        </td>
                                        <td class="text-left">
                                            @if (!empty($item->Determine_the_heirs_image))
                                                @foreach ($item->Determine_the_heirs_image as $file)
                                                        <a href="{!! $file !!}" download>
                                                        <img class="img-lg rounded" src="{!! $file !!}" />
                                                    </a>
                                                @endforeach
                                            @endif
                                        </td>
                                    </tr>
                                    @endif
                                    @if($item->Technical_Inspection==1)
                                    <tr>
                                        <td class="text-dark text-left ">@lang('admin.Technical_Inspection')
                                        </td>
                                        <td class="text-left">
                                            @if (!empty($item->Technical_Inspection_image))
                                                @foreach ($item->Technical_Inspection_image as $file)
                                                        <a href="{!! $file !!}" download>
                                                        <img class="img-lg rounded" src="{!! $file !!}" />
                                                    </a>
                                                @endforeach
                                            @endif
                                        </td>
                                    </tr>
                                    @endif
                                    @if($item->Lease_contracts==1)
                                    <tr>
                                        <td class="text-dark text-left ">@lang('admin.Lease_contracts')
                                        </td>
                                        <td class="text-left">
                                            @if (!empty($item->Lease_contracts_image))
                                                @foreach ($item->Lease_contracts_image as $file)
                                                        <a href="{!! $file !!}" download>
                                                        <img class="img-lg rounded" src="{!! $file !!}" />
                                                    </a>
                                                @endforeach
                                            @endif
                                        </td>
                                    </tr>
                                    @endif
                                    @if($item->Financial_Statements==1)
                                    <tr>
                                        <td class="text-dark text-left ">@lang('admin.Financial_Statements')
                                        </td>
                                        <td class="text-left">
                                            @if (!empty($item->Financial_Statements_image))
                                                @foreach ($item->Financial_Statements_image as $file)
                                                        <a href="{!! $file !!}" download>
                                                        <img class="img-lg rounded" src="{!! $file !!}" />
                                                    </a>
                                                @endforeach
                                            @endif
                                        </td>
                                    </tr>
                                    @endif
                                    @if($item->Feasibility_study==1)
                                    <tr>
                                        <td class="text-dark text-left ">@lang('admin.Feasibility_study')
                                        </td>
                                        <td class="text-left">
                                            @if (!empty($item->Feasibility_study_image))
                                                @foreach ($item->Feasibility_study_image as $file)
                                                        <a href="{!! $file !!}" download>
                                                        <img class="img-lg rounded" src="{!! $file !!}" />
                                                    </a>
                                                @endforeach
                                            @endif
                                        </td>
                                    </tr>
                                    @endif
                                    @if($item->Other_documents==1)
                                    <tr>
                                        <td class="text-dark text-left ">@lang('admin.Other_documents')
                                        </td>
                                        <td class="text-left">
                                            @if (!empty($item->Other_documents_image))
                                                @foreach ($item->Other_documents_image as $file)
                                                        <a href="{!! $file !!}" download>
                                                        <img class="img-lg rounded" src="{!! $file !!}" />
                                                    </a>
                                                @endforeach
                                            @endif
                                        </td>
                                    </tr>
                                    @endif

                                    <!-- <tr>
                                        <td class="text-dark text-left ">صور الأصول
                                        </td>
                                        <td class="text-left">
                                            @if (!empty($item->instrument_images))
                                                @foreach ($item->instrument_images as $file)
                                                        <a href="{!! $file !!}" download>
                                                        <img class="img-lg rounded" src="{!! $file !!}" />
                                                    </a>
                                                @endforeach
                                            @endif
                                        </td>
                                    </tr> -->
                                    <!-- <tr>
                                        <td class="text-dark text-left ">@lang('admin.construction_license')
                                        </td>
                                        <td class="text-left">
                                            @if (!empty($item->construction_images))
                                                @foreach ($item->construction_images as $file)
                                                        <a href="{!! $file !!}" download>
                                                        <img class="img-lg rounded" src="{!! $file !!}" />
                                                    </a>
                                                @endforeach
                                            @endif

                                        </td>
                                    </tr> -->
                                    <!-- <tr>
                                        <td class="text-dark text-left ">@lang('admin.other_contracts')
                                        </td>
                                        <td class="text-left">
                                            @if (!empty($item->other_images))
                                                @foreach ($item->other_images as $file)
                                                     <a href="{!! $file !!}" download>
                                                        <img class="img-lg rounded" src="{!! $file !!}" />
                                                    </a>
                                                @endforeach
                                            @endif
                                        </td>
                                    </tr> -->
                                </tbody>
                            </table>
                        </div>
                    </div>

                    {{-- <div class="container-fluid w-100">
                        <a href="#" class="btn btn-primary float-right mt-4 ms-2"><i
                                class="ti-printer me-1"></i>@lang('admin.Print')</a>
                         <a href="#" class="btn btn-success float-right mt-4"><i class="ti-export me-1"></i>Send Invoice</a>
                        </div> --}}
                </div>
            </div>
        </div>
    </div>
@endsection
