@section('scripts')

<script>var hostUrl = "assets/";</script>

<script src="{{ asset('assets/Metronic-Theme/plugins/global/plugins.bundle.js') }}"></script>

<script src="{{ asset('assets/Metronic-Theme/js/scripts.bundle.js') }}"></script>

<script src="{{ asset('assets/Metronic-Theme/plugins/custom/datatables/datatables.bundle.js') }}"></script>



    
@show
@yield('pageScripts')
@livewireScripts
@stack('scriptsWithLivewire')

