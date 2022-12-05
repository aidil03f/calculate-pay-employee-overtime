<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class OvertimeRequest extends FormRequest
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
        return [
            'employee_id' => ['required','numeric','exists:employees,id'],
            'date' =>  ['required', 'date',Rule::unique('overtimes')->where(function ($q) { 
                return $q->where([['employee_id',$this->employee_id],['date',$this->date]]);
            })],
            'time_started' => ['required','date_format:H:i'],
            'time_ended' => ['required','date_format:H:i','after:time_started'],
        ];
    }
}
