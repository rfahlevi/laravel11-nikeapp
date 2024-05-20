@extends('layouts.app')

@section('title', 'Edit Category')

@push('style')
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Category</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href=" {{ route('productCategory.index') }} ">Category</a></div>
                    <div class="breadcrumb-item">Edit Category</div>
                </div>
            </div>
            <div class="section-body">
                <h2 class="section-title">Edit Category</h2>
                <p class="section-lead">Complete the form below to edit category.</p>
                <form action="{{ route('productCategory.update', $productCategory->slug) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-8">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Edit Category Form</h4>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Category Name</label>
                                        <input type="text" name="name" value="{{ $productCategory->name }}"
                                            class="form-control @error('name') is-invalid @enderror">
                                        @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <div class="buttons float-right">
                                            <button type="submit" class="btn btn-lg btn-primary">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
@endsection
