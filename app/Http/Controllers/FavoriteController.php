<?php

namespace App\Http\Controllers;

use App\Favorite;
use App\Traits\RecipeTrait;

use function GuzzleHttp\json_decode;

class FavoriteController extends Controller
{
    use RecipeTrait;

    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $favorites = Favorite::all();
        $baseUrl = "https://www.themealdb.com/api/json/v1/1/lookup.php?i=";
        $numFavorites = count($favorites);

        for ($i=0; $i < $numFavorites; $i++) {
            $request = $this->requireRecipe($baseUrl . $favorites[$i]->recipeId);
            $response = json_decode($request->getBody()->getContents(), true);
            $body = $response["meals"][0];
            $data[$i]['imgRecipe'] = $body["strMealThumb"];
            $data[$i]['titleRecipe'] = $body["strMeal"];
            $data[$i]['localRecipe'] = $body["strArea"];
            $data[$i]['categoryRecipe'] = $body["strCategory"];
            $data[$i]['instructionRecipe'] = $body["strInstructions"];
        }

        return view('favorites', compact('data', 'numFavorites'));
    }

    public function store($id)
    {
        $favorite = new Favorite;

        $favorite->recipeId = $id;
        $favorite->save();

        return redirect('home');
    }

    public function destroy($id)
    {
        $favorite = Favorite::find($id);
        $favorite->delete();

        return redirect('home');
    }
}
