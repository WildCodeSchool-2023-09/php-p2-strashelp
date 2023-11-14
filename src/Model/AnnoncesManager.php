<?php

namespace App\Model;

class AnnoncesManager extends AbstractManager
{
    public const TABLE = 'ad';

    public function selectAll(string $orderBy = 'published_date', string $direction = 'DESC'): array
    {
        $query = 'SELECT * FROM ' . static::TABLE;
        if ($orderBy) {
            $query .= ' ORDER BY ' . $orderBy . ' ' . $direction . ' LIMIT 9';
        }
        return $this->pdo->query($query)->fetchAll();
    }
}
