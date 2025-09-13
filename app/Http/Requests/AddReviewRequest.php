<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddReviewRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'author' => 'required|string|min:3|max:255|regex:/^[A-Za-zА-Яа-яЁё\s]+$/u',
            'text' => 'required|max:150',
            'rating' => 'required|integer',
            'product_id' => 'required|integer|exists:products,id',
        ];
    }

    public function messages():array
    {
        return [
            'author.required' => 'Имя должно быть обязательным!',
            'author.string' => 'Введите строку!',
            'author.min' => 'Имя должен быть минимально 3х символов',
            'text.required' => 'Отзыв должен быть обязательным!',
            'text.max' => 'Количество символов превышено 150',
            'product_id.required' => 'Нету продукта!',
            'product_id.exists' => 'Нету продукта!',
        ];
    }
}
