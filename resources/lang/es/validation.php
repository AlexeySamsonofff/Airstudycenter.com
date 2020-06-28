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

    'accepted'              => 'El atributo: debe ser aceptado.',
    'active_url'            => 'El atributo: no es una URL válida.',
    'after'                 => 'El atributo: debe ser una fecha después de: date.',
    'after_or_equal'        => 'El atributo: debe ser una fecha posterior o igual a: fecha.',
    'alpha'                 => 'El atributo: solo puede contener letras.',
    'alpha_dash'            => 'El atributo: solo puede contener letras, números, guiones y guiones bajos.',
    'alpha_num'             => 'El atributo: solo puede contener letras y números.',
    'array'                 => 'El atributo: debe ser un array.',
    'before'                => 'El atributo: debe ser una fecha antes de: date.',
    'before_or_equal'       => 'El atributo: debe ser una fecha anterior o igual a: fecha.',
    'between'              => [
        'numeric' => 'El atributo: debe ser mayor o igual que el valor.',
        'file'    => 'El atributo: debe ser mayor o igual: valor en kilobytes.',
        'string'  => 'El atributo: debe ser mayor que o igual: caracteres de valor.',
        'array'   => 'El atributo: debe tener: elementos de valor o más.',
    ],
    'boolean'               => 'El campo de atributo: debe ser verdadero o falso.',
    'confirmed'             => 'La confirmación del atributo: no coincide.',
    'date'                  => 'El atributo: no es una fecha válida.',
    'date_format'           => 'El atributo: no coincide con el formato: formato.',
    'different'             => 'El: atributo y: otro deben ser diferentes.',
    'digits'               => 'El atributo: debe ser: dígitos dígitos.',
    'digits_between'        => 'El atributo: debe estar entre: min y: max dígitos.',
    'dimensions'            => 'El atributo: tiene dimensiones de imagen no válidas.',
    'distinct'              => 'El campo de atributo: tiene un valor duplicado.',
    'email'                 => 'El atributo: debe ser una dirección de correo electrónico válida.',
    'exists'                => 'El atributo seleccionado: no es válido.',
    'file'                  => 'El atributo: debe ser un archivo.',
    'filled'                => 'El campo: atributo debe tener un valor.',
    'gt'                   => [
        'numeric' => 'El atributo: debe ser mayor o igual que el valor.',
        'file'    => 'El atributo: debe ser mayor o igual: valor en kilobytes.',
        'string'  => 'El atributo: debe ser mayor que o igual: caracteres de valor.',
        'array'   => 'El atributo: debe tener: elementos de valor o más.',
    ],
    'gte'                  => [
        'numeric' => 'El atributo: debe ser mayor o igual que el valor.',
        'file'    => 'El atributo: debe ser mayor o igual: valor en kilobytes.',
        'string'  => 'El atributo: debe ser mayor que o igual: caracteres de valor.',
        'array'   => 'El atributo: debe tener: elementos de valor o más.',
    ],
    'image'      => 'El atributo: debe ser una imagen.',
    'in'         => 'El atributo seleccionado: no es válido.',
    'in_array'   => 'El campo de atributo: no existe en: otro.',
    'integer'    => 'El atributo: debe ser un entero.',
    'ip'         => 'El atributo: debe ser una dirección IP válida.',
    'ipv4'       => 'El atributo: debe ser una dirección IPv4 válida.',
    'ipv6'       => 'El atributo: debe ser una dirección IPv6 válida.',
    'json'       => 'El atributo: debe ser una cadena JSON válida.',
    'lt'                   => [
        'numeric'   => 'El atributo: debe ser menor o igual que el valor.',
        'file'      => 'El atributo: debe ser menor o igual: valor en kilobytes.',
        'string'    => 'El atributo: debe ser menor o igual que el valor de los caracteres.',
        'array'     => 'El atributo: no debe tener más de: elementos de valor.',
    ],
    'lte'                  => [
        'numeric'   => 'El atributo: debe ser menor o igual que el valor.',
        'file'      => 'El atributo: debe ser menor o igual: valor en kilobytes.',
        'string'    => 'El atributo: debe ser menor o igual que el valor de los caracteres.',
        'array'     => 'El atributo: no debe tener más de: elementos de valor.',
    ],
    'max'                  => [
        'numeric'    => 'El atributo: no puede ser mayor que: max.',
        'file'       => 'El atributo: no puede ser mayor que: max kilobytes.',
        'string'     => 'El atributo: no puede ser mayor que: max caracteres.',
        'array'      => 'El atributo: no puede tener más de: elementos máximos.',
    ],
    'mimes'              => 'El atributo: debe ser un archivo de tipo:: valores.',
    'mimetypes'          => 'El atributo: debe ser un archivo de tipo:: valores.',
    'min'                => [
        'numeric'   => 'El atributo: debe ser al menos: min.',
        'file'      => 'El atributo: debe ser al menos: kilobytes min.',
        'string'    => 'El atributo: debe ser al menos: min caracteres.',
        'array'     => 'El atributo: debe tener al menos: elementos min.',
    ],
    'not_in'                => 'El atributo seleccionado: no es válido.',
    'not_regex'             => 'El formato del atributo: no es válido.',
    'numeric'               => 'El atributo: debe ser un número.',
    'present'               => 'El campo: atributo debe estar presente.',
    'regex'                 => 'El formato del atributo: no es válido.',
    'required'              => 'El campo: atributo es obligatorio.',
    'required_if'           => 'El campo de atributo: se requiere cuando: otro es: valor.',
    'required_unless'       => 'El campo de atributo: es obligatorio a menos que: otro esté en: valores.',
    'required_with'         => 'El campo de atributo: se requiere cuando: los valores están presentes.',
    'required_with_all'     => 'El campo de atributo: es obligatorio cuando: los valores están presentes.',
    'required_without'      => 'El campo de atributo: es obligatorio cuando: los valores no están presentes.',
    'required_without_all'  => 'El campo de atributo: es obligatorio cuando ninguno de los valores está presente.',
    'same'                  => 'El atributo: y: el otro debe coincidir.',
    'size'                 => [
        'numeric' => 'El atributo: debe ser: tamaño.',
        'file'    => 'El atributo: debe ser: tamaño kilobytes.',
        'string'  => 'El atributo: debe ser: caracteres de tamaño.',
        'array'   => 'El atributo: debe contener: elementos de tamaño.',
    ],
    'string'               => 'El atributo: debe ser una cadena.',
    'timezone'             => 'El atributo: debe ser una zona válida.',
    'unique'               => 'El atributo: ya ha sido tomado.',
    'uploaded'             => 'El atributo: no se pudo cargar.',
    'url'                  => 'El formato del atributo: no es válido.',

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
            'rule-name' => 'mensaje personalizado',
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

    'attributes' => [],

];
