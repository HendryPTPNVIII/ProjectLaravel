
@extends('user.user')
 
@section('judul_halaman', 'LIST DATA REGIONAL')
 

@section('konten')

<button>
    <a href="{{url('/regional/form_regional_add')}}">Tambah Regional</a>
</button>
 
<table class="table table-hover">
        <theah>
            <tr>
                <th>NO</th>
                <th>KODE REGIONAL</th>
                <th>NAMA</th>
                <th>EMAIL</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1; ?>
            @foreach($dataregional as $key)
            <tr>
                <th>{{ $i ++}}</th>
                <th style="text-align: left">{{ $key->kode_regional }}</th>
                <th style="text-align: left">{{ $key->nama }}</th>
                <th style="text-align: left">{{ $key->email }}</th>
                <th style="text-align: left"><a href="{{url('/regional/form_regional_edit/')}}/{{$key->id_regional}}"> EDIT </th>
                <th style="text-align: left"><a href="{{url('/regional/delete/')}}/{{$key->id_regional}}"> DELETE</th>
            </tr>
            @endforeach
        </tbody>
    </table>
 
@endsection