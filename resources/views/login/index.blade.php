<html>
<head></head>
<body>
    <h1>LOGIN</h1>
    <div class="form">
        <form action = "{{url('/login/func_login')}}" method="post">
        
        @csrf
        
        Username : <input type="text" name="username" required="required" placeholder="Username" >
        <br>
       
        Password : <input type="text" name="password" required="required" placeholder="Password" >
        <br>
        
        <button class="add_user_btn_primary">
        Login
        </button>
</form>
    </div>
</body>
</html>