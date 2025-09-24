@extends('auth.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/sign_up.css') }}">
<div class="container">
    <h3>Register Akun</h3>
    <form action="{{ route('postRegister') }}" method="POST">
        @csrf
      <label for="nama_lengkap">Nama</label>
      <input type="text" id="name" name="name" >

      <label for="username">Username</label>
      <input type="text"  name="username">


      <label for="password">Password</label>
      <input type="password" name="password" style=" width: 100%;
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 6px;
    font-size: 14px;">

      <label for="confirmpassword">Konfirmasi password</label>
      <input type="password" name="password_confirmation" style=" width: 100%;
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 6px;
    font-size: 14px;">

      <p>Sudah Punya Akun? <a href="{{ route('login') }}">Login</a></p>
      
        
      <button class="regis" type="submit">Oke</button>
    </form>
  </div>
@endsection