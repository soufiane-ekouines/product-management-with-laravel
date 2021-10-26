@extends('layout/navbar')

@section('name_page','Index')

@section('section')
    <section>
<form action="{{ route('login') }}" method="post">
    @csrf
    <div class="content">
        @if (session('erreur'))
            <p class="erreur">{{session('erreur')}}</p>
        @endif
        @if (session('return'))
        <p class="erreur">{{session('erreur')}}</p>
    @endif
    <h1>welcom to my website </h1>
    <p></p>
    <input name="email" type="text" placeholder="EMAIL" value="{{old('password')}}" required>
    <p></p>
    <input name="password" type="text" type="password" placeholder="Password" value="{{old('password')}}" required><br>
    <button type="submit">connecter</button>
    <p><a href="{{ asset('create_acount') }}">i dont hav acount</a></p>
    <div class="ip">
      <a class="btn" href="fb-login">FB</a>  
      <a class="btn"  href="google-login">G</a>   
    </div>
    </div>
</form>
    </section>
@endsection

<style>
    .erreur{
        color: red;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .return{
        color: green;
        display: flex;
        justify-content: center;
        align-items: center;
    }
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