{{-- LIST OF JS USED --}}
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>
<script src="{{asset('vendor/aos/aos.js')}}"></script>
<script>
    var APP_URL = {!! json_encode(url('/')) !!}
    var STORAGE_URL = APP_URL + "/storage/";
</script>