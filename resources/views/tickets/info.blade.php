@extends('layouts.app')

@section('content')
<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/3.0.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>
<style>
    body{
        background-color: whitesmoke;
    }

    .container{
        width: 100%;
       
    }

    .con2{
        width: 60%;
        background-color: white;
        margin-left:23%; 
        border-radius: 3%;
        padding: 3% 2%;
        box-shadow: 5px 5px 5px black;
        margin-top: 20px;
    }

    .link {
        width: auto;
        display: flex;

    }

    .link-2{
        margin-left:5%;
        width: 150px;
        background-color: red;
        padding: 10px;
        border-radius: 10px;
        color: white;
    }

    .link-2:hover{
        background-color: darkred;
        color: white;
        box-shadow: 0px 3px 6px red;
        cursor: pointer;
        transition: all 0.1s;
        transform: translateY(-3px);
    }

    .link-1{
        background-color: blue;
        padding: 10px;
        border-radius: 10px;
        color: white;
    }

    .link-1:hover{
        background-color: darkblue;
        color: white;
        box-shadow: 0px 3px 6px blue;
        cursor: pointer;
        transition: all 0.1s;
        transform: translateY(-3px);
    }
</style>

<div class="container">
    <div class="con2">
    <div class="judul">
    <h1>{{ $ticket->created_at }}</h1>
    <h3>nama : {{ $ticket->nama_lengkap }}</h3>
</div>
    <h4>Status : {{ $ticket->pengajuan }}</h4>
    <p>Email : {{ $ticket->email }}</p>
    <p>Pengajuan : {{ $ticket->status }}</p>
    <p>Keterangan : {{ $ticket->keterangan }}</p>
    <p>jabatan : {{ $ticket->title }}</p>
    <p>Unit Kerja : {{ $ticket->tempatan }}</p>
    <p>{{ $ticket->name_file }} </p>
    <div class="link">
    <form action="{{ route('tickets.view', $ticket->id, ) }}" target="_blank">
        <button type="submit" class="link-1"><i style="margin-right:10px;" class="fi fi-rr-eye"></i>Preview</button>
    </form>
    <form action="{{ route('tickets.download', $ticket->id, ) }}">
        <button  type="submit" class="link-2"><i style="margin-right: 10px;" class="fi fi-rr-file-download"></i>Download File</button>
    </form>
    </div>
    
</div>
</div>




@endsection