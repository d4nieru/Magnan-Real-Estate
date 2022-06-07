@extends('layout')

@section('content')
    @foreach ($realestates as $realestate)
        <div>
            <h2>{{$realestate["property_name"]}}</h2>
            <p>{{$realestate["property_adress"]}}</p>
            <p>{{$realestate["property_type"]}}</p>
            <p>{{$realestate["rental_type"]}}</p>
            <p>{{$realestate["property_state"]}}</p>
            <p>{{$realestate["agent_name"]}}</p>
            <p>{{$realestate["property_description"]}}</p>
            <p>{{$realestate["property_price"]}}€</p>
            <form action="/delete/{{$realestate["id"]}}" method="post">
            @csrf
            @method('DELETE')
            <button type='submit'>Supprimer</button>
            </form>
        </div>
    @endforeach
@endsection
