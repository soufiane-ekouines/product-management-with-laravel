@extends('layout/navbar')

@section('name_page','creat acount')

@section('section')
    <section>
<form action="{{ route('add') }}" method="post">
    @csrf
    <div class="content">
    <h1>create my new acount </h1>
    <p></p>
    <input name="name" type="text" placeholder="Name">
    <p></p>
    <input name="email" type="text" placeholder="email" type="email"><br>
    <p></p>
    <input name="password1" type="text" placeholder="password" type="password"><br>
    <p></p>
    <input name="password2" type="text" placeholder="conferme password" type="password"><br>
    <button type="submit">create</button>
    <p><a href="\">i hav acount</a> </p>
    <div class="ip">
        <a href="fb-login">FB</a>  
        <a href="google-login">G</a>  
    </div>
    </div>
</form>
    </section>
@endsection

<style>
section{
    display: flex;
    justify-content: center;
    align-items: center;
    position: relative;
    top: 80px;
}
form{
    border: 1px solid black;
    padding: 54px;
    display: flex;
    justify-content: center;
    align-items: center;
    box-shadow: 0 0 10px #ddd;
}
form h1{
    font-size: 28px;
}
form input{
    height: 36px;
    width: 100%;
    border-radius: 13px;
}
form button{
    font-size: 25;
    height: 45px;
    width: 100%;
    border-radius: 71px;
    background-color: transparent;
    border: 1px solid blue;
    margin-top: 21px;
}
form p a{
    display: flex;
    justify-content: center;
    color: lightblue;
}
form .ip button{
    font-size: 17;
    height: 30;
    width: 72;
    border: 1px solid lightblue;
}
.ip{
    display: flex;
    justify-content: space-between;
}
</style>