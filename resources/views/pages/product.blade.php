@extends('layout/navbar')

@section('name_page','Gestion product')
    
@section('section')
<section>
    <div class="content">
        <form  action="{{ route('add_article') }}" method="post" enctype="multipart/form-data">
            @csrf
            <h1>Gestion product</h1>
    <input name="search" id="search" type="text" placeholder="serch">
    <input name="nome" type="text" placeholder="Name Prouct">
    <textarea name="about" id="" cols="30" rows="10" placeholder="ABOUT"></textarea>
    <input name="image" type="file">
        <button type="submit">Ajouter</button>
    </form>
    
    <table id="tb">
        <tr id="head">
        <th>Image</th>
        <th id="name">Name</th>
        <th>about</th>
        <th>Delete</th>
        <th>Update</th>
        <th>Bey</th>
        </tr> 
        @foreach ($data as $articl)
            
      
        <tr>
            <td><img src="storage/app/public/image/{{$articl->image}}" alt="."></td>
            <td>{{$articl->nome}}</td>
            <td title="{{$articl->about}}" class="about">{{$articl->about}}</td>
            <td><a href="article/delete/{{$articl->id}}" id="d">X</a></td>
            <td><a href="article/update/{{$articl->id}}" id="u">U</a></td>
            <td><a href="#"id="p">P</a></td>
        </tr>
        @endforeach
     </table> 
       <div id="se"></div>
    </div>
</section>

@endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script>
// live search
$(document).ready(function(){
$('#search').on('keyup',function(){
    var query=$(this).val();
    $.ajax({
        url:"search",
        type:"GET",
        data:{'search':query},
        success:function(data){
            $('#se').html(data);
            $('#tb').html("");
        }
       
    });
});
});
</script>
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
 
td,th {
    width: 24px;
}
.about{
    overflow: hidden;
    text-overflow: ellipsis;
    font-size: 14px;
    height: 21px;
    width: 27px;
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
input#search {
    margin-bottom: 11px;
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
table {
    width: 70%;
    box-shadow: 0 0 10px #ddd;
    MARGIN-TOP: 59px;
}
tr {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-bottom: 21px;
}
tr#head {
    border-bottom: 1px solid;
}

a#d {
    background-color: red;
    /* padding-left: 28px; */
    display: flex;
    justify-content: center;
    align-items: center;
    width: 204%;
    cursor: pointer;
}

a#u {
    background-color: green;
    /* padding-left: 28px; */
    display: flex;
    justify-content: center;
    align-items: center;
    width: 204%;
    cursor: pointer;
}

a#p {
    background-color: rgb(0, 195, 255);
    /* padding-left: 28px; */
    display: flex;
    justify-content: center;
    align-items: center;
    width: 204%;
    cursor: pointer;
}
</style>

