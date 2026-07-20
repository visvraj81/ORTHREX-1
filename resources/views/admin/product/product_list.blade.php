@extends('admin.common')
@section('title', 'Product List')
@section('content')

    <div class="px-3 px-md-5 flex-grow-1 container-p-y">

        <div
            class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4 row-gap-4">

            <div class="d-flex flex-column justify-content-center">

                <h4 class="mb-1 ps-1">
                    Product List
                </h4>

            </div>

            <div class="d-flex align-content-center flex-wrap gap-4 mt-2 mt-md-0">

                <a href="{{ route('product-add-edit', 'add') }}" role="button" class="btn btn-primary">

                    Add Product

                </a>

            </div>

        </div>

        <div class="row">

            <div class="col-12 col-lg-12">

                <div class="card mb-6">

                    <div class="card-body">

                        <table class="datatables-products table dataTable dtr-column collapsed mt-3" id="myTable"
                            aria-describedby="DataTables_Table_0_info" style="width: 100%;">

                            <thead class="border-top">

                                <tr>

                                    <th class="text-center">
                                        SL
                                    </th>

                                    <th class="text-center">
                                        Image
                                    </th>

                                    <th class="text-center">
                                        Category
                                    </th>

                                    <th class="text-center">
                                        Title
                                    </th>

                                    <th class="text-center">
                                        Actions
                                    </th>

                                </tr>

                            </thead>

                            <tbody>

                                @if(!empty($product_data) && count($product_data) != 0)

                                    @foreach ($product_data as $key => $item)

                                        <tr>

                                            {{-- SL --}}
                                            <td class="text-center">

                                                {{ $key + 1 }}

                                            </td>

                                            {{-- Image --}}
                                            <td class="text-center">

                                                @if($item->image)

                                                    <img src="{{ asset($item->image) }}" alt="{{ $item->title }}" class="rounded"
                                                        style="width: 50px; height: 50px; object-fit: cover;">

                                                @else

                                                    N/A

                                                @endif

                                            </td>

                                            {{-- Category --}}
                                            <td class="text-center">

                                                <h6 class="text-nowrap mb-0">

                                                    {{ $item->category->title ?? 'N/A' }}

                                                </h6>

                                            </td>

                                            {{-- Title --}}
                                            <td class="text-center">

                                                <h6 class="text-nowrap mb-0">

                                                    {{ $item->title ?? 'N/A' }}

                                                </h6>

                                            </td>

                                            {{-- Action --}}
                                            <td class="text-center">

                                                {{-- Edit --}}
                                                <a href="{{ route('product-add-edit', $item->id) }}" role="button"
                                                    class="btn btn-primary p-0">

                                                    <i class='bxr bx-edit m-0 p-2' style="font-size: 17px;"></i>

                                                </a>

                                                {{-- Delete --}}
                                                <a href="{{ route('product-delete', $item->id) }}" class="btn btn-danger p-0"
                                                    onclick="confirmDelete(event, '{{ route('product-delete', $item->id) }}')">

                                                    <i class="bx bx-trash m-0 p-2" style="font-size: 17px;"></i>

                                                </a>

                                            </td>

                                        </tr>

                                    @endforeach

                                @endif

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

        </div>

        {{-- Success Message --}}
        @session('success')

            <div class="custom-alert" id="custom_alert" role="alert">

                <div>

                    ✅ <strong>{{ session('success') }}</strong>

                </div>

                <span class="close-btn" onclick="this.parentElement.style.display='none';">

                    &times;

                </span>

            </div>

        @endsession

    </div>

    <script>
        setTimeout(function () {
            const alert = document.getElementById('custom_alert');
            if (alert) {
                alert.style.transition = 'opacity 0.5s ease';
                alert.style.opacity = '0';
                setTimeout(function () {
                    alert.style.display = 'none';
                }, 500);
            }
        }, 2000);
    </script>

@endsection