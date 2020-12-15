@extends('layouts.tema1.quemsomos')

@section('title', 'Quem Somos')

@section('content')

@foreach ($contents as $item)
    <h2 class="mb-3">{{$item->title}}</h2>
    <h3 class="mb-3">{{$item->page->customer->name}}</h3>
    <p>{{$item->content}}</p>
@endforeach

@endsection