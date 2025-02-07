<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'name'          => 'nullable|string|max:255', // Bắt buộc, kiểu chuỗi, tối đa 255 ký tự
            'slug'          => 'nullable|string|max:255', // Bắt buộc, duy nhất
            'iframe'        => 'nullable|string', // Có thể null, kiểu chuỗi
            'icon'          => 'nullable|string|max:255', // Có thể null, tối đa 255 ký tự
            'cover_image'   => 'nullable|url', // Có thể null, định dạng URL
            'description'   => 'nullable|string', // Có thể null, kiểu chuỗi
            'sort_order'    => 'nullable|integer|min:0', // Có thể null, kiểu số nguyên, lớn hơn hoặc bằng 0
            'status'        => 'nullable|boolean', // Bắt buộc, kiểu boolean
            'require_login' => 'nullable|boolean', // Bắt buộc, kiểu boolean
        ];
    }

    /**
     * Customize the error messages for validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.string'           => 'Tên danh mục phải là một chuỗi ký tự.',
            'name.max'              => 'Tên danh mục không được vượt quá 255 ký tự.',
            
            'slug.string'           => 'Slug phải là một chuỗi ký tự.',
            'slug.max'              => 'Slug không được vượt quá 255 ký tự.',
            'slug.unique'           => 'Slug này đã tồn tại. Vui lòng chọn slug khác.',
            
            'iframe.string'         => 'Iframe phải là một chuỗi ký tự.',
            
            'icon.string'           => 'Icon phải là một chuỗi ký tự.',
            'icon.max'              => 'Icon không được vượt quá 255 ký tự.',
            
            'cover_image.url'       => 'Ảnh bìa phải là một URL hợp lệ.',
            
            'description.string'    => 'Mô tả phải là một chuỗi ký tự.',
            
            'sort_order.integer'    => 'Thứ tự sắp xếp phải là một số nguyên.',
            'sort_order.min'        => 'Thứ tự sắp xếp không được nhỏ hơn 0.',
            
            'status.boolean'        => 'Trạng thái chỉ được là true hoặc false.',
            
            'require_login.boolean' => 'Trường yêu cầu đăng nhập chỉ được là true hoặc false.',
        ];
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation()
    {
        // Ép kiểu require_login và status thành boolean
        $this->merge([
            'require_login' => filter_var($this->require_login, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE),
            'status' => filter_var($this->status, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE),
        ]);
    }
}
