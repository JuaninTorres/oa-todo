<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => 'The :attribute must be accepted.',
    'active_url'           => 'The :attribute is not a valid URL.',
    'after'                => 'The :attribute must be a date after :date.',
    'alpha'                => 'The :attribute may only contain letters.',
    'alpha_dash'           => 'The :attribute may only contain letters, numbers, and dashes.',
    'alpha_num'            => 'The :attribute may only contain letters and numbers.',
    'array'                => 'The :attribute must be an array.',
    'before'               => 'The :attribute must be a date before :date.',
    'between'              => [
        'numeric' => 'The :attribute must be between :min and :max.',
        'file'    => 'The :attribute must be between :min and :max kilobytes.',
        'string'  => 'The :attribute must be between :min and :max characters.',
        'array'   => 'The :attribute must have between :min and :max items.',
    ],
    "boolean"              => "El campo :attribute debe ser verdadero o falso.",
    "confirmed"            => "El campo :attribute confirmación no coincide.",
    "date"                 => "The :attribute is not a valid date.",
    "date_format"          => "El campo :attribute no coincide con el formato :format.",
    "different"            => "El campo :attribute and :other deben ser diferentes.",
    "digits"               => "El campo :attribute debe tener :digits digitos.",
    "digits_between"       => "El campo :attribute debe tener entre :min - :max digitos.",
    "email"                => "El formato del :attribute es inválido.",
    "filled"               => "El campo :attribute es requerido.",
    "exists"               => "El campo :attribute seleccionado es inválido.",
    "image"                => "El campo :attribute debe ser una imagen.",
    "in"                   => "El campo :attribute seleccionado es inválido.",
    "integer"              => "El campo :attribute debe ser un número entero.",
    "ip"                   => "El campo :attribute debe ser una dirección IP válida.",
    'json'                 => 'The :attribute must be a valid JSON string.',
    'max'                  => [
        'numeric' => 'The :attribute may not be greater than :max.',
        'file'    => 'The :attribute may not be greater than :max kilobytes.',
        'string'  => 'The :attribute may not be greater than :max characters.',
        'array'   => 'The :attribute may not have more than :max items.',
    ],
    'mimes'                => 'The :attribute must be a file of type: :values.',
    'min'                  => [
        'numeric' => 'The :attribute must be at least :min.',
        'file'    => 'The :attribute must be at least :min kilobytes.',
        'string'  => 'The :attribute must be at least :min characters.',
        'array'   => 'The :attribute must have at least :min items.',
    ],
    "not_in"               => "El campo :attribute seleccionado es inválido.",
    "numeric"              => "El campo :attribute debe ser un número.",
    "regex"                => "El formato de :attribute es inválido.",
    "required"             => "El campo :attribute es requerido.",
    "required_if"          => "El campo :attribute es requerido cuando :other es :value.",
    "required_with"        => "El campo :attribute es requerido cuando :values está presente.",
    "required_with_all"    => "El campo :attribute es requerido cuando :values está presente.",
    "required_without"     => "El campo :attribute es requerido cuando :values no está presente.",
    "required_without_all" => "El campo :attribute es requerido cuando ninguno de los valores de :values están presentes.",
    "same"                 => "El campo :attribute y :other deben coincidir.",
    "size"                 => [
        "numeric" => "El campo :attribute debe tener :size.",
        "file"    => "El campo :attribute debe tener :size kb.",
        "string"  => "El campo :attribute debe tener :size caracteres.",
        "array"   => "El campo :attribute debe contener :size elementos.",
    ],
    "unique"               => "El campo :attribute ya ha sido tomado.",
    "url"                  => "El formato de :attribute es inválido.",
    "timezone"             => "El campo :attribute debe ser una zona horaria válida.",

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes'           => [
        'name' => 'Nombre',
        'first_name' => 'Nombres',
        'last_name' => 'Apellidos',
        'email' => 'Email',
        'password' => 'Contraseña',
        'confirmation' => 'Confirmación',
        'type' => 'Tipo',
        'description' => 'Descripción',
        'label' => 'Etiqueta',
        'value' => 'Valor',
        'comment' => 'Comentario',
        'phone' => 'Teléfono',
        'message' => 'Mensaje',
        'responsible_id' => 'Responsable',
    ],


];
