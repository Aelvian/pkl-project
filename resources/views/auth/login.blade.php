@extends('auth.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/sign_up.css') }}">

    
  <div class="container">
    <h3>Login</h3>
    <form action="{{ route('postLogin') }}" method="POST">
        @csrf
      <label for="nama_lengkap">Nama</label>
      <input type="text" id="name" name="name" >

      <label for="password">Username</label>
      <input type="text" id="username" name="username" >


      <label for="password">Password</label>
      <input type="password" name="password" style=" width: 100%;
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 6px;
    font-size: 14px;">

      
      <p >Belum Punya Akun? <a href="{{ route('register') }}">Register</a></p>
  
      <button class="regis" type="submit">Oke</button>
    </form>
  </div>
@endsection