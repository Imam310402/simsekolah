@extends('template')

@section('content')
<main class="container" style="margin-top: 30px">
    <div class="p-5 rounded">
        <h1>Tabungan Siswa</h1>
        <hr>

        <!-- Form Update Tabungan jika Data Siswa Ditemukan -->
        @isset($student)
        <form action="{{ route('student.update', ['id' => $student->id]) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $student->name }}" readonly>
            </div>
            <div class="form-group">
                <label for="norek">Nomor Rekening</label>
                <input type="text" class="form-control" id="norek" name="norek" value="{{ $student->norek }}" readonly>
            </div>
            <div class="form-group">
                <label for="tab">Tabungan</label>
                <input type="text" class="form-control" id="tab" name="tab" value="{{ $student->tab }}">
            </div>
            <button type="submit" class="btn btn-danger">Simpan</button>
            <a href="{{ route('student.index') }}" class="btn btn-success">Kembali</a>
        </form>
        @endisset

        <!-- Pesan jika Data Siswa Tidak Ditemukan -->
        @empty($student)
        <div class="alert alert-danger" role="alert">
            Data siswa dengan nomor rekening tersebut tidak ditemukan.
        </div>
        @endempty
    </div>
</main>
@endsection
