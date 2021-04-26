<?php

namespace App\Http\Controllers;
use App\Models\AdoptionRequest;
use App\Models\Animal;
use DB;
use Auth;
use Gate;
use Route;
use Illuminate\Http\Request;
use Redirect;
use Illuminate\Validation\ValidationException;

class RequestController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users = DB::table('users')->get(); //todo replace uses of db with app/models
        $animals = DB::table('animals')->get();
      
        $requests = AdoptionRequest::sortable()->paginate(10);
        
       
            if(Auth::user()->type != 1){
                $requests = AdoptionRequest::sortable()->paginate(10)->where('user_id', auth()->user()->id);
            }
        
        return view('requests.index', compact('requests', 'animals', 'users'));
        
       
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $users = DB::table('users')->get();
        // $animal = Animal::find($id);
        return view('requests.create', compact('animal'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $adoption_request =  $this->validate(request(), [
            'user_id' => 'numeric|required',
            'animal_id' => 'numeric|required',
        ]);


        if (AdoptionRequest::where('user_id', $request->user_id)
                           ->where('animal_id', $request->animal_id)
                           ->where('status', 'Pending') != null){
                            throw ValidationException::withMessages(['user_id' => 'You already have a pending application for this animal.']);
        } else {
           

            $adoption_request = new AdoptionRequest;
            $adoption_request->user_id = $request->user_id;

            $adoption_request->animal_id = $request->animal_id;
            $adoption_request->created_at = now();

            $adoption_request->save();
            // redirect back to animal details page with success message
            $animal = Animal::find($request->animal_id);
            return Redirect::route('animals.show', ['animal' => $animal ])->with('success', 'Request made successfully!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

     /**
     * Approve adoption request.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function approve($id)
    {
        $adoption_request = AdoptionRequest::find($id);
       
        //deny all other adoption requests for the same animal
        $animal = $adoption_request->animal_id;
        foreach (AdoptionRequest::where('animal_id', $animal)->get() as $other_request) {
            $other_request->status = 'Denied';
            $other_request->save();
        }
        
        //approve selected request
        $adoption_request->status = 'Approved';
        $adoption_request->save();


        //update animal owner to match user who made approved adoption request
        //mark animal as unavailable for adoption
        $adopted_animal = Animal::find($animal);
        $adopted_animal->owner_id = $adoption_request->user_id;
        $adopted_animal->available = 0; 
        $adopted_animal->save();

        return redirect('requests');
    }

    /**
     * Deny adoption request.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deny($id)
    {
        $adoption_request = AdoptionRequest::find($id);
        $adoption_request->status = 'Denied';
        $adoption_request->save();
        return redirect('requests');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $adoption_request = AdoptionRequest::find($id);
        $adoption_request->delete();
        return redirect('requests');
    }

    public function adopt($id)
    {
        $animal = Animal::find($id);
        return view('requests.create', compact('animal'));
    }
}
