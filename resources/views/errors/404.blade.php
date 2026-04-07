@extends('layouts.app')


@section('title')
    404 not found
@endsection


@section('content')
    <div>
        
        <div class="container">

            <div class="py-10">
                <div class="table-info">
                    <span class="fa fa-unlink" aria-hidden="true"></span>
                    <div class="font-bold text-2xl mt-3">
                        Page not found!
                    </div>
                    <div class="mt-3">
                        Sorry, the page you tried to access does not exist on our servers.
                    </div>
                    <div class="mt-4">
                        <a href="/" class="btn btn-nin-green mx-auto">
                            Goto homepage
                        </a>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection