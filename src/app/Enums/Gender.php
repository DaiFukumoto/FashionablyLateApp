<?php

namespace app\Enums;

// 性別
enum Gender: int
{
    case Male = 1;
    case Female = 2;
    case Other = 3;

    public function label(): string
    {
        return match ($this) {
            Gender::Male => '男性',
            Gender::Female => '女性',
            Gender::Other => 'その他'
        };
    }
}
