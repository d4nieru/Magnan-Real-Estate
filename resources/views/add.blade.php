@extends('layout')
@section('content')
    <div class="form-center">
        <form method="POST" action="/add" enctype=”multipart/form-data”>
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

                <input type="radio" id="Villa" name="property_type" value="Villa">
                <label for="Villa">Villa</label>

                <input type="radio" id="Parking" name="property_type" value="Parking">
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
                <label for="agent_name">Nom de l'agent</label>
                <input id="agent_name" name="agent_name">
            </div>

            <div>
                <label for="property_description">La description du Bien Immobilier</label>
                <textarea id="property_description" name="property_description"></textarea>
            </div>

            <div>
                <label for="property_price">Le prix du Bien Immobilier</label>
                <input type="number" id="property_price" name="property_price" value="property_price">
            </div>

            <div>
                <label for="image">L'image du Bien Immobilier</label>
                <input type="file" name="image">
            </div>

            <br>

            <input type="submit" value="Ajouter le Bien Immobilier" class="button-30">
        </form>
    </div>
@endsection