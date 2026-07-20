@extends('admin.common')
@section('title', isset($product->id) ? 'Edit Product' : 'Add Product')
@section('content')

    <style>
        .store_img_view {
            width: 130px !important;
            height: 130px !important;
            object-fit: cover !important;
            border: 1px solid lightgray !important;
            background-color: white !important;
        }

        .detail-row {
            border: 1px solid #e7e7e7;
            border-radius: 8px;
            padding: 15px;
            padding-top: 35px;
            margin-bottom: 15px;
            position: relative;
        }

        .remove-row-btn {
            position: absolute !important;
            top: 8px;
            right: 8px;
            width: auto !important;
            height: auto !important;
            display: inline-flex !important;
            align-items: center;
            justify-content: center;
            padding: 4px 8px !important;
            line-height: 1;
            z-index: 2;
        }

        .remove-row-btn i {
            font-size: 15px;
            margin: 0;
        }

        .form-section {
            border: 1px solid #eaeaea;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 25px;
            background-color: #fbfbfb;
        }

        .form-section-title {
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 4px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .form-section-title i {
            font-size: 18px;
            color: #696cff;
        }

        .form-section-subtitle {
            font-size: 13px;
            color: #8a8d93;
            margin-bottom: 18px;
        }

        /* Give the CKEditor a comfortable minimum height */
        .ck-editor__editable_inline {
            min-height: 180px;
        }
    </style>

    {{-- CKEditor 5 (Classic build) — supports Bold, Italic, Lists and Table insertion --}}
    <script src="https://cdn.ckeditor.com/ckeditor5/41.0.0/classic/ckeditor.js"></script>

    <div class="px-3 px-md-5 flex-grow-1 container-p-y">

        <div
            class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4 row-gap-4">
            <div class="d-flex flex-column justify-content-center">
                <h4 class="mb-1 ps-1">
                    @if ($product_data == '')
                        Add a New
                    @else
                        Edit
                    @endif
                    Product
                </h4>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-lg-12">
                <div class="card mb-6">
                    <div class="card-body">
                        <form class="form" action="{{ route('product-store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" @if ($product_data == '') value="add" @else
                            value="{{ $product_data->id }}" @endif>

                            {{-- ================= BASIC INFO SECTION ================= --}}
                            <div class="form-section">

                                <div class="form-section-title">
                                    <i class='bx bx-package'></i> Basic Information
                                </div>
                                <div class="form-section-subtitle">
                                    Core details used to identify this product.
                                </div>

                                <div class="row">

                                    {{-- Category Dropdown --}}
                                    <div class="col-12 col-lg-6 mb-3">
                                        <div class="form-group">
                                            <label class="form-label">
                                                Select Category
                                                <span class="text-danger">*</span>
                                            </label>
                                            <select name="category_id" class="form-control">
                                                <option value="">
                                                    Select Category
                                                </option>

                                                @foreach($category_data as $item)
                                                    <option value="{{ $item->id }}" @if(
                                                        $product_data != '' &&
                                                        $product_data->category_id == $item->id
                                                    ) selected @endif>
                                                        {{ $item->title }}
                                                    </option>
                                                @endforeach

                                            </select>

                                            @error('category_id')
                                                <span class="text-danger">
                                                    {{ $message }}
                                                </span>
                                            @enderror

                                        </div>
                                    </div>

                                    {{-- Title --}}
                                    <div class="col-12 col-lg-6 mb-3">
                                        <div class="form-group">
                                            <label class="form-label">
                                                Title
                                                <span class="text-danger">*</span>
                                            </label>

                                            <input type="text" name="title"
                                                class="form-control @error('title') is-invalid @enderror"
                                                placeholder="Enter Title"
                                                value="{{ $product_data->title ?? old('title') }}">

                                            @error('title')
                                                <span class="text-danger">
                                                    {{ $message }}
                                                </span>
                                            @enderror

                                        </div>
                                    </div>

                                </div>

                            </div>

                            {{-- ================= BANNER SECTION ================= --}}
                            <div class="form-section">

                                <div class="form-section-title">
                                    <i class='bx bx-image-alt'></i> Banner Section
                                </div>
                                <div class="form-section-subtitle">
                                    Content shown on the page banner/hero area.
                                </div>

                                <div class="row">

                                    {{-- Banner Subtitle --}}
                                    <div class="col-12 col-lg-6 mb-3">
                                        <div class="form-group">
                                            <label class="form-label">
                                                Banner Subtitle
                                                <span class="text-danger">*</span>
                                            </label>

                                            <input type="text" name="banner_subtitle"
                                                class="form-control @error('banner_subtitle') is-invalid @enderror"
                                                placeholder="Enter Banner Subtitle"
                                                value="{{ $product_data->banner_subtitle ?? old('banner_subtitle') }}">

                                            @error('banner_subtitle')
                                                <span class="text-danger">
                                                    {{ $message }}
                                                </span>
                                            @enderror

                                        </div>
                                    </div>

                                    {{-- Banner Description --}}
                                    <div class="col-12 col-lg-6 mb-3">
                                        <div class="form-group">
                                            <label class="form-label">
                                                Banner Description
                                                <span class="text-danger">*</span>
                                            </label>

                                            <textarea name="banner_description" rows="3"
                                                class="form-control @error('banner_description') is-invalid @enderror"
                                                placeholder="Enter Banner Description">{{ $product_data->banner_description ?? old('banner_description') }}</textarea>

                                            @error('banner_description')
                                                <span class="text-danger">
                                                    {{ $message }}
                                                </span>
                                            @enderror

                                        </div>
                                    </div>

                                </div>

                            </div>

                            {{-- ================= PRODUCT IMAGE SECTION ================= --}}
                            <div class="form-section">

                                <div class="form-section-title">
                                    <i class='bx bx-image'></i> Product Image
                                </div>
                                <div class="form-section-subtitle">
                                    Upload the main image representing this product.
                                </div>

                                <div class="row">

                                    <div class="col-12 col-lg-6 mb-3">

                                        <div class="form-group">

                                            <label class="form-label">

                                                Upload Image

                                                <span class="text-danger">*</span>

                                            </label>

                                            <input type="file" name="image" id="imageInput"
                                                class="form-control @error('image') is-invalid @enderror"
                                                accept="image/*">

                                            @error('image')
                                                <span class="text-danger">
                                                    {{ $message }}
                                                </span>
                                            @enderror

                                            {{-- Image Preview Section --}}
                                            <div class="mt-3">

                                                <img id="image_preview" src="@if($product_data != '' && $product_data->image){{ asset($product_data->image) }}@endif"
                                                    class="store_img_view @if($product_data == '' || !$product_data->image) d-none @endif"
                                                    alt="Preview">

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div> 
                            {{-- ================= SUMMARY NOTE SECTION (RICH TEXT: BOLD + TABLE) ================= --}}
                            <div class="form-section">

                                <div class="form-section-title">
                                    <i class='bx bx-note'></i> Product Details
                                </div>
                                <div class="form-section-subtitle">
                                     Add one or more specification rows for this product.
                                </div>

                                <div class="form-group">

                                    <textarea name="summary_note" id="summary_note" rows="6"
                                        class="form-control @error('summary_note') is-invalid @enderror"
                                        placeholder="Enter Summary Note">{{ $product_data->table_description ?? old('table_description') }}</textarea>

                                    @error('summary_note')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror

                                </div>

                            </div>

                            <button type="submit" class="btn btn-primary mt-2">
                                SUBMIT
                            </button>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <script>

        // Image Preview
        document.getElementById('imageInput').addEventListener('change', function (e) {

            const file = e.target.files[0];

            if (file) {

                const imageURL = URL.createObjectURL(file);

                const preview = document.getElementById('image_preview');

                preview.src = imageURL;

                preview.classList.remove('d-none');
            }

        });

    

        // ===================== SUMMARY NOTE — RICH TEXT EDITOR (BOLD + TABLE) =====================

        ClassicEditor
            .create(document.querySelector('#summary_note'), {
                toolbar: [
                    'bold', 'italic', 'underline', '|',
                    'bulletedList', 'numberedList', '|',
                    'insertTable', '|',
                    'undo', 'redo'
                ],
                table: {
                    contentToolbar: [
                        'tableColumn', 'tableRow', 'mergeTableCells'
                    ]
                }
            })
            .catch(function (error) {
                console.error(error);
            });

    </script>

@endsection