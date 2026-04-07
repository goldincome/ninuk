<div>

    @if($errors->all())

        @foreach($errors->all() as $message)
            {{-- <div class="box no-border"> --}}
                {{-- <div class="box-tools"> --}}
                    <!-- <p class="alert alert-warning alert-dismissible"> -->
                    <div class="alert alert-danger alert-dismissible" style="margin-bottom: 20px;">
                        {{ $message }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                {{-- </div> --}}
            {{-- </div> --}}
        @endforeach

    @elseif(session()->has('message'))

        {{-- <div class="box no-border"> --}}
            {{-- <div class="box-tools"> --}}
                <div class="alert alert-success alert-dismissible" style="margin-bottom: 20px;">
                    {!! session()->get('message') !!}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
            {{-- </div> --}}
        {{-- </div> --}}

    @elseif(session()->has('error'))

        {{-- <div class="box no-border"> --}}
            {{-- <div class="box-tools"> --}}
                <div class="alert alert-danger alert-dismissible" style="margin-bottom: 20px;">
                    {{ session()->get('error') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
            {{-- </div> --}}
        {{-- </div> --}}
        
    @endif

</div>