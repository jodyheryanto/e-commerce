@extends('layouts.user_type.auth')

@section('content')
<div style="min-height: 100vh !important;">
    <div class="container-fluid py-4">
        <div class="card">
            <div class="card-header pb-0 px-3">
                <h6 class="mb-0">{{ __('Tentang Perusahaan') }}</h6>
            </div>
            <div class="card-body pt-4 p-3">
                <form action="{{ route('cms.about-company.update', $aboutCompany->id) }}" method="POST" enctype="multipart/form-data" role="form text-left">
                    @csrf
                    @method('PUT')
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
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="company_name" class="form-control-label">{{ __('Nama Perusahaan') }}<span class="text-danger">*</span></label>
                                <div class="@error('company_name')border border-danger rounded-3 @enderror">
                                    <input class="form-control" type="text" placeholder="Nama Perusahaan" id="company_name" name="company_name" value="{{ $aboutCompany->company_name }}">
                                        @error('company_name')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="description" class="form-control-label">{{ __('Deskripsi Perusahaan') }}<span class="text-danger">*</span></label>
                                <div class="@error('description')border border-danger rounded-3 @enderror">
                                    <input class="form-control" type="text" placeholder="Deskripsi Perusahaan" id="description" name="description" value="{{ $aboutCompany->description }}">
                                        @error('description')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phone" class="form-control-label">{{ __('Nomor Telepon') }}<span class="text-danger">*</span></label>
                                <div class="@error('phone')border border-danger rounded-3 @enderror">
                                    <input class="form-control" type="text" placeholder="Nomor telepon perusahaan" id="phone" name="phone" value="{{ $aboutCompany->phone }}">
                                        @error('phone')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email" class="form-control-label">{{ __('Email') }}<span class="text-danger">*</span></label>
                                <div class="@error('email')border border-danger rounded-3 @enderror">
                                    <input class="form-control" type="text" placeholder="Email Perusahaan" id="email" name="email" value="{{ $aboutCompany->email }}">
                                        @error('email')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="address">{{ 'Alamat' }}</label>
                        <div class="@error('address')border border-danger rounded-3 @enderror">
                            <textarea class="form-control" id="address" rows="3" placeholder="Masukkan alamat" name="address">{{ $aboutCompany->address }}</textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <div class="@error('phone')border border-danger rounded-3 @enderror">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text text-danger" id="basic-addon1"><i class="fab fa-twitter text-dark"></i>*</span>
                                        <input type="text" name="twitter" class="form-control" placeholder="Link twitter" aria-label="Username" aria-describedby="basic-addon1" value="{{ $aboutCompany->twitter }}">
                                    </div>
                                        @error('phone')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <div class="@error('phone')border border-danger rounded-3 @enderror">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text text-danger" id="basic-addon1"><i class="fab fa-facebook-f text-dark"></i>*</span>
                                        <input type="text" name="facebook" class="form-control" placeholder="Link facebook" aria-label="Username" aria-describedby="basic-addon1" value="{{ $aboutCompany->facebook }}">
                                    </div>
                                        @error('phone')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <div class="@error('phone')border border-danger rounded-3 @enderror">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text text-danger" id="basic-addon1"><i class="fab fa-instagram text-dark"></i>*</span>
                                        <input type="text" name="instagram" class="form-control" placeholder="Link instagram" aria-label="Username" aria-describedby="basic-addon1" value="{{ $aboutCompany->instagram }}">
                                    </div>
                                        @error('phone')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <div class="@error('phone')border border-danger rounded-3 @enderror">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text text-danger" id="basic-addon1"><i class="fab fa-youtube text-dark"></i>*</span>
                                        <input type="text" name="youtube" class="form-control" placeholder="Link youtube" aria-label="Username" aria-describedby="basic-addon1" value="{{ $aboutCompany->youtube }}">
                                    </div>
                                        @error('phone')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="privacy_policy" class="form-control-label">{{ __('Privacy Policy') }}<span class="text-danger">*</span></label>
                                <div class="@error('privacy_policy')border border-danger rounded-3 @enderror">
                                    <input class="form-control" type="file" id="privacy_policy" name="privacy_policy" value="{{ $aboutCompany->privacy_policy }}">
                                        @error('privacy_policy')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                    <a href="{{ url('/storage/' . $aboutCompany->privacy_policy) }}" target="_blank" class="btn btn-primary mt-2">Dokumen saat ini</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="terms_and_conditions" class="form-control-label">{{ __('Terms and Conditions') }}<span class="text-danger">*</span></label>
                                <div class="@error('terms_and_conditions')border border-danger rounded-3 @enderror">
                                    <input class="form-control" type="file" id="terms_and_conditions" name="terms_and_conditions" value="{{ $aboutCompany->terms_and_conditions }}">
                                        @error('terms_and_conditions')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                    <a href="{{ url('/storage/' . $aboutCompany->terms_and_conditions) }}" target="_blank" class="btn btn-primary mt-2">Dokumen saat ini</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="sales_and_refund" class="form-control-label">{{ __('Sales and Refund') }}<span class="text-danger">*</span></label>
                                <div class="@error('sales_and_refund')border border-danger rounded-3 @enderror">
                                    <input class="form-control" type="file" id="sales_and_refund" name="sales_and_refund" value="{{ $aboutCompany->sales_and_refund }}">
                                        @error('sales_and_refund')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                    <a href="{{ url('/storage/' . $aboutCompany->sales_and_refund) }}" target="_blank" class="btn btn-primary mt-2">Dokumen saat ini</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn bg-gradient-dark btn-md mt-4 mb-4">{{ 'Simpan' }}</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection