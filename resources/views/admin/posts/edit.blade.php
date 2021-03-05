@extends('admin.layouts.app')
@section("title")
	Editando o Post:  {{ $post->title }}
@endsection
@push('styles')
	<style type="text/css">
		body { font-family: 'Nunito', sans-serif; background: #f9f9f9; }
		.container { position: absolute; left: 50%; transform: translateX(-50%); width: 500px; }
		form {
			display: grid;
			max-width: 500px;
		}

		.__error__ { 
			width: 100%; 
			padding-top: 5px; 
			padding-bottom: 5px; 
			text-align: center; 
			background: brown; 
			color: #fff; 
			margin-bottom: 5px;
			margin-top:   -5px;
			box-shadow: inset 4px 4px 5px rgba(255,255,255,0.1);
			border-radius: 5px;
		}

		form input, form textarea{ padding-top: 7px; padding-bottom: 7px; border-radius: 5px; margin-bottom: 10px; border: 1px solid rgba(0,0,0,0.3);}
		form label { font-size: 16px; font-weight: 500; }

	</style>
@endpush

@section('content')
	<div class="navbar">
		<a href="{{ route('posts.index') }}"> Voltar </a>
	</div>
	<hr>
	<br>

	<hr>
	<br>
	<div class="container">
	<h2> Editar o Post: {{ $post->title }} </h2>
	 <form method="post" action="{{ route('posts.update', $post->id) }}" enctype="multipart/form-data">
		 	@csrf
		 	@method('put')	

		 	<label for="title"> Título: </label>
			<input type="text" name="title" id="title" placeholder="Título" value="{{ $post->title }}">
				@error('title')
					<div class="__error__"> {{ $message }} </div>
				@enderror

			<label for="image"> Imagem: </label>
			<input type="file" name="image" id="title">
				@error('image')
					<div class="__error__"> {{ $message }} </div>
				@enderror


			<label for="content"> Conteúdo: </label>
			<textarea name="content" id="content" cols="40" rows="10" placeholder="Conteúdo" 
			style="resize: vertical; max-height: 300px;">{{ $post->content }}</textarea>
				@error('content')
					<div class="__error__"> {{ $message }} </div>
				@enderror

			<button type="submit"> Editar </button>
	</form>
	</div>
@endsection