@extends('layouts/main')

@section('container')
    <div class="container" style="margin-top: 7rem">
        <form action="{{ url('/Product') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row justify-content-center">
                <div class="col-md-4 mb-4">
                    <div class="col-md-12 mb-2">
                        <img id="preview-image-before-upload" src="https://www.riobeauty.co.uk/images/product_image_not_found.gif" class="w-100"
                             alt="preview image" style="max-height: 25rem;">
                    </div>
                    <input type="file" name="image" id="image">
                </div>
                <div class="col-md-6">
                    <div class="row g-3">
                        <div class="col-md-12">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                        <div class="col-md-6">
                            <label for="category" class="form-label">Category</label>
                            <input type="text" class="form-control" id="category" name="category">
                        </div>
                        <div class="col-6">
                            <label for="price" class="form-label">Price</label>
                            <input type="number" class="form-control" id="price" name="price">
                        </div>
                        <div class="col-12">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="7"></textarea>
                        </div>
                        <div class="col-12">
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-danger w-50">Create</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function (e) {
            $('#image').change(function(){
                let reader = new FileReader();
                reader.onload = (e) => {
                    $('#preview-image-before-upload').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            });
        });
    </script>@endsection
