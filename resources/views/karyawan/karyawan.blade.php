
@extends('user.user')
 
@section('judul_halaman', 'LIST DATA KARYAWAN')
 

@section('konten')

<button>
    <a href="{{url('/karyawan/form_karyawan_add')}}">Tambah Karyawan</a>
</button>
 
<table style="width:100%" border="1">
        <theah>
            <tr bgcolor="#00ff80">
                <th>NO</th>
                <th>KODE SUBDIVISI</th>
                <th>NIK</th>
                <th>NAMA</th>
                <th>JABATAN</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1; ?>
            @foreach($datakaryawan as $key)
            <tr>
                <th>{{ $i ++}}</th>
                <th style="text-align: left">{{ $key->id_subdivisi }}</th>
                <th style="text-align: left">{{ $key->nik }}</th>
                <th style="text-align: left">{{ $key->nama }}</th>
                <th style="text-align: left">{{ $key->jabatan }}</th>
                <th style="text-align: left"><a href="{{url('/karyawan/form_karyawan_edit/')}}/{{$key->id}}">EDIT</th>
                <th style="text-align: left"><a href="{{url('/karyawan/delete/')}}/{{$key->id}}"> DELETE</th>
            </tr>
            @endforeach
        </tbody>
    </table>
 
@endsection