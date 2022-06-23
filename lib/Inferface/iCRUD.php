<?php
interface iCRUD
{
    public function create($obj);
    public function read();
    public function update();
    public function delete();
}
