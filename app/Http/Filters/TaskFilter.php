<?php


namespace App\Http\Filters;


use Illuminate\Database\Eloquent\Builder;

class TaskFilter extends AbstractFilter
{
    public const TITLE = 'title';
    public const DESCRIPTION = 'description';
    public const STATUS = 'status';
    public const DEADLINE='deadline';



    protected function getCallbacks(): array
    {
        return [
            self::TITLE => [$this, 'title'],
            self::DESCRIPTION => [$this, 'description'],
            self::STATUS => [$this, 'status'],
            self::DEADLINE=> [$this, 'deadline']
        ];
    }

    public function title(Builder $builder, $value)
    {
        $builder->where('title', 'like', "%{$value}%");
    }

    public function description(Builder $builder, $value)
    {
        $builder->where('description', 'like', "%{$value}%");
    }

    public function status(Builder $builder, $value)
    {
        $builder->where('status','like', "%{$value}%");
    }
    public function deadline(Builder $builder, $value)
    {
        $builder->where('deadline','like', "%{$value}%");
    }

}
