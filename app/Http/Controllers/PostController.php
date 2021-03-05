<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdatePost;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{


   public function index()
   {
   	   
   		$posts = Post::orderBy('id','asc')->paginate(3);
   		return view('admin.posts.index', compact('posts'));
   }


   public function create()
   {

   		return view('admin.posts.create');

   }

   public function store(StoreUpdatePost $request)
   {

   		$data = $request->all();

   		if ($request->image->isValid()):

   		$name_file = Str::of($request->title)->slug('-') . '.' . $request->image->getClientOriginalExtension();
   		$image = $request->image->StoreAs('posts', $name_file);		
   		$data['image'] = $image;

   		$post = Post::create($data);
   		return redirect()->route('posts.index')->with('message','Post criado com sucesso!');

   		endif;

   }

   public function show($id) 
   {

   		if ($post = Post::find($id)):
   			return view('admin.posts.show', compact('post'));
   		else:
   			return redirect()->route('posts.index');
   		endif;

   }


   public function destroy($id) 
   {

   		if ($post = Post::find($id)):
   		if (Storage::exists($post->image)):
   			Storage::delete($post->image);
   		endif;
   		
   			$post->delete();
   			return redirect()->route('posts.index')->with('message','Post deletado com sucesso!');
   		else:
   			return redirect()->route('posts.index')->with('message','Post deletado com sucesso!');
   		endif;

   }


   public function edit($id) 
   {
	
   		if ($post = Post::find($id)):
   			return view('admin.posts.edit', compact('post'));
   		else:
   			return redirect()->route('posts.index')->with('message','Esta postagem não foi encontrada...');
   		endif;

   }



   public function update(StoreUpdatePost $request, $id)
   {

   		if ($post = Post::find($id)):
	
	   	$data = $request->all();

   		if ($request->image->isValid()):

   		if (Storage::exists($post->image)):
   			Storage::delete($post->image);
   		endif;

   		$name_file = Str::of($request->title)->slug('-') . '.' . $request->image->getClientOriginalExtension();
   		$image = $request->image->StoreAs('posts', $name_file);		
   		$data['image'] = $image;

   		$post->update($data);
   		return redirect()->route('posts.index')->with('message','Post editado com sucesso!');

   		endif;

   		else:
   			return redirect()->route('posts.index')->with('message','Esta postagem não foi encontrada...');
   		endif;


   }



   public function search(Request $request)
   {
   	$filters = $request->except('_token');
   	$posts = Post::where('title', 'LIKE', "%{$request->search}%")
   					->orWhere('content', 'LIKE', "%{$request->search}%")
   					->paginate(3);
   	return view('admin.posts.index', compact('posts', 'filters')); 



   }



}



