<html>
<head></head>
<body>
    <h1>LIST DATA SUBDIVISI</h1>
    <button>
    <a href="{{url('/subdivisi/form_subdivisi_add')}}">Tambah Subdivisi</a>
</button>
<button>
    <a href="{{url('/func_logout')}}">Logout</a>
</button>
    <?php
       // dd($dataalluser);
    ?>
    <table style="width:100%" border="1">
        <theah>
            <tr bgcolor="#00ff80">
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
                <td style="text-align: left"><a href="{{url('/subdivisi/form_subdivisi_edit/')}}/{{$key->id}}"> {{ $key->nama_subdiv }}</td>
                <td style="text-align: left">{{ $key->id_division }}</td>
                <th style="text-align: left"><a href="{{url('/subdivisi/delete/')}}/{{$key->id}}"> DELETE</th>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>