<?php

namespace App\Model;

use pdo;

class CategoryManager extends AbstractManager
{
    public const TABLE = 'category';

    public function insertCategory(array $addCategory): int
    {
        $statement = $this->pdo->prepare("INSERT INTO " . self::TABLE . " (`name`) VALUES (:ajout)");
        $statement->bindValue(':ajout', $addCategory['ajout'], PDO::PARAM_STR);
        $statement->execute();
        return (int)$this->pdo->lastInsertId();
    }

    /*public function selectCategories()
    {
        $query = ('SELECT * FROM ' . static::TABLE);
        return $this->pdo->query($query)->fetchAll();
    }*/

    public function selectAll(string $orderBy = 'name', string $direction = 'ASC'): array
    {
        $query = 'SELECT * FROM ' . static::TABLE;
        if ($orderBy) {
            $query .= ' ORDER BY ' . $orderBy . ' ' . $direction;
        }

        return $this->pdo->query($query)->fetchAll();
    }

    public function search(string $searchbar)
    {
        $statement = $this->pdo->prepare('SELECT * FROM ad LEFT JOIN category ON ad.category_id = category.id 
        WHERE description LIKE :searchbar OR title LIKE :searchbar LIMIT 3');

        $statement->bindValue(':searchbar', $searchbar . "%");
        $statement->execute();

        return $statement->fetchAll();
    }

    public function searchCat(string $categorie)
    {
        $statement = $this->pdo->prepare('SELECT * FROM ad LEFT JOIN category ON ad.category_id = category.id 
        WHERE  category.id = :categorie LIMIT 3');

        $statement->bindValue(':categorie', $categorie);
        $statement->execute();

        return $statement->fetchAll();
    }
}
