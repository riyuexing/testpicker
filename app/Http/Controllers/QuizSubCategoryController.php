<?php

namespace App\Http\Controllers;

use \App;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\QuizSubCategory;
use App\QuizCategory;
use Yajra\Datatables\Datatables;
use DB;
use Auth;
use Image;
use ImageSettings;
use File;

class QuizSubCategoryController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');

         
    }

    protected  $examSettings;

    public function setExamSettings()
    {
        $this->examSettings = getExamSettings();
    }

    public function getExamSettings()
    {
        return $this->examSettings;
    }

    public function index()
    {
        if(!checkRole(getUserGrade(2)))
        {
          prepareBlockUserMessage();
          return back();
        }  

        $data['active_class']       = 'exams';
        $data['title']              = getPhrase('quiz_sub_categories');
    	// return view('exams.quizcategories.list', $data);

         $view_name = getTheme().'::exams.quizsubcategories.list';
        return view($view_name, $data);
    }

    public function getDatatable()
    {
       if(!checkRole(getUserGrade(2)))
        {
          prepareBlockUserMessage();
          return back();
        }

        $records = QuizSubCategory::select([ 
            'sub_category','category_id', 'description', 'id','slug'])
         ->orderBy('updated_at', 'desc');
        $this->setExamSettings();

        return Datatables::of($records)
        ->addColumn('action', function ($records) {
         
         $link_data = '<div class="dropdown more">
                        <a id="dLabel" type="button" class="more-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="mdi mdi-dots-vertical"></i>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dLabel">
                            <li><a href="'.URL_QUIZ_SUB_CATEGORY_EDIT.'/'.$records->slug.'"><i class="fa fa-pencil"></i>'.getPhrase("edit").'</a></li>';
                            
                            
        $temp = '';
        if(checkRole(getUserGrade(1))) {
        $temp .= '<li><a href="javascript:void(0);" onclick="deleteRecord(\''.$records->slug.'\');"><i class="fa fa-trash"></i>'. getPhrase("delete").'</a></li>';
        }
        $temp .='</ul></div>';

        $link_data = $link_data.$temp;
            return $link_data;
            })
        ->editColumn('category_id', function($records)
        {   
            return $records->getCategory->category;
        })
        ->removeColumn('id')
        ->removeColumn('slug')
        ->editColumn('image', function($records){
            $settings = $this->getExamSettings();
            $path = $settings->categoryImagepath;
            $image = $path.$settings->defaultCategoryImage;
            if($records->image)
                $image = $path.$records->image;
            return '<img src="'.PREFIX.$image.'" height="100" width="100" />';
        })
        ->make(); 
   }


    public function create()
    {
      if(!checkRole(getUserGrade(2)))
      {
        prepareBlockUserMessage();
        return back();
      }
        $data['record']             = FALSE;
        $data['active_class']       = 'exam';
        $list                       = App\QuizCategory::all();
        $subjects                   = array_pluck($list,'category', 'id');
        $data['subjects']           = array(''=>getPhrase('select')) + $subjects;        
        $data['title']              = getPhrase('add_sub_category');
        // return view('mastersettings.topics.add-edit', $data);

       $view_name = getTheme().'::exams.quizsubcategories.add-edit';
        return view($view_name, $data);   
    }




    public function store(Request $request)
    {   
        if(!checkRole(getUserGrade(2)))
      {
        prepareBlockUserMessage();
        return back();
      }
      
       $this->validate($request, [
         'category_id'            => 'bail|required|integer',
         'sub_category'            => 'bail|required|max:40',
         ]);

        $sub_category = $request['sub_category'];
        $name = $sub_category;
        $record = new QuizSubCategory();
        $record->slug                   = $record->makeSlug($name);
        $record->category_id             = $request->category_id;
        $record->sub_category            = $request->sub_category;
        $record->description            = $request->description;
        $record->save();

        flash('success','record_added_successfully', 'success');
        return redirect(URL_QUIZ_SUB_CATEGORIES);
    }

    public function edit($slug)
    {
      if(!checkRole(getUserGrade(2)))
      {
        prepareBlockUserMessage();
        return back();
      }
        $record = QuizSubCategory::where('slug', $slug)->get()->first();

        if($isValid = $this->isValidRecord($record))
            return redirect($isValid);

        $data['record']             = $record;
        $list                       = App\QuizCategory::all();
        $data['subjects']           = array_pluck($list, 'category', 'id');
        $data['active_class']       = 'exams';
        $data['title']              = getPhrase('edit_sub_category');
        // return view('mastersettings.topics.add-edit', $data);

       $view_name = getTheme().'::exams.quizsubcategories.add-edit';
        return view($view_name, $data);   
    }

    public function update(Request $request, $slug)
    {

      if(!checkRole(getUserGrade(2)))
      {
        prepareBlockUserMessage();
        return back();
      }

        $record                 = QuizSubCategory::where('slug', $slug)->get()->first();
        
        if($isValid = $this->isValidRecord($record))
            return redirect($isValid);

          $this->validate($request, [
          'category_id'            => 'bail|required|integer',
         'sub_category'            => 'bail|required|max:40',
          ]);
          $name = $request['sub_category'];
    
       /**
        * Check if the title of the record is changed, 
        * if changed update the slug value based on the new title
        */
        if($name != $record->sub_categorye)
            $record->slug = $record->makeSlug($name);
        
        $record->slug                       = $record->makeSlug($name);
        $record->category_id                = $request->category_id;
        $record->sub_category               = $request->sub_category;
        $record->description      = '';
        if(isset($request->description))
        $record->description                = $request->description;
        $record->save();

        flash('success','record_updated_successfully', 'success');
        return redirect(URL_QUIZ_SUB_CATEGORIES);
    }

 public function delete($slug)
    {

      if(!checkRole(getUserGrade(2)))
      {
        prepareBlockUserMessage();
        return back();
      }

      /**
       * Delete the questions associated with this quiz first
       * Delete the quiz
       * @var [type]
       */
        $record = QuizSubCategory::where('slug', $slug)->first();
        try{
            if(!env('DEMO_MODE')) {
                $record->delete();
            }
            $response['status'] = 1;
            $response['message'] = getPhrase('record_deleted_successfully');
        }
         catch ( \Illuminate\Database\QueryException $e) {

            $response['status'] = 0;
           if(getSetting('show_foreign_key_constraint','module'))
            $response['message'] =  $e->errorInfo;
           else
            $response['message'] =  getPhrase('this_record_is_in_use_in_other_modules');
       }
        return json_encode($response);
    }








    public function isValidRecord($record)
    {
      if ($record === null) {

        flash('Ooops...!', getPhrase("page_not_found"), 'error');
        return $this->getRedirectUrl();
        }

    }

    public function getReturnUrl()
    {
      return URL_QUIZ_SUB_CATEGORIES;
    }

}
