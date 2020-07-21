<?php


namespace App\Http\Requests\Country;

use Illuminate\Foundation\Http\FormRequest;

class CountryRequest extends FormRequest{

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
            'mobile' => 'required',
            'code' => 'required',
            'logo' => ' |'.validate_image(),
        ];
    }
}
?>
