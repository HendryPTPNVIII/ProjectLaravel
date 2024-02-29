@extends('user.user')
 
@section('judul_halaman', 'LIST DATA SUBDIVISI')
 

@section('konten')


    <button>
    <a href="{{url('/subdivisi/form_subdivisi_add')}}">Tambah Subdivisi</a>
    </button>
    <table class="table table-hover">
        <theah>
            <tr>
                <th>NO</th>
                <th>NAMA SUBDIVISI</th>
                <th>NAMA DIVISI/BAGIAN/UNIT</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1; ?>
            @foreach($data as $key)
            <tr>
                <td>{{ $i ++}}</td>
                <td style="text-align: left">{{ $key->nama_subdiv }}</td>
                <td style="text-align: left">{{ $key->id_division }}</td>
                <th style="text-align: left"><a href="{{url('/subdivisi/form_subdivisi_edit/')}}/{{$key->id}}"> EDIT</th>
                <th style="text-align: left"><a href="{{url('/subdivisi/delete/')}}/{{$key->id}}"> DELETE</th>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection