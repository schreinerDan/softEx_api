<?php

class ProductsService extends Service
{
       public function __construct($requestMethod,$method, $param)
    {
        //Singleton Garanted
        parent::__construct($requestMethod,$method, $param);
        $dbi = PgsqlSingleton::getInstance();
        $this->repository = new ProductsRepository($dbi);
        if($this->isDefaultRequest()){

            $this->processDefaultRequest();
        }else {
            $this->processCustomRequest();
        }
    }
    
    public function getByCategory($id)
    {
        return $this->repository->getCById($id);
    }
    public function processCustomRequest()
    {
        $response = $this->notFoundResponse();
        switch ($this->requestMethod) {
            case 'GET':
                if ($this->method=="getByCategory" && $this->param!=null) {
                    $response = $this->getById($this->param);
                } 
                break;
            // case 'POST':
                
            //     break;
            // case 'PUT':
                
            //     break;
            // case 'DELETE':
            //     break;
            default:

                $response = $this->notFoundResponse();
                break;
        }
        header($response['status_code_header']);
        if ($response['body']) {
            echo $response['body'];
        }
    }

   
  
}
