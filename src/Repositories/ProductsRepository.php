
<?php 


class ProductsRepository extends Repository
{

    
    public function __construct(PgsqlConnectionPool $connectionPool)
    {
        
        parent::__construct($connectionPool);
        $this->pgsqlConnectionPool = $connectionPool;
        $this->table = "tables.products";
    }
    public function getPgsqlConnection()
    {
        return $this->pgsqlConnectionPool->getConnection();
    }

    


    
}
