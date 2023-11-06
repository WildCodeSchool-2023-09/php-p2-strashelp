<?php 

namespace App\Model;

class UserManager extends AbstractManager
{   
    public const TABLE='users';

    public function selectOneByIdentifiant($identifiant): array
    {
        $statement = $this->pdo->prepare("SELECT * FROM " . static::TABLE . " WHERE username=:identifiant OR email =:identifiant");
        $statement->bindValue(':identifiant', $identifiant);
        $statement->execute();

        return $statement->fetch();
    }
}