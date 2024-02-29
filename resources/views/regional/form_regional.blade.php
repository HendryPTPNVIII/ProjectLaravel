
@extends('user.user')
 
@section('judul_halaman', 'TAMBAH DATA REGIONAL')
 

@section('konten')
    <div class="form">
        @if(isset($dataregional->id_regional))
        <form action = "{{url('/regional/update')}}" method="post">
        <input type="hidden" name="id" required="required"
        value ="@if(isset($dataregional->id_regional)){{$dataregional->id_regional}}@endif" >
        @else
        <form action = "{{url('/regional/store')}}" method="post">
        @endif
        @csrf
        Kode Regional : <input type="text" name="kode_regional" required="required" placeholder="Kode Regional" value="@if(isset($dataregional->kode_regional)){{$dataregional->kode_regional}}@endif">
        <br>
        Nama Regional : <input type="text" name="nama" required="required" placeholder="Nama" value="@if(isset($dataregional->nama)){{$dataregional->nama}}@endif">
        <br>
        Email : <input type="text" name="email" required="required" placeholder="Email" value="@if(isset($dataregional->email)){{$dataregional->email}}@endif">
        <br>
        <button class="add_user_btn_primary">
        Simpan
        </button>
</form>
    </div>
    @endsection