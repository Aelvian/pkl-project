<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()// index yang berperan untuk menampilka data yang diinput user
    {
        // Menampilkan tulisan 'detail' pada halamannya 
        $title = "BP3MI Pelayanan Pengajuan";

        // jika yang sedang login adalah admin
        $tickets = Auth::user()->role == 'admin' 
        // melakukan booelan, jika true mengambil ticket dari user dan berdasarkan Descending (data terbaru dari tanggal tersebut) , jika false mengambil dari ticket user dari user itu sendiri dan urutkan data terbaru berdasarkan Descending dari tanggal
    ? Ticket::with('user')->orderByDesc('created_at')->get()
    : Ticket::with('user')->where('user_id', Auth::id())->orderByDesc('created_at')->get();
        return view('tickets.index' ,compact('tickets', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()//Bagian untuk menampilkan tambah pengajuan
    {
        $title = "Tambah Pengajuan";
        return view('tickets.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string',
            'email' => 'required|string',
            'status' => 'required|string',
            'keterangan' => 'required',
            'title' => 'nullable|string',
            'tempatan' => 'required|string',
            'file' => 'required|file|mimes:pdf,doc,docx|max:102048'  
        // maximal dari sebuah file adalah 100 Mb, dan file yang relate hanya pdf,doc,docx
        ]);

      

        //simpan ke storage/app/files
        $path = $request->file('file')->store('files', 'public');
       

        // field yang berupa text disimpan ke database mysql
         Ticket::create([
            // mengambil berdasarkan dari user saat ini yang sedang login
            'user_id' => Auth::id(),
             // mengambil dari table tickets yang value nya nama_lengkap lalu lakukan request dengan nama_lengkap
            'nama_lengkap' => $request->nama_lengkap,
             // mengambil dari table tickets yang value nya email lalu lakukan request dengan email
            'email' => $request->email,
             // mengambil dari table tickets yang value nya status lalu lakukan request dengan status
            'status' => $request->status,
            // mengambil dari table tickets yang value nya keterangan lalu lakukan request dengan keterangan
            'keterangan' => $request->keterangan,
             // mengambil dari table tickets yang value nya title lalu lakukan request dengan title
            'title' => $request->title,
            // mengambil dari table tickets yang value nya tempat lalu lakukan request dengan title
            'tempatan' => $request->tempatan,

            'name_file' => $request->file('file')->getClientOriginalName(),
            'path' => $path
            
        ]);
            // lalu kembali ke halaman utama / tickets.index
            return redirect()->route('tickets.index')->with('succes', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ticket $ticket)
    {
        // Menampilkan tulisan 'detail' pada halamannya 
        $title = 'Chat';

        // "Kalau user yang sedang login punya role user dan tiket ini bukan milik dia (user_id tiket tidak sama dengan id user yang login), maka hentikan proses dan tampilkan error 403 (forbidden/tidak punya akses)."
        if(Auth::user()->role == 'user' && $ticket->user_id !== Auth::id()){
            abort(403);
        }
        return view('tickets.show', compact('title', 'ticket'));
    }

    public function updateStatus(Request $request, Ticket $ticket){ // bagian yang mengontrol pengajuan

        // jika yang login adalah user, (karena bagian ini hanya boleh admin)
        if(Auth::user()->role == 'user'){
            // maka tampilkan
            abort(403);
        }
       // maka updateStatus ini diambil dari table tickets dengan valuenya pengajuan yang akan di update
        $ticket->update(['pengajuan' => $request->pengajuan]);
       // jika sudah maka akan kembali otomatis ke halaman utama
        return redirect()->route('tickets.index')->with('succes', 'Berhasil update');
        
    }

    public function edit($id) // bagian yang mengontrol edit
    {
        // jika yang login adalah sebuah admin, (karna admin tidak perlu edit)
        if(Auth::user()->role == 'admin'){
            // maka tampilkan abort
          abort(403); 
        }

        // menggunkan blade tamplate yang akan menampilkan bagian ini adalah "Edit"
        $title = 'Edit';

          // komputer akan menemukan bagian yang user pilih sebagai id
        $ticket = Ticket::findOrFail($id);

        // lalu akan menampilkan bagian halaman dari edit dari view/tickets/edit....
        return view('tickets.edit',compact('ticket', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)// bagian yang mengontrol update
    {
      
        // mengvalidasi bagian yang akan dipilih
        $request->validate([
            // nama_lengkap harus diisi, dan sebagai string
            'nama_lengkap' => 'required|string',

            // email harus diisi
            'email' => 'required|string',

            // status harus diisi
            'status' => 'required|string',

            // title harus diisi
            'title' => 'required|string',

            // keterangan harus diisi
            'keterangan' => 'required|string',

            'tempatan' => 'required|string',

            'file'  => 'required|file|mimes:pdf,doc,docx|max:102048', 
           // maximal dari sebuah file adalah 100 Mb, dan file yang relate hanya pdf,doc,docx
            
        ]);
       
        // komputer akan menemukan bagian yang user pilih sebagai id
        $ticket = Ticket::findOrFail($id);

    // berbeda dengan field text yang bisa langsung dengan syntax Ticket::all(), kalau ada file yang diunggah
    // maka harus secara manual agar bisa ter update filenya

    // jika ada ada sebuah file lama 
        if ($request->hasFile('file')) {

            // Hapus file lama kalau ada
            if ($ticket->path && Storage::disk('public')->exists($ticket->path)) {
                // jika ada maka hapus lah dibagian storage/app/public berdasarkan path
                Storage::disk('public')->delete($ticket->path);
            }
            // simpan file baru dibagian storage/public/files
           $uploadedFile = $request->file('file');
          $newFile =  $uploadedFile->store('files', 'public');

        // lalu update
            $ticket->update([
                // mengambil dari table input dibagian halaman edit.blade.php yang value nya nama_lengkap lalu lakukan request ke tabel tickets dengan field nya nama_lengkap
                'nama_lengkap' => $request->nama_lengkap,

                // mengambil dari table input dibagian halaman edit.blade.php yang value nya email lalu lakukan request ke tabel tickets dengan field nya email
                'email' => $request->email,

                // mengambil dari table input dibagian halaman edit.blade.php yang value nya status lalu lakukan request ke tabel tickets dengan field nya status
                'status' => $request->status,

                // mengambil dari table input dibagian halaman edit.blade.php yang value nya title lalu lakukan request ke tabel tickets dengan field nya title
                'title' => $request->title,

               // mengambil dari table input dibagian halaman edit.blade.php yang value nya keterangan lalu lakukan request ke tabel tickets dengan field nya keterangan
                'keterangan' => $request->keterangan,

                //  mengambil dari table input dibagian halaman edit.blade.php yang value nya tempat lalu lakukan request ke tabel tickets dengan field nya tempat
                'tempatan' => $request->tempatan,
        
                // mengambil dari table tickets yang value nya name_file lalu lakukan request dengan name_file 
                // lalu melakukan booelan jika true user upload file baru, maka ambil nama asli file dari upload-an.
                // jika false Jika user tidak upload file, maka pakai nama file lama yang sudah tersimpan di database.
                'name_file'=> $request->file ? $request->file('file')->getClientOriginalName() : $ticket->name_file,

                // mengambil dari table tickets yang value nya path lalu lakukan request path 
                 'path' => $newFile,
            ]);
            
            // jika diatas sudah terupdate maka akan kembali ke bagian utama web / tickets.index
    } 
    return redirect()->route('tickets.index')->with('succes', 'Berhasil Update');
    }
   

     public function destroy( $id)// Menghapus Bagian berdasarkan id / pilihan yang dipilih
    {
        //komputer akan menemukan bagian yang dihapus berdasarkan id
        $ticket = Ticket::findOrFail($id);
        //lalu menghapusnya
        $ticket->delete();
        // lalu akan kembali ke bagian halaman awal pada sebuah web
        return redirect()->route('tickets.index')->with('succes', 'Berhasil Hapus');   
    }

    public function download($id){ // mendownload file berdasarkan bagian user sebagai id
        // komputer akan menemukan bagian yang akan di downlaod berdasarkan id
       $ticket = Ticket::findOrFail($id);

       // lalu akan mendownload , diambil dari storage/app/public berdasarkan dari path, dan dari nama file
      return response()->download(storage_path('app/public/' .$ticket->path), $ticket->name_file);
    }
    public function info($id){ // bagian ini dari info detail di index yang dipilih oleh kita

        // menggunakan blade template yang akan tertulis di web sebagai "info"
        $title = "info";

        //  komputer akan menemukan bagian yang akan di info berdasarkan id
        $ticket = Ticket::findOrFail($id);

        //  akan menampilkan bagian halaman dari info yang kita buat di view/tickets/info....
        return view('tickets.info', compact('ticket', 'title'));
    }

    public function view($id)  { // bagian ini akan menampilkan file yang dipilih oleh kita

        //  komputer akan menemukan bagian yang akan di view berdasarkan id
        $ticket = Ticket::findOrFail($id);

        // kembalikan file untuk ditampilkan langsung di browser
        return response()->file(storage_path('app/public/' . $ticket->path));
    }

    
}
