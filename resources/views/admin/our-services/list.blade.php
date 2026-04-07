@extends('layouts.admin')


@section('title')
    All Services Offered at {{ $location->location_name}}
@endsection


@section('css')
    <style>
        .admin-sidebar-settings{
            color: #000 !important;
            background: #0fc55e !important;
        }
    </style>
@endsection


@section('content')
    <div class="container">

        <div class="page-title-account">
            <div>
                All {{ $location->location_name}} Services
            </div>
            <div class="pull-right">
                <a href="{{route('admin.settings.edit', $location->id)}}" class="btn btn-nin-green">
                    View Location Settings
                </a>
            </div>
        </div>
        <div>
            @include('common.error-and-message')
            <div class="table-container">
                <form method="POST" name="our-services" action="{{route('admin.our-services.store')}}">
                    @csrf
                    <input type="hidden" name="location_id" value="{{$location->id}}" />
                    <table class="table table-auto table-border table-align">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Service Type</th>
                                <th>Price</th>
                                <th>PVC Print & Delivery Cost</th>
                                <th>Use Online Payment</th>
                                <th>Enabled</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @forelse ($ourServices as $ourService)

                                <tr>
                                    <td>
                                        {{ $loop->iteration }}
                                    </td>
                                    <td>
                                        {{$ourService->serviceType->name}}
                                        <input type="hidden" name="service_type_ids[]" value="{{$ourService->serviceType->id}}" class="form-input" />
                                    </td>
                                    <td>
                                        <input type="text" name="price[]" value="{{$ourService->price}}" class="form-input" />
                                    </td>
                                    <td>  
                                        <input type="text" name="pvc_print_delivery_cost[]" value="{{$ourService->pvc_print_delivery_cost}}" class="form-input" />
                                    </td>
                                    <td>
                                        <input type="checkbox" name="allow_online_payment[{{ $ourService->id}}]" value="{{$ourService->allow_online_payment ? 1 : 0}}" @if($ourService->allow_online_payment) checked @endif class="form-input-checkbox" />
                                    </td>
                                    
                                    <td>
                                        <input type="checkbox" name="mystatus[{{ $ourService->id}}]" value="{{$ourService->status ? 1 : 0}}" @if($ourService->status) checked @endif class="form-input-checkbox" />
                                    </td>

                                    <input type="hidden" name="our_services_ids[]" value="{{$ourService->id}}" />
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5">
                                        <div class="table-info">
                                            <span class="fa fa-list"></span>
                                            <div class="italic mt-3 text-lg">
                                                No results found
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                                    
                            @endforelse
                            @if(count($ourServices) > 0)
                                <tr>
                                    <td colspan="5">
                                        <button type="submit" class="btn btn-lg btn-block btn-nin-green mt-8">
                                            Update
                                        </button>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </form>
            </div>

        </div>

    </div>
@endsection

@section('js')
    <script>
        function confirmation(){
                var result = confirm("Are you sure to delete?");
                if(result){
                    document.getElementById('dform').submit();
                }
        }
    
    </script>
@endsection