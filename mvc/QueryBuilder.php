<?php

declare(strict_types=1);

final class QueryBuilder
{
    private string $column;
    private string $table;
    private string $tableJoin;
    private string $onJoin;
    private string $columnJoin;
    private string $terms;
    private string $sortByWord;
    private string $wordORNumber;
    private string $termsForGroupBy;
    private array $parameters;
    private PDO $connect;

    public function __construct(PDO $connect)
    {
        $this->connect = $connect;
        $this->parameters = [];
    }

    public function select(string $column): self
    {
        $this->column = "SELECT $column";

        return $this;
    }

    public function from(string $table): self
    {
        $this->table = "FROM $table";

        return $this;
    }

    public function innerJoin(string $tableJoin, string $onJoin, string $columnJoin): self
    {
        $this->tableJoin = "INNER JOIN $tableJoin";
        $this->columnJoin = $columnJoin;
        $this->onJoin = "ON $onJoin = $columnJoin";

        return $this;
    }

    public function where(string $terms): self
    {
        $this->terms = "WHERE $terms";

        return $this;
    }

    public function groupBy(string $wordOrNumber): self
    {
        $this->wordORNumber = "GROUP BY $wordOrNumber";

        return $this;
    }

    public function having(string $termsForGroupBy): self
    {
        $this->termsForGroupBy = "HAVING $termsForGroupBy";

        return $this;
    }

    public function orderBy(string $sortByWord): self
    {
        $this->sortByWord = "ORDER BY $sortByWord";

        return $this;
    }

    public function setParameter(string $name, $value): self
    {
        $this->parameters[$name] = $value;

        return $this;
    }

    /**
     * @return array
     */
    public function fetchAll(): array
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

        $queryRequest = $this->connect->prepare("$this->column $this->table $this->tableJoin $this->onJoin $this->columnJoin $this->terms $this->wordORNumber $this->termsForGroupBy $this->sortByWord");
        $queryRequest->execute($this->parameters);
        $rows = [];
        while ($row = $queryRequest->fetch()) {
            $rows[] = $row;
        }

        return $rows;
    }
}