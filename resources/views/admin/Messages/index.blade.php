@extends('admin.layouts.app')
@section('tab_name', __('admin.Messages'))
@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">@lang('admin.Messages') <span
                            class="badge badge-danger">{{ count($Contactus) }}</span>
                      
                    </h4>
                    <hr>
                    @if ($Contactus)
                        <div class="table-responsive">
                            <table class="table table-sm table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-xs-center">#</th>
                                        <th>@lang('admin.name')</th>
                                        <th>@lang('admin.email')</th>
                                        <th>@lang('admin.message')</th>

                                        <th>@lang('admin.seen')</th>
                                        <th>@lang('admin.CreationDate')</th>
                                        <th class="text-xs-right">@lang('admin.Actions')</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($Contactus as $item)
                                        <tr>
                                            <td class="text-xs-center"><strong>{{ $item->id }}</strong></td>
                                            <td>

                                            <a class=""
                                                        href="{{ route('admin.messages.show', $item->id) }}">
                                                        {{ $item->name ?? '' }}                                 
                                             </a>
                                                
                                            
                                            </td>
                                            <td>{!! $item->email !!}</td>
                                            <td>{!! $item->message !!}</td>
                                                @if($item->show==0)

                                                 <td><span class="badge badge-danger">@lang('admin.no')</span>


                                                @else

                                                <td><span class="badge badge-success">@lang('admin.yes')</span>



                                                @endif
                                                


                                            <td>{{ $item->updated_at }}</td>
                                            <td class="text-left">
                                               
                                                @if (can('clients.delete'))
                                                    <form action="{{ route('admin.messages.destroy', $item->id) }}"
                                                        method="POST" style="display: inline;"
                                                        onsubmit="return confirm('Delete? Are you sure?');">
                                                        {{ csrf_field() }}
                                                        <input type="hidden" name="_method" value="DELETE"ٍ>

                                                        <button type="submit" class="btn btn-sm btn-danger"><i
                                                                class="text-white icon-trash"></i> </button>
                                                    </form>
                                                @endif

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {!! $Contactus->render() !!}
                    @else
                        <div class="text-center">
                            <img src="{{ asset('/panel/images/empty-box.png') }}" class="empty-box" />

                            <hr>
                            <h3 class="text-xs-center text-info">No data addes !</h3>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>


@endsection
