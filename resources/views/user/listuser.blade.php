
@extends('user.user')
 
@section('judul_halaman', 'LIST DATA USER')
 

@section('konten')

<button>
    <a href="{{url('/user/form_user_add')}}">Tambah User</a>
</button>
 
<table style="width:100%" border="1">
        <theah>
            <tr bgcolor="#00ff80">
                <th>NO</th>
                <th>NAMA</th>
                <th>EMAIL</th>
                <th>USERNAME</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1; ?>
            @foreach($dataalluser as $key)
            <tr>
                <th>{{ $i ++}}</th>
                <th style="text-align: left">{{ $key->name }}</th>
                <th style="text-align: left">{{ $key->email }}</th>
                <th style="text-align: left">{{ $key->username }}</th>
                <th style="text-align: left"><a href="{{url('/user/form_user_edit/')}}/{{$key->id}}"> EDIT </th>
                <th style="text-align: left"><a href="{{url('/user/delete/')}}/{{$key->id}}"> DELETE</th>
            </tr>
            @endforeach
        </tbody>
    </table>
 
@endsection