<?php
namespace App\developer_functions;

class Article_functions{
    
    public static function replace($input,$quary){
        $quary = $quary -> where('article', 'LIKE' ,"%{$input}%")->orderBy('created_at', 'desc')->get();
        return $quary;
    }
}
?>