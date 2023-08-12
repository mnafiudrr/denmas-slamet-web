
<div class="card h-100">
  <div class="card-header pb-0 p-3">
    <div class="row">
      <div class="col-md-8 d-flex align-items-center">
        <h6 class="mb-0">Informasi Kehamilan</h6>
      </div>
      <div class="col-md-4 text-end">
      </div>
    </div>
  </div>
  <div class="card-body p-3">
    <div class="form-group">
      <label class="form-control-label" for="hamil">Sedang Hamil</label>
      <div class="input-group">
        @if ($report->pregnancy->hamil)
          <i class="fas fa-check-circle fa-lg text-primary"></i>
        @else
          <i class="fas fa-times fa-lg"></i>
        @endif
      </div>
    </div>
    @if ($report->pregnancy->hamil)
      <div class="form-group">
        <label class="form-control-label" for="usia-kehamilan">Usia kehamilan</label>
        <div class="input-group">
          <input type="text" class="form-control" aria-describedby="usia-kehamilan" id="usia-jkehjamdka" readonly value="{{ $report->pregnancy->usia_kehamilan }} minggu">
        </div>
      </div>
      <div class="form-group">
        <label class="form-control-label">Muntah (2x sepekan)</label>
        <div class="input-group">
          @if ($report->pregnancy->muntah)
            <i class="fas fa-check-circle fa-lg text-primary"></i>
          @else
            <i class="fas fa-times fa-lg"></i>
          @endif
        </div>
      </div>
      <div class="form-group">
        <label class="form-control-label">Tidak merasakan janin bergerak</label>
        <div class="input-group">
          @if ($report->pregnancy->janin_pasif)
            <i class="fas fa-check-circle fa-lg text-primary"></i>
          @else
            <i class="fas fa-times fa-lg"></i>
          @endif
        </div>
      </div>
      <div class="form-group">
        <label class="form-control-label">Merasakan keluar bercak darah dari daerah vagina</label>
        <div class="input-group">
          @if ($report->pregnancy->pendarahan)
            <i class="fas fa-check-circle fa-lg text-primary"></i>
          @else
            <i class="fas fa-times fa-lg"></i>
          @endif
        </div>
      </div>
      <div class="form-group">
        <label class="form-control-label">Merasakan kaki nyeri atau bengkak</label>
        <div class="input-group">
          @if ($report->pregnancy->bengkak)
            <i class="fas fa-check-circle fa-lg text-primary"></i>
          @else
            <i class="fas fa-times fa-lg"></i>
          @endif
        </div>
      </div>
      <div class="form-group">
        <label class="form-control-label">Merasakan sembelit</label>
        <div class="input-group">
          @if ($report->pregnancy->sembelit)
            <i class="fas fa-check-circle fa-lg text-primary"></i>
          @else
            <i class="fas fa-times fa-lg"></i>
          @endif
        </div>
      </div>
      <div class="form-group">
        <label class="form-control-label">Merasakan nyeri ketika buang air kecil</label>
        <div class="input-group">
          @if ($report->pregnancy->nyeri_bak)
            <i class="fas fa-check-circle fa-lg text-primary"></i>
          @else
            <i class="fas fa-times fa-lg"></i>
          @endif
        </div>
      </div>
    @endif
  </div>
</div>