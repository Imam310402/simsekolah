@extends('template')
@section('content')
<main class="container" style="margin-top: 30px">
    <form action="/student/{{ $student->id }}" method="POST">
        @method('PUT')
        @csrf
        <div class="p-5 rounded">
            <h1>Edit Tabungan Siswa</h1>
            <hr>
            <table class="table table-bordered">
                <tr>
                    <td>Nomor Rekening</td>
                    <td><input type="text" value="{{ $student->norek }}" name="norek" placeholder="Nomor Rekening" class="form-control"></td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td><input type="text" value="{{ $student->name }}" name="name" placeholder="Nama" class="form-control"></td>
                </tr>
                <tr>
                    <td>Nama Bank</td>
                    <td><input type="text" value="{{ $student->jurusan->bank }}" name="bank" placeholder="Nama Bank" class="form-control"></td>
                </tr>
                <tr>
                    <td>EXP Card</td>
                    <td><input type="date" value="{{ $student->expcard }}" name="expcard" placeholder="EXP Card" class="form-control"></td>
                </tr>
              
                <tr>
                    <td></td>
                    <td>
                        <button type="submit" class="btn btn-danger">Simpan</button>
                        <a class="btn btn-success" href="/student">Kembali</a>
                    </td>
                </tr>
            </table>
        </div>
    </form>
</main>
@endsection
