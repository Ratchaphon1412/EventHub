<?php

namespace App\Interfaces;

interface QuestionRepositoryInterface
{

    public function newQuestionName($questionName, $answerType);
    public function deleteQuestionName($questionName);
    public function newQuestionAnswer($answer, $fileName, $filePath, $questionName, $user);
}
