@extends('admin.layouts.app')
@section('title','Listagem de Postagem')

@push('styles')
	 <style type="text/css">
		
		.message { 
			width:  300px;
			padding-bottom: 30px;
			max-height: 300px;
			background: #fff;
			color: 		#000;
			position: fixed;
			left: 50%;
			top:  50%;
			transform: translateX(-50%) translateY(-50%);
			text-align: center;
			display: none;
			border: 1px solid rgba(0,0,0,0.5);
			box-shadow: 0 15px 8px rgba(0, 0, 0, 0.1), 0 5px 5px rgba(67, 54, 209, 0.05);
			padding-top: 25px;
			font-size: 25px;
			border-radius: 15px;
			  }


			  .message_icon { 
			  	margin: 0 auto;
			  	margin-bottom: 25px;
			   }
			  img {   
	-webkit-transition: opacity 1s ease-in-out;
  -moz-transition: opacity 1s ease-in-out;
  -o-transition: opacity 1s ease-in-out;
  transition: opacity 1s ease-in-out; 
} 
	</style>
@endpush

@section('content')

		<div class="navbar">
			<a href="{{ route('posts.create') }}"> Criar uma nova postagem</a>
		</div>
		<hr>

		<h1> Posts </h1>
		<hr>
		<form method="post" action="{{ route('posts.search') }}">
			@csrf
			<input type="text" name="search"  placeholder="Filtrar:">
			<button type="submit"> Pesquisar </button>
		</form>
		<hr>
		<br>
			@foreach($posts as $post)
				<strong> #ID:   </strong>		{{  $post->id  	 	 }}  <br>
				<strong> Título:   </strong>	{{  $post->title  	 }}  <br>
				<strong> Conteúdo: </strong>	{{  $post->content   }}  <br>
				<img src="{{ url("storage/{$post->image}") }}" style="max-width: 200px;">
				<br>
					[ <a href="{{ route('posts.show', $post->id) }}" title="Detalhes"> Detalhes </a> ]	
					[ <a href="{{ route('posts.edit', $post->id) }}" title="Editar">   Editar   </a> ]	
				<br>

				<hr>
			
			@endforeach

		<hr>

		@isset($filters)

			{{  $posts->appends($filters)->links()   }}

		@else

			{{  $posts->links()						 }}

		@endisset

@endsection











@if (session('message'))
	<div class="message"> 
		<div class="message_icon"> 
			<img src="https://pics.freeicons.io/uploads/icons/png/7609509141582985678-512.png" 
			width="64" height="64"> 
		</div>
		<div class="message_content">
		   	{{  session('message')  }} 

		</div>

</div>
@endif










@push('scripts')
	<script type="text/javascript"async defer>
	if(performance.navigation.type != 2){
		setTimeout(fadeOut, 2000);
		document.querySelector('.message').style = "display: block";

	}

		function fadeOut() 	{
			document.querySelector('.message').style = "display: none";	
			setTimeout(refresh, 1000);
		}

	</script>
@endpush