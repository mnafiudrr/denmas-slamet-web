
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
      <label class="form-control-label">IMT</label>
      <div class="input-group">
        <input type="text" class="form-control" aria-describedby="imt" id="imt" readonly value="{{ $report->result->imt }}">
      </div>
    </div>
    <div class="form-group">
      <label class="form-control-label">Status IMT</label>
      <div class="input-group">
        <span class="badge badge-sm bg-gradient-{{ $report->result->status_imt == 'Normal' ? 'success' : ($report->result->status_imt == 'Obesitas' ? 'danger' : 'warning') }}">{{ $report->result->status_imt }}</span>
      </div>
    </div>
    <div class="form-group">
      <label class="form-control-label">Status Tekanan Darah</label>
      <div class="input-group">
        <span class="badge badge-sm bg-gradient-{{ $report->result->status_tekanan_darah == 'Normal' ? 'success' : ($report->result->status_tekanan_darah == 'Pra - hipertensi' ? 'warning' : 'danger') }}">{{ $report->result->status_tekanan_darah }}</span>
      </div>
    </div>
    <div class="form-group">
      <label class="form-control-label">Status Gula Darah</label>
      <div class="input-group">
        <span class="badge badge-sm bg-gradient-{{ $report->result->status_gula == 'Normal' ? 'success' : ($report->result->status_gula == 'Rendah' ? 'warning' : 'danger') }}">{{ $report->result->status_gula }}</span>
      </div>
    </div>
    <div class="form-group">
      <label class="form-control-label">Status HB</label>
      <div class="input-group">
        <span class="badge badge-sm bg-gradient-{{ $report->result->status_hb == 'Normal' ? 'success' : ($report->result->status_hb == 'Rendah' ? 'warning' : 'danger') }}">{{ $report->result->status_hb }}</span>
      </div>
    </div>
    <div class="form-group">
      <label class="form-control-label">Status Kolesterol</label>
      <div class="input-group">
        <span class="badge badge-sm bg-gradient-{{ $report->result->status_kolesterol == 'Normal' ? 'success' : ($report->result->status_kolesterol == 'Batas Tinggi' ? 'warning' : 'danger') }}">{{ $report->result->status_kolesterol }}</span>
      </div>
    </div>
    <div class="form-group">
      <label class="form-control-label">Status Asam Urat</label>
      <div class="input-group">
        <span class="badge badge-sm bg-gradient-{{ $report->result->status_asam_urat == 'Normal' ? 'success' : ($report->result->status_asam_urat == 'Rendah' ? 'warning' : 'danger') }}">{{ $report->result->status_asam_urat }}</span>
      </div>
    </div>
  </div>
</div>