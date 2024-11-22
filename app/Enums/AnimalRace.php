<?php
namespace App\Enums;

use Spatie\Enum\Enum;

/**
 * @method static self labrador()
 * @method static self frison()
 * @method static self pottok()
 * @method static self irishcob()
 * @method static self merinos()
 * @method static self solognotes()
 */
class AnimalRace extends Enum
{
    const LABRADOR = 'labrador';
    const FRISON = 'frison';
    const POTTOK = 'pottok';
    const IRISHCOB = 'irishcob';
    const MERINOS = 'merinos';
    const SOLOGNOTES = 'solognotes';
}