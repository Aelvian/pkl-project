<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
 {{-- fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet">
{{--  --}}
    <link rel="icon" type="image/png" href="{{ asset('img/Group 2.png') }}">
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    
</head>
<body>
    <div class="tempat" id="mySideBar">
        <div class="kotak">
            <img src="{{ asset('img/Group 2.png') }}" alt="">
            <p>Pelayanan Pengajuan</p>
        </div>
        <div class="sidebar">
            <ul>
                <li><img src="{{ asset('img/home (1).png') }}" alt=""><a href="{{ route('tickets.index') }}">Dashboard</a></li>
                @if (auth()->user()->role == "user")
                <li><img src="{{ asset('img/create.png') }}" alt=""><a href="{{ route('tickets.create') }}">Tambah Pengajuan</a></li>
                @endif
                <li class="log-out">
                    <form action="{{ route('logout') }}" method="POST" >
                        @csrf
                        <button class="btn-logout" type="submit">Log Out</button>
                      </form>
                </li>
            </ul>
        </div>
    </div>
   <div class="content" id="main">
    <button class='tmbl' id="toggleButten">☰</button>
    <div class="parkir">
        <div class="con-garuda">
            <div class="child-lambang">
            <img class="kp2mi" src="{{ asset('img/logo-kp2mi.png') }}" alt="">
        </div>
        </div>
        <div class="name"> 
            <p class="welcome">Hai {{ auth()->user()->name }} 👋!</p>
            <p class="name1">Selamat datang di pelayanan pengajuan perizinan kepegawaian</p>
        </div>
       
        <div class="con-garuda">
            <div class="child-lambang">
            <img class="lambang" src="{{ asset('img/img-flag-indonesia.png') }}" alt="">
        </div>
        </div>
       
    </div>
   </div>

   @if (session('succes'))
   <div class="succes">
    <p style="color:white;">{{ session('succes') }}</p>
  </div>
   @elseif ($errors->any())
   <div class="error">
    <ul style="color:white">
        @foreach ($errors->all() as $error )
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif


   <script>
    const button = document.getElementById('toggleButten');
    const sidebar = document.getElementById('mySideBar');
    const main = document.getElementById('main');
    const main2 = document.getElementById('main2');

    let buka = false;
    button.addEventListener('click', function(){
        if (!buka){
            sidebar.style.width = '280px';
            main.style.marginLeft = '280px';
            if (sidebar.style.width === '280px') {
                button.textContent = 'X';
            }
            buka = true; 
          
        } else {
            sidebar.style.width = '0px';
            main.style.marginLeft = '0px';
            button.textContent = '☰';
            buka = false;
        }
        
    });
   </script>
   @yield('content')
</body>
</html>