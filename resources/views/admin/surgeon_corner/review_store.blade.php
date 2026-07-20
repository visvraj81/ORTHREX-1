@extends('admin.common')
@section('title', isset($review->id) ? 'Edit Surgeon Corner' : 'Add Surgeon Corner')
@section('content')

    <style>
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

        .review-tag-check {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-right: 30px;
        }
    </style>

    <div class="px-3 px-md-5 flex-grow-1 container-p-y">

        <div
            class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4 row-gap-4">
            <div class="d-flex flex-column justify-content-center">
                <h4 class="mb-1 ps-1">
                    @if ($review_data == '')
                        Add a New
                    @else
                        Edit
                    @endif
                    Review
                </h4>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-lg-12">
                <div class="card mb-6">
                    <div class="card-body">
                        <form class="form" action="{{ route('surgeon-corner-store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" @if ($review_data == '') value="add" @else
                            value="{{ $review_data->id }}" @endif>

                            {{-- ================= REVIEWER INFO SECTION ================= --}}
                            <div class="form-section">

                                <div class="form-section-title">
                                    <i class='bx bx-user'></i> Reviewer Information
                                </div>
                                <div class="form-section-subtitle">
                                    Basic details of the surgeon / reviewer.
                                </div>

                                <div class="row">

                                    {{-- Name --}}
                                    <div class="col-12 col-lg-6 mb-3">
                                        <div class="form-group">
                                            <label class="form-label">
                                                Name
                                                <span class="text-danger">*</span>
                                            </label>

                                            <input type="text" name="name"
                                                class="form-control @error('name') is-invalid @enderror"
                                                placeholder="Enter Name" value="{{ $review_data->name ?? old('name') }}">

                                            @error('name')
                                                <span class="text-danger">
                                                    {{ $message }}
                                                </span>
                                            @enderror

                                        </div>
                                    </div>

                                    {{-- Location --}}
                                    <div class="col-12 col-lg-6 mb-3">
                                        <div class="form-group">
                                            <label class="form-label">
                                                Location
                                                <span class="text-danger">*</span>
                                            </label>

                                            <input type="text" name="location"
                                                class="form-control @error('location') is-invalid @enderror"
                                                placeholder="e.g. Pune, Maharashtra"
                                                value="{{ $review_data->location ?? old('location') }}">

                                            @error('location')
                                                <span class="text-danger">
                                                    {{ $message }}
                                                </span>
                                            @enderror

                                        </div>
                                    </div>

                                </div>

                            </div>

                            {{-- ================= REVIEW DETAIL SECTION ================= --}}
                            <div class="form-section">

                                <div class="form-section-title">
                                    <i class='bx bx-star'></i> Review Details
                                </div>
                                <div class="form-section-subtitle">
                                    Rating, product reference and review date.
                                </div>

                                <div class="row">

                                    {{-- Rating --}}
                                    <div class="col-12 col-lg-4 mb-3">
                                        <div class="form-group">
                                            <label class="form-label">
                                                Rating
                                                <span class="text-danger">*</span>
                                            </label>
                                            <select name="rating" class="form-control">
                                                <option value="">Select Rating</option>
                                                @for ($i = 5; $i >= 1; $i--)
                                                    <option value="{{ $i }}" @if(($review_data->rating ?? old('rating')) == $i)
                                                    selected @endif>
                                                        {{ $i }} Star
                                                    </option>
                                                @endfor
                                            </select>

                                            @error('rating')
                                                <span class="text-danger">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- Product Name (loaded from database) --}}
                                    <div class="col-12 col-lg-4 mb-3">
                                        <div class="form-group">
                                            <label class="form-label">
                                                Product Name
                                                <span class="text-danger">*</span>
                                            </label>
                                            <select name="product_id" class="form-control">
                                                <option value="">Select Product</option>

                                                @foreach($product_data as $item)
                                                    <option value="{{ $item->id }}" @if(
                                                        $review_data != '' &&
                                                        $review_data->product_id == $item->id
                                                    ) selected @endif>
                                                        {{ $item->title }}
                                                    </option>
                                                @endforeach

                                            </select>

                                            @error('product_id')
                                                <span class="text-danger">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- Review Date --}}
                                    <div class="col-12 col-lg-4 mb-3">
                                        <div class="form-group">
                                            <label class="form-label">
                                                Review Date
                                                <span class="text-danger">*</span>
                                            </label>

                                            <input type="date" name="review_date"
                                                class="form-control @error('review_date') is-invalid @enderror"
                                                value="{{ $review_data->review_date ?? old('review_date') }}">

                                            @error('review_date')
                                                <span class="text-danger">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                </div>

                            </div>

                            {{-- ================= REVIEW TAGS (STATIC 3 CHECKBOXES) ================= --}}
                            <div class="form-section">

                                <div class="form-section-title">
                                    <i class='bx bx-check-square'></i> Review Tags
                                </div>
                                <div class="form-section-subtitle">
                                    Select the aspects the reviewer was satisfied with.
                                </div>

                                <div class="d-flex flex-wrap">

                                    <div class="form-check review-tag-check">
                                        <input class="form-check-input" type="checkbox" name="response" value="1"
                                            id="response_check" @if(($review_data->response ?? old('response'))) checked
                                            @endif>
                                        <label class="form-check-label" for="response_check">
                                            Response
                                        </label>
                                    </div>

                                    <div class="form-check review-tag-check">
                                        <input class="form-check-input" type="checkbox" name="quality" value="1"
                                            id="quality_check" @if(($review_data->quality ?? old('quality'))) checked
                                            @endif>
                                        <label class="form-check-label" for="quality_check">
                                            Quality
                                        </label>
                                    </div>

                                    <div class="form-check review-tag-check">
                                        <input class="form-check-input" type="checkbox" name="delivery" value="1"
                                            id="delivery_check" @if(($review_data->delivery ?? old('delivery'))) checked
                                            @endif>
                                        <label class="form-check-label" for="delivery_check">
                                            Delivery
                                        </label>
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

@endsection