<?php
/**
 * Created by PhpStorm.
 * User: MACHENIKE
 * Date: 2018/9/4
 * Time: 17:43
 */

interface DbConnect{
    public function connect();

    public function select($sql);

    public function add($sql);

    public function update($sql);
}