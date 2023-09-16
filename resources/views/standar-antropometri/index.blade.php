@extends('layouts.master')

@section('title', 'Tabel Standar Antropometri Tinggi Badan Berdasarkan Umur')

@section('content')
    <form action="" method="POST">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <div class="row">
                            <div class="col-md-6">
                                <h6>Tabel Standar Antropometri Tinggi Badan Berdasarkan Umur</h6>
                                <p>
                                    Untuk menghitung status gizi pada halaman hasil di aplikasi mobile, silahkan isi form di
                                    bawah ini.
                                </p>
                            </div>
                            <div class="col-md-6 text-end">
                                <button type="submit" class="btn bg-gradient-primary">
                                    Save
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-3">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Jenis Kelamin</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Umur</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        -3 SD</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        -2 SD</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        -1 SD</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Median</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        +1 SD</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        +2 SD</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        +3 SD</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datas as $data)
                                    <tr>
                                        <td class="align-middle text-center text-sm">
                                            <h6 class="mb-0 text-sm">{{ $data->gender }}</h6>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <h6 class="mb-0 text-sm">{{ $data->age }}</h6>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                          <input type="text" class="form-control" name="data[{{ $data->id }}][m3sd]" value="{{ $data->m3sd }}" placeholder="-3 SD">
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                          <input type="text" class="form-control" name="data[{{ $data->id }}][m2sd]" value="{{ $data->m2sd }}" placeholder="-2 SD">
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                          <input type="text" class="form-control" name="data[{{ $data->id }}][m1sd]" value="{{ $data->m1sd }}" placeholder="-1 SD">
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                          <input type="text" class="form-control" name="data[{{ $data->id }}][median]" value="{{ $data->median }}" placeholder="Median">
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                          <input type="text" class="form-control" name="data[{{ $data->id }}][p1sd]" value="{{ $data->p1sd }}" placeholder="+1 SD">
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                          <input type="text" class="form-control" name="data[{{ $data->id }}][p2sd]" value="{{ $data->p2sd }}" placeholder="+2 SD">
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                          <input type="text" class="form-control" name="data[{{ $data->id }}][p3sd]" value="{{ $data->p3sd }}" placeholder="+3 SD">
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
