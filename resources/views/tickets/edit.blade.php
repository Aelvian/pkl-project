@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/create.css') }}">
</head>
<body>
    
  <div class="container">
    <h3>Tambah Pengajuan</h3>
    <form action="{{ route('tickets.update' , $ticket->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
      <label for="nama_pekerjaan">Nama Lengkap</label>
      <input type="text" id="nama_lengkap" name="nama_lengkap" value="{{ $ticket->nama_lengkap }}" >

      <label for="email">email</label>
      <input type="text" id="email" name="email" value="{{ $ticket->email }}">

      <label for="">Status</label>
      <select name="status">
        <option disabled selected>-- Ajukan Pengajuan --</option>
        <option value="sakit" {{ $ticket->status == 'sakit' ? 'selected' : '' }}>Sakit</option>
        <option value="izin" {{ $ticket->status == 'izin' ? 'selected' : '' }}>Izin</option>
        <option value="cuti" {{ $ticket->status == 'cuti' ? 'selected' : '' }}>Cuti</option>
      </select>

      <label for="">Berada Di Penempatan</label>
      <select name="tempatan">
        <option value="P4MI Batam" {{ $ticket->tempatan == 'P4MI Batam' ? 'selected' : '' }}>P4MI Batam</option>
        <option value="P4MI Karimun" {{ $ticket->tempatan == 'P4MI Karimun' ? 'selected' : '' }}>P4MI Karimun</option>
        <option value="BP3MI Kepulauan riau" {{ $ticket->tempatan == 'BP3MI Kepulauan riau' ? 'selected' : '' }}>BP3MI Kepulauan riau</option>
      </select>

      <label for="">Surat Keterangan</label>
      <input type="file" name="file" style="margin-bottom: 10px; outline: none; padding: 10px;" value="{{ $ticket->name_file }}" >

      <label for="title">Title Jabatan</label>
      <input type="text" name="title" value="{{ $ticket->title }}" placeholder="Jabatan" >

      <label for="detail">Keterangan</label>
      <textarea name="keterangan" value="{{ $ticket->keterangan }}"></textarea></textarea><br>

      <button type="submit">Oke</button>
    </form>
  </div>
  
@endsection