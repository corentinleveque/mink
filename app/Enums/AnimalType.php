<?php
namespace App\Enums;

use Spatie\Enum\Enum;

/**
 * @method static self chien()
 * @method static self cheval()
 * @method static self brebis()
 * @method static self cochon()
 */
class AnimalType extends Enum
{
    const DOG = 'chien';
    const HORSE = 'cheval';
    const SHEEP = 'brebis';
    const PIG = 'cochon';
}