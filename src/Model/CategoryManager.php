<?php

namespace App\Model;

use PDO;

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
}
