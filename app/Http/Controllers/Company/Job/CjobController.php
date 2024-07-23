<?php

namespace App\Http\Controllers\Company\Job;

use App\Http\Controllers\Controller;
use App\Http\Resources\CjobResource;
use App\Models\Cjob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CjobController extends Controller
{

    public function index()
    {
        $query = Cjob::query();

        $jobs = $query->paginate(10)->onEachSide(1);

        return response()->json([
            'jobs' => CjobResource::collection($jobs),
        ]);
    }

    public function companyJobs($id){

        $query = Cjob::query()->where('company_id', $id);
        $jobs = $query->paginate(10)->onEachSide(1);

        return response()->json([
            'jobs' => CjobResource::collection($jobs),
        ]);
    }
    public function store(Request $request)
    {
        $validateData = Validator::make($request->all(), [
            'company_id' => ['required', 'exists:companies,id'],
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'contact_email' => ['nullable', 'email', 'max:255'],
            'contact_phone' => ['nullable', 'string', 'max:15'],
            'logo' => ['nullable', 'image'],
            'field' => ['nullable', 'string'],
        ]);

        if ($validateData->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'errors' => $validateData->errors(),
            ], 422);
        }

        $data = $request->all();
        $cjbo = Cjob::create($data);

        // Store the new image

        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $path = $logo->store('company' . $data['company_id'] . '/jobs' .$cjbo['id'], 'public');
            $cjbo->update([
                'logo' => $path,
            ]);
        }

        return response()->json([
            'message' => 'Job added successfully',
        ], 201);
    }

    public function show($id)
    {
        $Cjob = Cjob::find($id);

        return response()->json([
            'Cjob' =>new CjobResource($Cjob),
        ]);
    }

    public function update(Request  $request,$id)
    {

            $validateData = Validator::make($request->all(), [
            'company_id' => ['required', 'exists:companies,id'],
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'contact_email' => ['nullable', 'email', 'max:255'],
            'contact_phone' => ['nullable', 'string', 'max:15'],
            'logo' => ['nullable', 'image'],
            'field' => ['nullable', 'string'],
            ]);

            if ($validateData->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validation error',
                    'errors' => $validateData->errors(),
                ], 422);
            }

        $data = $request->all();
        // Delete the old image if it exists
        if(isset($data['logo']) && $data['logo'] != null) {
            Storage::disk('public')->delete($data['logo']);
        }


        // Store the new image
        $cjbo = Cjob::find($id);

        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $path = $logo->store('company' . $data['company_id'] . '/jobs' .$cjbo['id'], 'public');
            $cjbo->update([
                'logo' => $path,
            ]);
        }

    return response()->json([
            'message' => 'Company Edit successfully',
        ], 200);
    }



        public function destroy( $id)
    {

        $cjob = Cjob::find($id);
        if ($cjob->logo) {
            Storage::disk('public')->deleteDirectory(dirname($cjob->logo));
        }

        $cjob->delete();

        // Return a JSON response
        return response()->json([
            'message' => 'cjob deleted successfully',
        ], 200);
    }
}
