<?php

namespace App\Http\Controllers;

use App\Models\Realestate;
use Illuminate\Http\Request;

class Immob extends Controller
{

    // La page d'accueil qui contient tout type d'annonces
    public function index(){
        $realestate = Realestate::all();
        //$article->all();
        return view("index", ['title' =>"Magnan Immobilier", "realestates"=>$realestate->toArray() ]);
    }

    // La page d'accueil qui contient tout type d'annonces
    public function admin_page(){
        $realestate = Realestate::all();
        //$article->all();
        return view("admin", ['title' =>"Magnan Immobilier", "realestates"=>$realestate->toArray() ]);
    }

    // Les biens immobilières en location
    public function renting_page(){
        $realestate = Realestate::where("rental_type", "Location")->get();
        return view("rentingpage", ['title' =>"Magnan Immobilier", "realestates"=>$realestate->toArray() ]);
    }

    // Les biens immobilières en vente
    public function properties_for_sale(){
        $realestate = Realestate::where("rental_type", "Vente")->get();
        return view("propertiesforsale", ['title' =>"Magnan Immobilier", "realestates"=>$realestate->toArray() ]);
    }

    // Montrer tous les appartements
    public function show_all_appartments(){
        $realestate = Realestate::where("property_type", "Appartement")->get();
        return view("showallappartments", ['title' =>"Magnan Immobilier", "realestates"=>$realestate->toArray() ]);
    }

    // Montrer tous les appartements
    public function show_all_houses(){
        $realestate = Realestate::where("property_type", "Maison")->get();
        return view("showallhouses", ['title' =>"Magnan Immobilier", "realestates"=>$realestate->toArray() ]);
    }

    // Montrer tous les appartements
    public function show_all_villas(){
        $realestate = Realestate::where("property_type", "Villa")->get();
        return view("showallvillas", ['title' =>"Magnan Immobilier", "realestates"=>$realestate->toArray() ]);
    }

    // Montrer tous les appartements
    public function show_all_parkings(){
        $realestate = Realestate::where("property_type", "Parking")->get();
        return view("showallparkings", ['title' =>"Magnan Immobilier", "realestates"=>$realestate->toArray() ]);
    }

    // Afficher la page pour déposer une annonce
    public function displayForm(){
        return view("add", ['title' =>"Magnan Immobilier"]);
    }

    // Fonction qui permet d'insérer les données recoltées dans la base de données
    public function add_realestate(Request $request){

        $property_name = $request->input("property_name");
        $property_adress = $request->input("property_adress");
        $property_type = $request->input("property_type");
        $rental_type = $request->input("rental_type");
        $property_state = $request->input("property_state", "En vente");
        $agent_name = $request->input("agent_name");
        $property_description = $request->input("property_description");
        $property_price = $request->input("property_price");
        $property_image = $request->input("property_image", "je suis con");

        $realestate = new Realestate();


        $realestate->property_name = $property_name;
        $realestate->property_adress = $property_adress;
        $realestate->property_type = $property_type;
        $realestate->rental_type = $rental_type;
        $realestate->property_state = $property_state;
        $realestate->agent_name = $agent_name;
        $realestate->property_image = $property_image;
        $realestate->property_description = $property_description;
        $realestate->property_price = $property_price;
        $realestate->save();

        return redirect("/");
    
    }


    public function edit_realestate(){
        $realestate = Realestate::all();
        return view("/edit", ['title' =>"Magnan Immobilier", "realestates"=>$realestate->toArray() ]);

        return redirect("/adminpage");
    }

    public function edit_id_realestate(Request $request,$id){


        $realestate = Realestate::find($id);
        
        $realestate->property_name = $request->input("property_name");
        $realestate->property_adress = $request->input("property_adress");
        $realestate->property_type = $request->input("property_type");
        $realestate->rental_type = $request->input("rental_type");
        $realestate->property_state = $request->input("property_state");
        $realestate->agent_name = $request->input("agent_name");
        $realestate->property_description = $request->input("property_description");
        $realestate->property_price = $request->input("property_price");
        $realestate->save();

        return redirect("/adminpage");
    }

    public function delete_id_realestate($id){
        $realestate = new Realestate();
        $realestate->destroy($id);

        return redirect("/adminpage");
    }

}
