<?php

namespace App\Http\Controllers;

use App\Traits\RecipeTrait;
use Illuminate\Http\Request;

use function GuzzleHttp\json_decode;

class HomeController extends Controller
{
    use RecipeTrait;

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $request = $this->requireRecipe("https://www.themealdb.com/api/json/v1/1/random.php");
        $response = json_decode($request->getBody()->getContents(), true);
        $body = $response["meals"][0];

        $data['imgRecipe'] = $body["strMealThumb"];
        $data['titleRecipe'] = $body["strMeal"];
        $data['instructionRecipe'] = $body["strInstructions"];
        $data['localRecipe'] = $body["strArea"];
        $data['categoryRecipe'] = $body["strCategory"];

        return view('home', compact('data'));
    }
}
