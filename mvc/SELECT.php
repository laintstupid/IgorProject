<?php

declare(strict_types=1);

require 'UserBase.php';


final class queryBuilder
{

    public $wordORNumber;
    public $column;
    public $table;
    public $terms;
    public $sortByWord;
    public $termsForGroupBy;


    private function select($column): self
    {
        $this->column = $column;

        return $this;
    }

    private function from($table): self
    {
        $this->table = $table;

        return $this;
    }

    private function where($terms): self
    {
        $this->terms = $terms;

        return $this;
    }

    private function orderBy($sortByWord): self
    {
        $this->sortByWord = $sortByWord;

        return $this;
    }

    private function groupBy($wordOrNumber): self
    {
        $this->wordORNumber = $wordOrNumber;

        return $this;
    }

    private function having($termsForGroupBy): self
    {
        $this->termsForGroupBy = $termsForGroupBy;

        return $this;
    }


    public function fetchAll()
    {
        var_dump("SELECT $this->column FROM $this->table ORDER BY $this->sortByWord WHERE $this->terms GROUP BY $this->wordORNumber HAVING $this->termsForGroupBy");
    }
}