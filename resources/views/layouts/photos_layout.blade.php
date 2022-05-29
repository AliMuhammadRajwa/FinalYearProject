{{--@extends('layouts.layout')--}}
<section>

    <style>
        .container {
            max-width: 100%;
        }

        dl, ol, ul {
            margin: 0;
            padding: 0;
            list-style: none;
        }

        .imgPreview img {
            padding: 5px;
            max-width: 150px;
        }
    </style>

    <div class="container mt-5">
        {{--        <form action="{{route('remove')}}" method="post"  enctype="multipart/form-data">--}}
        {{--            @csrf--}}
        {{--            @if ($message = Session::get('success'))--}}
        {{--                <div class="alert alert-success">--}}
        {{--                    <strong>{{ $message }}</strong>--}}
        {{--                </div>--}}
        {{--            @endif--}}

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="user-image mb-3 text-center">
            <div class="imgPreview">
{{--                    @forelse($EntityResources as $EntityResource)--}}
{{--                        <img id="imageValues" src="{{asset('img/' . $EntityResource->file_name)}}">--}}

{{--                    @empty--}}
{{--                        <option value="">No Images Found!!!</option>--}}
{{--                    @endforelse--}}
            </div>
        </div>

        <div class="custom-file">
            <input type="file" name="imageFile[]" class="custom-file-input" id="images" accept="image/*" multiple>
            <label class="custom-file-label" for="images">Choose image</label>
        </div>

        {{--        <button type="submit" name="submit" class="btn btn-primary btn-block mt-4">--}}
        {{--            Upload Images--}}
        {{--        </button>--}}
        <button class="btn  btn-danger btn-block mt-4" onclick="remove_image();"> Remove <i
                class="icon-trash"></i></button>
        {{--        </form>--}}
    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script>
        $(function () {
            // Multiple images preview with JavaScript
            var multiImgPreview = function (input, imgPreviewPlaceholder) {

                if (input.files) {
                    var filesAmount = input.files.length;

                    for (i = 0; i < filesAmount; i++) {
                        var reader = new FileReader();

                        if (filesAmount <= 3) {
                            reader.onload = function (event) {
                                $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(imgPreviewPlaceholder);
                                // $($.parseHTML('<a href="Javascript:remove_image();" class="btn btn-sm btn-danger"> Remove <i class="icon-trash"></i></a>')).appendTo(imgPreviewPlaceholder);
                            }
                        } else {
                            alert('Please select max 3 images!');
                            break;
                        }

                        reader.readAsDataURL(input.files[i]);
                    }
                }

            };

            $('#images').on('change', function () {
                multiImgPreview(this, 'div.imgPreview');
            });

            $(document).ready(function () {
                let images = document.getElementById('imageValues');
                var l = images.length;

                for (var i = 0; i < l; i++) {
                    $("#images").val(images[i]);
                }
            });

        });
    </script>


    <script type="text/javascript">

        function remove_image() {
            // $("#imageId").remove();
            var images = document.getElementsByTagName('img');
            var l = images.length;

            for (var i = 0; i < l; i++) {
                images[0].parentNode.removeChild(images[0]);
            }

            $("#images").val('');
        }
    </script>
</section>
