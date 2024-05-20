@extends('layouts.app')

@section('title', 'Category')

@push('style')
    <!-- CSS Libraries -->
    {{-- <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}"> --}}
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Category</h1>
            </div>
            <div class="section-body">
                <h2 class="section-title">Category</h2>
                <p class="section-lead">You can manage all categories, such as changing, deleting and others.</p>
                <div class="row">
                    <div class="col-8">
                        <div class="card">
                            <div class="section-header-button pl-4 pt-4">
                                <a href="{{ route('productCategory.create') }}" class="btn btn-primary">
                                    <i class="fas fa-plus"></i>
                                    Add Category
                                </a>
                            </div>
                            <div class="card-header">
                                <h4>Categories</h4>
                                <div class="card-header-form">
                                    <form>
                                        {{-- Search Category --}}
                                        <div class="input-group d-flex align-items-center">
                                            <input type="text" name="category_search" class="form-control"
                                                placeholder="Cari Category" value="{{ Request::get('category_search') }}">
                                            <div class="input-group-btn">
                                                <button class="btn btn-icon btn-primary">
                                                    <i class="fas fa-magnifying-glass"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="card-body">
                                {{-- Category Table --}}
                                <div class="table-responsive">
                                    <table class="table-bordered table-sm table-hover table-striped table">
                                        <thead>
                                            <tr class="text-center">
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Created At</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($productCategories as $category)
                                                <tr>
                                                    <td class="align-middle text-center">
                                                        {{ $productCategories->firstItem() + $loop->index }}</td>
                                                    <td class="align-middle">{{ $category->name }}</td>
                                                    <td class="align-middle">{{ $category->created_at }}</td>
                                                    <td class="align-middle text-center">
                                                        <a href="{{ route('productCategory.edit', $category->slug) }}"
                                                            class="btn btn-outline-dark btn-icon">
                                                            <i class="far fa-edit"></i>
                                                        </a>
                                                        <form action="{{ route('productCategory.destroy', $category->id) }}"
                                                            method="POST" class="d-inline">
                                                            @csrf
                                                            <input type="hidden" name="_method" value="DELETE">
                                                            <button
                                                                class="btn btn-outline-danger btn-icon swal-confirm-delete"
                                                                data-name="{{ $category->name }}">
                                                                <i class="fas fa-trash-alt"></i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer text-right float-right">
                                {{ $productCategories->withQueryString()->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
@endpush
