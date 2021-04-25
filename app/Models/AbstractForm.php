<?php
namespace App\Models;

use App\Models\Interfaces\FormInterface;

abstract class AbstractForm implements FormInterface
{
    public function __construct($values = [])
    {
        foreach ($values as $key => $value) {
            if (property_exists($this, $key)) {
                $this->$key = $value;
            }
        }
    }
}
