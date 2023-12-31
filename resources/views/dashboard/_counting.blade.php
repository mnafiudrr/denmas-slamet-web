
<div class="row">
  <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
    <div class="card" id="laporan-mingguan">
      <div class="card-body p-3">
        <div class="row">
          <div class="col-8">
            <div class="numbers">
              <p class="text-sm mb-0 text-capitalize font-weight-bold">Laporan Mingguan</p>
              <h5 class="font-weight-bolder mb-0">
                {{ $weeklyReportCount }}
                {{-- <span class="text-success text-sm font-weight-bolder">+55%</span> --}}
                <form action="{{ route('report.index') }}" method="get" style="display: none" id="form-mingguan">
                  <input type="week" name="week" value="{{ date('Y').'-W'.date('W') }}">
                  <button type="submit" id="submit-mingguan" class="btn btn-sm bg-gradient-primary">Lihat</button>
                </form>
              </h5>
            </div>
          </div>
          <div class="col-4 text-end">
            <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
              {{-- <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i> --}}
              <i class="fas fa-file-alt text-lg opacity-10" aria-hidden="true"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
    <div class="card">
      <div class="card-body p-3">
        <div class="row">
          <div class="col-8">
            <div class="numbers">
              <p class="text-sm mb-0 text-capitalize font-weight-bold">Sedang Hamil</p>
              <h5 class="font-weight-bolder mb-0">
                {{ $lastPregnantProfilesCount }}
                {{-- <span class="text-danger text-sm font-weight-bolder">-2%</span> --}}
              </h5>
            </div>
          </div>
          <div class="col-4 text-end">
            <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
              {{-- <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i> --}}
              <i class="fas fa-female text-lg opacity-10" aria-hidden="true"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
    <div class="card">
      <div class="card-body p-3">
        <div class="row">
          <div class="col-8">
            <div class="numbers">
              <p class="text-sm mb-0 text-capitalize font-weight-bold">Jumlah Pengguna</p>
              <h5 class="font-weight-bolder mb-0">
                {{ $userCount }}
                {{-- <span class="text-success text-sm font-weight-bolder">+3%</span> --}}
              </h5>
            </div>
          </div>
          <div class="col-4 text-end">
            <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
              {{-- <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i> --}}
              <i class="fas fa-users text-lg opacity-10" aria-hidden="true"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-sm-6">
    <div class="card">
      <div class="card-body p-3">
        <div class="row">
          <div class="col-8">
            <div class="numbers">
              <p class="text-sm mb-0 text-capitalize font-weight-bold">Jumlah Admin</p>
              <h5 class="font-weight-bolder mb-0">
                {{ $userAdminCount }}
                {{-- <span class="text-success text-sm font-weight-bolder">+5%</span> --}}
              </h5>
            </div>
          </div>
          <div class="col-4 text-end">
            <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
              {{-- <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i> --}}
              <i class="fas fa-users-cog text-lg opacity-10" aria-hidden="true"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>