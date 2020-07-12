<?php


namespace App\Http\Requests\Country;

use Illuminate\Foundation\Http\FormRequest;

class Country extends FormRequest{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'country_name_ar' => 'required',
            'country_name_en' => 'required',
            'mob' => 'required',
            'code' => 'required',
            'logo' => 'required',
        ];
    }
}
?>
