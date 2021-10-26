@extends('layout/navbar')

@section('name_page','Index')

@section('section')
    <section>
<form action="{{ route('send') }}" method="post">
    @csrf
    <div class="content">
    <h1>welcom to my website </h1>
    <p></p>
    <input type="text" name="name" placeholder="Name">
    <p></p>
    <input type="text" name="gmail" placeholder="EMAIL">
    <p></p>
    <textarea  name="message" id="message" cols="30" rows="10" placeholder="Message"></textarea><br>
    <button type="submit">send</button>
    <p>i dont hav acount</p>
    <div class="ip">
        <button>TO PHONE</button>
    </div>
    </div>
</form>
    </section>
@endsection

<style>
    #message {
    height: 150;
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
form textarea{
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
form p{
    display: flex;
    justify-content: center;
    color: lightblue;
}
form .ip button{
    font-size: 17;
    height: 30;
    width: 200;
    border: 1px solid lightblue;
}
.ip{
    display: flex;
    justify-content: space-between;
}
</style>