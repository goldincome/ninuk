

@if(isset($errors) && $errors->any())
<ul class="alert alert-danger text-center mb-2" style="list-style: none;">
    @foreach($errors->all() as $error)
        <li>{!! $error !!}</li>
    @endforeach

</ul>
@endif

@foreach (['danger', 'warning', 'success', 'info', 'error'] as $msg)
<div class="flash-message text-center">
    @if(\Illuminate\Support\Facades\Session::has(  $msg))
        <div class="mb-4 alert alert-{{ ($msg == 'error' || $msg == 'danger') ? 'danger' : $msg }}">{!! \Illuminate\Support\Facades\Session::get( $msg) !!}
            {{-- <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> --}}
        </div>
    @endif
</div>
@endforeach


