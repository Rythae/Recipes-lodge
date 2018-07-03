<?php

namespace App\Http\Controllers;

use App\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if(Auth::check() ){
            $recipes = Recipe::where('user_id', Auth::user()->id)->get();

            return view('recipes.index', ['recipes'=> $recipes]);
        }
        return view('auth.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('recipes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Check if a user is logged in

        if(Auth::check()){
            $recipe = Recipe::create([
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'user_id' => Auth::user()->id
            ]);

    if($recipe){
            return redirect()->route('recipes.show', ['recipe'=> $recipe->id])
            ->with('success', 'Recipe created successfully');
            }
        }
         //redirect
         return back()->withInput()->with('errors', 'Error creating recipe');
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function show(Recipe $recipe)
    {
        //
        //$recipe = Recipe::where('id', $recipe->id )->first();
        $recipe = Recipe::find($recipe->id);

        return view('recipes.show', ['recipe'=>$recipe]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function edit(Recipe $recipe)
    {
        //
        $recipe = Recipe::find($recipe->id);
        
        return view('recipes.edit', ['recipe'=>$recipe]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Recipe $recipe)
    {
        //save data
        
        $recipeUpdate = Recipe::where('id', $recipe->id)
                                ->update([
                                        'title'=>$request->input('title'),
                                        'description'=>$request->input('description')
                                ]);
        if($recipeUpdate){
            return redirect()->route('recipes.show',['recipe'=>$recipe->id])->with('success', 'Recipe updated successfully');
        }
        //redirect
        return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recipe $recipe)
    {
        //

        $findRecipe = Recipe::find( $recipe->id);
        if($findRecipe->delete()){

            return redirect()->route('recipes.index')->with('success', 'Recipe deleted successfully');
        }

        //redirect
        return back()->withInput()->with('error', 'Recipe could not be deleted');
    }
}
