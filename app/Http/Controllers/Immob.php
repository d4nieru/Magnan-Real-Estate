<?php

namespace App\Http\Controllers;

use App\Models\RealEstate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Image;

class Immob extends Controller
{
    public function register()
    {
        $title = "Créer un compte | Magnan Immo";

        return view('auth.register', compact('title'));
    }

    public function login()
    {
        $title = "Se connecter | Magnan Immo";

        return view('auth.login', compact('title'));
    }

    public function mainpage()
    {
        $title = "Page principale | Magnan Immo";

        $realestates = RealEstate::all();

        return view('mainpage', compact('title', 'realestates'));
    }

    public function all_properties_for_sale()
    {
        $title = "Tous les biens en vente | Magnan Immo";

        $realestates = RealEstate::all();

        return view('all_properties_for_sale', compact('title', 'realestates'));
    }

    public function all_properties_for_rent()
    {
        $title = "Tous les biens en location | Magnan Immo";

        $realestates = RealEstate::all();

        return view('all_properties_for_rent', compact('title', 'realestates'));
    }

    public function all_houses()
    {
        $title = "Tous les maisons | Magnan Immo";

        $realestates = RealEstate::all();

        return view('all_houses', compact('title', 'realestates'));
    }

    public function all_appartments()
    {
        $title = "Tous les appartements | Magnan Immo";

        $realestates = RealEstate::all();

        return view('all_appartments', compact('title', 'realestates'));
    }

    public function all_studios()
    {
        $title = "Tous les studios | Magnan Immo";

        $realestates = RealEstate::all();

        return view('all_studios', compact('title', 'realestates'));
    }

    public function all_villas()
    {
        $title = "Tous les villas | Magnan Immo";

        $realestates = RealEstate::all();

        return view('all_villas', compact('title', 'realestates'));
    }

    public function all_parkings()
    {
        $title = "Tous les parkings | Magnan Immo";

        $realestates = RealEstate::all();

        return view('all_parkings', compact('title', 'realestates'));
    }

    public function get_add_an_ad()
    {
        $title = "Déposer une annonce | Magnan Immo";

        return view('add_an_ad', compact('title'));
    }

    public function post_add_an_ad(Request $request)
    {
        $request->validate([
            //'property_cover' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
            'property_adress' => 'required',
            'property_zipcode' => 'required|numeric',
            'property_city' => 'required',
            'property_surface_area' => 'required|numeric|min:9',
            'property_number_of_parts' => 'required|numeric|min:1',
            'property_type' => 'required',
            'rental_type' => 'required',
            'property_description' => 'required',
            'property_price' => 'required|numeric|min:1',
        ]);
    
        $property_cover_name = null;
        $property_cover_path = null;
    
        if ($request->hasFile('property_cover')) {
    
            $image = $request->file('property_cover');
            $property_cover_name = time().'.'.$image->getClientOriginalExtension();
            
            $property_cover_path = public_path('/propertyimgs');
            $imgFile = Image::make($image->getRealPath());
            $imgFile->resize(320, 240, function ($constraint) {
                $constraint->aspectRatio();
            })->save($property_cover_path.'/'.$property_cover_name);
        }
    
        $property = new RealEstate();
        $property->property_cover_name = $property_cover_name;
        $property->property_cover_path = $property_cover_path;
        $property->property_price = $request->input('property_price');
        $property->property_adress = $request->input('property_adress');
        $property->property_zipcode = $request->input('property_zipcode');
        $property->property_city = $request->input('property_city');
        $property->property_surface_area = $request->input('property_surface_area');
        $property->property_number_of_parts = $request->input('property_number_of_parts');
        $property->property_type = $request->input('property_type');
        $property->rental_type = $request->input('rental_type');
        $property->agent_id = Auth::id();
        $property->property_description = $request->input('property_description');
    
        $property->save();
    
        return redirect('/home');
    }

    public function my_ads()
    {
        $title = "Mes annonces | Magnan Immo";

        $realestates = RealEstate::all();

        return view('my_ads', compact('title', 'realestates'));
    }

    public function delete_an_ad($id)
    {
        $realestate = RealEstate::findOrFail($id);
        $realestate->delete();

        return redirect()->back();
    }

    public function change_property_visibility(Request $request, $id)
    {
        if($request->is_published == 1) {

            $realestate = RealEstate::findOrFail($id);
            $realestate->is_published = 1;
            $realestate->update();

            return redirect()->back();

        } else {

            $realestate = RealEstate::findOrFail($id);
            $realestate->is_published = 0;
            $realestate->update();

            return redirect()->back();
        }
    }

    public function get_edit_an_ad($id)
    {
        $title = "Modification d'une annonce | Magnan Immo";

        $realestate = RealEstate::findOrFail($id);

        return view('edit_an_ad', compact('title', 'realestate'));
    }

    public function post_edit_an_ad(Request $request, $id)
    {
        $property = RealEstate::findOrFail($id);

        $property->property_price = $request->input('property_price');
        $property->property_adress = $request->input('property_adress');
        $property->property_zipcode = $request->input('property_zipcode');
        $property->property_city = $request->input('property_city');
        $property->property_surface_area = $request->input('property_surface_area');
        $property->property_number_of_parts = $request->input('property_number_of_parts');
        $property->property_type = $request->input('property_type');
        $property->rental_type = $request->input('rental_type');
        $property->property_description = $request->input('property_description');

        $property->update();

        return redirect('/myads');
    }

    public function update_property_cover(Request $request, $id)
    {
        $request->validate([
            'property_cover' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
        ]);

        $property = RealEstate::findOrFail($id);

        $filename = $property->property_cover_name;

        if(File::exists('propertyimgs/'.$filename)) {

            File::delete('propertyimgs/'.$filename);
            /*
                Delete Multiple File like this way
                Storage::delete(['upload/test.png', 'upload/test2.png']);
            */
        }

        $image = $request->file('property_cover');
        $property_cover_name = time().'.'.$image->getClientOriginalExtension();
        $property_cover_path = public_path('/propertyimgs');
        $imgFile = Image::make($image->getRealPath());
        $imgFile->resize(320, 240, function ($constraint) {
            $constraint->aspectRatio();
        })->save($property_cover_path.'/'.$property_cover_name);

        RealEstate::where('id', $id)->update(['property_cover_name' => $property_cover_name, 'property_cover_path' => $property_cover_path]);

        return redirect()->back();
    }

    public function delete_property_cover($id)
    {
        $property = RealEstate::findOrFail($id);

        $filename = $property->property_cover_name;

        if(File::exists('propertyimgs/'.$filename)) {

            File::delete('propertyimgs/'.$filename);
            /*
                Delete Multiple File like this way
                Storage::delete(['upload/test.png', 'upload/test2.png']);
            */
        }

        RealEstate::where('id', $id)->update(['property_cover_name' => null, 'property_cover_path' => null]);

        return redirect()->back();
    }
}
