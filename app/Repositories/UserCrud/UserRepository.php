<?php
namespace App\Repositories\UserCrud;
use App\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Exceptions\Handler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class UserRepository implements UserRepositoryInterface {

    private $model;
    public function __construct(User $model)
    {
      $this->model=$model;
    }
    public function getAll()
    {
        return $this->model->all();
    } 
    public function show($id)
    {
        // try{
        //     $user=$this->model->find($id);
        //      if(!$user){
        //      throw new ModelNotFoundException("User with the id ".$id." doesn't exist");
        //      }
        //      return response()->json($user);
        // }
        // catch (\Exception $e) {
        //           return $e->getMessage();           
        //     }
        $user=$this->model->findOrFail($id);
        return $user;
    }
    public function update(array $attributes,$id)
    {
        $user=$this->model->findOrFail($id);
        $user->update($attributes);
        return $user;

        
    //  try{

    //     $user=$this->model->find($id);
    //      if(!$user){
    //      throw new ModelNotFoundException("User with the id ".$id." doesn't exist");
    //      }
    //     else
    //        {
    //        $user->update($attributes);
    //        return $user;
    //        }
    // }
    // catch (\Exception $e) {
   
    //           return $e->getMessage();      
    //    }
    }
    public function delete($id)
    {
        return $this->model->destroy($id);
        // try{

        //     $user=$this->model->destroy($id);
        //      if(!$user){
        //      throw new ModelNotFoundException("User with the id ".$id." doesn't exist");
        //      }
        //      return response()->json($user);
        // }
        // catch (\Exception $e) {
       
        //           return $e->getMessage();
                    
        //     }
                      
      }

}
?>
