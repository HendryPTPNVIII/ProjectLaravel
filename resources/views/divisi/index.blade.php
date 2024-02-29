@extends('user.user')
 
@section('judul_halaman', 'LIST DATA DIVISI')
 

@section('konten')

    <button>
    <a href="{{url('/divisi/form_divisi_add')}}">Tambah Divisi</a>
    </button>
    <table class="table table-hover">
        <theah>
            <tr>
                <th>NO</th>
                <th>REGIONAL</th>
                <th>NAMA DIVISI</th>
                <th>KODE DIVISI</th>
                <th>JENIS ORGANISASI</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1; ?>
            @foreach($data as $key)
            <tr>
                <td>{{ $i ++}}</td>
                <td style="text-align: left">{{ $key->id_regional }}</td>
                <td style="text-align: left">{{ $key->nama_divisi }}</td>
                <td style="text-align: left"><a href="{{url('/divisi/form_divisi_edit/')}}/{{$key->id}}"> {{ $key->kode_divisi }}</td>
                <td style="text-align: left">{{ $key->tipe_org }}</td>
                <th style="text-align: left"><a href="{{url('/divisi/delete/')}}/{{$key->id}}"> DELETE</th>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection