@extends('admin.common')
@section('title', isset($category_data->id) ? 'Edit Category' : 'Add Category')
@section('content')

    <div class="px-3 px-md-5 flex-grow-1 container-p-y">

        <div
            class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4 row-gap-4">

            <div class="d-flex flex-column justify-content-center">
                <h4 class="mb-1 ps-1">
                    @if ($category_data == '')
                        Add New Category
                    @else
                        Edit Category
                    @endif
                </h4>
            </div>

        </div>

        <div class="row">
            <div class="col-12 col-lg-12">

                <div class="card mb-6">
                    <div class="card-body">

                        <form action="{{ route('category-store') }}" method="POST">
                            @csrf

                            <input type="hidden" name="id" @if ($category_data == '') value="add" @else
                            value="{{ $category_data->id }}" @endif>

                            <div class="row">

                                <div class="col-lg-6 mb-3">
                                    <div class="form-group">

                                        <label class="form-label">
                                            Category Name
                                            <span class="text-danger">*</span>
                                        </label>

                                        <input type="text" name="title"
                                            class="form-control @error('title') is-invalid @enderror"
                                            placeholder="Enter Category Name" @if ($category_data == '')
                                            value="{{ old('title') }}" @else value="{{ $category_data->title }}" @endif>

                                        @error('title')
                                            <span class="text-danger">
                                                {{ $message }}
                                            </span>
                                        @enderror

                                    </div>
                                </div>

                            </div>

                            <!-- Banner Section -->
                            <div class="card mb-4">
                                <div class="card-body">

                                    <div class="d-flex align-items-center mb-1">
                                        <i class="bx bx-image text-primary me-2 fs-4"></i>
                                        <h5 class="mb-0">Banner Section</h5>
                                    </div>
                                    <p class="text-muted mb-4">Content shown on the page banner/hero area.</p>

                                    <div class="row">

                                        <div class="col-lg-6 mb-3">
                                            <div class="form-group">

                                                <label class="form-label">
                                                    Banner Subtitle
                                                    <span class="text-danger">*</span>
                                                </label>

                                                <input type="text" name="banner_subtitle"
                                                    class="form-control @error('banner_subtitle') is-invalid @enderror"
                                                    placeholder="Enter Banner Subtitle"
                                                    @if ($category_data == '') value="{{ old('banner_subtitle') }}"
                                                    @else value="{{ $category_data->banner_subtitle }}" @endif>

                                                @error('banner_subtitle')
                                                    <span class="text-danger">
                                                        {{ $message }}
                                                    </span>
                                                @enderror

                                            </div>
                                        </div>

                                        <div class="col-lg-6 mb-3">
                                            <div class="form-group">

                                                <label class="form-label">
                                                    Banner Description
                                                    <span class="text-danger">*</span>
                                                </label>

                                                <textarea name="banner_description" rows="3"
                                                    class="form-control @error('banner_description') is-invalid @enderror"
                                                    placeholder="Enter Banner Description">@if ($category_data == ''){{ old('banner_description') }}@else{{ $category_data->banner_description }}@endif</textarea>

                                                @error('banner_description')
                                                    <span class="text-danger">
                                                        {{ $message }}
                                                    </span>
                                                @enderror

                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>

                            <!-- Content Section -->
                            <div class="card mb-4">
                                <div class="card-body">

                                    <div class="d-flex align-items-center mb-1">
                                        <i class="bx bx-text text-primary me-2 fs-4"></i>
                                        <h5 class="mb-0">Content Section</h5>
                                    </div>
                                    <p class="text-muted mb-4">Main body heading and description shown below the banner.</p>

                                    <div class="row">

                                        <div class="col-lg-6 mb-3">
                                            <div class="form-group">

                                                <label class="form-label">
                                                    Section Title
                                                    <span class="text-danger">*</span>
                                                </label>

                                                <input type="text" name="section_title"
                                                    class="form-control @error('section_title') is-invalid @enderror"
                                                    placeholder="Enter Section Title"
                                                    @if ($category_data == '') value="{{ old('section_title') }}"
                                                    @else value="{{ $category_data->section_title }}" @endif>

                                                @error('section_title')
                                                    <span class="text-danger">
                                                        {{ $message }}
                                                    </span>
                                                @enderror

                                            </div>
                                        </div>

                                        <div class="col-lg-6 mb-3">
                                            <div class="form-group">

                                                <label class="form-label">
                                                    Section Description
                                                    <span class="text-danger">*</span>
                                                </label>

                                                <textarea name="section_description" rows="3"
                                                    class="form-control @error('section_description') is-invalid @enderror"
                                                    placeholder="Enter Section Description">@if ($category_data == ''){{ old('section_description') }}@else{{ $category_data->section_description }}@endif</textarea>

                                                @error('section_description')
                                                    <span class="text-danger">
                                                        {{ $message }}
                                                    </span>
                                                @enderror

                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary mt-3">
                                SUBMIT
                            </button>

                        </form>

                    </div>
                </div>

            </div>
        </div>

    </div>

@endsection