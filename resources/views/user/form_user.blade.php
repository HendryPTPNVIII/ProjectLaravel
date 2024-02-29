
@extends('user.user')
 
@section('judul_halaman', 'TAMBAH DATA USER')
 

@section('konten')
    <div class="form">
        @if(isset($datauser->username))
        <form action = "{{url('/user/update')}}" method="post">
        <input type="hidden" name="id" required="required"
        value ="@if(isset($datauser->id)){{$datauser->id}}@endif" >
        @else
        <form action = "{{url('/user/store')}}" method="post">
        @endif
        @csrf
        Nama : <input type="text" name="name" required="required" placeholder="Nama" value="@if(isset($datauser->name)){{$datauser->name}}@endif">
        <br>
        Username : <input type="text" name="username" required="required" placeholder="Username" value="@if(isset($datauser->name)){{$datauser->username}}@endif">
        <br>
        Email : <input type="text" name="email" required="required" placeholder="Email" value="@if(isset($datauser->email)){{$datauser->email}}@endif">
        <br>
        Bagian : <input type="text" name="bagian" required="required" placeholder="Bagian" value="@if(isset($datauser->bagian)){{$datauser->bagian}}@endif">
        <br>
        Password : <input type="text" name="password" required="required" placeholder="Password" value="@if(isset($datauser->name)){{$datauser->password}}@endif">
        <br>
        Api Token : <input type="text" name="api_token" required="required" placeholder="Api Token" value="@if(isset($datauser->api_token)){{$datauser->api_token}}@endif">
        <br>
        <button class="add_user_btn_primary">
        Simpan
        </button>
</form>
    </div>
    @endsection