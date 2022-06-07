@extends('layout')
@section('content')
    <br>
    <br>
    <br>
        @foreach ($realestates as $realestate)
            <h2>{{$realestate["property_name"]}}</h2>
            <p>L'adresse : {{$realestate["property_adress"]}}</p>
            <p>Type du bien immobilier : {{$realestate["property_type"]}}</p>
            <p>Type de location : {{$realestate["rental_type"]}}</p>
            <p>Etat : {{$realestate["property_state"]}}</p>
            <p>Nom du propriétaire : {{$realestate["agent_name"]}}</p>
            <p>Description : {{$realestate["property_description"]}}</p>
            <p>Prix : {{$realestate["property_price"]}}€</p>
        @endforeach
        <br>
        @foreach ($realestates as $realestate)
        <form method="PUT" action="/edit/{{$realestate["id"]}}" enctype=”multipart/form-data”>
            @csrf
            
            <div>
                <label for="property_name">Nom du Bien Immobilier</label>
                <input id="property_name" name="property_name" type="text">
            </div>

            <div>
                <label for="property_adress">L'adresse du Bien Immobilier</label>
                <textarea id="property_adress" name="property_adress" type="text"></textarea>
            </div>

            <div>
                <label for="property_type">Quel type de bien souhaitez-vous louer ?</label>

                <input type="radio" id="Appartement" name="property_type" value="Appartement" checked>
                <label for="Appartement">Appartement</label>

                <input type="radio" id="Maison" name="property_type" value="Maison">
                <label for="Maison">Maison</label>

                <input type="radio" id="villa" name="property_type" value="Villa">
                <label for="Villa">Villa</label>

                <input type="radio" id="parking" name="property_type" value="Parking">
                <label for="Parking">Parking</label>
            </div>

            <div>
                <label for="rental_type">Type de Location</label>

                <input type="radio" id="Location" name="rental_type" value="Location" checked>
                <label for="Location">Location</label>

                <input type="radio" id="Vente" name="rental_type" value="Vente">
                <label for="Vente">Vente</label>
            </div>

            <div>
                <label for="property_state">Disponibilité du Bien</label>

                <input type="radio" id="En Vente" name="property_state" value="En Vente" checked>
                <label for="En Vente">En vente</label>

                <input type="radio" id="Vendu" name="property_state" value="Vendu">
                <label for="Vendu">Vendu</label>
            </div>

            <div>
                <label for="agent_name">Nom de l'agent</label>
                <input id="agent_name" name="agent_name">
            </div>

            <div>
                <label for="property_description">La description du Bien Immobilier</label>
                <textarea id="property_description" name="property_description"></textarea>
            </div>

            <div>
                <label for="property_price">Le prix du Bien Immobilier</label>
                <input type="number" id="property_price" name="property_price">
            </div>

            <div>
                <label for="image">L'image du Bien Immobilier</label>
                <input type="file" name="image">
            </div>

            <input type="submit" value="Appliquer les Modifications">
        </form>
        @endforeach
        <br>
@endsection