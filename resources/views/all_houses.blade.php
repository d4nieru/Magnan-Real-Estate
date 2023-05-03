@extends('components.layout')
@section('content')

<div class="center_property_list">
    @foreach ($realestates as $realestate)
        @if($realestate->is_published == 1 && $realestate->property_state == 1 && $realestate->property_type == "Maison")
            @if($realestate->property_cover_name == null)
                <img src="https://t3.ftcdn.net/jpg/02/48/42/64/360_F_248426448_NVKLywWqArG2ADUxDq6QprtIzsF82dMF.jpg">
            @else
                <img src="{{ asset('propertyimgs/'.$realestate->property_cover_name) }}">
            @endif
            <br>
            Prix : {{ $realestate->property_price }} €<br>
            Type du bien immobilier : {{ $realestate->property_type }}<br>
            Type de location : {{ $realestate->rental_type }}<br>
            Adresse : {{ $realestate->property_adress }}<br>
            Code postal : {{ $realestate->property_zipcode }}<br>
            Ville : {{ $realestate->property_city }}<br>
            Surface : {{ $realestate->property_surface_area }} m² - Nombre de pièce(s) : {{ $realestate->property_number_of_parts }}<br>
            Description : {{ $realestate->property_description }}<br>
            <br>
        @endif
    @endforeach
</div>

@endsection