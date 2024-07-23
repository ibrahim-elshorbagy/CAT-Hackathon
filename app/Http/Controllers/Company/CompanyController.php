<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Http\Resources\CompanyResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


class CompanyController extends Controller
{

    public function index()
    {
        $query = Company::query();

        $companies = $query->paginate(10)->onEachSide(1);

        return response()->json([
            'companies' => CompanyResource::collection($companies),
        ]);
    }

    public function store(Request  $request)
    {
            $validateData = Validator::make($request->all(), [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['nullable', 'email', 'max:255'],
                'phone' => ['nullable', 'string', 'max:15', 'regex:/^[0-9]{10,15}$/'],
                'address' => ['nullable', 'string'],
                'website' => ['nullable', 'url'],
                'description' => ['nullable', 'string'],
                'industry' => ['nullable', 'string', 'max:255'],
                'logo' => ['nullable', 'string'],]);

            if ($validateData->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validation error',
                    'errors' => $validateData->errors(),
                ], 422);
            }

        $data = $request->all();

        // Store the new image
        $logo = $request->file('logo');
        if ($logo) {
            $path = $logo->store('company' . $data['id'] . '/logo', 'public');
            $data['logo'] = $path;
        }


        Company::create($data);

    return response()->json([
            'message' => 'Company created successfully',
        ], 201);
    }

    /**
     * Display the specified resource.
     */
      public function show($id)
    {
        $company = Company::find($id);

        return response()->json([
            'company' =>new CompanyResource($company),
        ]);
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request  $request,$id)
    {

            $validateData = Validator::make($request->all(), [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['nullable', 'email', 'max:255'],
                'phone' => ['nullable', 'string', 'max:15', 'regex:/^[0-9]{10,15}$/'],
                'address' => ['nullable', 'string'],
                'website' => ['nullable', 'url'],
                'description' => ['nullable', 'string'],
                'industry' => ['nullable', 'string', 'max:255'],
                'logo' => ['nullable', 'string'],]);

            if ($validateData->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validation error',
                    'errors' => $validateData->errors(),
                ], 422);
            }

        $data = $request->all();
        // Delete the old image if it exists
        if ($data['logo'] != null) {
            Storage::disk('public')->delete($data['logo']);
        }

        // Store the new image
        $logo = $request->file('logo');
        if ($logo) {
            $path = $logo->store('company' . $id . '/logo', 'public');
            $data['logo'] = $path;
        }


        Company::create($data);

    return response()->json([
            'message' => 'Company Edit successfully',
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {

        $company = Company::find($id);
        if ($company->logo) {
            Storage::disk('public')->deleteDirectory(dirname($company->logo));
        }

        $company->delete();

        // Return a JSON response
        return response()->json([
            'message' => 'Company deleted successfully',
        ], 200);
    }
}
