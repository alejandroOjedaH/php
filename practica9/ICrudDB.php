<?php namespace ICrudDB;

interface ICrudDB{
    public function table();
    public function insert($data);
    public function update($data, $where);
    public function delete($where);
}