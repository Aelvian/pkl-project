<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="{{ asset('img/Group 2.png') }}">
    <style>
        .p1{
    width: 100%;
    background-color: white;
    
}

*{
    margin:0;
    padding: 0;
}

.p2{
    width: 100%;
    background-color: white;
    padding: 5px;
    display: flex;
    justify-content:space-between;
   
}

.p3{
    width: 200px;
    margin-left: 5%;
}

.kump-gambar{
    width: 200px;
   
    margin-right: 40px;
    display: flex;
}

.container1{
    width: 100%;
    margin-left: 40%;
}

.bendera{
    width: 100px;
    margin-right: 15px;
    filter: drop-shadow(0px 10px 25px rgba(0,0,0,0.3));
}

.garuda{
    width: 80px;
}

.penulisan{
    width: auto;
    margin-top: 30px;
}

.succes{
    width: 200px;
    padding: 20px;
    background-color: green;
    margin-top: 20px;
    margin-left: 15px
}

.error{
    width: 200px;
    padding: 20px;
    background-color: red;
    margin-top: 20px;
    margin-left: 15px;
    color:white;
}

@media (max-width: 600px){
    .penulisan{
        display: none;
    }
}

    </style>
    <title>{{ $title }}</title>
</head>
<body>
    <div class="p1">
        <div class="p2">
            <img class="p3" src="{{ asset('img/logo-kp2mi.png') }}" alt="">
           <div class="penulisan">
            <p>BP3MI Pelayanan Pengajuan Perizinan Kepegawaian</p>
           </div>
            <div class="kump-gambar">
               <img class="bendera" src="{{ asset('img/img-flag-indonesia.png') }}" alt="">
               <img class="garuda" src="{{ asset('img/img-garuda.png') }}" alt="">
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
    @yield('content')
</body>
</html>