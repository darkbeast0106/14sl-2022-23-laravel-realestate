<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRealestateRequest extends FormRequest
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
            "user_id" => "required|integer|exists:users,id",
            "address" => "required|string|max:255",
            "area" => "required|integer|min:1|max:10000",
            "room_count" => "required|integer|min:1|max:100",
            "rent" => "required_without:cost|nullable|integer|min:1|max:10000000",
            "cost" => "required_without:rent|nullable|integer|min:1|max:100000000000"
        ];
    }
}
