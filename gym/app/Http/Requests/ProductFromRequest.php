<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductFromRequest extends FormRequest
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
    public function rules(){
        $id     = $this->request->get('id');
        $rules  = [];

        // $rules['parent_category_id']     =  'required';
        $rules['sub_cat_id']        =  'required';
        $rules['product_category_id']    =  'required';


        if($id != ''){
            $rules['name']  =  [ 'required', Rule::unique('products')->ignore($id)];
        }else{
            $rules['name']  =  'required|unique:products';
        }

        // $rules['description']   =  'required';
        $rules['uom_id']        =  'required';
        return $rules;
    }
}
