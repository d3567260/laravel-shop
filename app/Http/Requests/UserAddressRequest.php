<?php

namespace App\Http\Requests;

class UserAddressRequest extends Request
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'city'          => 'required',
            'district'      => 'required',
            'zip'           => 'required',
            'address'       => 'required',
            'contact_name'  => 'required',
            'contact_phone' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'city'          => '縣市',
            'district'      => '區域',
            'zip'           => '郵遞區號',
            'address'       => '地址',
            'contact_name'  => '姓名',
            'contact_phone' => '電話',
        ];
    }
}
