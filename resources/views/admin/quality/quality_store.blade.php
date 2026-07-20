@extends('admin.common')
@section('title', isset($quality->id) ? 'Edit Quality' : 'Add Quality')
@section('content')

    <style>
        .store_img_view {
            width: 130px !important;
            height: 130px !important;
            object-fit: cover !important;
            border: 1px solid lightgray !important;
            background-color: white !important;
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
    </style>

    <div class="px-3 px-md-5 flex-grow-1 container-p-y">

        <div
            class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4 row-gap-4">
            <div class="d-flex flex-column justify-content-center">
                <h4 class="mb-1 ps-1">
                    @if ($quality_data == '')
                        Add a New
                    @else
                        Edit
                    @endif
                    Quality
                </h4>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-lg-12">
                <div class="card mb-6">
                    <div class="card-body">
                        <form class="form" action="{{ route('quality-store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" @if ($quality_data == '') value="add" @else
                            value="{{ $quality_data->id }}" @endif>

                            {{-- ================= BASIC INFO SECTION ================= --}}
                            

                            {{-- ================= IMAGE SECTION ================= --}}
                            <div class="form-section">

                                <div class="form-section-title">
                                    <i class='bx bx-image'></i> Image
                                </div>
                                <div class="form-section-subtitle">
                                    Upload the certificate / quality image.
                                </div>

                                <div class="row">

                                    <div class="col-12 col-lg-6 mb-3">

                                        <div class="form-group">

                                            <label class="form-label">

                                                Upload Image

                                                @if ($quality_data == '')
                                                    <span class="text-danger">*</span>
                                                @endif

                                            </label>

                                            <input type="file" name="image" id="imageInput"
                                                class="form-control @error('image') is-invalid @enderror" accept="image/*">

                                            @error('image')
                                                <span class="text-danger">
                                                    {{ $message }}
                                                </span>
                                            @enderror

                                            {{-- Image Preview Section --}}
                                            <div class="mt-3">

                                                <img id="image_preview"
                                                    src="@if($quality_data != '' && $quality_data->image){{ asset($quality_data->image) }}@endif"
                                                    class="store_img_view @if($quality_data == '' || !$quality_data->image) d-none @endif"
                                                    alt="Preview">

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                            {{-- ================= PDF SECTION ================= --}}
                            <div class="form-section">

                                <div class="form-section-title">
                                    <i class='bx bxs-file-pdf'></i> PDF Document
                                </div>
                                <div class="form-section-subtitle">
                                    Upload the related certificate / document as PDF.
                                </div>

                                <div class="row">

                                    <div class="col-12 col-lg-6 mb-3">

                                        <div class="form-group">

                                            <label class="form-label">

                                                Upload PDF

                                                @if ($quality_data == '')
                                                    <span class="text-danger">*</span>
                                                @endif

                                            </label>

                                            <input type="file" name="pdf" id="pdfInput"
                                                class="form-control @error('pdf') is-invalid @enderror"
                                                accept="application/pdf">

                                            @error('pdf')
                                                <span class="text-danger">
                                                    {{ $message }}
                                                </span>
                                            @enderror

                                            {{-- Existing PDF Link --}}
                                            @if ($quality_data != '' && $quality_data->pdf)
                                                <div class="mt-3">
                                                    <a href="{{ asset($quality_data->pdf) }}" target="_blank"
                                                        class="btn btn-sm btn-outline-primary">
                                                        <i class='bx bx-file'></i> View Current PDF
                                                    </a>
                                                </div>
                                            @endif

                                        </div>

                                    </div>

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

    </script>

@endsection