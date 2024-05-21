@extends('layouts.app')

@section('title', 'Detail Product')

@push('style')
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Detail Product</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href=" {{ route('home') }} ">Dashboard</a></div>
                    <div class="breadcrumb-item">Detail Product</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row mb-4">
                                    <div class="col-12 col-md-6">
                                        <div id="carouselExampleIndicators3" class="carousel slide" data-ride="carousel">
                                            <ol class="carousel-indicators">
                                                @foreach ($images as $image)
                                                    <li data-target="#carouselExampleIndicators3"
                                                        data-slide-to="{{ $loop->index }}"
                                                        class="{{ $loop->first ? 'active' : '' }}">
                                                    </li>
                                                @endforeach
                                            </ol>
                                            <div class="carousel-inner">
                                                @foreach ($images as $image)
                                                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                                        <img class="d-block w-100 rounded rounded-4"
                                                            src="{{ $image['image_url'] }}" alt="{{ $image['image_url'] }}">
                                                    </div>
                                                @endforeach
                                            </div>
                                            <a class="carousel-control-prev" href="#carouselExampleIndicators3"
                                                role="button" data-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                            <a class="carousel-control-next" href="#carouselExampleIndicators3"
                                                role="button" data-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Next</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 mt-3 mt-md-0">
                                        <h3 class="text-dark mb-1">{{ $product->name }}</h3>
                                        <h6 class="font-weight-normal">{{ $product->productCategory->name }}</h6>
                                        <h5 class="text-danger mb-4">{{ $product->price }}</h5>
                                        <p class="mb-0">Colors :</p>
                                        <div class="d-flex mb-4">
                                            @foreach ($colors as $color)
                                                <div class="badge badge-primary badge-pill border text-secondary mr-2"
                                                    style="background-color: {{ $color['hex_code'] }}; width: 40px; height: 40px">
                                                </div>
                                            @endforeach
                                        </div>
                                        <p class="mb-0">Sizes :</p>
                                        <div class="d-flex mb-5">
                                            @foreach ($sizes as $size)
                                                <div class="badge badge-white border text-dark font-weight-normal mr-2">
                                                    <span style="font-size: 18px">
                                                        {{ $size['value'] }}
                                                    </span>
                                                </div>
                                            @endforeach
                                        </div>
                                        <button type="button" class="btn btn-primary w-100 mb-2">Add To Bag</button>
                                        <button type="button" class="btn btn-outline-primary w-100">Add To
                                            Wishlist</button>
                                    </div>
                                </div>
                                <h6 class="font-weight-normal mb-0 text-dark">Product Description</h6>
                                <div class="nike-divider my-3"></div>
                                <h4 class="text-dark mb-1">{{ $product->name }}</h4>
                                <h6 class="font-weight-normal mb-3">{{ $product->productCategory->name }}</h6>
                                <p>{{ $product->description }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
