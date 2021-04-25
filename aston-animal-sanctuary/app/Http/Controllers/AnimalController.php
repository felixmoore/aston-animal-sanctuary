<?php

namespace App\Http\Controllers;
use Kyslik\ColumnSortable\Sortable;
use App\Models\Animal;
use App\Models\User;
use Illuminate\Http\Request;
use DB;
use Validator;

class AnimalController extends Controller
{
    use Sortable;
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $animals = Animal::sortable()->paginate(5);
        // return view('animals',compact('animals'));
        $users = DB::table('users')->get();
        
    
        $animals = Animal::sortable()->paginate(5);
        $user = auth()->user();
        if ($user['type'] == 'Public' || $user['type'] == null){ //only unowned animals are displayed
            $animals =  Animal::sortable()->paginate(5)->where('owner_id', null);
        }
        return view('animals.index', compact('animals', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = DB::table('users')->get();
        $species = collect(['Cat', 'Dog', 'Small animal']);
    
        return view('animals.create', compact('users', 'species'));
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
            'species' => 'required',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:500',
           
            //TODO foreign key for owner_id
            //TODO availability
        ]);

        if ($request->hasFile('image')) {
            // Strips relevant info from uploaded file
            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            //Uploads the image
            $path = $request->file('image')->storeAs('public/images', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }
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
        if (!$request->input('owner_id') == null) {
            $animal->owner_id = $request->input('owner_id');
        } else {
            $animal->owner_id = null;
        }
        
        if (!$request->has('available')) {
            $animal->available = 0;
        } else {
            $animal->available = 1;
        }
        // $animal->available = $request->input('available'); //needs check if owner id != null, available == false
        $animal->created_at = now();
        $animal->image = $fileNameToStore;
        // save the Animal object
        $animal->save();
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
        return view('animals.show', compact('animal', 'users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = DB::table('users')->get();
        $animal = Animal::find($id);
        $species = collect(['Cat', 'Dog', 'Small animal']);
        return view('animals.edit', compact('animal', 'users', 'species'));
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
        // $this->validate(request(), [
        //     'name' => 'required',
        //     'age' => 'numeric',
        //     'species' => 'required',
        //     'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:500',

        //     //TODO availability
        // ]);
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'age' => 'numeric|required',
            'species' => 'required',
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
        if (!$request->input('owner_id') == null) {
            $animal->owner_id = $request->input('owner_id');
        } else {
            $animal->owner_id = null;
        }
    

        if (!$request->has('available')) {
            $animal->available = 0;
        } else {
            $animal->available = 1;
        }
        

        if ($request->hasFile('image')) {
            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            $path = $request->file('image')->storeAs('public/images', $fileNameToStore);
            $animal->image = $fileNameToStore;
        }


        $animal->updated_at = now();
        $animal->save();
        return redirect('animals');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $animal = Animal::find($id);
        $animal->delete();
        return redirect('animals');
    }
}
