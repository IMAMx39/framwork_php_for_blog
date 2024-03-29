<?php

namespace Core\QueryBuilder;

use function implode;

final class Insert
{
    private string $table;
    private array $value;

    public function __construct(string $table, array $value)
    {
        $this->table = $table;
        $this->value = $value;
    }

    public function __toString(): string
    {
        return 'INSERT INTO ' . $this->table . ' (' . implode(', ', array_keys($this->value)) . ') VALUES (' . implode(',', array_values($this->value)) . ')';
    }

}