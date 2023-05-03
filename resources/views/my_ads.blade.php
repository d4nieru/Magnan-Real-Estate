@extends('components.layout')
@section('content')

<div class="center_property_list">
    @foreach ($realestates as $realestate)
        @if($realestate->agent_id == Auth::id())
            @if($realestate->property_cover_name == null)
                <img src="https://t3.ftcdn.net/jpg/02/48/42/64/360_F_248426448_NVKLywWqArG2ADUxDq6QprtIzsF82dMF.jpg">
                <form method="POST" enctype="multipart/form-data" action="/updatepropertycover/{{ $realestate->id }}">
                    @csrf
                    <input type="file" name="property_cover" id="property_cover" accept="image/png, image/jpeg">
                    <button type='submit' onclick="return confirm(`Voulez-vous vraiment mettre à jour l'image de couverture ?`)">Mettre à jour l'image de couverture'</button>
                </form>
            @else
                <img src="{{ asset('propertyimgs/'.$realestate->property_cover_name) }}">
                <form method="POST" action="/deletepropertycover/{{ $realestate->id }}">
                    @csrf
                    <button type='submit' onclick="return confirm(`Voulez-vous vraiment supprimer l'image de couverture ?`)">Supprimer l'image de couverture'</button>
                </form>
            @endif
            <br>
            Visibilité :
            @if($realestate->is_published == 0)
                <form method="POST" action="/changepropertyvisibility/{{ $realestate->id }}">
                    @csrf
                    <input type="radio" id="no" name="is_published" value="0" checked>
                    <label for="no">Non</label>
                    <input type="radio" id="yes" name="is_published" value="1">
                    <label for="yes">Oui</label>
                    <button type='submit' onclick="return confirm('Etes-vous sur ?')">Effectuer le changement</button>
                </form>
            @else
                <form method="POST" action="/changepropertyvisibility/{{ $realestate->id }}">
                    @csrf
                    <input type="radio" id="no" name="is_published" value="0">
                    <label for="no">Non</label>
                    <input type="radio" id="yes" name="is_published" value="1" checked>
                    <label for="yes">Oui</label>
                    <button type='submit' onclick="return confirm('Etes-vous sur ?')">Effectuer le changement</button>
                </form>
            @endif
            Prix : {{ $realestate->property_price }} €<br>
            Type du bien immobilier : {{ $realestate->property_type }}<br>
            Type de location : {{ $realestate->rental_type }}<br>
            Adresse : {{ $realestate->property_adress }}<br>
            Code postal : {{ $realestate->property_zipcode }}<br>
            Ville : {{ $realestate->property_city }}<br>
            Surface : {{ $realestate->property_surface_area }} m² - Nombre de pièce(s) : {{ $realestate->property_number_of_parts }}<br>
            Description : {{ $realestate->property_description }}<br>
            {{-- {{ Illuminate\Support\Str::limit($realestate->property_description, 5, '... [voir plus]') }}<br> --}}
            <br>
            <form method="GET" action="/geteditanad/{{ $realestate->id }}">
                <button type='submit'>Modifier le bien immobilier</button>
            </form>
            <form method="POST" action="/deleteanad/{{ $realestate->id }}">
                @csrf
                <button type='submit' onclick="return confirm('Etes-vous sur ?')">Supprimer le bien immobilier</button>
            </form>
        @endif
    @endforeach
</div>

@endsection