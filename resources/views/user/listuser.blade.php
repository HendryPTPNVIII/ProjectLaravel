
@extends('user.user')
 
@section('judul_halaman', 'LIST DATA USER')
 

@section('konten')

<button>
    <a href="{{url('/user/form_user_add')}}">Tambah User</a>
</button>
<div class="box-body table-responsive no-padding">
<table class="table table-hover">
        <theah>
            <tr>
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
</div>
@endsection