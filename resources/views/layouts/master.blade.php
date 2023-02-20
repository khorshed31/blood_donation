@php

@endphp

<!DOCTYPE html>


<html lang="en">

@include('layouts.includes.head')


<body>
<!-- Begin page -->
<div class="wrapper">



    <!-- ========== Topbar Start ========== -->
    @include('partials._header')
    <!-- ========== Topbar End ========== -->




    <!-- ========== Left Sidebar Start ========== -->
    @include('partials._sidebar')
    <!-- ========== Left Sidebar End ========== -->

    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->

    <div class="content-page">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">

                @yield('content', 'Default Content')

            </div> <!-- container -->

        </div> <!-- content -->

        <!-- Footer Start -->
    @include('partials._footer')
        <!-- end Footer -->

    </div>

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->

</div>
<!-- END wrapper -->

<!-- Theme Settings -->
@include('partials._settings')




<!-- delete form -->
<form action="" id="deleteItemForm" method="POST">
    @csrf @method("DELETE")
</form>




<!-- master file script -->
@include('layouts.includes.master-file-script')



</body>


</html>
