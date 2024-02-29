<html>
<head></head>
<body>
    <h1>LIST DATA USER</h1>
    <button>
    <a href="{{url('/user/form_user_add')}}">Tambah User</a>
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
                <th style="text-align: left"><a href="{{url('/user/form_user_edit/')}}/{{$key->id}}"> {{ $key->username}}</th>
                <th style="text-align: left"><a href="{{url('/user/delete/')}}/{{$key->id}}"> DELETE</th>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>