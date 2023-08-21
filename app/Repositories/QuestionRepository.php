<?php

namespace App\Repositories;

use App\Interfaces\QuestionRepositoryInterface;
use App\Models\QuestionName;
use App\Models\QuestionAnswer;



class QuestionRepository implements QuestionRepositoryInterface
{
    public function newQuestionName($questionName, $answerType)
    {
        return QuestionName::create([
            'name' => $questionName,
            'answer_type' => $answerType,
        ]);
    }

    public function deleteQuestionName($questionName)
    {
        $questionName->questionAnswer()->delete();
        $questionName->delete();
    }

    public function newQuestionAnswer($answer, $fileName, $filePath, $questionName, $user)
    {
        return QuestionAnswer::create([
            'answer' => $answer,
            'image_name' => $fileName,
            'image_path' => $filePath,
            'question_name_id' => $questionName->id,
            'user_id' => $user->id,
        ]);
    }
}
