@extends('admin.layouts.app')
@section("title")
	Detalhes do Post:  {{ $post->title }}
@endsection


@section('content')
	<h1> Detalhes do Post: {{ $post->title }} </h1>
		<ul>
			<li> <strong> Título::     </strong>    {{  $post->title      }}   </li>
			<li> <strong> Conteúdo::   </strong>    {{  $post->content    }}   </li>
			<li> <strong> Created At:: </strong>    {{  $post->created_at }}   </li>		
			<li> <strong> Updated At:: </strong>    {{  $post->updated_at }}   </li>			
		</ul>

		<hr>
		<br>

		 <form action="{{ route('posts.destroy',$post->id) }}" method="post">
		 	@method('delete') {{  "\n"  }}
		 	@csrf             {{  "\n"  }}
			<button type="submit"> Deletar o Post: {{ $post->title }} </button>
		</form>
@endsection