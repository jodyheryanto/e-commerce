@extends('layouts.user_type.auth')

@section('content')
<div style="min-height: 100vh !important;">
    <div class="container-fluid py-4">
        <div class="card">
            <div class="card-header pb-0 px-3">
                <h6 class="mb-0">{{ __('Buat Produk') }}</h6>
            </div>
            <div class="card-body pt-4 p-3">
                <form action="{{ route('master-data.product.store') }}" method="POST" enctype="multipart/form-data" role="form text-left">
                    @csrf
                    @if($errors->any())
                        <div class="mt-3  alert alert-primary alert-dismissible fade show" role="alert">
                            <span class="alert-text text-white">
                            {{$errors->first()}}</span>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                <i class="fa fa-close" aria-hidden="true"></i>
                            </button>
                        </div>
                    @endif
                    @if(session('success'))
                        <div class="m-3  alert alert-success alert-dismissible fade show" id="alert-success" role="alert">
                            <span class="alert-text text-white">
                            {{ session('success') }}</span>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                <i class="fa fa-close" aria-hidden="true"></i>
                            </button>
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="name" class="form-control-label">{{ __('Nama Produk') }}<span class="text-danger">*</span></label>
                                <div class="@error('name')border border-danger rounded-3 @enderror">
                                    <input class="form-control" type="text" placeholder="Masukkan Nama Produk" id="name" name="name">
                                        @error('name')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="category" class="form-control-label">{{ __('Kategori Produk') }}<span class="text-danger">*</span></label>
                                <div class="@error('category')border border-danger rounded-3 @enderror">
                                    <select name="category" id="category" class="form-control">
                                        <option value="Baju">Baju</option>
                                        <option value="Jaket">Jaket</option>
                                        <option value="Celana">Celana</option>
                                        <option value="Sepatu">Sepatu</option>
                                    </select>
                                        @error('category')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="image" class="form-control-label">{{ __('Image') }}<span class="text-danger">*</span></label>
                                <div class="@error('image')border border-danger rounded-3 @enderror">
                                    <input class="form-control" type="file" id="image" name="image">
                                        @error('image')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="price" class="form-control-label">{{ __('Harga Produk') }}<span class="text-danger">*</span></label>
                                <div class="@error('price')border border-danger rounded-3 @enderror">
                                    <input class="form-control" type="number" placeholder="Masukkan Harga Produk" id="price" name="price" min="0">
                                        @error('price')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="quantity" class="form-control-label">{{ __('Stok Saat Ini') }}<span class="text-danger">*</span></label>
                                <div class="@error('quantity')border border-danger rounded-3 @enderror">
                                    <input class="form-control" type="number" placeholder="Masukkan Stok Saat Ini Produk" id="quantity" name="quantity" min="0">
                                        @error('quantity')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description">{{ 'Deskripsi' }}<span class="text-danger">*</span></label>
                        <div class="@error('description')border border-danger rounded-3 @enderror">
                            <textarea class="form-control" id="about" rows="3" placeholder="Masukkan deskripsi banner" name="description"></textarea>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('master-data.product.index') }}" class="btn bg-gradient-secondary btn-md mt-4 mb-4 me-3" role="button">{{ 'Kembali' }}</a>
                        <button type="submit" class="btn bg-gradient-dark btn-md mt-4 mb-4">{{ 'Simpan' }}</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection