@extends('layout')
@section('content')
    <br>
    <br>
    <br>
    <div class="center_property_advertisement">
        @foreach ($realestates as $realestate)
            <div>
                <h2>{{$realestate["property_name"]}}</h2>
                <p>L'adresse : {{$realestate["property_adress"]}}</p>
                <p>Type du bien immobilier : {{$realestate["property_type"]}}</p>
                <p>Type de location : {{$realestate["rental_type"]}}</p>
                <p>Etat : {{$realestate["property_state"]}}</p>
                <p>Nom du propriétaire : {{$realestate["agent_name"]}}</p>
                <p>Description : {{$realestate["property_description"]}}</p>
                <p>Prix : {{$realestate["property_price"]}}€</p>
            </div>
            <br>
        @endforeach
    </div>
@endsection