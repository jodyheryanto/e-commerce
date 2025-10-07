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
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">User</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Total Belanja</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Status Pembayaran</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Status Belanja</th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>
                    @if(count($transactionHeaders) > 0)
                    @foreach ($transactionHeaders as $transactionHeader)
                    <tr>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{ $transactionHeader->user->name }} ({{ $transactionHeader->user->email }})</p>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{ $transactionHeader->total_price }}</p>
                      </td>
                      <td>
                        @if($transactionHeader->is_paid)
                          <button class="btn btn-success">Sudah Dibayar</button>
                        @elseif($transactionHeader->is_paid == false && $transactionHeader->payment != null)
                          <button class="btn btn-warning">Sudah Dibayar dan Menunggu Konfirmasi</button> <br>
                          <a href="{{ url('storage/' . $transactionHeader->payment->image) }}" target="_blank">Lihat Bukti Pembayaran</a>
                        @else
                          <button class="btn btn-danger">Belum Dibayar</button>
                        @endif
                      </td>
                      <td>
                        @if($transactionHeader->status == 'pending')
                        <span class="btn btn-warning">Pending</span>
                        @elseif($transactionHeader->status == 'shipping')
                        <span class="btn btn-info">Shipping</span>
                        @elseif($transactionHeader->status == 'delivered')
                        <span class="btn btn-success">Delivered</span>
                        @endif
                      </td>
                      <td class="align-middle">
                        @if($transactionHeader->status == 'pending')
                          <a href="{{ route('transaction.update', $transactionHeader->id) }}" class="btn btn-primary">Proses Pengiriman</a>
                        @endif
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
