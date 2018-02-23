<?php
namespace App\Http\Controllers;

use App\Recipe;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class RecipeController extends Controller
{
    /**
     * Register new user
     *
     * @param $request Request
     */
    public function store(Request $request)
    {
        $file = $request->file('image');
        $name = $request->name;
        if(is_null($file)){
            $res['success'] = false;
            $res['message'] = 'Image is required!';
            return response($res);
        }
        $img_name = time() . '.' . $file->getClientOriginalName();
        $file->move('uploads/', $img_name);
        Recipe::create([
            'user_id'=> Auth::user()->id,
            'name' => $name,
            'image' => $img_name
            ]);
        $res['success'] = true;
        $res['message'] = 'Recipe is created!';
        return response($res);
    }
    public function edit($id)
    {
        $recipe = Recipe::where('user_id',Auth::user()->id)->where('id',$id)->first();
        if(is_null($recipe)){
            $res['success'] = false;
            $res['message'] = 'Wrong recipe id!';
            return response($res);
        }
        $res['success'] = true;
        $res['data'] = $recipe;
        return response($res);
    }
    public function update(Request $request)
    {
        $id = $request->id;
        $recipe = Recipe::where('user_id',Auth::user()->id)->where('id',$id)->first();
        $recipe->name = $request->name;
        $file = $request->file('image');
        $old_image = $recipe->image;
        if(!is_null($file)){
            $img_name = time() . '.' . $file->getClientOriginalName();
            $file->move('uploads/', $img_name);
            if (file_exists('uploads/' . $old_image)) {
                unlink('uploads/' . $old_image);
            }
            $recipe->image = $img_name;
        }
        $recipe->save();
        $res['success'] = true;
        $res['message'] = 'Recipe is Updated!';
        return response($res);
    }

}