<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Response;
use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;


class ResponseController extends Controller
{
           public function store(Request $request, Ticket $ticket){
            // memvalidasi bahwa message itu required
            $request->validate(['message' => 'required']);

            // "Kalau user yang sedang login punya role user dan tiket ini bukan milik dia (user_id tiket tidak sama dengan id user yang login), maka hentikan proses dan tampilkan error 403 (forbidden/tidak punya akses)."
            if(Auth::user()->role == 'user' && $ticket->user_id !== Auth::id()){
                abort(403);
            }
            // lalu create dan simpan ke database
        Response::create([
            'ticket_id' => $ticket->id,
            'user_id' => Auth::id(),
            'message' => $request->message,
        ]);
        // jika sudah melakukan nya maka langsung kembali ke tickets.show
        return redirect()->route('tickets.show', $ticket);
    }
    public function destroy ($id){ // bagian untuk menghapus pesan

        // komputer akan mencari berdasarkan id dari pilihan  user
       
            Response::findOrFail($id)->delete();
            return back();
        
        
        // jika sudah ketemu maka delete semuanya
       
        // lalu jika berhasil maka tampilkan pesan  "pesan berhasil dihapus"
        
    }
}
