<?php 
namespace App\Repository\Contract; 


interface BlogRepositoryContract {
    public function index (bool $leftJoinUsers=false):object; 
    public function store (array $data):object ; 
    public function show(mixed $id , $leftJonUsers=false):object|null; 
    public function edit(mixed $id):object|null; 
    public function create():array; 
    public function update(array $data , int $id):bool; 
    public function destroy(int $id):bool; 

}