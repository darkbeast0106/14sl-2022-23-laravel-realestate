<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRealestateRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "user_id" => "integer|exists:users,id",
            "address" => "string|max:255",
            "area" => "integer|min:1|max:10000",
            "room_count" => "integer|min:1|max:100",
            "rent" => "required_if:cost,null|nullable|integer|min:1|max:10000000",
            "cost" => "required_if:rent,null|nullable|integer|min:1|max:100000000000"
        ];
    }
}
