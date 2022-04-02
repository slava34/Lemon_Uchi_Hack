<?php

namespace App\Http\Controllers\Api;

use App\Models\BattleField;
use App\Models\Question;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BattleFieldsController extends ApiController
{
    /**
     * @var Request
     */
    protected $request;

    /**
     * @var BattleField
     */
    protected $model;


    public function __construct(Request $request, BattleField $model)
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
        //TODO VALIDATION
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

        $i = 1;
        while ($i <= 14)
        {
            $whos_field_id = null;
            if ($i === 1) {
                $whos_field_id = $request->team_1;
            } else if ($i === 13) {
                $whos_field_id = $request->team_2;
            }
            BattleField::query()->create([
                'field_id' => $i,
                'battle_id' => $request->battle_id,
                'whos_field_id' => $whos_field_id
            ]);
            $i = $i + 1;
            if ($i === 14){
                break;
            }
        }
        $battleField = BattleField::query()
            ->where('battle_id',$request->battle_id)->orderBy('id')->get();
        return $this->respond($battleField);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $battleField = BattleField::query()->find($id);
        if (!$battleField) {
            return $this->respondNotFound();
        }
        return $this->respond($battleField);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function update(Request $request): JsonResponse
    {
        $battleField = BattleField::query()->find($request->id)->update([
//            'battle_id' => $request->battle_id,
            'whos_field_id' => $request->whos_field_id
        ]);
        return $this->respond($battleField);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param BattleField $battleField
     * @return JsonResponse
     */
    public function destroy(BattleField $battleField): JsonResponse
    {
        $battleField->delete();
        return $this->respond($battleField);
    }

    public function getBattleFieldsByBattleId(int $id): JsonResponse
    {
        $battleField = BattleField::query()->where('battle_id',$id)->orderBy('id')->get();
        return $this->respond($battleField);
    }

}
