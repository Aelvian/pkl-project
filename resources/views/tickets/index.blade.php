@extends('layouts.app')


@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
{{-- bootstrap --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
{{--  --}}

{{-- icon --}}
<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/3.0.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>
<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/3.0.0/uicons-solid-straight/css/uicons-solid-straight.css'>
<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/3.0.0/uicons-regular-straight/css/uicons-regular-straight.css'>
<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/3.0.0/uicons-brands/css/uicons-brands.css'>
{{--  --}}

{{-- fonts --}}
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet">
{{--  --}}
<style>

.tempatpenomoran .nomor {
 background-color: whitesmoke;
 padding: 20px;
 margin-top: 20px;
 width: 100%;
 left: 0;

}

.kontak {
   background-color: whitesmoke;
   box-sizing: border-box;
   width: 14em;
   padding: 10px;
   border-radius: 20px;
   width: 100%;
   display: flex;
   
}

.card {
   background-color: white;
   width: 12em;
   padding: 10px;
   border-radius: 10%;
   margin-left:11%;
   box-shadow: 5px 5px 5px black;
}

/* stop */

.footerCard{
    margin-top: 0;
    margin-top: 6%;
    width: 102%;
    height: auto;
    background-color: rgba(4, 4, 118, 0.989);
    padding: 5px;
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;    
}
.child {
    display: block;
    width: 200px;
    padding: 10px 20px;
  
}

.children {
    color:white;
    margin-left: 15px;
    padding-top: 5px;
    width: 60%;
}


.backgroundTable  {
    width: 102%;
    text-align: center;
    margin-top: 50px;
    height: auto;
    background-color: whitesmoke;
    box-shadow: 5px 5px 5px black;
    box-sizing:border-box;
}

table {
    width: 80;
    padding: 10px 20px;
    
    
}

th {
    background-color: blue;
    color: white;
}

td {
    background-color: white;
    color: black;
}

.backgroundTable p {
    color: black;
    left: 0;
    padding-top: 10px;
    font-size: 30px;
}

.font {
    font-size: 30px;
    font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
}

.lanjutan {
    padding: 10px 20px;
    width: 50%;
    color:white;
}

.buttun {
    background-color: blue;
    padding: 10px;
    width: 100px;
    border-radius: 999px;
    color: white;
    margin-bottom: 10px;
}

.buttun:hover {
    background-color: darkblue;
    color: white;
    box-shadow: 0px 3px 6px blue;
   cursor: pointer;
   transition: all 0.1s;
   transform: translateY(-3px);
}

.btn-hapus {
    background-color: red;
    padding: 10px;
    border-radius: 10px;
    color: white;
    margin-bottom: 10px;
    
}

.btn-hapus:hover {
    background-color: darkred;
    color: white;
    box-shadow: 0px 3px 6px red;
   cursor: pointer;
   transition: all 0.1s;
   transform: translateY(-3px);
}

.btn-edit {
    background-color: purple;
    padding: 10px;
    border-radius: 10px;
    color: white;
    margin-bottom: 10px;
    text-decoration: none;
}

.btn-edit:hover {
    background-color: darkorchid;
    color: white;
    box-shadow: 0px 3px 6px purple;
   cursor: pointer;
   transition: all 0.1s;
   transform: translateY(-3px);
}



    .highlight {
    background-color: yellow;
    padding: 2px 4px;
    border-radius: 3px;
    }

 .consearch {
  width: 100%;
}

.search {
    width: 45%;
    margin-bottom:10px;
    padding:10px 5px;
    border-radius: 999px;
    margin-right: 30%;
}

.btn-link{
    background-color: darkgoldenrod;
    padding: 10px;
    border-radius: 10px;
    color: white;
    margin-bottom: 10px;
    text-decoration: none;
}

.btn-link:hover{
    background-color: yellow;
    color: white;
    box-shadow: 0px 3px 6px yellow;
   cursor: pointer;
   transition: all 0.1s;
   transform: translateY(-3px);
}

.welcome1 {
    font-family: "Oswald", sans-serif;
    font-optical-sizing: auto;
    font-weight: 300;
    font-style: normal;
  }

  img.gmbr{
    width: 200px;
    display: block;
  }

 p.judul-kantor{
    color: yellow;
    display: block;
 }

 p.judul-media{
    color: yellow;
    font-size: large;
    display: block;
 }

 .anak1{
    display: flex;
    justify-content: space-around;
    margin-left: 2%;
 }

 a.link{
    color: white;
    font-size: 30px;
    text-decoration: none;
    border-radius: 99px;
 }

 a.link:hover{
    background-color: blue;
 }

@media (max-width: 600px) {
  table,
  thead,
  tbody,
  th,
  td,
  tr {
    display: block;
  }

  thead {
  display: none;
  }

  tr {
    margin-bottom: 15px;
    border: 3px solid black;
    padding: 10px;
  }

  td {
    display: flex;
    justify-content: ;
    padding: 15px;
  }

  td::before {
    content: attr(data-label);
    font-weight: bold;
  }

  .buttun{
    width: 100%;
  }
}

</style>


<div class="backgroundTable">
    {{-- bagian search hanya admin bisa akses --}}
    <p class="welcome1">Data Pelayanan Pengajuan</p>
    @if (auth()->user()->role == "admin")
    <div class="consearch">
        <input type="text" id="myInput" class="search" placeholder="Cari Nama / Email / Status / Tanggal">
      </div> 
    @endif

    {{-- Tabel untuk mendata siapa saja yang sudah menginput data --}}
<table border="0" cellspacing="0" cellpadding="8" align="center">
    <thead>
      <tr>
        <th>Nama</th>
        <th>Unit Kerja</th>
        <th>Status</th>
        <th>Tanggal</th>
        <th>pengajuan</th>
        @if(auth()->user()->role == 'user')
        <th>Edit</th>
        @endif
        <th>Hapus</th>
        <th>Chat </th>
        <th>Lihat Detail</th>
      </tr>
    </thead>
    {{-- jikalau user / admin sedang login dan belum ada data apapun --}}
    @if($tickets->isEmpty())
    {{-- maka tampilkan --}}
    <td colspan='10' style='text-align:center; color:red;'>Data Belum ada</td>
    {{-- jikalau ada --}}
    @else
    <tbody id="myTable">
        {{-- Form yang menampilkan data data yang sudah menginput --}}
      @foreach ($tickets as $ticket )
      <tr>
        <td data-label>{{ $ticket->nama_lengkap }}</td>
        <td data-label>{{ $ticket->tempatan }}</td>
        <td data-label>{{ $ticket->status }}</td>
        <td data-label>{{ $ticket->created_at->format('d-M-Y ') }}</td>
        {{-- Data yang hanya bisa diubah oleh admin, dan jika sudah diubah bakal disimpan --}}
        <td data-label>
            @if(auth()->user()->role == 'admin')
            <form action="{{ route('tickets.UpdatePengajuan' , $ticket->id) }}" method="POST">
                @csrf
                @method('PUT')

                <select name="pengajuan" onchange="this.form.submit()">
                    <option value='menunggu' {{ $ticket->pengajuan == 'menunggu' ? 'selected' : ''}}>menunggu</option>
                    <option value='setuju' {{ $ticket->pengajuan == 'setuju' ? 'selected' : '' }}>disetujui</option>
                    <option value='ditolak' {{ $ticket->pengajuan == 'ditolak' ? 'selected' : '' }}>ditolak</option>
                </select>
            </form>
            @else
            {{ $ticket->pengajuan }}
            @endif
        </td>

         {{-- bagian edit yang dimana hanya kita sebagai user saja yang bisa mengeditnya, admin tidak perlu--}}
        @if(auth()->user()->role == 'user')
        <td>
          <form action="{{ route('tickets.edit', $ticket->id) }}">
            <button type="submit" class="btn-edit">Edit Form</button>
          </form>
        </td>
        @endif

       {{-- Bagian hapus --}}
        <td data-label>
       <form action="{{ route('tickets.destroy', $ticket->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button style="background-color: red;" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><i style="margin-right: 10px;" class="fi fi-rr-trash"></i>
            Hapus
          </button>
          
          <!-- Pop up -->
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel"><img style="width: 20%; margin-right: 5%;" src="{{ asset('img/Group 2.png') }}" alt="">Info Penting</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
      </td>
    </form>
      {{-- ini adalah bagian dimana bisa untuk chat admin / User--}}
     @if (auth()->user()->role == 'user')
        <td data-label><a href="{{ route('tickets.show', $ticket) }}" class="btn-link">Chat Admin</a></td>
     @else
     <td data-label><a href="{{ route('tickets.show', $ticket) }}" class="btn-link">Chat User</a></td>
     @endif
         
        {{-- dan ini adalah bagian infolengkap dari user yang menginputnya --}}
        <td data-label>
            <form action="{{ route('tickets.info', $ticket->id) }}">
                <button class="buttun" type="submit">Info Detail</button>
            </form>
        </td>

      </tr>
      @endforeach
      @endif
</div>
</tbody>
</table>

</div>
<div class="footerCard">
    <div class="child">
            <div class="gmbr"><img class="gmbr" src="{{ asset('img/logo-kp2mi-white.png') }}" alt=""></div>
            <p style="color: white;">Hak Cipta ©2025, BP3MI Kepulauan Riau.
                Semua hak dilindungi
                Situs resmi Kementerian Pelindungan Pekerja Migran Indonesia/Badan Pelindungan Pekerja Migran Indonesia</p>  
    </div>  
    <div class="child">
        <p class="judul-media">Social Media</p>
        <div class="anak1">
            <a class="link" href="https://www.youtube.com/@bp3mikepulauanriau952" target="_blank"><i class="fi fi-brands-youtube"></i></a>
            <a class="link" href="https://www.instagram.com/bp3mi_kepulauanriau/" target="_blank"><i class="fi fi-brands-instagram"></i></a>
            <a class="link" href="https://www.tiktok.com/@bp3mi.kepri" target="_blank"><i class="fi fi-brands-tik-tok"></i></a>
        </div>

    </div> 
    <div class="child">
        <p class="judul-kantor"><i style="margin-right: 7%;" class="fi fi-rs-marker"></i>Kantor</p>
        <p style="color:white;">BP3MI Kepulauan Riau | Jl. Nusantara KM 13 Arah Kijang, Tanjung Pinang, Kepulauan Riau </p>
        <p class="judul-kantor"><i style="margin-right: 7%;" class="fi-ss-phone-rotary"></i>Call</p>
        <p style="color:white;">+62 771 4440044 </p>
        <p class="judul-kantor"><i style="margin-right: 7%;"  class= "fi fi-brands-whatsapp"></i>Whatsapp Pengaduan</p>
        <p style="color:white;">0823-8404-2002</p>
    </div>  
</div>


<script>
  $(document).ready(function(){
      // Simpan isi asli semua cell saat halaman dimuat
      $("#myTable tr").each(function(){
          $(this).find("td").each(function(){
              $(this).attr("data-original", $(this).html());
          });
      });
  
      $("#myInput").on("keyup", function() {
          var value = $(this).val().toLowerCase();
          var found = false;
  
          // Reset isi cell dari data-original agar tombol kembali seperti semula
          $("#myTable tr").each(function(){
              $(this).find("td").each(function(){
                  $(this).html($(this).attr("data-original"));
              });
          });
  
          // Filter baris
          $("#myTable tr").filter(function() {
              var rowText = $(this).text().toLowerCase();
              var match = rowText.indexOf(value) > -1;
  
              $(this).toggle(match);
  
              if (match && value !== "") {
                  found = true;
                  // Highlight hanya teks biasa (bukan tombol)
                  $(this).find("td").each(function(){
                      if ($(this).find("a, button").length === 0) {
                          var cellText = $(this).text();
                          var regex = new RegExp("(" + value + ")", "gi");
                          $(this).html(cellText.replace(regex, "<span class='highlight'>$1</span>"));
                      }
                  });
              } else if (match) {
                  found = true;
              }
          });
  
          // Pesan "tidak ditemukan"
          if (!found && value !== "") {
              if ($("#noData").length === 0) {
                  $("#myTable").append("<tr id='noData'><td colspan='10' class='text-center text-danger'>Data tidak ditemukan</td></tr>");
              }
          } else {
              $("#noData").remove();
          }
      });

      // untuk memunculkan pop up 
      const myModal = document.getElementById('myModal')
const myInput = document.getElementById('myInput')

myModal.addEventListener('shown.bs.modal', () => {
  myInput.focus()
})
     
  });
</script>
@endsection