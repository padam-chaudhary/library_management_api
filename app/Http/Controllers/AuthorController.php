<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreAuthorRequest;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\Author;
class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authors = Author::paginate(10);

        return response()->json([
            'authors' => $authors,
            'message' => 'Authors retrieved successfully'
        ], status: 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAuthorRequest $request): JsonResponse
    {
        $authors = Author::create($request->validated());// attributes

        return response()->json([
            'authors' =>$authors,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
