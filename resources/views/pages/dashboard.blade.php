@extends('layouts.app')

@section('title', 'Product')

@push('style')
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            {{-- Product Categories --}}
            <div class="section-header">
                <div class="d-flex flex-column w-100">
                    <h6 class="text-dark mb-0">Product Categories</h6>
                    <div class="nike-divider my-3"></div>
                    <div class="selectgroup selectgroup-pills">
                        <form id="product_category" action="{{ route('home') }}" method="GET">
                            <label class="selectgroup-item">
                                <input type="radio" name="product_category" value="0" class="selectgroup-input"
                                    {{ request('product_category') == 0 ? 'checked' : '' }} onclick="submitCategoryForm();">
                                <span class="selectgroup-button selectgroup-button-icon">All Products</span>
                            </label>
                            @foreach ($productCategories as $productCategory)
                                <label class="selectgroup-item">
                                    <input type="radio" name="product_category" value="{{ $productCategory->id }}"
                                        class="selectgroup-input"
                                        {{ request('product_category') == $productCategory->id ? 'checked' : '' }}
                                        onclick="submitCategoryForm();">
                                    <span
                                        class="selectgroup-button selectgroup-button-icon">{{ $productCategory->name }}</span>
                                </label>
                            @endforeach
                        </form>
                    </div>
                </div>
            </div>
            {{-- List of Products --}}
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex flex-column w-100">
                                    <div class="d-flex flex-column flex-md-row justify-content-between">
                                        <h4 class="text-dark mb-0">Products</h4>
                                        <div class="card-header-form">
                                            <form>
                                                {{-- Search User --}}
                                                <div class="input-group d-flex align-items-center">
                                                    <input type="text" name="product_search" class="form-control"
                                                        placeholder="Search Product"
                                                        value="{{ Request::get('product_search') }}">
                                                    <div class="input-group-btn">
                                                        <button class="btn btn-icon btn-primary">
                                                            <i class="fas fa-magnifying-glass"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="nike-divider my-3"></div>
                                    @if (count($products) > 0)
                                        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
                                            @foreach ($products as $product)
                                                <div class="col mb-3 ">
                                                    <a href="{{ route('products.show', $product->slug) }}"
                                                        class="text-decoration-none text-reset">
                                                        <div class="card border rounded rounded-4">
                                                            <img src="{{ $product->image[0]['image_url'] ?? 'http://laravel11-nikeapp.test/storage/products/aj-1.jpg' }}"
                                                                class="card-img-top p-2 img-rounded" height="150"
                                                                style="object-fit: cover;"
                                                                alt="Hollywood Sign on The Hill" />
                                                            <div class="card-body p-2">
                                                                <h5 class="card-title text-dark"
                                                                    style=" display: -webkit-box;-webkit-line-clamp: 1; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                                                    {{ $product->name }}</h5>
                                                                <h6 class="text-dark font-weight-medium">
                                                                    {{ $product->productCategory->name }}</h6>
                                                                <p class="card-text"
                                                                    style=" display: -webkit-box;-webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                                                    {{ $product->description }}</p>
                                                                <p class="text-danger font-weight-semibold">
                                                                    {{ $product->price }}
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            @endforeach
                                        </div>
                                    @else
                                        <div class="d-flex flex-column justify-content-center align-items-center w-100">
                                            <img src="{{ asset('img/img_empty.png') }}" alt="empty" width="100"
                                                height="100" class="mb-3">
                                            <h6 class="text-dark font-weight-normal">Oopss, No products found...</h6>
                                        </div>
                                    @endif

                                    <div class="card-footer text-right float-right">
                                        {{ $products->withQueryString()->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('.selectgroup-input').change(function() {
                $('.selectgroup-input').not(this).prop('checked', false);
            })
        });

        function submitCategoryForm() {
            document.getElementById('product_category').submit();
        }
    </script>
@endpush
