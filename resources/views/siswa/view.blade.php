@extends('layouts.app', ['title' => __('Student Management')])

@section('content')
    @include('users.partials.header', ['title' => __('Data Siswa')])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1"> <!-- 8 -->
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Data siswa') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('siswa.index') }}" class="btn btn-sm btn-primary">{{ __('Kembali ke daftar') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h6 class="heading-small text-muted mb-4">{{ __('Informasi siswa') }}</h6>
                        <div class="pl-lg-4">
                            <div class="form-group{{ $errors->has('nisn') ? ' has-danger' : ''}}">
                                <label class="form-control-label" for="input-nisn">{{ __('NISN') }}</label>
                                <span class="form-control form-control-alternative{{ $errors->has('nisn') ? ' is-invalid' : '' }}">{{ $student->nisn }}</span>
                            </div>
                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-name">{{ __('Nama') }}</label>
                                <span class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}">{{ $student->name }}</span>
                            </div>
                            <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-email">{{ __('Email') }}</label>
                                <span class="form-control form-control-alternative{{ $errors->has('email') ? ' is-invalid' : '' }}">{{ $student->email }}</span>
                            </div>
                            <div class="text-center">
                                <button type="button" onclick="window.location = '{{ route('siswa.edit', $student->id) }}'" class="btn btn-success mt-4">{{ __('Edit') }}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Will be used, soon -->
            {{-- <div class="col-xl-4 order-xl-2">
                <div class="card shadow">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-uppercase text-muted ls-1 mb-1">QRCODE</h6>
                                <h2 class="mb-0">Scan untuk melihat</h2>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Chart -->
                        <div class="text-center">
                            <img height="250" width="250" src="{{ $qrcode }}" alt="scan qrcode">
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection
