@extends('site.template.template1')

@section('content')

<h1>Eae</h1>

@if($var1 == '123')
    <p>É igual</p>
@else
    <p>É meme</p>
@endif

@for( $i = 0; $i <10; $i++)
    <p>Valor: {{$i}}</p>

@endfor

@foreach($array as $array)
    <p>Foreach: {{$array}}</p>
@endforeach

@include('site.includes.sidebar', compact('var1'))

@endsection

@push('scripts')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
@endpush