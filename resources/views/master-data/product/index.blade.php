@extends('layouts.user_type.auth')

@section('content')
  <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg" style="min-height: 100vh !important;">
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>List Produk</h6>
              <a href="{{ route('master-data.product.create') }}" class="btn btn-primary btn-sm ms-auto" style="float: right;" role="button">
                Buat Produk
              </a>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Gambar Produk</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Deskripsi Produk</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Harga</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Stok Tersedia</th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>
                    @if(count($products) > 0)
                    @foreach ($products as $product)
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            <img src="{{ asset( 'storage/' . $product->image) }}" height="100px" alt="user1">
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{ $product->name }} ({{ $product->category }})</p>
                        <p class="text-xs text-secondary mb-0">{{ $product->description }}</p>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{ $product->price }}</p>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{ $product->quantity }}</p>
                      </td>
                      <td class="align-middle">
                        <div class="btn-group" role="group" aria-label="Basic example">
                          <a href="{{ route('master-data.product.edit', $product->id) }}" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i></a>
                          <form action="{{ route('master-data.product.destroy', $product->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                          </form>
                        </div>
                      </td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                      <td colspan="5" class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Tidak ada produk tersedia.</p>
                      </td>
                    </tr>
                    @endif
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
@endsection
