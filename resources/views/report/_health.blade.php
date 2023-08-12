
<div class="card h-100">
  <div class="card-header pb-0 p-3">
    <div class="row">
      <div class="col-md-8 d-flex align-items-center">
        <h6 class="mb-0">Informasi Kesehatan</h6>
      </div>
      <div class="col-md-4 text-end">
      </div>
    </div>
  </div>
  <div class="card-body p-3">
    <div class="form-group">
      <label class="form-control-label" for="tinggi-badan">Tinggi badan</label>
      <div class="input-group">
        <input type="text" class="form-control" aria-describedby="tinggi-badan" id="tinggi-badan" readonly value="{{ $report->health->tinggi_badan }} cm">
      </div>
    </div>
    <div class="form-group">
      <label class="form-control-label" for="berat-badan">Berat badan</label>
      <div class="input-group">
        <input type="text" class="form-control" aria-describedby="berat-badan" id="berat-badan" readonly value="{{ $report->health->berat_badan }} kg">
      </div>
    </div>
    <div class="form-group">
      <label class="form-control-label" for="tekanan-darah">Tekanan Darah</label>
      <div class="input-group">
        <input type="text" class="form-control" aria-describedby="tekanan-darah" id="tekanan-darah" readonly value="{{ $report->health->tekanan_darah_sistol.'/'.$report->health->tekanan_darah_diastol }} mmHg">
      </div>
    </div>
    <div class="form-group">
      <label class="form-control-label" for="gula-darah">Gula Darah</label>
      <div class="input-group">
        <input type="text" class="form-control" aria-describedby="gula-darah" id="gula-darah" readonly value="{{ $report->health->kadar_gula }} mg/dL">
      </div>
    </div>
    <div class="form-group">
      <label class="form-control-label" for="hb">HB</label>
      <div class="input-group">
        <input type="text" class="form-control" aria-describedby="hb" id="hb" readonly value="{{ $report->health->kadar_hb }} gr/dL">
      </div>
    </div>
    <div class="form-group">
      <label class="form-control-label" for="kolesterol">Kolesterol</label>
      <div class="input-group">
        <input type="text" class="form-control" aria-describedby="kolesterol" id="kolesterol" readonly value="{{ $report->health->kadar_kolesterol }} mg/dL">
      </div>
    </div>
    <div class="form-group">
      <label class="form-control-label" for="asam-urat">Asam Urat</label>
      <div class="input-group">
        <input type="text" class="form-control" aria-describedby="asam-urat" id="asam-urat" readonly value="{{ $report->health->kadar_asam_urat }} mg/dL">
      </div>
    </div>
  </div>
</div>