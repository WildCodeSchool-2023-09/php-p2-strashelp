<?php

namespace App\Model;

use PDO;

class CategoryManager extends AbstractManager
{
    public const TABLE = 'category';

    public function selectAll(string $orderBy = 'name', string $direction = 'ASC'): array
    {
        $query = 'SELECT * FROM ' . static::TABLE;
        if ($orderBy) {
            $query .= ' ORDER BY ' . $orderBy . ' ' . $direction;
        }

        return $this->pdo->query($query)->fetchAll();
    }

    public function search(string $categorieName, string $searchBar)
    {
        $statement = $this->pdo->prepare('SELECT * FROM ad LEFT JOIN category ON ad.category_id = category.id 
        WHERE  category.name = :categorie OR
        title LIKE :searchbar');
        $statement->bindValue(':categorie', $categorieName);
        $statement->bindValue(':searchbar', $searchBar . "%");
        $statement->execute();

        return $statement->fetchAll();
    }
}
