@extends('painel.templates.template')

@section('content')

<h1 class='title-pg'>Cadastro de produtos</h1>

<form class='form' method='post' action='{{route('products.store')}}'>
{!! csrf_field() !!}
    <div class='form-group'>
        <input type="text" name="name", placeholder='Nome:' class=form-control>
    </div>
    
    <div class='form-group'>
        <label>
            <input type='checkbox' name='active' value='1' class=form-control>
            Ativo?
        </label>
    </div>
    
    <div class='form-group'> 
        <input type="text" name="number", placeholder='Número:' class=form-control>
    </div>
        
    <div class='form-group'>
        <select name="category" class=form-control>
            <option>Escolha a categoria:</option>
            @foreach($categories as $category)
                <option value="{{$category}}">{{$category}}</option>
            @endforeach
        </select>
    </div>
    
    <div class='form-group'>
        <textarea name="description", placeholder='Bio:' class=form-control></textarea>
    </div>
</form>

<button class='btn btn-primary'>Enviar</button>

@endsection