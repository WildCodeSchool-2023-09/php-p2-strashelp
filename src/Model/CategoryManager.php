<?php

namespace App\Model;

use PDO;

class CategoryManager extends AbstractManager
{
    public const TABLE = 'category';

    public function selectByName(string $name): array
    {
        $statement = $this->pdo->prepare("SELECT * FROM" . self::TABLE . "WHERE name =:name");
        $statement->bindValue('name', $name);
        return $statement->fetch();
    }

    public function selectAll(string $orderBy = '', string $direction = 'ASC'): array
    {
        $query = 'SELECT * FROM ' . static::TABLE;
        if ($orderBy) {
            $query .= ' ORDER BY ' . $orderBy . ' ' . $direction;
        }

        return $this->pdo->query($query)->fetchAll();
    }
}
