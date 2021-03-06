<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        // dd($this->user_id);
        $user = auth()->user();

        if ($this->isMethod('post'))
        {
            return [
                'name' => [
                    'required',
                    'min:3',
                    Rule::unique('categories', 'name')->where(function ($query) use ($user) {
                        return $query->where('user_id', $user->id);
                    })
                ],
                'color' => [
                    'required',
                    Rule::in(['red', 'green', 'blue']),
                    Rule::unique('categories', 'color')->where(function ($query) use ($user) {
                        return $query->where('user_id', $user->id);
                    })
                ],
            ];
        }
        else 
        {
            $category = $this->route('category');
            return [
                'name' => [
                    'required',
                    'min:3',
                    Rule::unique('categories', 'name')
                        ->where(function ($query) use ($user) {
                            return $query->where('user_id', $user->id);
                        })
                        ->ignore($category->id)
                ],
                'color' => [
                    'required',
                    Rule::in(['red', 'green', 'blue']),
                    Rule::unique('categories', 'color')
                        ->where(function ($query) use ($user) {
                            return $query->where('user_id', $user->id);
                        })
                        ->ignore($category->id)
                ],
            ];
        }
    }

    public function messages()
    {
        return [
            'name.required' => 'N??zov je povinn??',
            'name.min' => 'Minim??lny po??et znakov je: 3',
            'name.unique' => 'Udalos?? s rovnak??m n??zvom u?? existuje',

            'color.required' => 'Farba kateg??rie je povinn??',
            'color.unique' => 'Kateg??ria s zvolenou farbou u?? existuje',
        ];
    }
}
