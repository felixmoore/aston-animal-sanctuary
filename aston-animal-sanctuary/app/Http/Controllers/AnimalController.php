<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animal;

class AnimalController extends Controller
{
    //
    // public function indexPaging()
    // {
    //     $animals = Animal::paginate(5);

    //     return view('animals.index-paging')->with('animals', $animals);
    // }
    /**
     * Display the animals table.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $animals = Animal::sortable()->paginate(5);
        return view('animals',compact('animals'));
    }
}
