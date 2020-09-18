<?php

namespace SomeCodeThatCanBeImportantInFuture;

use Illuminate\Database\Events\QueryExecuted;


//Рахує кількість запитів у базу даних
class Mysql
{


    public function start()
    {

        \DB::listen(function(QueryExecuted $queryExecuted) {
            echo $this->getEloquentSqlWithBindings($queryExecuted) . '<br>';
        });


    }




    /**
     * @param $query
     * @return string
     */
    public function getEloquentSqlWithBindings(QueryExecuted $query)
    {
        return vsprintf(str_replace('?', '%s', $query->sql), collect($query->bindings)->map(function ($binding) {
            return is_numeric($binding) ? $binding : "'{$binding}'";
        })->toArray());
    }










}
