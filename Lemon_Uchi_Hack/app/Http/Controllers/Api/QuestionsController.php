<?php

namespace App\Http\Controllers\Api;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class QuestionsController extends ApiController
{
    /**
     * @var Request
     */
    protected $request;

    /**
     * @var Question
     */
    protected $model;


    public function __construct(Request $request, Question $model)
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
//        if (!$request->question_pack_id
//            || !$request->question_level_id
//            || !$request->name
//            || !$request->question_type_id) {
//            return $this->respondNotFound();
//        }
        $question = Question::query()->create([
            'name' => $request->name,
            'question_pack_id' => $request->question_pack_id,
            'question_level_id' => $request->question_level_id,
            'question_type_id' => $request->question_type_id,
            'time' => $request->time
        ]);
        return $this->respond($question);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $question = Question::query()->find($id);
        if (!$question) {
            return $this->respondNotFound();
        }
        return $this->respond($question);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function update(Request $request): JsonResponse
    {
        $question = Question::query()->find($request->id)->update([
            'name' => $request->name,
            'question_pack_id' => $request->question_pack_id,
            'question_level_id' => $request->question_level_id,
            'question_type_id' => $request->question_type_id,
            'time' => $request->time
        ]);
        return $this->respond($question);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Question $question
     * @return JsonResponse
     */
    public function destroy(Question $question): JsonResponse
    {
        Answer::query()->where('question_id',$question->id)->delete();
        $question->delete();
        return $this->respond($question);
    }

    public function getQuestionsByQuestionPackId(int $question_pack_id): JsonResponse
    {
        $questions = Question::query()->with('answers')->where('question_pack_id', $question_pack_id)->get();
        if (!$questions) {
            $this->respondNotFound();
        }
        return $this->respond($questions);
    }
    public function getStudentQuestionsByQuestionPackId(int $question_pack_id): JsonResponse
    {
        $question = Question::query()->with('answers')->where('question_pack_id', $question_pack_id)->get()->random(1);
        if (!$question) {
            $this->respondNotFound();
        }
        return $this->respond($question);
    }
}
