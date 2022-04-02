<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AnswersController extends ApiController
{
    /**
     * @var Request
     */
    protected $request;

    /**
     * @var Answer
     */
    protected $model;


    public function __construct(Request $request, Answer $model)
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
     * @param Answer $answer
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $answer = Answer::query()->create([
            'name' => $request->name,
            'question_id' => $request->question_id,
            'is_correct' => $request->is_correct,
        ]);
        return $this->respond($answer);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $answer = Answer::query()->find($id);
        if (!$answer) {
            return $this->respondNotFound();
        }
        return $this->respond($answer);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function update(Request $request): JsonResponse
    {
        $answer = Answer::query()->find($request->id)->update([
            'name' => $request->name,
            'question_id' => $request->question_id,
            'is_correct' => $request->is_correct,
        ]);
        return $this->respond($answer);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Answer $answer
     * @return JsonResponse
     */
    public function destroy(Answer $answer): JsonResponse
    {
        $answer->delete();
        return $this->respond($answer);
    }

    public function getAnswersByQuestionId(int $question_id): JsonResponse
    {
        $answers = Answer::query()->where('question_id',$question_id)->get();
        return $this->respond($answers);
    }
}
