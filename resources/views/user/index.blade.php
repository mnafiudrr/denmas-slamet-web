@extends('layouts.master')

@section('title', 'Users')

@section('content')
  

<div class="row">
  <div class="col-12">
    <div class="card mb-4">
      <div class="card-header pb-0">
        <h6>All Users</h6>
      </div>
      <div class="card-body px-0 pt-0 pb-2">
        <div class="table-responsive p-4">
          <table class="table align-items-center mb-0">
            <thead>
              <tr>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">No Hp</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Alamat</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tempat Tanggal Lahir</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                <th class="text-secondary opacity-7"></th>
              </tr>
            </thead>
            <tbody>
              @foreach ($users as $user)
              <tr>
                <td>
                  <a href="{{ route('user.show', $user->username) }}">
                    <div class="d-flex px-2 py-1">
                      {{-- <div>
                        <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3" alt="user1">
                      </div> --}}
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="mb-0 text-sm">{{ $user->profile->fullname }}</h6>
                        <p class="text-xs text-secondary mb-0">{{ $user->username }}</p>
                      </div>
                    </div>
                  </a>
                </td>
                <td>
                  <span class="text-secondary text-xs font-weight-bold">{{ $user->phone }}</span>
                </td>
                <td class="align-middle text-center">
                  <span class="text-secondary text-xs font-weight-bold">{{ $user->profile->address }}</span>
                </td>
                <td class="align-middle text-center">
                  <p class="text-xs font-weight-bold mb-0">{{ $user->profile->birthplace }}</p>
                  <p class="text-xs text-secondary mb-0">{{ date('d-m-Y', strtotime($user->profile->birthday)) }}</p>
                </td>
                <td class="align-middle text-center text-sm">
                  <span class="badge badge-sm bg-gradient-{{ $user->is_admin ? 'success' : 'secondary' }}">{{ $user->is_admin ? 'Admin' : 'User' }}</span>
                </td>
                <td class="align-middle">
                  <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                    Edit
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



@section('scripts')
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>

<script>
  $(document).ready(function() {
    var table = $('table').DataTable({
      "order": [[ 0, "asc" ]],
      "columnDefs": [
        { "orderable": false, "targets": 5 }
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