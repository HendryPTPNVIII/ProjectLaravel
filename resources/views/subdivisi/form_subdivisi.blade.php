<html>
<head></head>
<body>
    <h1>FORM SUBDIVISI</h1>
    <div class="form">
        @if(isset($data->id))
            <form action = "{{url('/subdivisi/update')}}" method="post">
            <input type="hidden" name="id" required="required"
            value ="@if(isset($data->id)){{$data->id}}@endif" >
        @else
            <form action = "{{url('/subdivisi/store')}}" method="post">
        @endif
        @csrf
        Nama SUBDIVISI : <input type="text" name="nama_subdivisi" required="required" placeholder="Nama SUBDIVISI" value="@if(isset($data->nama_subdiv)){{$data->nama_subdiv}}@endif">
        <br>
 
        DIVISI/BAGIAN/UNIT: <select class="form-control @error('kategori') is-invalid @enderror" name="id_division" value="@if(isset($data->id_division)){{$data->id_division}}@endif">
            <option>Pilih Nama Divisi</option>
            @if(isset($data->id_division))
                @foreach ($items as $key => $value)
                    <option value="{{ $key }}" {{ $data->id_division == $key ? 'selected' : '' }} > 
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
        <button class="add_user_btn_primary">
        Simpan
        </button>
</form>
    </div>
</body>
</html>