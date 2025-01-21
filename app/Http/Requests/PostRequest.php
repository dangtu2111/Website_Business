<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'title' => 'nullable|string|max:255',  // Tiêu đề có thể null, phải là chuỗi, tối đa 255 ký tự
            'slug' => 'nullable|string|max:255',  // Slug có thể null, phải là chuỗi, duy nhất trong bảng posts
            'download' => 'nullable|url',  // Link tải có thể null, phải là URL hợp lệ
            'description' => 'nullable|string|max:500',  // Mô tả có thể null, phải là chuỗi, tối đa 500 ký tự
            'content' => 'nullable|string',  // Nội dung có thể null, phải là chuỗi
            'focus_keywords' => 'nullable|string|max:255',  // Từ khóa trọng tâm có thể null, phải là chuỗi
            'meta_title' => 'nullable|string|max:255',  // Meta title có thể null, phải là chuỗi
            'meta_keyword' => 'nullable|string|max:255',  // Meta keyword có thể null, phải là chuỗi
            'meta_description' => 'nullable|string|max:500',  // Meta description có thể null, phải là chuỗi
            'status' => 'required|boolean',  // Trạng thái phải là boolean và bắt buộc
            'cover_image' => 'nullable|string|url',  // Ảnh bìa có thể null, phải là URL hợp lệ
            'category_id' => 'nullable|exists:categories,id',
        ];
    }
    public function messages(): array
    {
        return [
            // Tiêu đề
            'title.string' => 'Tiêu đề phải là một chuỗi.',
            'title.max' => 'Tiêu đề không được vượt quá 255 ký tự.',

            // Slug
            'slug.string' => 'Slug phải là một chuỗi.',
            'slug.max' => 'Slug không được vượt quá 255 ký tự.',

            // Download
            'download.url' => 'Link tải phải là một URL hợp lệ.',

            // Description
            'description.string' => 'Mô tả phải là một chuỗi.',
            'description.max' => 'Mô tả không được vượt quá 500 ký tự.',

            // Content
            'content.string' => 'Nội dung bài viết phải là một chuỗi.',

            // Focus Keywords
            'focus_keywords.string' => 'Từ khóa trọng tâm phải là một chuỗi.',
            'focus_keywords.max' => 'Từ khóa trọng tâm không được vượt quá 255 ký tự.',

            // Meta Title
            'meta_title.string' => 'Meta title phải là một chuỗi.',
            'meta_title.max' => 'Meta title không được vượt quá 255 ký tự.',

            // Meta Keyword
            'meta_keyword.string' => 'Meta keyword phải là một chuỗi.',
            'meta_keyword.max' => 'Meta keyword không được vượt quá 255 ký tự.',

            // Meta Description
            'meta_description.string' => 'Meta description phải là một chuỗi.',
            'meta_description.max' => 'Meta description không được vượt quá 500 ký tự.',

            // Status
            'status.required' => 'Trường trạng thái là bắt buộc.',
            'status.boolean' => 'Trạng thái phải là giá trị boolean (true/false).',

            // Cover Image
            'cover_image.string' => 'Ảnh bìa phải là một chuỗi.',
            'cover_image.url' => 'Ảnh bìa phải là một URL hợp lệ.',

            // Category ID
            'category_id.exists' => 'Danh mục không tồn tại hoặc đã bị xóa.',
        ];
    }


    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation()
    {
        // Ép kiểu require_login và status thành boolean
        $this->merge([
            'status' => filter_var($this->status, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE),
        ]);
    }
}
