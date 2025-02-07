<?php

namespace App\Services\Interfaces;

/**
 * Interface UserServiceInterface
 * @package App\Services\Interfaces
 */
interface CategoryServiceInterface
{
    public function CRUD($type,$request);
    public function create($request);
    public function paginate() ;
    public function delete($id) ;
    
}
