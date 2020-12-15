
@extends('layouts.tema1.'.$slug)

@section('title', $page->name)

@section('content')

<h1>{{$customer->name}}</h1>

{{$page->name}}

@endsection

