<?php

namespace App\Http\Controllers\Api;

use App\Models\Battle;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BattleController extends ApiController
{
    /**
     * @var Request
     */
    protected $request;

    /**
     * @var Battle
     */
    protected $model;


    public function __construct(Request $request, Battle $model)
    {
        $this->request = $request;
        $this->model = $model;
    }

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return $this->respond($this->model->all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $battle = Battle::query()->with(['team','second_team'])->create([
            'team_id' => $request->team_id,
            'pack_id' => $request->pack_id,
            'second_team_id' => $request->second_team_id
        ]);
        return $this->respond($battle);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $battle = Battle::query()->with(['team','second_team'])->find($id);
        if (!$battle) {
            return $this->respondNotFound();
        }
        return $this->respond($battle);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function update(Request $request): JsonResponse
    {
        $battle = Battle::query()->find($request->id)->update([
            'whos_round' => $request->whos_round,
            'first_team_balls' => $request->first_team_balls,
            'second_team_balls' => $request->second_team_balls,
        ]);
        return $this->respond($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Battle $battle
     * @return JsonResponse
     */
    public function destroy(Battle $battle): JsonResponse
    {
        $battle->delete();
        return $this->respond($battle);
    }

}
