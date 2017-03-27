<?php

namespace App\Http\Requests;
use App\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class PostEditRequest extends FormRequest
{



    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {

        return Post::checkOwner($this->route('postie'));
        
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
         return [
            
        ];
    }


    public function forbiddenResponse()
    {
        return redirect()->back();
    }
}
