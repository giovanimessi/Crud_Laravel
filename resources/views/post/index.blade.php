@extends('layouts.template')
@section('title', 'Postagem do crud')

@section('content')
<div class="container">
     <h2>Listas de Postagem</h2>

     <div class="card-body">
      <div class="row">
          <div class="col-lg-12 mt-1 mr-1">
              <div class="float-right">
                  <a class="btn btn-success" href="{{ route('post.create') }}"> Create Novo Post</a>
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
<!--criando filtro de pesquisar-->

        <form action="{{route('post.search')}}" method="POST">
          @csrf
            <input type="text" name="search" id="" placeholder="Pesquisar">
            <button  type="submit" class="btn btn-info">Pesquisar</button>

          
          </form>
          <div class="col-lg-12">
              <table class="table table-bordered">
                  <tr>
                      <th>Id</th>
                      <th>Titulo</th>
                      <th>Conteudo</th>
                      <th width="280px">Ações</th>
                  </tr>
                  @foreach ($post as $posts)
                  <tr>
                    <td>{{ $posts->id }}</td>
                      <td>{{ $posts->title }}</td>
                     
                      <td>{{ \Str::limit($posts->content, 50) }}</td>
                      <td>
                        <form action="{{ route('post.destroy',$posts->id) }}" method="POST">
                              <a class="btn btn-info" href="{{ route('post.show',$posts->id) }}">Ver</a>
              
                              <a class="btn btn-primary" href="{{ route('post.edit',$posts->id) }}">Edit</a>
                              
             
                              @csrf
                              @method('DELETE')
                             <input type="hidden" name="_method" value="DELETE">
                              <button type="submit" class="btn btn-danger">Delete</button>
                          </form>
                      </td>
                  </tr>
                  @endforeach
              </table>
              
          </div>

          {{$post->links()}}

</div>

@endsection