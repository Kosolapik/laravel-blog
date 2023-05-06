<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required | string',
            'content' => 'required | string',
            'category_id' => 'required | integer | exists:categories,id',
            'tag_ids' => 'nullable | array',
            'tag_ids.*.id' => 'nullable | integer | exists:tags,id',
            'image' => 'nullable | file',
            'preview' => 'nullable | file',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Поле "Заголовок" обязательно для заполнения',
            'title.string' => 'Поле "Заголовок" должно соответствовать строчному типу',
            'content.required' => 'Поле "Содержание" обязательно для заполнения',
            'titcontentle.string' => 'Поле "Содержание" должно соответствовать строчному типу',
            'category_id.required' => 'Поле "Категория" обязательно для заполнения',
            'category_id.integer' => 'Поле "Категория" должно соответствовать целочисленому типу',
            'category_id.exists' => 'ID категории не существует в базе данных',
            'tag_ids.array' => 'Необходимо отправить массив данных',
            'tag_ids.*.id.exist' => 'ID тэга не существует в базе данных',
            'image.file' => 'Необходимо выбрать файл',
            'preview.file' => 'Необходимо выбрать файл',
        ];
    }
}
