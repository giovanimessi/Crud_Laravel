@extends('layouts.template')
@section('title', 'Criando Postagem')

@section('content')
<div class="container">


<div class="card mt-5">
    <div class="card-header">
        <h2>Laravel 8 Editar</h2>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-lg-12 mt-1 mr-1">
                <div class="float-right">
                    <a class="btn btn-info" href="{{ route('post.index') }}">Voltar</a>
                </div>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-lg-12">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
            </div>
            <div class="col-lg-12">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong><i class="fab fa-swap-opacity .fad"></i>!</strong> Algo errado aconteceu.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
              
                <form action="{{ route('post.update',$post->id) }}" method="POST">
                    @csrf
                    @method('PUT')
               
                     <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Titulo:</strong>
                                <input type="text" name="title" value="{{ $post->title }}" class="form-control" placeholder="Titulo">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Conteudo:</strong>
                                <textarea class="form-control" style="height:150px" 
                                name="content" placeholder="Conteudo">{{ $post->content }}</textarea>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                          <button type="submit" class="btn btn-success">Salvar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection