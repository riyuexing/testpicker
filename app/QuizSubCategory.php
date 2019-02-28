<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuizSubCategory extends Model
{
    protected $table = "quizsubcategories";

    public static function getRecordWithSlug($slug)
    {
        return QuizSubCategory::where('slug', '=', $slug)->first();
    }

    public function getCategory()
    {
        return $this->belongsTo('App\QuizCategory','category_id', 'id');

    }
}
