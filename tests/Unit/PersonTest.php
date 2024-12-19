<?php

use Rosebud\DataTransferObjects\People\PersonData;
use Rosebud\Person;

it('finds person by imdb id', function () {
    $api_key = getTestingEnv('TMDB_API_KEY');

    $person = (new Person(api_key: $api_key))->find('nm0000093'); // Brad Pitt

    expect($person)
        ->toBeInstanceOf(PersonData::class)
        ->and($person->name)->toBe('Brad Pitt');
});