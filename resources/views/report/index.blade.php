@extends('layouts.master')

@section('title', 'Laporan')

@section('content')

<div class="row">
  <div class="col-12">
    <div class="card mb-4">
      <div class="card-header pb-0">
        <h6>Laporan</h6>
        {{-- <ul class="list-group">
          <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Full Name:</strong> &nbsp; {{ $user->profile->fullname }}</li>
          <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Mobile:</strong> &nbsp; {{ $user->phone }}</li>
          <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Alamat:</strong> &nbsp; {{ $user->profile->address }}</li>
          <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Tempat, Tanggal Lahir:</strong> &nbsp; {{ $user->profile->birthplace.', '.date('d-m-Y', strtotime($user->profile->birthday)) }}</li>
        </ul> --}}
      </div>
      <div class="card-body px-0 pt-0 pb-2">
        <div class="table-responsive p-3">
          <table class="table align-items-center mb-0">
            <thead>
              <tr>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama</th>
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
              @foreach ($reports as $report)
              @php
                $result = $report->result;
              @endphp
              <tr>
                <td class="align-middle text-center text-sm">
                  <div class="d-flex px-2 py-1">
                    <div class="d-flex flex-column justify-content-center">
                      <h6 class="mb-0 text-sm">{{ date('d-m-Y', strtotime($report->created_at)) }}</h6>
                    </div>
                  </div>
                </td>
                <td class="align-middle text-center text-sm">
                  <h6 class="mb-0 text-sm">{{ $report->profile->fullname }}</h6>
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
                  <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
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
  });

</script>
  
@endsection