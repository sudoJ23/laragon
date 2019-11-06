@extends('layouts.app', ['title' => __('User Management')])

@section('content')
    {{-- debug --}}
    {{-- {{ dd($students) }} --}}

    @include('layouts.headers.cards')

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Data Siswa</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('siswa.create') }}" class="btn btn-sm btn-primary">{{ __('Tambah siswa') }}</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        @if (session('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('status') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                    </div>

                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">NISN</th>
                                    <th scope="col">Email</th>
                                    {{-- <th scope="col">Alamat</th> --}}
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($students as $student)
                                    <tr>
                                        <td> {{ $loop->iteration }}</td>
                                        {{-- <td onclick="window.location = '{{ route('siswa.edit', $student->id) }}'"> {{ $student->name }}</td> --}}
                                        <td>
                                            <a href="{{ route('siswa.show', $student->id) }}">
                                                {{ $student->name }}
                                            </a>
                                        </td>
                                        <td> {{ $student->nisn }}</td>
                                        <td> {{ $student->email }}</td>
                                        {{-- <td> {{ $student->address }}</td> --}}
                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    @if ($student->id != auth()->id())
                                                        <form action="{{ route('siswa.destroy', $student->id) }}" method="post">
                                                            @csrf
                                                            @method('delete')

                                                            <a class="dropdown-item" href="{{ route('siswa.edit', $student->id) }}">{{ __('Edit') }}</a>
                                                            <button type="button" class="dropdown-item" onclick="confirm('{{ __("Apakah anda yakin ingin menghapus siswa ini?") }}') ? this.parentElement.submit() : ''">
                                                                {{ __('Hapus')}}
                                                            </button>
                                                        </form>
                                                    @else
                                                        <a href="siswa/ {{ $student->id }}/edit" class="dropdown-item">{{ __('Edit') }}</a>
                                                        <a class="dropdown-item" href="{{ route('siswa.destroy', $student->id) }}" onclick="confirm('{{ __("Apakah anda yakin ingin menghapus siswa ini?") }}') ? this.parentElement.submit() : ''">{{ __('Delete') }}</a>
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{-- <div class="card-footer py-4">
                        <nav class="d-flex justify-content-end" aria-label="...">
                            {{ $students->links() }}
                        </nav>
                    </div> --}}
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection
