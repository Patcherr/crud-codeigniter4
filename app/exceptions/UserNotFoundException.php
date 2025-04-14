<?php
namespace App\Exceptions;

use CodeIgniter\Exceptions\FrameworkException;
use CodeIgniter\Exceptions\ExceptionInterface;

class UsuarioNoEncontradoException extends FrameworkException implements ExceptionInterface
{
    public static function forUsuarioNoEncontrado($id)
    {
        return new static("El usuario con ID {$id} no fue encontrado.");
    }
}