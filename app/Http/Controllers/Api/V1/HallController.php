<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\HallRequest;
use App\Models\Hall;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Validation\Rule;

class HallController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $halls =  Hall::paginate(2);
        return $halls;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(HallRequest $request)
    {
        $request->validated();
        $request['days_of_works'] = $request->from_day . " to " . $request->to_day;
        $hall = Hall::create($request->all());
        // $success = session('success');
        return $hall;
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
    public function update(Request $request,Hall $hall)
    {
        // $request->validate([
        //     'name' => ['sometimes','required', Rule::unique('halls','name')->ignore($hall->id)],
        //     'subject' => 'sometimes |required',
        // ]);
        $request->validate([
            'name' => ['required ','string' , Rule::unique('halls','name')->ignore($hall->id)],
            'type' => 'required | in:room,workspace',
            'number_of_seats' => 'sometimes |required | integer',
            'location' => 'sometimes |required | string',
            'from_day' => 'sometimes |required | string',
            'to_day' => 'sometimes |required | string',

        ]);
        $hall->update($request->all());

        return [
            'code' => 100,
            'message' => "Hall Updated successfully",
            'hall' => $hall,
        ];


        $request->validated();
        $hall->update($request->all());
        // $success = session('success');
        return $hall;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hall $hall)
    {
        Hall::destroy($hall->id);
        return Response::json([
            'msg' => 'deleted',
        ]);
    }
}
