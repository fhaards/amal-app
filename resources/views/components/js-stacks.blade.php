{{-- LIST OF JS USED --}}
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>
<script src="{{ asset('vendor/aos/aos.js') }}"></script>
{{-- <script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script> --}}
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    var APP_URL = {!! json_encode(url('/')) !!}
    var STORAGE_URL = APP_URL + "/storage/";
    tinymce.init({
        selector: '#tinymce'
    });

    // var allEditors = document.querySelectorAll('#editor');
    // for (var i = 0; i < allEditors.length; ++i) {
    //     ClassicEditor.create(allEditors[i]);
    // }

    // ClassicEditor
    //     .create(document.querySelector('#editor'))
    //     .catch(error => {
    //         console.error(error);
    //     });
    // var editor = document.getElementById("editor");
    // CKEDITOR.replace(editor, { language: 'en-gb' });
    // CKEDITOR.config.allowedContent = true;
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
