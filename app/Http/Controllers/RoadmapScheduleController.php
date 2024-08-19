<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Roadmap;
use App\Models\Content;
use App\Models\UserSchedule;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class RoadmapScheduleController extends Controller
{
      public function createSchedule(Request $request)
    {
        // Validate the request data
        $validateCode = Validator::make($request->all(), [
            'roadmap_id' => 'required|exists:roadmaps,id',
            'start_date' => 'required|date',
            'study_days' => 'required|array|min:1',
            'study_days.*' => 'in:Sunday,Monday,Tuesday,Wednesday,Thursday,Friday,Saturday',
        ]);

        if ($validateCode->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'errors' => $validateCode->errors(),
            ], 422);
        }

        $user = Auth::user();
        $roadmapId = $request->input('roadmap_id');
        $startDate = Carbon::parse($request->input('start_date'));
        $studyDays = $request->input('study_days');

        $roadmap = Roadmap::with('contents')->find($roadmapId);

        UserSchedule::where('user_id', $user->id)->delete();

        $scheduledLessons = 0;
        $totalContents = $roadmap->contents->count();
        $contentList = $roadmap->contents->all();

        while ($scheduledLessons < $totalContents) {
            if (in_array($startDate->format('l'), $studyDays)) {

                if (isset($contentList[$scheduledLessons])) {

                    $content = $contentList[$scheduledLessons];

                    UserSchedule::create([
                        'user_id' => $user->id,
                        'roadmap_id' => $roadmapId,
                        'content_id' => $content->id,
                        'lesson_date' => $startDate->toDateString(),
                    ]);

                    $scheduledLessons++;
                }
            }

            // Move to the next day
            $startDate->addDay();
        }

        return response()->json(['message' => 'Schedule created successfully']);
    }

    public function getSchedule()
    {
        $user = Auth::user();

        $schedule = UserSchedule::with(['roadmap', 'content'])
            ->where('user_id', $user->id)
            ->get()
            ->groupBy('roadmap.name');

        return response()->json($schedule);
    }

    public function getAllRoadmaps()
    {
        $roadmaps = Roadmap::all();

        return response()->json($roadmaps);
    }

    public function getRoadmapContents($roadmapId)
    {
        $roadmap = Roadmap::with('contents')->find($roadmapId);

        if (!$roadmap) {
            return response()->json([
                'status' => false,
                'message' => 'Roadmap not found',
            ], 404);
        }

        return response()->json($roadmap);
    }
}

