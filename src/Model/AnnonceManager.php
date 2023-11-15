<?php

namespace App\Model;

class AnnonceManager extends AbstractManager
{
    public const TABLE = 'ad';

    // Fonction pour les cards des annonces avec un affichage par 3
    public function selectAll(string $orderBy = 'published_date', string $direction = 'DESC'): array
    {
        $query = 'SELECT * FROM ' . static::TABLE;
        if ($orderBy) {
            $query .= ' ORDER BY ' . $orderBy . ' ' . $direction . ' LIMIT 3';
        }
        return $this->pdo->query($query)->fetchAll();
    }

    public function createAnnonce(array $ads)
    {
        $statement = $this->pdo->prepare("INSERT INTO " . self::TABLE .
        " (`ad_type`, `title`, `description`, `image`, `published_date`, `username`, `localisation`) 
        VALUES (:ads_type, :title, :description, :image, :published_date, :username, :localisation)");
        $statement->bindValue(':ad_type', $ads['ads_type'], \PDO::PARAM_INT);
        $statement->bindValue(':title', $ads['title'], \PDO::PARAM_STR);
        $statement->bindValue(':description', $ads['description'], \PDO::PARAM_STR);
        $statement->bindValue(':image', $ads['image'], \PDO::PARAM_STR);
        $statement->bindValue(':published_date', $ads['published_date'], \PDO::PARAM_INT);
        $statement->bindValue(':username', $ads['username'], \PDO::PARAM_STR);
        $statement->bindValue(':localisation', $ads['localisation'], \PDO::PARAM_STR);

        $statement->execute();
        return $this->pdo->lastInsertId();
    }
}
