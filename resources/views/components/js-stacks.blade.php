{{-- LIST OF JS USED --}}
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>
<script src="{{ asset('vendor/aos/aos.js') }}"></script>
<script src="{{ asset('vendor/ckeditor4/ckeditor.js') }}"></script>
<script>
    var APP_URL = {!! json_encode(url('/')) !!}
    var STORAGE_URL = APP_URL + "/storage/";
    var editor = document.getElementById("editor");
    CKEDITOR.replace(editor, { language: 'en-gb' });
    CKEDITOR.config.allowedContent = true;
    // ClassicEditor
    //     .create(document.querySelector('#editor'))
    //     .catch(error => {
    //         console.error(error);
    //     });
    // var allEditors = document.querySelectorAll('#editor');
    // for (var i = 0; i < allEditors.length; ++i) {
    //     ClassicEditor.create(allEditors[i]);
    // }
</script>
