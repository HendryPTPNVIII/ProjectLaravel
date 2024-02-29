<html>
<head></head>
<body>
    <h1>SELAMAT DATANG DI PROJECT DENTA DAN HENDRY</h1>
    <nav>
 <a href="/user/listuser">LIST DATA USER</a>
 |
 <a href="/regional/regional">REGIONAL</a>
 |
 <a href="/blog/kontak">DIVISION</a>
 |
 <a href="/blog/kontak">SUBDIVISION</a>
 |
 <a href="/karyawan/karyawan">KARYAWAN</a>
 |
 <a href="{{url('/func_logout')}}">LOG OUT</a>
 </nav>

    
    <?php
       // dd($dataalluser);
    ?>

    <!-- bagian judul halaman blog -->
 <h3> @yield('judul_halaman') </h3>
 <!-- bagian konten blog -->
 @yield('konten')
    
</body>
</html>