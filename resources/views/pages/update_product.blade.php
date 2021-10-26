@extends('layout/navbar')

@section('name_page','Gestion product')
    
@section('section')
<section>
    <div class="content">
        <form  action="{{ route('update') }}" method="post" enctype="multipart/form-data">
            @csrf
            @if(session('articles') )
            <p class="article"> {{session('articles')}} </p:>
                @endif
            <h1>Gestion product</h1>
        <input type="hidden" name="id" value="{{$article->id}} ">
    <input name="nome" type="text" placeholder="Name Prouct" value="{{$article->nome}}" required>
    <textarea name="about" id="" cols="30" rows="10" placeholder="ABOUT" required>{{$article->about}}</textarea>
    <input name="image" type="file" value="{{$article->image}}" required>
        <button type="submit">update</button>
    </form>
   
    </div>
</section>
@endsection
<style>
        .articles{
        color: green;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    form {
    width: 70%;
    height: 100%;
    margin-bottom: -211px;
}
 

  form h1{
    font-size: 28px;
    display: flex;
    justify-content: center;
}
form input {
    height: 36px;
    width: 50%;
    border-radius: 13px;
    display: flex;
    justify-content: center;
    align-items: center;
}
textarea {
    display: flex;
    margin-top: 20px;
    margin-bottom: 20px;
    width: 50%;
    border-radius: 16px;
}
form button{
    font-size: 21px;
    height: 43px;
    width: 17%;
    border-radius: 71px;
    background-color: transparent;
    border: 1px solid blue;
    margin-top: 21px;
    display: flex;
    justify-content: center;
    align-items: center;
}  

</style>

