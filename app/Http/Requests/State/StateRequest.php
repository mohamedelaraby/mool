<?php


namespace App\Http\Requests\State;

use Illuminate\Foundation\Http\FormRequest;

class StateRequest extends FormRequest{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'state_name_ar' => 'required',
            'state_name_en' => 'required',
            'city_id' => 'required|numeric',
            'country_id' => 'required|numeric',
        ];
    }
}
?>
