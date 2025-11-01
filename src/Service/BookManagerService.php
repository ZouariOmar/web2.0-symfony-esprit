<?php

namespace App\Service;

use App\Entity\Author;

final readonly class BookManagerService
{
    final public static function countBooksByAuthor(Author &$author): int
    {
        return $author->getBooks()->count();
    }

    /**
     * Return author(s) that have 3 or more books
     *
     * @param array $author Description
     * @return array
     */
    final public static function bestAuthors(array &$authors): array
    {
        $result = [];
        foreach ($authors as $author) {
            if ($this->countBooksByAuthor($author) > 3) {
                $result->add($author);
            }
        }
        return $result;
    }
}
