<?php

namespace App\Services\Interfaces;

/**
 * Interface UserServiceInterface
 * @package App\Services\Interfaces
 */
interface PostServiceInterface
{
    public function CRUD($type,$request);
    public function create($request);
    public function paginate() ;
}
