<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeUpdatePost;
use App\Models\Post;

use Illuminate\Http\Request;

class PostController extends Controller
{
    //

    public function index()
    {
        $post = Post::Simplepaginate(5);
        return view('post.index',compact('post'));
        
    }
    public function create(){
        return view('post.create');
    }
   // public function store(Request $request){
        public function store(storeUpdatePost $request){
            Post::create($request->all());

       
        return redirect()->route('post.index');
    
         //'title'=> $request->title,
         //'content' =>$request->content


        //]);
      
    }
    public function show($id)
    {
        //$posts = Post::where('id', $id)->first();
        
        if(!$posts = POST::find($id)){
            return redirect()->route('post.index');

        }
        return view('post.show',compact('posts'));

        //visualiza dados
       
    }

    public function edit($id)
    {
        if(!$post = POST::find($id)){
            return redirect()->route('post.index');

        }
        return view('post.edit',compact('post'));

        //visualiza dados
       
    }
    

    public function update($id,storeUpdatePost $request)
    {
        if(!$post = POST::find($id)){
            return redirect()->route('post.index');

        }
        $post->update($request->all());
    
        return redirect()->route('post.index')
                        ->with('success','Post updated successo');
    }
    
   

    public function destroy($id)
    {
        Post::find($id)->delete();
        return redirect()->route('post.index')
                        ->with('success','Post deletedo com successo');
    }
    public function search(Request $request){
      $post = Post::where('title', '=', $request->search)
      ->orwhere('content', 'LIKE', "%{$request->search}%")->paginate();

      return view('post.index', compact('post'));
     
}


}