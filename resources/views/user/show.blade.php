@extends('layouts.master')

@section('title', $user->profile->fullname)

@section('content')

<div class="row">
  <div class="col-12">
    <div class="card mb-4">
      <div class="card-header pb-0 row">
        <ul class="list-group col-md-6">
          <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Full Name:</strong> &nbsp; {{ $user->profile->fullname }}</li>
          <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Mobile:</strong> &nbsp; {{ $user->phone }}</li>
          <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Alamat:</strong> &nbsp; {{ $user->profile->address }}</li>
          <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Tempat, Tanggal Lahir:</strong> &nbsp; {{ $user->profile->birthplace.', '.date('d-m-Y', strtotime($user->profile->birthday)) }}</li>
        </ul>
        <div class="col-md-6 text-end">
          @if (auth()->user()->id != $user->id || $user->name != 'administrator')
            @if (!$user->is_admin) 
              <button type="button" class="btn btn-block bg-gradient-warning mb-3" data-bs-toggle="modal" data-bs-target="#modal-to-admin">Jadikan Admin</button>
            @else
              <button type="button" class="btn btn-block bg-gradient-danger mb-3" data-bs-toggle="modal" data-bs-target="#modal-to-admin">Jadikan Pengguna</button>
            @endif
          @endif
        </div>
      </div>
      <div class="card-body px-0 pt-0 pb-2">
        <div class="table-responsive p-3">
          <table class="table align-items-center mb-0">
            <thead>
              <tr>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kehamilan</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">IMT</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tekanan Darah</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Gula Darah</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">HB</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kolesterol</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Asam Urat</th>
                <th class="text-secondary opacity-7"></th>
              </tr>
            </thead>
            <tbody>
              @foreach ($user->reports as $report)
              @php
                $result = $report->result;
              @endphp
              <tr>
                <td class="align-middle text-center text-sm">
                  <p style="display: none">{{ date('Y-m-d h:i:s', strtotime($report->created_at)) }}</p>
                  <div class="d-flex px-2 py-1">
                    <div class="d-flex flex-column justify-content-center">
                      <h6 class="mb-0 text-sm">{{ date('d-m-Y', strtotime($report->created_at)) }}</h6>
                      <p class="text-xs text-secondary mb-0">{{ date('h:i:s', strtotime($report->created_at)) }}</p>
                    </div>
                  </div>
                </td>
                <td class="align-middle text-center text-sm">
                  <span class="badge badge-sm bg-gradient-{{ $report->pregnancy->hamil ? 'primary' : 'secondary' }}">{{ $report->pregnancy->hamil? 'hamil' : 'tidak hamil' }}</span>
                </td>
                <td class="align-middle text-center text-sm">
                  <h6 class="mb-0 text-sm">{{ $result->imt }}</h6>
                  <span class="badge badge-sm bg-gradient-{{ $result->status_imt == 'Normal' ? 'success' : ($result->status_imt == 'Obesitas' ? 'danger' : 'warning') }}">{{ $result->status_imt }}</span>
                </td>
                <td class="align-middle text-center text-sm">
                  <span class="badge badge-sm bg-gradient-{{ $result->status_tekanan_darah == 'Normal' ? 'success' : ($result->status_tekanan_darah == 'Pra - hipertensi' ? 'warning' : 'danger') }}">{{ $result->status_tekanan_darah }}</span>
                </td>
                <td class="align-middle text-center text-sm">
                  <span class="badge badge-sm bg-gradient-{{ $result->status_gula == 'Normal' ? 'success' : ($result->status_gula == 'Rendah' ? 'warning' : 'danger') }}">{{ $result->status_gula }}</span>
                </td>
                <td class="align-middle text-center text-sm">
                  <span class="badge badge-sm bg-gradient-{{ $result->status_hb == 'Normal' ? 'success' : ($result->status_hb == 'Rendah' ? 'warning' : 'danger') }}">{{ $result->status_hb }}</span>
                </td>
                <td class="align-middle text-center text-sm">
                  <span class="badge badge-sm bg-gradient-{{ $result->status_kolesterol == 'Normal' ? 'success' : ($result->status_kolesterol == 'Batas Tinggi' ? 'warning' : 'danger') }}">{{ $result->status_kolesterol }}</span>
                </td>
                <td class="align-middle text-center text-sm">
                  <span class="badge badge-sm bg-gradient-{{ $result->status_asam_urat == 'Normal' ? 'success' : ($result->status_asam_urat == 'Rendah' ? 'warning' : 'danger') }}">{{ $result->status_asam_urat }}</span>
                </td>
                <td class="align-middle">
                  <a href="{{ route('report.show', encrypt($result->report->id)) }}" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                    Detail
                  </a>
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

@if (auth()->user()->id != $user->id || $user->name != 'administrator')
  <div class="modal fade" id="modal-to-admin" tabindex="-1" role="dialog" aria-labelledby="modal-to-admin" aria-hidden="true">
    <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
      <div class="modal-content">
        <div class="modal-header">
          @if (!$user->is_admin)
            <h6 class="modal-title" id="modal-title-to-admin">Pengguna ini akan dijadikan admin</h6>
          @else
            <h6 class="modal-title" id="modal-title-to-admin">Pengguna ini akan dijadikan pengguna biasa</h6>
          @endif
          <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="py-3 text-center">
            <i class="ni ni-bell-55 ni-3x"></i>
            <h4 class="text-gradient text-danger mt-4">Apakah anda yakin?</h4>
            @if (!$user->is_admin)
              <p>Menjadikan pengguna ini sebagai admin akan membuat pengguna dapat melihat data pengguna lain dan dapat mengakses hak-hak admin baik pada aplikasi dan di web admin ini</p>
            @else
              <p>Menjadikan pengguna ini sebagai pengguna biasa akan membuat pengguna tidak dapat melihat data pengguna lain dan tidak dapat mengakses hak-hak admin baik pada aplikasi dan di web admin ini</p>
            @endif
          </div>
        </div>
        <form action="{{ route('user.admin-status', $user->username) }}" method="post">
          @csrf
          <div class="modal-footer">
            @if (!$user->is_admin)
              <input type="hidden" name="is_admin" value="1">
            @else
              <input type="hidden" name="is_admin" value="0">
            @endif
            <button type="submit" class="btn btn-secondary">Ok, Yakin</button>
            <button type="button" class="btn btn-link text-primary ml-auto" data-bs-dismiss="modal">Tutup</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endif
  
@endsection


@section('scripts')
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>

<script>
  $(document).ready(function() {
    var table = $('table').DataTable({
      "order": [[ 0, "asc" ]],
      "columnDefs": [
        { "orderable": false, "targets": 8 }
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

    // var paginationHTML = '<ul class="pagination"><li class="page-item"><a class="page-link" href="javascript:;" aria-label="Previous"><i class="fa fa-angle-left"></i><span class="sr-only">Previous</span></a></li>';
    // var info = table.page.info();
    
    // for (var i = 1; i <= info.pages; i++) {
    //   var active = (i === info.page + 1) ? 'active' : '';
    //   paginationHTML += '<li class="page-item ' + active + '"><a class="page-link" aria-controls="DataTables_Table_0" role="link" data-dt-idx="' + (i-1) + '" tabindex="0">' + i + '</a></li>';
    // }
    
    // paginationHTML += '<li class="page-item"><a class="page-link" href="javascript:;" aria-label="Next"><i class="fa fa-angle-right"></i><span class="sr-only">Next</span></a></li></ul>';

    // $('.dataTables_paginate').html(paginationHTML);
  });

</script>
  
@endsection