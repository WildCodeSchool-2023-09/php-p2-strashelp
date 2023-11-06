<?php

namespace App\Model;

class AnnonceManager extends AbstractManager
{
    public const TABLE = 'ads';

    public function selectAll(string $orderBy = 'published_date', string $direction = 'DESC'): array
    {
        $query = 'SELECT * FROM ' . static::TABLE;
        if ($orderBy) {
            $query .= ' ORDER BY ' . $orderBy . ' ' . $direction . ' LIMIT 3';
        }
        return $this->pdo->query($query)->fetchAll();
    }
}
