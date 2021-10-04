<?php

namespace App\Http\Controllers;

use Kyslik\ColumnSortable\Sortable;
use App\Models\Animal;
use App\Models\User;
use App\Models\Image;
use App\Models\AdoptionRequest;
use Illuminate\Http\Request;
use DB;
use Auth;
use Gate;
use Redirect;
use Validator;

class AnimalController extends Controller
{
    use Sortable;
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show', 'filter']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all(); ;
        $images = Image::all();
        $animals = Animal::sortable();
        if(Auth::user() == NULL || Auth::user()->type != 1){
            $animals =  $animals->where('available', 1);
        }
        $animals = $animals->paginate(10);
        return view('animals.index', compact('animals', 'users', 'images'));
    }

/**
     * Display a filtered listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function filter($species)
    {
        $users = User::all(); 
        $images = Image::all();
        $animals = Animal::sortable()->where('species', $species);
        if(Auth::user() == NULL || Auth::user()->type != 1){
            $animals =  $animals->where('available', 1);
        }
        $animals = $animals->paginate(10);
       
        return view('animals.index', compact('animals', 'users', 'images'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->type == 1){
            $users = User::all(); 
            $species = collect(['Cat', 'Dog', 'Small animal']);

            return view('animals.create', compact('users', 'species'));
        } else {
            abort(404);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // form validation
        $animal = $this->validate(request(), [
            'name' => 'required',
            'age' => 'numeric|required',
            'sex' => 'required',
            'species' => 'required',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:500',
        ]);

        // create a Animal object and set its values from the input
        $animal = new Animal;
        $animal->name = $request->input('name');
        $animal->species = $request->input('species');
        if (!$request->input('breed') == null) {
            $animal->breed = $request->input('breed');
        } else {
            $animal->breed = "Unknown";
        }
        if (!$request->input('colour') == null) {
            $animal->colour = $request->input('colour');
        } else {
            $animal->colour = "Unknown";
        }
        $animal->age = $request->input('age');
        $animal->sex = $request->input('sex');
        if (!$request->input('owner_id') == null) {
            $animal->owner_id = $request->input('owner_id');
        } else {
            $animal->owner_id = null;
        }

        if (!$request->has('available') || $animal->owner_id != null) {
            $animal->available = 0;
        } else {
            $animal->available = 1;
        }
       
        $animal->created_at = now();



        $images = $request->file('images');
        if ($request->hasfile('images')) {

            $animal->image = true;
            $animal->save();
            foreach ($images as $image) {


                $fileNameWithExt = $image->getClientOriginalName();
                $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                $extension = $image->getClientOriginalExtension();
                $fileNameToStore = $filename . '_' . time() . '.' . $extension;
                //Uploads the image
                $path = $image->storeAs('public/images', $fileNameToStore);

                Image::create([ //records new image in images table with a link to relevant animal
                    'animal_id' => $animal->id,
                    'image_location' =>  $fileNameToStore
                ]);
            }
        } else {
            $animal->image = false;
            $animal->save();
        }


        // generate a redirect HTTP response with a success message
        return back()->with('success', 'Animal has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $animal = Animal::find($id);
        $users = User::all();
        $images = Image::all();
        return view('animals.show', compact('animal', 'users', 'images'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        if(Auth::user()->type == 1){
            $users = User::all(); 
            $animal = Animal::find($id);
            $species = collect(['Cat', 'Dog', 'Small animal']);
            return view('animals.edit', compact('animal', 'users', 'species'));
        } else {
            abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $animal = Animal::find($id);
     
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'age' => 'numeric|required',
            'species' => 'required',
            'sex' => 'required',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:500',
            'available' => 'boolean'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $animal->name = $request->input('name');
        $animal->species = $request->input('species');
        if (!$request->input('breed') == null) {
            $animal->breed = $request->input('breed');
        } else {
            $animal->breed = "Unknown";
        }
        if (!$request->input('colour') == null) {
            $animal->colour = $request->input('colour');
        } else {
            $animal->colour = "Unknown";
        }
        $animal->age = $request->input('age');
        $animal->sex = $request->input('sex');
        if (!$request->input('owner_id') == null) {
            $animal->owner_id = $request->input('owner_id');

            // find & deny adoption requests corresponding to animal
            $adoption_requests = AdoptionRequest::select('*')->where('animal_id', $id)->where('status', 'Pending');
            foreach ($adoption_requests as $individual){
                $individual->status  = 'Denied';
                $individual->save();
            }

        } else {
            $animal->owner_id = null;
        }


        if (!$request->has('available')) {
            $animal->available = 0;
        } else {
            $animal->available = 1;
        }

        $animal->updated_at = now();


        
        if ($request->hasfile('images')) {
            $images = $request->file('images');
            $animal->image = true;
            $animal->save();
            foreach ($images as $image) {


                $fileNameWithExt = $image->getClientOriginalName();
                $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                $extension = $image->getClientOriginalExtension();
                $fileNameToStore = $filename . '_' . time() . '.' . $extension;
                //Uploads the image
                $path = $image->storeAs('public/images', $fileNameToStore);

                Image::create([ //records new image in images table with a link to relevant animal
                    'animal_id' => $animal->id,
                    'image_location' =>  $fileNameToStore
                ]);
            }
        } else {
        
            $animal->save();
        }
        $images = Image::all();
        return Redirect::route('animals.show', ['animal' => $animal, 'images' => $images])->with('success', 'Edit made successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // find & delete images & adoption requests corresponding to animal (to avoid foreign key constraint violation)
        $images = Image::where('animal_id', $id);
        $images->delete();
        $requests = AdoptionRequest::where('animal_id', $id);
        $requests->delete();

        // find & delete animal
        $animal = Animal::find($id);
        $animal->delete();

        return redirect('animals');
    }
}
