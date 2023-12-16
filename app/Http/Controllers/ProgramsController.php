<?php

namespace App\Http\Controllers;

use App\Models\Programs;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationData;
use Inertia\Inertia;

class ProgramsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render ('Program/ProgramExchange', [
            'programs' => Programs::all()->map(function ($program) {
                return [
                    'id' => $program->id,
                    'name' => $program->name,
                    'description' =>substr($program->description, 0, 100),
                    'imagePath' => asset('storage/images/'. $program->imagePath),
                ];
            }            
            ),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render ('Program/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

         
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]); 

        $image = $request->file('image');
        $filename = uniqid().'.'.$image->getClientOriginalExtension();
      
        // Store the image in the public/images directory
        $image->storeAs('images', $filename);
      
       Programs::create([
          'name' => $request->title,
          'description' => $request->description,
          'imagePath' => $filename,
        ]);
          
       
      
        return response()->json([
          'message' => 'Image uploaded and data saved successfully!',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        

        $program = Programs::find($id);

        if (!$program) {
            
            abort(404);
        }
    
        return Inertia::render('Program/ReadMore', [
            'program' => [
                'id' => $program->id,
                'name' => $program->name,
                'description' => $program->description,
                'imagePath' => asset('storage/images/'. $program->imagePath),
            ],
        ]);
    
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $program = Programs::find($id);

        if (!$program) {
            
            abort(404);
        }
    
        return Inertia::render('Program/Edit', [
            'programs' => [
                'id' => $program->id,
                'name' => $program->name,
                'description' => $program->description,
                'imagePath' => asset('storage/images/'. $program->imagePath),
            ],
        ]);  
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Programs $programs)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Programs $programs)
    {
        //
    }
}
