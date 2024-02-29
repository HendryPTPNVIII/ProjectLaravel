
@extends('user.user')
 
@section('judul_halaman', 'LIST DATA KARYAWAN')
 

@section('konten')

<button>
    <a href="{{url('/karyawan/form_karyawan_add')}}">Tambah Karyawan</a>
</button>

<form method="GET">
    <div id="sample-table-3">
        <label>Pilih Regional</label>
        <select name="category_id" id="category_id">
            <option value="REGIONAL 1">REGIONAL 1</option>
            <option value="REGIONAL 2">REGIONAL 2</option>
            <option value="REGIONAL 3">REGIONAL 3</option>
            <option value="REGIONAL 4">REGIONAL 4</option>
            <option value="REGIONAL 5">REGIONAL 5</option>
            <option value="REGIONAL 6">REGIONAL 6</option>
            <option value="REGIONAL 7">REGIONAL 7</option>
            <option value="REGIONAL 8">REGIONAL 8</option>
        </select>
    </div>
</form>
 
<table class="table table-hover">
        <theah>
            <tr>
                <th>NO</th>
                <th>REGIONAL</th>
                <th>NAMA BAGIAN</th>
                <th>NAMA SUBDIVISI</th>
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
                <th style="text-align: left">{{ $key->namaregional }}</th>
                <th style="text-align: left">{{ $key->namadivisi }}</th>
                <th style="text-align: left">{{ $key->namasubdivisi }}</th>
                <th style="text-align: left">{{ $key->nik }}</th>
                <th style="text-align: left">{{ $key->nama }}</th>
                <th style="text-align: left">{{ $key->jabatan }}</th>
                <th style="text-align: left"><a href="{{url('/karyawan/form_karyawan_edit/')}}/{{$key->id}}">EDIT</th>
                <th style="text-align: left"><a href="{{url('/karyawan/delete/')}}/{{$key->id}}"> DELETE</th>
            </tr>
            @endforeach
        </tbody>
    </table>
 
    <script type="text/javascript">
    $(document).ready(function(){
        $('#category_id').on('change', function(e){
            var id_category = e.target.value;
            $.get('{{ url('karyawan/karyawan')}}/'+id_category, function(data){
                console.log(id_category);
                console.log(data);
                $('#news_data').empty();
                $.each(data, function(index, element){
                    $('#news_data').append("<tr><td>"+element.title+"</td><td>"+element.file+"</td>"+
                    "<td>"+element.content+"</td><td>"+element.like+"</td><td>"+element.view+"</td><td>"+find('.action')+"</td></tr>");
                });
            });
        });
    });
</script>
@endsection