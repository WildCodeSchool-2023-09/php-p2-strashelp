<?php

namespace App\Model;

class AnnonceManager extends AbstractManager
{
    public const TABLE = 'ad';

    public function selectAllAd(string $orderBy = 'published_date', string $direction = 'DESC'): array
    {
        $query = 'SELECT * FROM ' . static::TABLE . '  JOIN category ON ad.category_id = category.id 
        INNER JOIN ad_type ON ad.ad_type_id = ad_type.id ';
        if ($orderBy) {
            $query .= ' ORDER BY ' . $orderBy . ' ' . $direction . ' LIMIT 2';
        }
        return $this->pdo->query($query)->fetchAll();
    }
}
