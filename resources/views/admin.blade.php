@extends('layout')
@section('content')
    <br>
    <br>
    <br>
    <div class="center_property_advertisement">
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
            </div>
            <div>
                <a href="/edit">
                    <button class="button-70" type='submit'>Modifier</button>
                </a>
            </div>
            <br>
            <div>
                <form action="/delete/{{$realestate["id"]}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="button-24" type='submit'>Supprimer</button>
                </form>
            </div>
            <br>
        @endforeach
    </div>
@endsection