<?php

/**
 * Kernel.php
 *
 * PHP version 8.4.12
 *
 * @category src
 * @package  App
 * @author   @ZouariOmar <zouariomar20@gmail.com>
 * @license  GPL3.0 License
 * @link     https://example.com
 */

namespace App;

use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Component\HttpKernel\Kernel as BaseKernel;

class Kernel extends BaseKernel
{
    use MicroKernelTrait;
}
