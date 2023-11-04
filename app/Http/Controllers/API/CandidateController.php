<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\CandidateRequest;
use App\Http\Resources\CandidateResource;
use App\Models\Candidate;
use Exception;
use Illuminate\Http\Request;

class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $candidates = Candidate::when($request->search, function ($query) use ($request) {
                $query->where('full_name', 'like', '%'.$request->search.'%')
                    ->orWhere('email', 'like', '%'.$request->search.'%');
                })
                ->when($request->sort, function ($query) use ($request) {
                    $query->orderBy($request->sort, $request->order ?? 'asc'); // default order is asc
                })
                ->paginate($request->per_page ?? 10);
        return CandidateResource::collection($candidates);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CandidateRequest $request)
    {
        try {
            $data = $request->validated();
            $candidate = Candidate::create($data);
            return response()->json([
                'message' => 'Candidate created successfully',
                'data' => new CandidateResource($candidate)
            ]);

        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Candidate $candidate)
    {

        try {
            return new CandidateResource($candidate);
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CandidateRequest $request, Candidate $candidate)
    {
        try {
            $data = $request->validated();
            $candidate->update($data);
            return response()->json([
                'message' => 'Candidate updated successfully',
                'data' => new CandidateResource($candidate)
            ]);
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $candidate = Candidate::findOrFail($id);
            $candidate->delete();
            return response()->json([
                'message' => 'Candidate deleted successfully'
            ]);
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
