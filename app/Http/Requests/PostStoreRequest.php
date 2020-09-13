<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth('web')->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => ['required', 'array'],
            'title.ar' => ['required', 'string', 'min:2', 'max:200'],
            'title.en' => ['required', 'string', 'min:2', 'max:200'],
            'content' => ['required', 'array'],
            'content.ar' => ['required', 'string', 'min:2', 'max:60000'],
            'content.en' => ['required', 'string', 'min:2', 'max:60000'],
            'image' => ['nullable', 'image', 'max:' . (2 * 1024)],
        ];
    }

    public function attributes()
    {
        $attributes = [];
        foreach (LOCALS() as $key => $locale) {
            $attributes['title.' . $key] = __('app.title') . ' ' . $locale['native'];
            $attributes['content.' . $key] = __('app.content') . ' ' . $locale['native'];
        }
        return $attributes;
    }
}
