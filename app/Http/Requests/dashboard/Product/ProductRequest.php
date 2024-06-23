<?php

namespace App\Http\Requests\dashboard\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function getName()
    {
        $this->name;
    }

    public function getDescription()
    {
        $this->description;
    }

    public function getImage()
    {
        $this->image;
    }

    public function getPrice()
    {
        $this->price;
    }

    public function getStock()
    {
        $this->stock;
    }

    public function getType()
    {
        $this->type;
    }

    public function getPeriode()
    {
        $this->periode;
    }

    public function getStatus()
    {
        $this->status;
    }

    public function getSlug()
    {
        $this->slug;
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
        ];
    }
}
