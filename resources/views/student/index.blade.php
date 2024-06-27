@extends('template')

@section('content')
<main class="container">
    <div class="p-5 rounded">
        <h1>Tabungan Siswa SMK Muhammadiyah 15 Jakarta</h1>
        <hr>

        @if(session('message'))
        <div class="alert alert-primary" role="alert">
            {{ session('message') }}
        </div>
        @endif

        <!-- Form Pencarian -->
        <p>Masukan Nomor Rekening Jika Siswa Ingin Menabung</p>
        <form action="{{ route('student.tabungan') }}" method="GET" class="mb-3">
          
          <div class="input-group">
              
              <input type="text" class="form-control" placeholder="Masukkan Nomor Rekening" name="norek" aria-label="Nomor Rekening" aria-describedby="button-addon2">
              <button class="btn btn-primary" type="submit" id="button-addon2">Cari</button>
          </div>
      </form>
      
        <!-- Tabel Daftar Siswa -->
        <table class="table table-bordered">
            <thead>
                <tr class="text-center">
                    <th>No</th>
                    <th>Nomor Rekening</th>
                    <th>Nama</th>
                    <th>Nama Bank</th>
                    <th>EXP Card</th>
                    <th>Total Tabungan</th>
                    <th colspan="2" width="40">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($students as $student)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $student->norek }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->jurusan->bank }}</td>
                    <td>{{ $student->expcard }}</td>
                    <td>{{ $student->tab }}</td>
                    <td>
                        <a href="{{ route('student.edit', ['id' => $student->id]) }}" class="btn btn-danger">Edit</a>
                    </td>
                    <td>
                        <form action="{{ route('student.destroy', ['id' => $student->id]) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-primary">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center">Tidak ada data siswa.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</main>
@endsection
