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

    'accepted'             => 'The: attributet måste accepteras.',
    'active_url'           => 'Attributet är inte en giltig webbadress.',
    'after'                => 'The: attributet måste vara ett datum efter: datum.',
    'after_or_equal'       => 'The: attributet måste vara ett datum efter eller lika med: datum.',
    'alpha'                => 'The: attributet får bara innehålla bokstäver.',
    'alpha_dash'           => 'Attributet får bara innehålla bokstäver, siffror, streck och understreck.',
    'alpha_num'            => 'The: attributet får bara innehålla bokstäver och siffror.',
    'array'                => 'The: attributet måste vara en array.',
    'before'               => 'The: attributet måste vara ett datum före: datum.',
    'before_or_equal'      => 'The: attributet måste vara ett datum före eller lika med: datum.',
    'between'              => [
        'numeric' => 'The: attributet måste vara mellan: min och: max.',
        'file'    => 'The: attributet måste vara mellan: min och: max kilobytes.',
        'string'  => 'The: attributet måste vara mellan: min och: max tecken.',
        'array'   => 'The: attributet måste ha mellan: min och: max objekt.',
    ],
    'boolean'               => 'Attributfältet måste vara sant eller felaktigt.',
    'confirmed'             => 'The: Attributbekräftelsen matchar inte.',
    'date'                  => 'Attributet är inte ett giltigt datum.',
    'date_format'           => 'Attributet matchar inte formatet: format.',
    'different'             => 'The: attributet och: andra måste vara olika.',
    'digits'                => 'Den: attributet måste vara: siffror siffror.',
    'digits_between'        => 'The: attributet måste vara mellan: min och: max siffror.',
    'dimensions'            => 'The: attributet har ogiltiga bild dimensioner.',
    'distinct'              => 'The: attributfältet har ett duplikatvärde.',
    'email'                 => 'The: attributet måste vara en giltig e-postadress.',
    'exists'                => 'Den valda: attributet är ogiltigt.',
    'file'                  => 'The: attributet måste vara en fil.',
    'filled'                => 'The: attributfältet måste ha ett värde.',
    'gt'                   => [
        'numeric' => 'The: attributet måste vara mellan: min och: max.',
        'file'    => 'The: attributet måste vara mellan: min och: max kilobytes.',
        'string'  => 'The: attributet måste vara mellan: min och: max tecken.',
        'array'   => 'The: attributet måste ha mellan: min och: max objekt.',
    ],
    'gte'                  => [
        'numeric' => 'The: attributet måste vara mellan: min och: max.',
        'file'    => 'The: attributet måste vara mellan: min och: max kilobytes.',
        'string'  => 'The: attributet måste vara mellan: min och: max tecken.',
        'array'   => 'The: attributet måste ha mellan: min och: max objekt.',
    ],
    'image'         => 'The: attributet måste vara en bild.',
    'in'            => 'Den valda: attributet är ogiltigt.',
    'in_array'      => 'Attributfältet existerar inte i: annat.',
    'integer'       => 'The: attributet måste vara ett heltal.',
    'ip'            => 'Attributet måste vara en giltig IP-adress.',
    'ipv4'          => 'Attributet måste vara en giltig IPv4-adress.',
    'ipv6'          => 'Attributet måste vara en giltig IPv6-adress.',
    'json'          => 'Attributet måste vara en giltig JSON-sträng.',
    'lt'                   => [
        'numeric' => 'The: attributet måste vara mellan: min och: max.',
        'file'    => 'The: attributet måste vara mellan: min och: max kilobytes.',
        'string'  => 'The: attributet måste vara mellan: min och: max tecken.',
        'array'   => 'The: attributet måste ha mellan: min och: max objekt.',
    ],
    'lte'                  => [
        'numeric' => 'The: attributet måste vara mellan: min och: max.',
        'file'    => 'The: attributet måste vara mellan: min och: max kilobytes.',
        'string'  => 'The: attributet måste vara mellan: min och: max tecken.',
        'array'   => 'The: attributet måste ha mellan: min och: max objekt.',
    ],
    'max'                  => [
        'numeric' => 'The: attributet måste vara mellan: min och: max.',
        'file'    => 'The: attributet måste vara mellan: min och: max kilobytes.',
        'string'  => 'The: attributet måste vara mellan: min och: max tecken.',
        'array'   => 'The: attributet måste ha mellan: min och: max objekt.',
    ],
    'mimes'                => 'Attributet måste vara en fil av typen:: värden.',
    'mimetypes'            => 'Attributet måste vara en fil av typen:: värden.',
    'min'                  => [
        'numeric' => 'The: attributet måste vara mellan: min och: max.',
        'file'    => 'The: attributet måste vara mellan: min och: max kilobytes.',
        'string'  => 'The: attributet måste vara mellan: min och: max tecken.',
        'array'   => 'The: attributet måste ha mellan: min och: max objekt.',
    ],

    'not_in'                => 'Den valda: attributet är ogiltigt.',
    'not_regex'             => 'Det: attributformatet är ogiltigt.',
    'numeric'               => 'The: attributet måste vara ett nummer.',
    'present'               => 'Den: attributfältet måste vara närvarande.',
    'regex'                 => 'Det: attributformatet är ogiltigt.',
    'required'              => 'Den: attributfältet är obligatoriskt.',
    'required_if'           => 'Den: attributfältet krävs när: annat är: värde.',
    'required_unless'       => 'Den: attributfältet krävs om inte annat är i: värden.',
    'required_with'         => 'The: Attributfältet krävs när: värden är närvarande.',
    'required_with_all'     => 'The: Attributfältet krävs när: värden är närvarande.',
    'required_without'      => 'Fältet: attributet krävs när: värden inte är närvarande.',
    'required_without_all'  => 'Den: attributfältet krävs när ingen av: värden är närvarande.',
    'same'                  => 'The: attributet och: andra måste matcha.',
    'size'                 => [
        'numeric' => 'The: attributet måste vara mellan: min och: max.',
        'file'    => 'The: attributet måste vara mellan: min och: max kilobytes.',
        'string'  => 'The: attributet måste vara mellan: min och: max tecken.',
        'array'   => 'The: attributet måste ha mellan: min och: max objekt.',
    ],
    'string'               => 'The: attributet måste vara en sträng.',
    'timezone'             => 'The: attributet måste vara en giltig zon.',
    'unique'               => 'The: attributet har redan tagits.',
    'uploaded'             => 'Den: attributet misslyckades med att ladda upp.',
    'url'                  => 'Det: attributformatet är ogiltigt.',

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
            'rule-name' => 'custom-meddelande',
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
