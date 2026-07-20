@extends('admin.common')
@section('title', 'Surgeon Corner List')
@section('content')

    <div class="px-3 px-md-5 flex-grow-1 container-p-y">

        <div
            class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4 row-gap-4">

            <div class="d-flex flex-column justify-content-center">

                <h4 class="mb-1 ps-1">
                    Surgeon Corner - Review List
                </h4>

            </div>

            <div class="d-flex align-content-center flex-wrap gap-4 mt-2 mt-md-0">

                <a href="{{ route('surgeon-corner-add-edit', 'add') }}" role="button" class="btn btn-primary">

                    Add Review

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
                                        Name
                                    </th>

                                    <th class="text-center">
                                        Location
                                    </th>

                                    <th class="text-center">
                                        Rating
                                    </th>

                                    <th class="text-center">
                                        Product
                                    </th>

                                    <th class="text-center">
                                        Date
                                    </th>

                                    <th class="text-center">
                                        Tags
                                    </th>

                                    <th class="text-center">
                                        Actions
                                    </th>

                                </tr>

                            </thead>

                            <tbody>

                                @if(!empty($review_data) && count($review_data) != 0)

                                    @foreach ($review_data as $key => $item)

                                        <tr>

                                            {{-- SL --}}
                                            <td class="text-center">

                                                {{ $key + 1 }}

                                            </td>

                                            {{-- Name --}}
                                            <td class="text-center">

                                                <h6 class="text-nowrap mb-0">
                                                    {{ $item->name }}
                                                </h6>

                                            </td>

                                            {{-- Location --}}
                                            <td class="text-center">

                                                {{ $item->location }}

                                            </td>

                                            {{-- Rating --}}
                                            <td class="text-center">

                                                @for ($i = 1; $i <= 5; $i++)
                                                    <i class="bx {{ $i <= $item->rating ? 'bxs-star text-warning' : 'bx-star' }}"></i>
                                                @endfor

                                            </td>

                                            {{-- Product --}}
                                            <td class="text-center">

                                                {{ $item->product->title ?? 'N/A' }}

                                            </td>

                                            {{-- Date --}}
                                            <td class="text-center">

                                                {{ \Carbon\Carbon::parse($item->review_date)->format('d-M-y') }}

                                            </td>

                                            {{-- Tags --}}
                                            <td class="text-center">

                                                @if($item->response)
                                                    <span class="badge bg-label" style=" color: #261c1c;background:
                                                                        #ebebc8;"">Response</span>
                                                @endif

                                                            @if($item->quality)
                                                                <span class=" badge bg-label" style=" color: #261c1c;background:
                                                                    #ebebc8;"">Quality</span>
                                                            @endif

                                                            @if($item->delivery)
                                                                <span class=" badge bg-label" style=" color: #261c1c;background:
                                                                    #ebebc8;"">Delivery</span>
                                                            @endif

                                                        </td>

                                                        {{-- Action --}}
                                                        <td class=" text-center">

                                                    {{-- Edit --}}
                                                    <a href="{{ route('surgeon-corner-add-edit', $item->id) }}" role="button"
                                                        class="btn btn-primary p-0">

                                                        <i class='bxr bx-edit m-0 p-2' style="font-size: 17px;"></i>

                                                    </a>

                                                    {{-- Delete --}}
                                                    <a href="{{ route('surgeon-corner-delete', $item->id) }}"
                                                        class="btn btn-danger p-0"
                                                        onclick="confirmDelete(event, '{{ route('surgeon-corner-delete', $item->id) }}')">

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