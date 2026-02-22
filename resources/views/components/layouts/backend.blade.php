<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ isset($title) ? $title . ' | ' : '' }}{{ config('app.name', 'Volcussoft Admin') }}</title>

    <!-- base:css -->
    <link rel="stylesheet" href="/assets/backend/vendors/typicons/typicons.css">
    <link rel="stylesheet" href="/assets/backend/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="/assets/backend/vendors/select2/select2.min.css">

    <link rel="stylesheet" href="/assets/backend/css/vertical-layout-light/style.css?ver=1.0">

    <link rel="shortcut icon" href="favicon.png" />

    <script src="https://kit.fontawesome.com/d6a9ce32ab.js" crossorigin="anonymous"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .btn-active {
            background-color: gray;
        }
    </style>

</head>
<body>
    <div class="container-scroller">

        @include('backend.includes.navbar')

        {{-- @include('backend.includes.header') --}}

        <div class="container-fluid page-body-wrapper">

            {{-- @include('backend.includes.right-menu') --}}

            @include('backend.includes.sidebar')
            <div class="main-panel">
                <div class="content-wrapper">
                    {{ $slot }}
                </div>
            </div>

        </div>

    </div>

    <script src="/assets/backend/vendors/js/vendor.bundle.base.js"></script>
    <script src="/assets/backend/js/off-canvas.js"></script>
    <script src="/assets/backend/js/hoverable-collapse.js"></script>
    <script src="/assets/backend/js/template.js"></script>
    <script src="/assets/backend/js/settings.js"></script>

    <script src="/assets/backend/vendors/select2/select2.min.js"></script>
    <script src="/assets/backend/js/file-upload.js"></script>

    <script src="https://cdn.tiny.cloud/1/oyyq1w8mrxa5ox6jbh5ek266tetatal6lfu7jq8u54mizx1p/tinymce/7/tinymce.min.js"
        referrerpolicy="origin"></script>

    <!-- End custom js for this page-->
    <script>
        (function($) {
            'use strict';
            tinymce.init({
                selector: '#tinymce',
                plugins: 'anchor autolink charmap code fullscreen image link lists media searchreplace table visualblocks wordcount linkchecker',
                toolbar: 'undo redo | fontfamily fontsize | bold italic underline | link image media table | code fullscreen | align lineheight | numlist bullist indent outdent | removeformat',
                /* enable title field in the Image dialog*/
                image_title: true,
                /* enable automatic uploads of images represented by blob or data URIs*/
                automatic_uploads: true,
                /*
                  URL of our upload handler (for more details check: https://www.tiny.cloud/docs/configure/file-image-upload/#images_upload_url)
                  images_upload_url: 'postAcceptor.php',
                  here we add custom filepicker only to Image dialog
                */
                file_picker_types: 'image',
                image_advtab: true,
                object_resizing: true,
                file_picker_callback: (cb, value, meta) => {
                    const input = document.createElement('input');
                    input.setAttribute('type', 'file');
                    input.setAttribute('accept', 'image/*');

                    input.addEventListener('change', (e) => {
                        const file = e.target.files[0];

                        const reader = new FileReader();
                        reader.addEventListener('load', () => {
                            /*
                              Note: Now we need to register the blob in TinyMCEs image blob
                              registry. In the next release this part hopefully won't be
                              necessary, as we are looking to handle it internally.
                            */
                            const id = 'blobid' + (new Date()).getTime();
                            const blobCache = tinymce.activeEditor.editorUpload.blobCache;
                            const base64 = reader.result.split(',')[1];
                            const blobInfo = blobCache.create(id, file, base64);
                            blobCache.add(blobInfo);

                            /* call the callback and populate the Title field with the file name */
                            cb(blobInfo.blobUri(), {
                                title: file.name
                            });
                        });
                        reader.readAsDataURL(file);
                    });

                    input.click();
                },
                image_class_list: [{
                        title: 'Image Left',
                        value: 'image_left'
                    },
                    {
                        title: 'Image Right',
                        value: 'image_right'
                    },
                ],
                style_formats: [{
                        title: 'Image Left',
                        selector: 'img',
                        styles: {
                            float: 'left',
                            margin: '0 10px 0 10px'
                        }
                    },
                    {
                        title: 'Image Right',
                        selector: 'img',
                        styles: {
                            float: 'right',
                            margin: '0 10px 0 10px'
                        }
                    }
                ],
            });

            if ($(".js-example-basic-single").length) {
                $(".js-example-basic-single").select2();
            }
            if ($(".js-example-basic-multiple").length) {
                $(".js-example-basic-multiple").select2();
            }
            if ($('#add-more').length) {
                $('#add-more').click(function(e) {
                    e.preventDefault();
                    const toappend = `
                    <div class="form-group row">
                        <div class="col-md-4">
                        <input type="text" name="total[]" class="form-control" required>
                        </div>
                        <div class="col-md-4">
                        <input type="text" name="subtitle[]" class="form-control" required>
                        </div>
                        <div class="col-md-4">
                        <input type="text" name="linkTo[]" class="form-control">
                        </div>
                    </div>
                    `;
                    $('.stats-wrapper').append(toappend);
                });
            }
        })(jQuery);
    </script>

    @stack('scripts')
</body>
</html>