<?php

namespace App\Helpers;

class Pagination
{
    public static function paginate($totalItems, $itemsPerPage, $currentPage)
    {
        $totalPages = ceil($totalItems / $itemsPerPage);
        $pagination = [
            'total_items' => $totalItems,
            'items_per_page' => $itemsPerPage,
            'current_page' => $currentPage,
            'total_pages' => $totalPages,
        ];

        return $pagination;
    }
}
?>
