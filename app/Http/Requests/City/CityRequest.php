<?php


namespace App\Http\Requests\City;

use Illuminate\Foundation\Http\FormRequest;

class CityRequest extends FormRequest{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'city_name_ar' => 'required',
            'city_name_en' => 'required',
            'country_id' => 'required|numeric',
        ];
    }
}
?>
