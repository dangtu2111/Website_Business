<?php

namespace App\Repositories\Interfaces;

/**
 * Interface UserServiceInterface
 * @package App\Services\Interfaces
 */
interface CategoryRepositoryInterface extends BaseRepositoryInterface
{
    public function getAllPaginate();
    public function findBySlug($slug);
    public function whereCategory($slug);
    public function allWithPost();
}
