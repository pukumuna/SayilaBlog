<?php
namespace FramWK;

class Manager
{
  protected $dao;
  
  public function __construct()
  {
    $this->dao = PDOFactory::getMysqlconnexion();
  }
}