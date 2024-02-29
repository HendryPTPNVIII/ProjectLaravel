
@extends('user.user')
 
@section('judul_halaman', 'TAMBAH DATA KARYAWAN')
 

@section('konten')
    <div class="form">
        @if(isset($datakaryawan->id))
        <form action = "{{url('/karyawan/update')}}" method="post">
        <input type="hidden" name="id" required="required"
        value ="@if(isset($datakaryawan->id)){{$datakaryawan->id}}@endif" >
        @else
        <form action = "{{url('/karyawan/store')}}" method="post">
        @endif
        @csrf
        Kode Subdivisi : <input type="text" name="id_subdivisi" required="required" placeholder="Id Subdivisi" value="@if(isset($datakaryawan->id_subdivisi)){{$datakaryawan->id_subdivisi}}@endif">
        <br>
        NIK : <input type="text" name="nik" required="required" placeholder="NIK" value="@if(isset($datakaryawan->nik)){{$datakaryawan->nik}}@endif">
        <br>
        Nama : <input type="text" name="nama" required="required" placeholder="Nama" value="@if(isset($datakaryawan->nama)){{$datakaryawan->nama}}@endif">
        <br>
        Jabatan : <input type="text" name="jabatan" required="required" placeholder="Jabatan" value="@if(isset($datakaryawan->jabatan)){{$datakaryawan->jabatan}}@endif">
        <br>
        <button class="add_user_btn_primary">
        Simpan
        </button>
</form>
    </div>
    @endsection