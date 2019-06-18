<?php
namespace OCFram;

class Manager
{
  protected $dao;
  
  public function __construct()
  {
    $this->dao = PDOFactory::getMysqlconnexion();
  }
}