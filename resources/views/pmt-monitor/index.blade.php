@extends('layouts.master')

@section('title', 'Monitoring PMT')

@section('content')

<div class="row">
  <div class="col-12">
    <div class="card mb-4">
      <div class="card-header pb-0">
        <div class="row">
          <div class="col-md-6">
            <h6>Monitoring PMT</h6>
          </div>
          <div class="col-md-6 text-end">
            <button type="button" class="btn bg-gradient-primary" data-bs-toggle="modal" data-bs-target="#filterModal">
              Filter
            </button>
          </div>
        </div>
      </div>
      <div class="card-body px-0 pt-0 pb-2">
        <div class="table-responsive p-3">
          <table class="table align-items-center mb-0">
            <thead>
              <tr>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal Home Visit</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jenis Kelamin</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Usia</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Ibu</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Alamat</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No HP</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Pemberian PMT</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Berat Badn Terakhir</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Dibuat Oleh</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($data as $item)
              <tr>
                <td class="align-middle text-center text-sm">
                  <p style="display: none">{{ date('Y-m-d H:i:s', strtotime($item->tanggal_home_visit)) }}</p>
                  <div class="d-flex px-2 py-1">
                    <div class="d-flex flex-column justify-content-center">
                      <h6 class="mb-0 text-sm">{{ date('d-m-Y', strtotime($item->tanggal_home_visit)) }}</h6>
                    </div>
                  </div>
                </td>
                <td class="align-middle text-center text-sm">
                  {{-- <a href="{{ route('user.show', $report->profile->user->username) }}"> --}}
                    <h6 class="mb-0 text-sm">{{ $item->nama_anak }}</h6>
                  {{-- </a> --}}
                </td>
                <td class="align-middle text-center text-sm">
                    <h6 class="mb-0 text-sm">{{ $item->jenis_kelamin }}</h6>
                </td>
                <td class="align-middle text-center text-sm">
                    <h6 class="mb-0 text-sm">{{ $item->usia }} Bulan</h6>
                </td>
                <td class="align-middle text-center text-sm">
                    <h6 class="mb-0 text-sm">{{ $item->nama_ibu }}</h6>
                </td>
                <td class="align-middle text-center text-sm">
                    <h6 class="mb-0 text-sm">{{ $item->alamat }}</h6>
                </td>
                <td class="align-middle text-center text-sm">
                    <h6 class="mb-0 text-sm">{{ $item->no_hp }}</h6>
                </td>
                <td class="align-middle text-center text-sm">
                  <span class="badge badge-sm bg-gradient-{{ $item->pemberian_pmt ? 'primary' : 'secondary' }}">{{ $item->pemberian_pmt? 'Ya' : 'Tidak' }}</span>
                </td>
                <td class="align-middle text-center text-sm">
                    <h6 class="mb-0 text-sm">{{ $item->berat_badan_terakhir }}</h6>
                </td>
                <td class="align-middle text-center text-sm">
                    <h6 class="mb-0 text-sm">{{ $item->createdBy->name }}</h6>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
  
<div class="modal fade" id="filterModal" tabindex="-1" role="dialog" aria-labelledby="filterModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Filter</h5>
        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <form>
        <div class="modal-body">
          <div class="form-group">
            <label for="month-input" class="col-form-label">Bulan</label>
            <input class="form-control" type="month" value="{{ $request->query('month') }}" id="month-input" name="month">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn bg-gradient-primary">OK</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection


@section('scripts')
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>

<script>
  $(document).ready(function() {
    var table = $('table').DataTable({
      "order": [[ 0, "desc" ]],
      "columnDefs": [
        { "orderable": false, "targets": 1 }
      ],
      // custom datatable pagination button
      "pagingType": "full_numbers", // Jenis tampilan pagination
      "language": {
        "paginate": {
          "previous": '<i class="fa fa-angle-left"></i>', // Tombol halaman sebelumnya
          "next": '<i class="fa fa-angle-right"></i>', // Tombol halaman berikutnya
          "first": '<i class="fa fa-angle-double-left"></i>', // Tombol halaman pertama
          "last": '<i class="fa fa-angle-double-right"></i>' // Tombol halaman terakhir
        }
      },
      "drawCallback": function() {
      }
    });
  });

</script>
  
@endsection