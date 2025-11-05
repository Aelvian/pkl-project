@extends('layouts.app')

@section('content')
<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/3.0.0/uicons-solid-rounded/css/uicons-solid-rounded.css'>
<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/3.0.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
<style>
    .container{
        width:100%;
       
    }

    .pesan{
        margin-top:13%;
        width: 100%;
        height: 30%;
        
    }

    .pesan1{
        width:80%;
        padding: 10px 5px;
        margin-right: 3%;
        border-radius: 99px;
        margin-left: 2%;
    }

    .tmp-pesan{
        display: flex;
    }

    .button{
        width: 50px;
        border-radius: 99px;
        background-color: blue;
        color: white;
    }
    .btn-hapus {
    background-color: red;
    padding: 10px;
    border-radius: 99px;
    color: white;
    margin-bottom: 10px;
    
}
</style>

<article>
    @if (auth()->user()->role == 'admin')
    <h2>Nama {{ $ticket->nama_lengkap }}</h2>
    @else
        <h2>Chat dengan Admin</h2>
    @endif


<p> Status : <strong>{{ $ticket->pengajuan }}</strong></p>

<section>
    <p>Keterangan {{ $ticket->keterangan }}</p>
</section>

<section>
    <h3>Balasan</h3>
    @if ($ticket->responses->isEmpty())
        <p style="color:red">Belum Ada balasan</p>
        @else
        <table>
            @foreach ($ticket->responses as $response)
            <tr>
                <td><strong>{{ $response->user->name }}</strong></td>
                <td>:</td>
                <td>{{ $response->message }}</td>
                    @if ($response->user_id === auth()->id())
                    <td>
                        <form action="{{ route('destroy.response', $response->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button style="background-color: red;" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><i style="margin-right: 10px;" class="fi fi-rr-trash"></i></button>
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h1 class="modal-title fs-5" id="exampleModalLabel"><img style="width: 20%; margin-right: 5%;" src="{{ asset('img/Group 2.png') }}" alt="">Info Penting</h1>
                                    </div>
                                    <div class="modal-body">
                                      Apakah Anda yakin ingin menghapusnya?
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                      <button type="submit" class="btn btn-primary">Oke</button>
                                    </div>
                                  </div>
                                </div>
                              </div>
                        </form>
                    </td>
                    @endif
                
            </tr>
            @endforeach
        </table>
    @endif
</section>

@if($ticket->pengajuan !== 'setuju')
<!-- Bagian Pertama -->
@if (auth()->user()->role == 'admin' || auth()->id() == $ticket->user_id)
    <div class="container">
        <div class="pesan">
    <form action="{{ route('responses.store', $ticket) }}" method="POST">
        @csrf
        <div class="tmp-pesan">
            <input class="pesan1" type="text" placeholder="Kirim Pesan" id="message" name="message" required></input>
            <button class="button" type="submit"><i class="fi fi-sr-paper-plane-top"></i></button>
        </div>

    </form>
</div>
</div>
@endif
@else
<hr>
<p style="color:red;">Pengajuan ini Telah ditutup tidak dapat mengirim balasan</p>
@endif
</article>
@endsection