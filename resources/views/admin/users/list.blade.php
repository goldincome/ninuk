@extends('layouts.admin')


@section('title')
    Users
@endsection


@section('css')
    <style>
        .admin-sidebar-users{
            color: #000 !important;
            background: #0fc55e !important;
        }
    </style>
@endsection


@section('content')
    <div class="container">
        
        <div class="page-title-account">
            <div>
                All Users
            </div>
            <div>
                <form action="">
                    <label class="relative block">
                        <div class="pointer-events-none w-10 h-full absolute flex">
                            <i class="fas fa-search m-auto"></i>
                        </div>
                        <input type="search" name="search" placeholder="Search users" class="form-input w-full" style="padding-left: 40px !important;">
                   </label>
                </form>
                <a href="/admin/users/create" class="btn btn-nin-green">
                    Add new user
                </a>
            </div>
        </div>
        
        
        <div>
        
            <div class="table-container">
                <table class="table table-auto table-border table-align">
                    <thead>
                        <tr>
                            <th>Date Created</th>
                            <th>User Info</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td>
                                March 02, 2022
                            </td>

                            <td>
                                <div>
                                    <div class="font-bold">
                                        Olawale Lawal
                                    </div>
                                    <div class="text-fade">
                                        <div>
                                            walex996@gmail.com
                                        </div>
                                        <div>
                                            08168276114
                                        </div>
                                    </div>
                                </div>
                            </td>

                            <td>
                                Super-Admin
                            </td>

                            <td>
                                <div class="label label-blue">
                                    Active
                                </div>
                            </td>

                            <td>
                                <div class="relative">
                                    <button type="button" id="dropdown" data-dropdown-toggle="dropdown1" class="btn btn-nin-green btn-sm">
                                        Actions
                                        <span class="fa fa-caret-down ml-2"></span>
                                    </button>
                                    <div id="dropdown1" class="dropdown-menu-nav hidden">
                                        <ul class="py-1" aria-labelledby="dropdownButton1">
                                            <li>
                                                <a href="/admin/users/edit/12345" class="dropdown-menu-option">Edit</a>
                                            </li>
                                            <li>
                                                <button type="button" class="dropdown-menu-option">Delete</button>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        
                        <tr>
                            <td>
                                March 02, 2022
                            </td>

                            <td>
                                <div>
                                    <div class="font-bold">
                                        Olawale Lawal
                                    </div>
                                    <div class="text-fade">
                                        <div>
                                            walex996@gmail.com
                                        </div>
                                        <div>
                                            08168276114
                                        </div>
                                    </div>
                                </div>
                            </td>

                            <td>
                                Super-Admin
                            </td>

                            <td>
                                <div class="label label-blue">
                                    Active
                                </div>
                            </td>

                            <td>
                                <div class="relative">
                                    <button type="button" id="dropdown" data-dropdown-toggle="dropdown1" class="btn btn-nin-green btn-sm">
                                        Actions
                                        <span class="fa fa-caret-down ml-2"></span>
                                    </button>
                                    <div id="dropdown1" class="dropdown-menu-nav hidden">
                                        <ul class="py-1" aria-labelledby="dropdownButton1">
                                            <li>
                                                <a href="/admin/users/edit/12345" class="dropdown-menu-option">Edit</a>
                                            </li>
                                            <li>
                                                <button type="button" class="dropdown-menu-option">Delete</button>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        
                        <tr>
                            <td>
                                March 02, 2022
                            </td>

                            <td>
                                <div>
                                    <div class="font-bold">
                                        Olawale Lawal
                                    </div>
                                    <div class="text-fade">
                                        <div>
                                            walex996@gmail.com
                                        </div>
                                        <div>
                                            08168276114
                                        </div>
                                    </div>
                                </div>
                            </td>

                            <td>
                                Super-Admin
                            </td>

                            <td>
                                <div class="label label-blue">
                                    Active
                                </div>
                            </td>

                            <td>
                                <div class="relative">
                                    <button type="button" id="dropdown" data-dropdown-toggle="dropdown1" class="btn btn-nin-green btn-sm">
                                        Actions
                                        <span class="fa fa-caret-down ml-2"></span>
                                    </button>
                                    <div id="dropdown1" class="dropdown-menu-nav hidden">
                                        <ul class="py-1" aria-labelledby="dropdownButton1">
                                            <li>
                                                <a href="/admin/users/edit/12345" class="dropdown-menu-option">Edit</a>
                                            </li>
                                            <li>
                                                <button type="button" class="dropdown-menu-option">Delete</button>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        
                        <tr>
                            <td>
                                March 02, 2022
                            </td>

                            <td>
                                <div>
                                    <div class="font-bold">
                                        Olawale Lawal
                                    </div>
                                    <div class="text-fade">
                                        <div>
                                            walex996@gmail.com
                                        </div>
                                        <div>
                                            08168276114
                                        </div>
                                    </div>
                                </div>
                            </td>

                            <td>
                                Super-Admin
                            </td>

                            <td>
                                <div class="label label-blue">
                                    Active
                                </div>
                            </td>

                            <td>
                                <div class="relative">
                                    <button type="button" id="dropdown" data-dropdown-toggle="dropdown1" class="btn btn-nin-green btn-sm">
                                        Actions
                                        <span class="fa fa-caret-down ml-2"></span>
                                    </button>
                                    <div id="dropdown1" class="dropdown-menu-nav hidden">
                                        <ul class="py-1" aria-labelledby="dropdownButton1">
                                            <li>
                                                <a href="/admin/users/edit/12345" class="dropdown-menu-option">Edit</a>
                                            </li>
                                            <li>
                                                <button type="button" class="dropdown-menu-option">Delete</button>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        
                        <tr>
                            <td>
                                March 02, 2022
                            </td>

                            <td>
                                <div>
                                    <div class="font-bold">
                                        Olawale Lawal
                                    </div>
                                    <div class="text-fade">
                                        <div>
                                            walex996@gmail.com
                                        </div>
                                        <div>
                                            08168276114
                                        </div>
                                    </div>
                                </div>
                            </td>

                            <td>
                                Super-Admin
                            </td>

                            <td>
                                <div class="label label-blue">
                                    Active
                                </div>
                            </td>

                            <td>
                                <div class="relative">
                                    <button type="button" id="dropdown" data-dropdown-toggle="dropdown1" class="btn btn-nin-green btn-sm">
                                        Actions
                                        <span class="fa fa-caret-down ml-2"></span>
                                    </button>
                                    <div id="dropdown1" class="dropdown-menu-nav hidden">
                                        <ul class="py-1" aria-labelledby="dropdownButton1">
                                            <li>
                                                <a href="/admin/users/edit/12345" class="dropdown-menu-option">Edit</a>
                                            </li>
                                            <li>
                                                <button type="button" class="dropdown-menu-option">Delete</button>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        
                        <tr>
                            <td>
                                March 02, 2022
                            </td>

                            <td>
                                <div>
                                    <div class="font-bold">
                                        Olawale Lawal
                                    </div>
                                    <div class="text-fade">
                                        <div>
                                            walex996@gmail.com
                                        </div>
                                        <div>
                                            08168276114
                                        </div>
                                    </div>
                                </div>
                            </td>

                            <td>
                                Super-Admin
                            </td>

                            <td>
                                <div class="label label-blue">
                                    Active
                                </div>
                            </td>

                            <td>
                                <div class="relative">
                                    <button type="button" id="dropdown" data-dropdown-toggle="dropdown1" class="btn btn-nin-green btn-sm">
                                        Actions
                                        <span class="fa fa-caret-down ml-2"></span>
                                    </button>
                                    <div id="dropdown1" class="dropdown-menu-nav hidden">
                                        <ul class="py-1" aria-labelledby="dropdownButton1">
                                            <li>
                                                <a href="/admin/users/edit/12345" class="dropdown-menu-option">Edit</a>
                                            </li>
                                            <li>
                                                <button type="button" class="dropdown-menu-option">Delete</button>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        
                        <tr>
                            <td>
                                March 02, 2022
                            </td>

                            <td>
                                <div>
                                    <div class="font-bold">
                                        Olawale Lawal
                                    </div>
                                    <div class="text-fade">
                                        <div>
                                            walex996@gmail.com
                                        </div>
                                        <div>
                                            08168276114
                                        </div>
                                    </div>
                                </div>
                            </td>

                            <td>
                                Super-Admin
                            </td>

                            <td>
                                <div class="label label-blue">
                                    Active
                                </div>
                            </td>

                            <td>
                                <div class="relative">
                                    <button type="button" id="dropdown" data-dropdown-toggle="dropdown1" class="btn btn-nin-green btn-sm">
                                        Actions
                                        <span class="fa fa-caret-down ml-2"></span>
                                    </button>
                                    <div id="dropdown1" class="dropdown-menu-nav hidden">
                                        <ul class="py-1" aria-labelledby="dropdownButton1">
                                            <li>
                                                <a href="/admin/users/edit/12345" class="dropdown-menu-option">Edit</a>
                                            </li>
                                            <li>
                                                <button type="button" class="dropdown-menu-option">Delete</button>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        
                        <tr>
                            <td>
                                March 02, 2022
                            </td>

                            <td>
                                <div>
                                    <div class="font-bold">
                                        Olawale Lawal
                                    </div>
                                    <div class="text-fade">
                                        <div>
                                            walex996@gmail.com
                                        </div>
                                        <div>
                                            08168276114
                                        </div>
                                    </div>
                                </div>
                            </td>

                            <td>
                                Super-Admin
                            </td>

                            <td>
                                <div class="label label-blue">
                                    Active
                                </div>
                            </td>

                            <td>
                                <div class="relative">
                                    <button type="button" id="dropdown" data-dropdown-toggle="dropdown1" class="btn btn-nin-green btn-sm">
                                        Actions
                                        <span class="fa fa-caret-down ml-2"></span>
                                    </button>
                                    <div id="dropdown1" class="dropdown-menu-nav hidden">
                                        <ul class="py-1" aria-labelledby="dropdownButton1">
                                            <li>
                                                <a href="/admin/users/edit/12345" class="dropdown-menu-option">Edit</a>
                                            </li>
                                            <li>
                                                <button type="button" class="dropdown-menu-option">Delete</button>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        
                        <tr>
                            <td>
                                March 02, 2022
                            </td>

                            <td>
                                <div>
                                    <div class="font-bold">
                                        Olawale Lawal
                                    </div>
                                    <div class="text-fade">
                                        <div>
                                            walex996@gmail.com
                                        </div>
                                        <div>
                                            08168276114
                                        </div>
                                    </div>
                                </div>
                            </td>

                            <td>
                                Super-Admin
                            </td>

                            <td>
                                <div class="label label-blue">
                                    Active
                                </div>
                            </td>

                            <td>
                                <div class="relative">
                                    <button type="button" id="dropdown" data-dropdown-toggle="dropdown1" class="btn btn-nin-green btn-sm">
                                        Actions
                                        <span class="fa fa-caret-down ml-2"></span>
                                    </button>
                                    <div id="dropdown1" class="dropdown-menu-nav hidden">
                                        <ul class="py-1" aria-labelledby="dropdownButton1">
                                            <li>
                                                <a href="/admin/users/edit/12345" class="dropdown-menu-option">Edit</a>
                                            </li>
                                            <li>
                                                <button type="button" class="dropdown-menu-option">Delete</button>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        
                        <tr>
                            <td>
                                March 02, 2022
                            </td>

                            <td>
                                <div>
                                    <div class="font-bold">
                                        Olawale Lawal
                                    </div>
                                    <div class="text-fade">
                                        <div>
                                            walex996@gmail.com
                                        </div>
                                        <div>
                                            08168276114
                                        </div>
                                    </div>
                                </div>
                            </td>

                            <td>
                                Super-Admin
                            </td>

                            <td>
                                <div class="label label-blue">
                                    Active
                                </div>
                            </td>

                            <td>
                                <div class="relative">
                                    <button type="button" id="dropdown" data-dropdown-toggle="dropdown1" class="btn btn-nin-green btn-sm">
                                        Actions
                                        <span class="fa fa-caret-down ml-2"></span>
                                    </button>
                                    <div id="dropdown1" class="dropdown-menu-nav hidden">
                                        <ul class="py-1" aria-labelledby="dropdownButton1">
                                            <li>
                                                <a href="/admin/users/edit/12345" class="dropdown-menu-option">Edit</a>
                                            </li>
                                            <li>
                                                <button type="button" class="dropdown-menu-option">Delete</button>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        
                    </tbody>
                </table>
            </div>

            @include('common.pagination')

        </div>
            
    </div>
@endsection