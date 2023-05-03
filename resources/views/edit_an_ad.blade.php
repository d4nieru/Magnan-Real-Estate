@extends('components.layout')
@section('content')
    <div>
        <form method="POST" action="/posteditanad/{{ $realestate->id }}" enctype=”multipart/form-data”>
            @csrf
            {{-- <label for="property_cover">L'image du bien immobilier : </label>
            <input type="file" name="property_cover" accept="image/png, image/jpeg"> (10MB max.)
            
            <br> --}}

            <label for="property_adress">L'adresse du bien immobilier : </label>
            <input type="text" id="property_adress" name="property_adress" value="{{ $realestate->property_adress }}">
            
            <br>

            <label for="property_zipcode">Code postal du bien immobilier : </label>
            <input type="number" id="property_zipcode" name="property_zipcode" value="{{ $realestate->property_zipcode }}">
            
            <br>

            <label for="property_city">Ville du bien immobilier : </label>
            <input type="text" id="property_city" name="property_city" value="{{ $realestate->property_city }}">
            
            <br>

            <label for="property_surface_area">Superficie du bien immobilier : </label>
            <input type="number" min="9" id="property_surface_area" name="property_surface_area" value="{{ $realestate->property_surface_area }}"> m²
            
            <br>

            <label for="property_number_of_parts">Nombre de pièce(s) : </label>
            <input type="number" min="1" id="property_number_of_parts" name="property_number_of_parts" value="{{ $realestate->property_number_of_parts }}">
            
            <br>

            <label for="property_type">Quel type de bien immobilier souhaitez-vous louer ? : </label>
            <select name="property_type">
                <option disabled>--Choisissez le type de bien immobilier--</option>
                <option value="Studio" {{ $realestate->property_type == 'Studio' ? 'selected' : '' }}>Studio</option>
                <option value="Appartement" {{ $realestate->property_type == 'Appartement' ? 'selected' : '' }}>Appartement</option>
                <option value="Maison" {{ $realestate->property_type == 'Maison' ? 'selected' : '' }}>Maison</option>
                <option value="Villa" {{ $realestate->property_type == 'Villa' ? 'selected' : '' }}>Villa</option>
                <option value="Parking" {{ $realestate->property_type == 'Parking' ? 'selected' : '' }}>Parking</option>
            </select>
            
            <br>

            <label for="rental_type">Type de location ? : </label>
            <select name="rental_type">
                <option disabled>--Choisissez le type de location--</option>
                <option value="Location" {{ $realestate->rental_type == 'Location' ? 'selected' : '' }}>Location</option>
                <option value="Vente" {{ $realestate->rental_type == 'Vente' ? 'selected' : '' }}>Vente</option>
            </select>
            
            <br>

            <label for="property_description">Description du bien immobilier : </label>
            <input type="text" style="height: 50%;" id="property_description" name="property_description" value="{{ $realestate->property_description }}">

            <br>

            <label for="property_price">Le prix du bien immobilier : </label>
            <input type="number" min="1" id="property_price" name="property_price" value="{{ $realestate->property_price }}"> €

            <br>
            <br>

            <button type='submit'>Effectuer le changement</button>
        </form>
    </div>
@endsection