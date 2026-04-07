@extends('layouts.app')


@section('title')
    My Reviews
@endsection


@section('css')
    <style>
        .account-sidebar-reviews{
            background: rgb(229 231 235);
        }
    </style>
@endsection


@section('content')
    <div>
        
        <div class="top-wide">
            <div>
                <div>
                    My reviews
                </div>
                <div>
                    <a href="/account">Account</a>
                    <span>/</span>
                    <a href="/account/reviews">My Reviews</a>
                </div>
            </div>
            <div></div>
        </div>

        <div class="container py-8 sm:py-12">
            <div class="sm:flex sm:space-x-10">
            
                
                <div class="hidden sm:block">
                    @include('common.user-sidebar')
                </div>

                
                <div class="flex-grow sm:pt-3">
                    <div class="page-title-account">
                        <div>
                            My Reviews
                        </div>
                    </div>
                    <div>



                        <div class="container-account table-container">
                            <table class="table table-auto table-border table-align">
                                <thead>
                                    <tr>
                                        <th style="min-width: 150px;">Date Submitted</th>
                                        <th style="min-width: 350px;">My review</th>
                                        <th style="min-width: 150px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <td>
                                            Jan 02, 2022
                                        </td>

                                        <td>
                                            <div>
                                                <div>
                                                    <div>
                                                        <a href="/homes/12345678" class="inline-block">
                                                            <div class="flex text-xl">
                                                                <span class="fa fa-star" style="color: #ffd700;"></span>
                                                                <span class="fa fa-star" style="color: #ffd700;"></span>
                                                                <span class="fa fa-star" style="color: #ffd700;"></span>
                                                                <span class="fa fa-star" style="color: #ffd700;"></span>
                                                                <span class="fa fa-star-o" style="color: #ffd700;"></span>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div>
                                                        <a href="/homes/12345678" class="mt-2 mb-1 inline-block font-bold hover:underline">
                                                            Great place to spend some personal time
                                                        </a>
                                                    </div>
                                                    <div>
                                                        <a href="/homes/12345678" class="text-fade ellipsis-2-lines inline-block hover:underline">
                                                            Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>

                                            <div>
                                                <a href="/homes/12345678" class="btn btn-nin-orange">
                                                    View
                                                </a>
                                            </div>

                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            Jan 02, 2022
                                        </td>

                                        <td>
                                            <div>
                                                <div>
                                                    <div>
                                                        <a href="/homes/12345678" class="inline-block">
                                                            <div class="flex text-xl">
                                                                <span class="fa fa-star" style="color: #ffd700;"></span>
                                                                <span class="fa fa-star" style="color: #ffd700;"></span>
                                                                <span class="fa fa-star" style="color: #ffd700;"></span>
                                                                <span class="fa fa-star" style="color: #ffd700;"></span>
                                                                <span class="fa fa-star-o" style="color: #ffd700;"></span>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div>
                                                        <a href="/homes/12345678" class="mt-2 mb-1 inline-block font-bold hover:underline">
                                                            Great place to spend some personal time
                                                        </a>
                                                    </div>
                                                    <div>
                                                        <a href="/homes/12345678" class="text-fade ellipsis-2-lines inline-block hover:underline">
                                                            Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>

                                            <div>
                                                <a href="/homes/12345678" class="btn btn-nin-orange">
                                                    View
                                                </a>
                                            </div>

                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            Jan 02, 2022
                                        </td>

                                        <td>
                                            <div>
                                                <div>
                                                    <div>
                                                        <a href="/homes/12345678" class="inline-block">
                                                            <div class="flex text-xl">
                                                                <span class="fa fa-star" style="color: #ffd700;"></span>
                                                                <span class="fa fa-star" style="color: #ffd700;"></span>
                                                                <span class="fa fa-star" style="color: #ffd700;"></span>
                                                                <span class="fa fa-star" style="color: #ffd700;"></span>
                                                                <span class="fa fa-star-o" style="color: #ffd700;"></span>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div>
                                                        <a href="/homes/12345678" class="mt-2 mb-1 inline-block font-bold hover:underline">
                                                            Great place to spend some personal time
                                                        </a>
                                                    </div>
                                                    <div>
                                                        <a href="/homes/12345678" class="text-fade ellipsis-2-lines inline-block hover:underline">
                                                            Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>

                                            <div>
                                                <a href="/homes/12345678" class="btn btn-nin-orange">
                                                    View
                                                </a>
                                            </div>

                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            Jan 02, 2022
                                        </td>

                                        <td>
                                            <div>
                                                <div>
                                                    <div>
                                                        <a href="/homes/12345678" class="inline-block">
                                                            <div class="flex text-xl">
                                                                <span class="fa fa-star" style="color: #ffd700;"></span>
                                                                <span class="fa fa-star" style="color: #ffd700;"></span>
                                                                <span class="fa fa-star" style="color: #ffd700;"></span>
                                                                <span class="fa fa-star" style="color: #ffd700;"></span>
                                                                <span class="fa fa-star-o" style="color: #ffd700;"></span>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div>
                                                        <a href="/homes/12345678" class="mt-2 mb-1 inline-block font-bold hover:underline">
                                                            Great place to spend some personal time
                                                        </a>
                                                    </div>
                                                    <div>
                                                        <a href="/homes/12345678" class="text-fade ellipsis-2-lines inline-block hover:underline">
                                                            Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>

                                            <div>
                                                <a href="/homes/12345678" class="btn btn-nin-orange">
                                                    View
                                                </a>
                                            </div>

                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            Jan 02, 2022
                                        </td>

                                        <td>
                                            <div>
                                                <div>
                                                    <div>
                                                        <a href="/homes/12345678" class="inline-block">
                                                            <div class="flex text-xl">
                                                                <span class="fa fa-star" style="color: #ffd700;"></span>
                                                                <span class="fa fa-star" style="color: #ffd700;"></span>
                                                                <span class="fa fa-star" style="color: #ffd700;"></span>
                                                                <span class="fa fa-star" style="color: #ffd700;"></span>
                                                                <span class="fa fa-star-o" style="color: #ffd700;"></span>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div>
                                                        <a href="/homes/12345678" class="mt-2 mb-1 inline-block font-bold hover:underline">
                                                            Great place to spend some personal time
                                                        </a>
                                                    </div>
                                                    <div>
                                                        <a href="/homes/12345678" class="text-fade ellipsis-2-lines inline-block hover:underline">
                                                            Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>

                                            <div>
                                                <a href="/homes/12345678" class="btn btn-nin-orange">
                                                    View
                                                </a>
                                            </div>

                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            Jan 02, 2022
                                        </td>

                                        <td>
                                            <div>
                                                <div>
                                                    <div>
                                                        <a href="/homes/12345678" class="inline-block">
                                                            <div class="flex text-xl">
                                                                <span class="fa fa-star" style="color: #ffd700;"></span>
                                                                <span class="fa fa-star" style="color: #ffd700;"></span>
                                                                <span class="fa fa-star" style="color: #ffd700;"></span>
                                                                <span class="fa fa-star" style="color: #ffd700;"></span>
                                                                <span class="fa fa-star-o" style="color: #ffd700;"></span>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div>
                                                        <a href="/homes/12345678" class="mt-2 mb-1 inline-block font-bold hover:underline">
                                                            Great place to spend some personal time
                                                        </a>
                                                    </div>
                                                    <div>
                                                        <a href="/homes/12345678" class="text-fade ellipsis-2-lines inline-block hover:underline">
                                                            Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>

                                            <div>
                                                <a href="/homes/12345678" class="btn btn-nin-orange">
                                                    View
                                                </a>
                                            </div>

                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            Jan 02, 2022
                                        </td>

                                        <td>
                                            <div>
                                                <div>
                                                    <div>
                                                        <a href="/homes/12345678" class="inline-block">
                                                            <div class="flex text-xl">
                                                                <span class="fa fa-star" style="color: #ffd700;"></span>
                                                                <span class="fa fa-star" style="color: #ffd700;"></span>
                                                                <span class="fa fa-star" style="color: #ffd700;"></span>
                                                                <span class="fa fa-star" style="color: #ffd700;"></span>
                                                                <span class="fa fa-star-o" style="color: #ffd700;"></span>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div>
                                                        <a href="/homes/12345678" class="mt-2 mb-1 inline-block font-bold hover:underline">
                                                            Great place to spend some personal time
                                                        </a>
                                                    </div>
                                                    <div>
                                                        <a href="/homes/12345678" class="text-fade ellipsis-2-lines inline-block hover:underline">
                                                            Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>

                                            <div>
                                                <a href="/homes/12345678" class="btn btn-nin-orange">
                                                    View
                                                </a>
                                            </div>

                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            Jan 02, 2022
                                        </td>

                                        <td>
                                            <div>
                                                <div>
                                                    <div>
                                                        <a href="/homes/12345678" class="inline-block">
                                                            <div class="flex text-xl">
                                                                <span class="fa fa-star" style="color: #ffd700;"></span>
                                                                <span class="fa fa-star" style="color: #ffd700;"></span>
                                                                <span class="fa fa-star" style="color: #ffd700;"></span>
                                                                <span class="fa fa-star" style="color: #ffd700;"></span>
                                                                <span class="fa fa-star-o" style="color: #ffd700;"></span>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div>
                                                        <a href="/homes/12345678" class="mt-2 mb-1 inline-block font-bold hover:underline">
                                                            Great place to spend some personal time
                                                        </a>
                                                    </div>
                                                    <div>
                                                        <a href="/homes/12345678" class="text-fade ellipsis-2-lines inline-block hover:underline">
                                                            Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>

                                            <div>
                                                <a href="/homes/12345678" class="btn btn-nin-orange">
                                                    View
                                                </a>
                                            </div>

                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>


                        @include('common.pagination')


                    </div>
                </div>
                
            </div>
        </div>
    </div>
@endsection