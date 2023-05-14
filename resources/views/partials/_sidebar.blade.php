<div class="leftside-menu">

    <!-- Logo Light -->
    <a href="index.html" class="logo logo-light">
                    <span class="logo-lg">
                        <img src="{{ asset('assets/images/blood.png') }}" alt="logo" height="50">
                    </span>
        <span class="logo-sm">
            <img src="{{ asset('assets/images/blood.png') }}" alt="logo" height="50">
                    </span>
    </a>

    <!-- Logo Dark -->
    <a href="index.html" class="logo logo-dark">
                    <span class="logo-lg">
                        {{-- <img src="assets/images/logo-dark.png" alt="dark logo" height="22"> --}}
                    </span>
        <span class="logo-sm">
                        {{-- <img src="assets/images/logo-dark-sm.png" alt="small logo" height="22"> --}}
                    </span>
    </a>

    <!-- Sidebar Hover Menu Toggle Button -->
    <button type="button" class="btn button-sm-hover p-0" data-bs-toggle="tooltip" data-bs-placement="right" title="Show Full Sidebar">
        <i class="ri-checkbox-blank-circle-line align-middle"></i>
    </button>

    <!-- Sidebar -left -->
    <div class="h-100" id="leftside-menu-container" data-simplebar>
        <!-- Leftbar User -->
        <div class="leftbar-user">
            <a href="pages-profile.html">
                <img src="assets/images/users/avatar-1.jpg" alt="user-image" height="42"
                     class="rounded-circle shadow-sm">
                <span class="leftbar-user-name">{{ optional(auth()->user())->name }}</span>
            </a>
        </div>

        <!--- Sidemenu -->
        @include('partials.sidebars.__sidebar_item')

        <!--- End Sidemenu -->

        @php
            $start_date = Carbon\Carbon::parse(optional(isDonate())->date)->format('d F Y');
            $end_date   = Carbon\Carbon::parse(optional(isDonate())->date)->addMonth(3)->format('d F Y');
            $different_days = Carbon\Carbon::parse(optional(isDonate())->date)->diffInMonths();
        @endphp

        @if ($different_days < 3 && isDonate())
            <!-- Help Box -->
        <div class="text-white text-center alert alert-danger">
            <h5 class="mt-3">Donate date : {{ Carbon\Carbon::parse(optional(isDonate())->date)->format('d F Y') }}</h5>
                <b class="mb-3 text-danger">It is requested not to donate blood within <b>{{ 3 - $different_days }}</b> months. Thanks</b>
        </div>
            <!-- end Help Box -->
        @endif

        <div class="clearfix"></div>
    </div>
</div>

