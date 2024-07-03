<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
</script>
<script src="{{ asset('assets/js/scripts.js') }}"></script>
<script src="{{ asset('assets/js/jquery.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@livewireScripts

{{--  image  --}}
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {

            var reader = new FileReader();

            reader.onload = function(e) {
                $('.image-upload-wrap').hide();

                $('.file-upload-image').attr('src', e.target.result);
                $('.file-upload-content').show();

                $('.image-title').html(input.files[0].name);
            };

            reader.readAsDataURL(input.files[0]);

        } else {
            removeUpload();
        }
    }

    function removeUpload() {
        $('.file-upload-input').replaceWith($('.file-upload-input').clone());
        $('.file-upload-content').hide();
        $('.image-upload-wrap').show();
    }
    $('.image-upload-wrap').bind('dragover', function() {
        $('.image-upload-wrap').addClass('image-dropping');
    });
    $('.image-upload-wrap').bind('dragleave', function() {
        $('.image-upload-wrap').removeClass('image-dropping');
    });
</script>

{{-- product multipal image upload js  --}}
<script>
    jQuery(document).ready(function() {
        ImgUpload();
    });

    function ImgUpload() {
        var imgWrap = "";
        var imgArray = [];

        $('.upload__inputfile').each(function() {
            $(this).on('change', function(e) {
                imgWrap = $(this).closest('.upload__box').find('.upload__img-wrap');
                var maxLength = $(this).attr('data-max_length');

                var files = e.target.files;
                var filesArr = Array.prototype.slice.call(files);
                var iterator = 0;
                filesArr.forEach(function(f, index) {

                    if (!f.type.match('image.*')) {
                        return;
                    }

                    if (imgArray.length > maxLength) {
                        return false
                    } else {
                        var len = 0;
                        for (var i = 0; i < imgArray.length; i++) {
                            if (imgArray[i] !== undefined) {
                                len++;
                            }
                        }
                        if (len > maxLength) {
                            return false;
                        } else {
                            imgArray.push(f);

                            var reader = new FileReader();
                            reader.onload = function(e) {
                                var html =
                                    "<div class='upload__img-box'><div style='background-image: url(" +
                                    e.target.result + ")' data-number='" + $(
                                        ".upload__img-close").length + "' data-file='" + f
                                    .name +
                                    "' class='img-bg'><div class='upload__img-close'></div></div></div>";
                                imgWrap.append(html);
                                iterator++;
                            }
                            reader.readAsDataURL(f);
                        }
                    }
                });
            });
        });

        $('body').on('click', ".upload__img-close", function(e) {
            var file = $(this).parent().data("file");
            for (var i = 0; i < imgArray.length; i++) {
                if (imgArray[i].name === file) {
                    imgArray.splice(i, 1);
                    break;
                }
            }
            $(this).parent().parent().remove();
        });
    }
</script>

{{-- delete script  --}}
<script>
    $(document).ready(function() {
        $('.delate-item-btn').on('click', function(e) {
            e.preventDefault();
            const deleteRoute = $(this).data('delate-route');


            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to delete this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: "Deleted!",
                        text: "Your file has been deleted.",
                        icon: "success"
                    });

                    $.ajax({
                        url: deleteRoute,
                        type: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            Swal.fire({
                                icon: "success",
                                title: "Your work has been saved",
                                showConfirmButton: false,
                                timer: 1000
                            }).then(() => {
                                location.reload();
                            });
                        },
                        error: function(error) {
                            Swal.fire({
                                icon: "error",
                                title: "Error Processing",
                                text: "please try again"
                            })
                        }


                    })

                }
            })

        })
    })
</script>
