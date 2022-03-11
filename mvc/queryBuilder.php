<?php

declare(strict_types=1);

final class queryBuilder
{
    public string $column;
    public string $table;
    public string $tableJoin;
    public string $onJoin;
    public string $columnJoin;
    public string $terms;
    public string $sortByWord;
    public string $wordORNumber;
    public string $termsForGroupBy;
    public object $connect;

    public function __construct($connect)
    {
        $this->connect = $connect;
    }

    public function select($column): self
    {
        $this->column = "SELECT $column";

        return $this;
    }

    public function from($table): self
    {
        $this->table = "FROM $table";

        return $this;
    }

    public function innerJoin($tableJoin, $onJoin, $columnJoin): self
    {
        $this->tableJoin = "INNER JOIN $tableJoin";
        $this->columnJoin = $columnJoin;
        $this->onJoin = "ON $onJoin = $columnJoin";

        return $this;
    }

    public function where($terms): self
    {
        $this->terms = "WHERE $terms";

        return $this;
    }

    public function groupBy($wordOrNumber): self
    {
        $this->wordORNumber = "GROUP BY $wordOrNumber";

        return $this;
    }

    public function having($termsForGroupBy): self
    {
        $this->termsForGroupBy = "HAVING $termsForGroupBy";

        return $this;
    }

    public function orderBy($sortByWord): self
    {
        $this->sortByWord = "ORDER BY $sortByWord";

        return $this;
    }

    public function fetchAll()
    {
        if (!isset($this->tableJoin) || !isset($this->onJoin) || !isset($this->columnJoin)) {
            $this->tableJoin = '';
            $this->onJoin = '';
            $this->columnJoin = '';
        }

        if (!isset($this->terms)) {
            $this->terms = '';
        }

        if (!isset($this->wordORNumber)) {
            $this->wordORNumber = '';
        }

        if (!isset($this->termsForGroupBy)) {
            $this->termsForGroupBy = '';
        }

        if (!isset($this->sortByWord)) {
            $this->sortByWord = '';
        }

        if (!isset($this->column)) {
            throw new Exception('укажите параметр SELECT');
        }

        if (!isset($this->table)) {
            throw new Exception('укажите параметр FROM');
        }

        $queryRequest = $this->connect->query("$this->column $this->table $this->tableJoin $this->onJoin $this->columnJoin $this->terms $this->wordORNumber $this->termsForGroupBy $this->sortByWord");
        $rows = [];
        while ($row = $queryRequest->fetch()) {
            $rows[] = $row;
        }

        return $rows;
    }
}