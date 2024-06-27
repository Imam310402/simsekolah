<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
// use Illuminate\Support\Facades\Http;
use App\Models\jurusan;

use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $data['no'] = 1;
        $data['students'] = Student::with('jurusan')->get(); // select * from student
        return view('student.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // $client = new Client(['verify' => false]);
        // $response_data = Http::withHeaders([
        //     'Authorization' => '2K6#zpbi7xB6-7crepXt'
        // ])->asForm()->post('https://api.fonnte.com/send', [
        //     'target' => '6281287164881',
        //     'message' => 'test kirim pesan',
        //     'verify' => false
        // ]);
        // phpinfo();


        // $my_client = new Client(['verify' => false ]);
        // $response_data = Http::withHeaders([
        //     'Authorization' => '2K6#zpbi7xB6-7crepXt'
        // ])->post('https://api.fonnte.com/send', [
        //     'target' => '6281287164881',
        //     'message' => 'test kirim pesan',
        // ]);

        // return $response_data;
        
         $data['jurusan'] = Jurusan::all();
         return view('student.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
    // Validasi input
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'norek' => 'required|string|max:20',
        'expcard' => 'required|date',
        'jurusan_id' => 'required|integer|exists:jurusan,id',
        'tab' => 'nullable|numeric', // total tabungan
    ]);

    \Log::debug($request->all());
    \Log::info("ini proses data");

    // Membuat instance Student baru dan mengisi dengan data yang telah divalidasi
    $student = new Student();
    $student->name = $validatedData['name'];
    $student->norek = $validatedData['norek'];
    $student->expcard = $validatedData['expcard'];
    $student->jurusan_id = $validatedData['jurusan_id'];
    $student->tab = $validatedData['tab'] ?? 0; // Menggunakan 0 sebagai default jika total tabungan tidak diisi
    $student->save();

    // Melakukan redirect ke daftar siswa dan menampilkan alert
    return redirect('student')->with('message', 'Berhasil Menambahkan Data');
}


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
{
    $student = Student::find($id);

    if (!$student) {
        // Handle jika student tidak ditemukan
        return redirect()->back()->with('error', 'Siswa tidak ditemukan.');
    }

    return view('student.edit', compact('student'));
}


public function tabungan(Request $request)
{
    $norek = $request->input('norek');

    // Ambil data siswa berdasarkan nomor rekening
    $student = Student::where('norek', $norek)->first();

    // Kemudian kembalikan view dengan data siswa yang ditemukan
    return view('student.tabungan', compact('student'));
}
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validasi data input jika diperlukan
        $request->validate([
            'tab' => 'required|numeric', // contoh: validasi tabungan harus angka
        ]);

        // Ambil data siswa berdasarkan ID
        $student = Student::find($id);

        // Jika siswa tidak ditemukan, kembalikan respons bahwa data tidak ditemukan
        if (!$student) {
            return redirect()->route('student.index')->with('error', 'Data siswa tidak ditemukan.');
        }

        // Update nilai tabungan siswa
        $student->tab += $request->input('tab'); // misalnya penambahan tabungan berdasarkan input form

        // Simpan perubahan
        $student->save();

        // Redirect ke halaman index atau ke halaman yang sesuai
        return redirect()->route('student.index')->with('success', 'Tabungan siswa berhasil diperbarui.');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::find($id);
        $student->delete();
        return redirect('student')->with('message','Berhasil Menghapus Data');
    }
    
}
