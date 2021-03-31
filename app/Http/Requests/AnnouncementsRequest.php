<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnnouncementsRequest extends FormRequest
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
            'name' => 'required',
            'nim' => 'required',
            'date' => 'required',
            'time' => 'required',
            'imageFile' => 'required|mimes:jpg,png,jpeg,JPG',
            'contents' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama Tidak Boleh Kosong',
            'nim.required' => 'NIM Tidak Boleh Kosong',
            'date.required' => 'Tanggal Tidak Boleh Kosong',
            'time.required' => 'Waktu Tidak Boleh Kosong',
            'imageFile.required' => "Gambar Tidak Boleh Kosong",
            'contents.required' => 'Berita Tidak Boleh Kosong'
        ];
    }
}
