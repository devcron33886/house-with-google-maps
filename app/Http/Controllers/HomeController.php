<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\House;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $categories=Category::all();
        $houses =House::with('categories')
        ->searchResults()->paginate(12);

        return view('welcome',compact('categories','houses'));
    }



    public function house(House $house)
    {
        $categories = Category::all();
        return view('house',compact('house','categories'));
    }

    public function owners()
    {

        $owners = User::with(['roles'])->get();
        return view('owners',compact('owners'));

    }
}
