<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Input;
use Illuminate\Validation\Rule;

class StoreSubscription extends FormRequest
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
        $rules = [
            'poste' => 'required',
            'p_ref' => ['required',
            Rule::in('C01/2019', 'C02/1/2019', 'C02/2/2019'),
            ],
        ];

        switch ($this->input('p_ref')) {
            case 'C01/2019':
            case 'C02/1/2019':
            case 'C02/2/2019':
            case 'C03/2019':
            case 'C04/1/2019':
            case 'C04/2/2019':
            case 'C04/3/2019':
                $rules += [
                    'poste' => 'required',
                    'cin' => 'required|min:8|numeric|unique:users',
                    'last_name' => 'required',
                    'first_name' => 'required',
                    'confirm_cin' => 'required|min:8|numeric|same:cin',
                    'birthday' => 'required',
                    'mobile_phone' => 'required',
                    'email' => 'unique:users',
                 
                    'password' => ['required',
                        'min:8',
                        'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\X])(?=.*[!$#%]).*$/',
                    ],
                    'Confirm-password' => 'required|same:password',
                    'place_of_birth' => 'required',
                    'addresse' => 'required',
                    'city' => 'required',
                 
                    'diploma' => 'required',
                    'level_studies' => 'required',
                    'Bachelor_degree' => 'required',
                    'last_year_degree_without_pfe' => 'required',
                  
                    'preparatory_study' => 'required',
                  
                    'g-recaptcha-response' => 'required|captcha',
                ];
                break;

            case 'C02/1/2019':
                $rules += [
                    'company' => [
                        'required',
                        'string',
                    ],
                    'email' => [
                        'required',
                        'email',
                    ],
                    'password' => [
                        'required',
                        'string',
                        'min:8',
                    ],
                ];
                break;
            case 'partner':
                $rules += [
                    'partner_number' => [
                        'required',
                        'string',
                    ],
                    'password' => [
                        'required',
                        'string',
                        'min:8',
                    ],
                ];
                break;
        }

    return $rules;
    }

    public function messages()
    {
        $messages =
            [
                'poste.required' => 'Veuillez choisir un poste',
                'last_name.required' => 'Ce champ est obligatoire',
                'first_name.required' => ' Ce champ est obligatoire',
                'cin.unique' => 'Déja utilisée',
                'cin.required' => 'Ce champ est obligatoire',
                'cin.numeric' => 'Ce champ doit être numeric',
                'cin.min' => 'Ce champ doit être composée de 8 chiffres',
                'confirm_cin.required' => 'Ce champ est obligatoire',
                'confirm_cin.numeric' => 'Ce champ doit être numeric',
                'confirm_cin.min' => 'Ce champ doit être composée de 8 chiffres',
                'confirm_cin.same' => 'Non Compatible',
                'birthday.required' => 'Ce champ est obligatoire',
                'mobile_phone.required' => 'Ce champ est obligatoire',
             
                'email.unique' => 'Vous avez fournit une addresse mail déja utilisée',
                
                'confirm_email.unique' => 'Vous avez fournit une addresse mail déja utilisée',
             
                'confirm_email.same' => 'Non compatible',
                'password.required' => 'Ce champ est obligatoire',
                'password.min' => 'Vous devez avoir plus de 8 caractères',
                'password.regex' => 'Le mot de passe doit contenir au moins un chiffre,une lettre majuscules et une lettre minuscules et un caracrére speciale.',


                'Confirm-password.required' => 'Ce champ est obligatoire',
                'Confirm-password.same' => 'Non compatible',
                'addresse.required' => 'Ce champ est obligatoire',

                'city.required' => 'Ce champ est obligatoire',

                'diploma.required' => 'Ce champ est obligatoire',
                'level_studies.required' => 'Ce champ est obligatoire',
                'preparatory_study.required' => 'Ce champ est obligatoire',
                'Bachelor_degree.required' => 'Ce champ est obligatoire',
                'last_year_degree_without_pfe.required' => 'Ce champ est obligatoire',
                'place_of_birth.required' => 'Ce champ est obligatoire',
                'date_of_obtaining_a_driving_license.required' => 'Ce champ est obligatoire',

                    'g-recaptcha-response.required' => 'Please verify that you are not a robot.',
                    'g-recaptcha-response.captcha' => 'Captcha error! try again later or contact site admin.',

            ];


        return $messages;

    }

}
