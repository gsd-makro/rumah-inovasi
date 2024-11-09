<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use App\Models\Menu;
use Exception;


class DocumentController extends Controller
{
    public function index()
    {
        $documents = Document::all();
        $menus = Menu::all();
        return view('dashboard.documents.index', [
            'documents' => $documents,
            'menus' => $menus
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.documents.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'menu_id' => 'required',
                'title' => 'required|string',
                'menu_id' => 'required',
                'status' => 'required',
            ]);

            $validated['user_id'] = 1;

            if($request->file('file_path')){
                $file = $request->file('file_path');
                if ($file->getClientOriginalExtension() !== 'pdf') {
                    return redirect()->back()->with('error', 'File must be a PDF');
                }
    
                $imageName = time() . '_' . $file->getClientOriginalName();
                $path = $file->storeAs('documents', $imageName, 'public');

                $validated['file_path'] = $path;

                
            }
            
            Document::create($validated);
            return redirect()->route('documents.index')->with('success', 'Subject created successfully');
        } catch (Exception $e) {
            return $e;
            // return redirect()->route('documents.index')->with('error', 'Failed to create subject');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $documents = Document::find($id);
        return view('dashboard.documents.show', ['document' => $document]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $documents = Document::find($id);
        return view('dashboard.documents.edit', ['document' => $document]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request->all());
        try {
            $validated = $request->validate([
                'menu_id' => 'required',
                'title' => 'required|string',
                'menu_id' => 'required',
                'status' => 'required',
            ]);

            $validated['user_id'] = 1;

            if($request->file('file_path')){
                $file = $request->file('file_path');
                if ($file->getClientOriginalExtension() !== 'pdf') {
                    return redirect()->back()->with('error', 'File must be a PDF');
                }
    
                $imageName = time() . '_' . $file->getClientOriginalName();
                $path = $file->storeAs('documents', $imageName, 'public');

                $validated['file_path'] = $path;
                
            }


            Document::find($id)->update($validated);
            return redirect()->route('documents.index')->with('success', 'Document updated successfully');
        } catch (Exception $e) {
            return redirect()->route('documents.index')->with('error', 'Failed to update document');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Document::destroy($id);
            return redirect()->route('documents.index')->with('success', 'Document deleted successfully');
        } catch (Exception $e) {
            return redirect()->route('documents.index')->with('error', 'Failed to delete document');
        }
    }
}
