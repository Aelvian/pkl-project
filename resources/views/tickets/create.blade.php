@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/create.css') }}">
</head>
<body>
    
  <div class="container">
    <h3>Tambah Pengajuan</h3>
    <form action="{{ route('tickets.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
      <label for="nama_pekerjaan">Nama Lengkap</label>
      <input type="text" id="nama_lengkap" name="nama_lengkap" required >

      <label for="email">email</label>
      <input type="text" id="email" name="email" >

      <label for="status">Status</label>
      <select name="status" required>
        <option disabled selected>-- Ajukan Pengajuan --</option>
        <option value="sakit">Sakit</option>
        <option value="izin">Izin</option>
        <option value="cuti">Cuti</option>
      </select>

      <label for="tempat">Unit Kerja</label>
      <select name="tempatan" required>
        <option disabled selected>-- Pilih Penempatan --</option>
        <option value="P4MI Batam">P4MI Batam</option>
        <option value="P4MI Karimun">P4MI Karimun</option>
        <option value="BP3MI Kepulauan riau">BP3MI Kepulauan riau</option>
      </select>



      <label for="">Surat Keterangan</label>
      <p style="color:red">*Pdf Only</p>
      <input type="file" name="file" required style="margin-bottom: 10px;">

      <label for="title">Jabatan</label>
      <input type="text" name="title" required placeholder="Jabatan">

      <label for="detail">Keterangan</label>
      <textarea name="keterangan" required></textarea></textarea><br>

      <button type="submit">Oke</button>
    </form>
  </div>
 
@endsection