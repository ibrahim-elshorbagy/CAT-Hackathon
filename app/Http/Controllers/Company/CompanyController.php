<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Http\Resources\CjobResource;
use App\Models\Company;
use App\Http\Resources\CompanyResource;
use App\Models\Cjob;
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
                'logo' => ['nullable', 'string'],
            ]);

            if ($validateData->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validation error',
                    'errors' => $validateData->errors(),
                ], 422);
            }

        $data = $request->all();

        $company = Company::create($data);
        // Store the new image
        if ($request->hasFile('logo'))
        {

        $logo = $request->file('logo');

            $path = $logo->store('company' . $company['id'] . '/logo', 'public');

            $company->update([
            'logo' => $path,
            ]);
        }





    return response()->json([
            'message' => 'Company created successfully',
        ], 201);
    }


    public function show($id)
    {
        $company = Company::find($id);

        $query = Cjob::query()->where('company_id', $id);
        $jobs = $query->paginate(10)->onEachSide(1);

        return response()->json([
            'company' =>new CompanyResource($company),
            'jobs' => CjobResource::collection($jobs),

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
        if ($request->hasFile('logo')) {
            Storage::disk('public')->delete($data['logo']);
        }

        // Store the new image
        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $path = $logo->store('company' . $id . '/logo', 'public');
            $data['logo'] = $path;
        }

        $company =Company::find($id);
        $company->update($data);

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
