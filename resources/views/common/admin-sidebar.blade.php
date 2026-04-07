<div class="h-screen flex-none fixed bg-black hidden lg:block shadow-lg" style="width: 250px;">
    <div class="w-full h-full sidebar-bg-ep-pattern bg-cover bg-no-repeat" style="background-position: 0 20px;">

        <div class="p-4 flex">
            {{-- 
            <a href="/" target="_blank" class="h-20 flex mx-auto">
                <div class="text-3xl md:text-4xl font-bold m-auto py-2 text-nin-green font-lobster">
                    nin<span class="text-nin-orange">(uk)</span>.co.uk
                </div>
            </a>
             --}}
            {{-- <a href="/" target="_blank" class="h-24 px-1 py-2 mx-auto inline-block bg-white rounded-lg"> --}}
            <a href="/" target="_blank" class="mx-auto inline-block">
                <img src={{asset('img/icons/logo-ninuk-deacil-3.png')}} alt="logo" class="w-full h-full object-contain " />
            </a>
        </div>

        <div class="mt-4 sidebar-body h-screen overflow-auto">
            <a href="/admin" class="sidebar-links admin-sidebar-dashboard">
                <span class="fa fa-tachometer w-7"></span>
                Dashboard
            </a>

            <div class="sidebar-links-divider">
                Main Navigation
            </div>


            <a href="/admin/appointments" class="sidebar-links admin-sidebar-appointments">
                <span class="fa fa-calendar-check w-7"></span>
                Appointments
            </a>

            <a href="/admin/payments" class="sidebar-links admin-sidebar-payments">
                <span class="fa fa-credit-card w-7"></span>
                Payments
            </a>
            @if(auth()->user()->isSuperAdmin())
                <a href="{{route('admin.locations.index')}}" class="sidebar-links admin-sidebar-locations">
                    <span class="fa fa-credit-card w-7"></span>
                    Locations
                </a>
            @endif
            <div class="sidebar-links-divider">
                Others
            </div>
           @if(auth()->user()->isSuperAdmin())
                <a href="/admin/admins" class="sidebar-links admin-sidebar-users">
                    <span class="fa fa-user-group w-7"></span>
                    Admin Management
                </a>
            @endif

            <a href="/admin/messages" class="sidebar-links admin-sidebar-messages">
                <span class="fa fa-envelope w-7"></span>
                Messages
            </a>

            <div class="sidebar-links-divider">
                Config
            </div>
            @if(auth()->user()->isSuperAdmin())
                <a href="/admin/settings" class="sidebar-links admin-sidebar-settings">
                    <span class="fa fa-cog w-7"></span>
                    Settings
                </a>
                <a href="/admin/closed-durations" class="sidebar-links admin-sidebar-closed-durations">
                    <span class="fa fa-cog w-7"></span>
                    Holiday Off Dates
                </a>

                <a href="/admin/reminder-setting" class="sidebar-links admin-sidebar-reminder-settings">
                    <span class="fa fa-cog w-7"></span>
                    Reminder Settings
                </a>

                <a href="/admin/service-types" class="sidebar-links admin-sidebar-service-types">
                    <span class="fa fa-cog w-7"></span>
                    Our Service Types
                </a>
                
            @endif

            <div class="sidebar-links-divider">
                <hr class="opacity-50">
            </div>

            <form method="POST" action="{{ route('logout') }}">
                    @csrf
                <button type="submit" class="sidebar-links w-full">
                    <span class="fa fa-sign-out w-7"></span>
                    Logout
                </button>
            </form>

            <div class="pb-28"></div>
        </div>


    </div>
</div>
