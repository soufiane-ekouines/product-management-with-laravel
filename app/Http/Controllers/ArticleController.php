<?php

namespace App\Http\Controllers;


use App\Models\Article;
use Exception;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class ArticleController extends Controller
{
    function product()
    {
        if(Cookie::has('name')){
        $data=Article::get();
        return view('pages/product',compact('data'));
        }else
        return redirect('/');
    }
  
    //add
    function add(Request $request)
    {
        $request->validate([
            'nome'=>'required',
            'about'=>'required',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $Article=new Article();
        $Article->nome=$request->input('nome');
        $Article->about=$request->input('about');
        

        if($request->hasFile('image')){
            $filename=$request->file('image')->getClientOriginalName();//getting image 
            $request->file('image')->storeAs('public/image/',time().$filename);

            $Article->image=time().$filename;
        }else
        $Article->image='';
        $Article->save();
        // Article::created($request->all());
        return redirect()->route('product')->with('articles','great');
    }

    //update
    function update_s($id)
    {
        // try{
           $article=Article::where('id',$id)->first();
            return view('pages/update_product')->with(compact('article'));
            // }catch(Exception $x)
            // {
            //      return redirect()->route('update_article')->with('articles',$x);
            // }
    }
 
    function update(Request $request)
    {
        $request->validate([
            'id'=>'required',
            'nome'=>'required',
            'about'=>'required',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        if($request->hasFile('image')){
            $file=$request->file('image');
            $extension=$file->getClientOriginalExtension();//getting image extension
            $filename=time().'.'.$extension;
            $file->move('image/'.$filename);
            $fname=$filename;
        }else
        $fname='';
        Article::where('id',$request->input('id'))->update([
            'nome'=>$request->input('nome'),
            'about'=>$request->input('about'),
            'image'=>$fname
                                                    ]);
        return redirect()->route('product')->with('articles','great');
    }

     //delete
    function delete($id)
    {
        try{
        Article::where('id',$id)->delete();
        return redirect()->route('product')->with('articles','article was deleted');
        }catch(Exception $x)
        {
             return redirect()->route('product')->with('articles',$x);
        }
       
    }
    //serch
    function serch(Request $request)
    {
        
    }

     //bey
    function bey(Request $request)
    {
        
    }
    // search 
    function search(Request $request)
    {
        $data=Article::where('nome','like',$request->search.'%')->get();
        $outout="";
        $outout.=" <table>      <tr id='head'>
        <th>Image</th>
        <th id='name'>Name</th>
        <th>about</th>
        <th>Delete</th>
        <th>Update</th>
        <th>Bey</th>
        </tr>";
        foreach ($data as $articl)
            {
      
                $outout.=' <tr>';
                $outout.=' <td><img src="storage/app/public/image/'.$articl->image.'alt="."></td>';
                $outout.='<td>'.$articl->nome.'</td>';
                $outout.='<td title='.$articl->about.' class="about">'.$articl->about.'</td>';
                $outout.=' <td><a href=article/delete/'.$articl->id.' id="d">X</a></td>';
                $outout.='<td><a href=article/update/'.$articl->id.' id="u">U</a></td>';
                $outout.='<td><a href="#"id="p">P</a></td>';
                $outout.=' </tr>';
            }
            $outout.='</table>';
            return $outout;
    }
}
