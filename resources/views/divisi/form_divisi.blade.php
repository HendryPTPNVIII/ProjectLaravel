@extends('user.user')
 
@section('judul_halaman', 'FORM DIVISI')
 

@section('konten')

    <div class="form">
        @if(isset($data->kode_divisi))
        <form action = "{{url('/divisi/update')}}" method="post">
        <input type="hidden" name="id" required="required"
        value ="@if(isset($data->id)){{$data->id}}@endif" >
        @else
        <form action = "{{url('/divisi/store')}}" method="post">
        @endif
        @csrf
        Nama DIVISI/BAGIAN/UNIT : <input type="text" name="nama_divisi" required="required" placeholder="Nama DIVISI" value="@if(isset($data->nama_divisi)){{$data->nama_divisi}}@endif">
        <br>
        Kode DIVISI/BAGIAN/UNIT: <input type="text" name="kode_divisi" required="required" placeholder="Kode DIVISI" value="@if(isset($data->kode_divisi)){{$data->kode_divisi}}@endif">
        <br>
        
        REGIONAL : <select class="form-control @error('kategori') is-invalid @enderror" name="id_regional" value="@if(isset($data->id_regional)){{$data->id_regional}}@endif">
            <option>Pilih Regional</option>
            @if(isset($data->id_regional))
                @foreach ($items as $key => $value)
                    <option value="{{ $key }}" {{ $data->id_regional == $key ? 'selected' : '' }} > 
                        {{ $value }} 
                    </option>
                @endforeach
            @else
                @foreach ($items as $key => $value)
                <option value="{{ $key }}"> 
                    {{ $value }} 
                </option>
                @endforeach
            @endif
        </select>
        <br>
        {{-- TIPE ORGANISASI : <input type="text" name="tipe_org" required="required" placeholder="TIPE ORG" value="@if(isset($data->tipe_org)){{$data->tipe_org}}@endif">
        <br> --}}
        TIPE ORGANISASI : <select class="form-control @error('kategori') is-invalid @enderror" name="tipe_org" value="@if(isset($data->tipe_org)){{$data->tipe_org}}@endif">
            <option>Pilih TIPE ORGANISASI</option>
            @if(isset($data->tipe_org))
                @foreach ($tipe as $key => $value)
                    <option value="{{ $value }}" {{ $data->tipe_org == $value ? 'selected' : '' }} > 
                        {{ $value }} 
                    </option>
                @endforeach
            @else
                <option value="DIVISI"> 
                    DIVISI 
                </option>
                <option value="BAGIAN"> 
                    BAGIAN
                </option>
                <option value="UNIT"> 
                    UNIT
                </option>
            @endif
        </select>
        <br>
       
        <button class="add_user_btn_primary">
        Simpan
        </button>
</form>
    </div>
@endsection