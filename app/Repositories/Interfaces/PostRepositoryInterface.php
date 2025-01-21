<?php

namespace App\Repositories\Interfaces;

/**
 * Interface UserServiceInterface
 * @package App\Services\Interfaces
 */
interface PostRepositoryInterface extends BaseRepositoryInterface
{
    public function getAllPaginate();
    public function findBySlug($slug);
    
    public function allWithCategory();
    
    public function paginateWhereId($id,int $num);


}
