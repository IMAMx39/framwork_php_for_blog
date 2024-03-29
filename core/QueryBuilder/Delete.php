<?php

namespace Core\QueryBuilder;

class Delete
{
    private string $table;
    private array $where = [];

    public function __construct(string $table)
    {
        $this->table = $table;
    }

    public function __toString(): string
    {
        return 'DELETE FROM ' . $this->table . ($this->where !== [] ? ' WHERE ' . \implode(' AND ', $this->where) : '');
    }

    public function where(string ...$where): self
    {
        foreach ($where as $arg) {
            $this->where[] = $arg;
        }
        return $this;
    }
}