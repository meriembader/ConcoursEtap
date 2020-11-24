@include('projetEnit.layouts.header')

<body id="page-top">
<style>
    .table{
        color: black !important;
    }
</style>
@include('projetEnit.layouts.wrapper')

@yield('content')

</div>

@yield('scripts')

@include('projetEnit.layouts.footer')
