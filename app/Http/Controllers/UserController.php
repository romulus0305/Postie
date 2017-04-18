<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Comment;
Use Validator;

use Illuminate\Support\Facades\Auth;



class UserController extends Controller
{
    /**
     * Display User index page
     * @param int $id
     * @param arr $data
     * @return \Illuminate\Http\Response
     */

      public function index($id)
      {

        if ($data['user'] = User::find($id)) {
          # code...
       
       
        $data['comments'] = $data['user']->comments;
        // dd($data['comments']);
        $data['users_last_post'] = $data['user']
        ->posts()
        ->orderBy('created_at','desc')
        ->first();

        $data['users_posts'] = $data['user']->posts->all();

        

        return view('postie.user.index',compact('data'));
      }

      return redirect('/');

      }


    public function editInfo($id)
    {


   

        if (request('password')) {
            $this->validate(request(),[

                'password'=>'min:6',
                'name'=>'required',
                'email'=>'required|email', 

                ]);

            
            $input=[

            'name'=> request('name'),
            'email'=> request('email'),
            'password'=> bcrypt(trim(request('password')))

            ];
        }
        else
        {
             $this->validate(request(),[

                'name'=>'required',
                'email'=>'required|email', 
            

            ]);
            
            $input=[

                'name'=> request('name'),
                'email'=> request('email'),

            ];
        }

       
         User::whereId($id)->update($input);
         session()->flash('update_message','Profile info updated');
         return redirect()->back();
    }





    public function deleteAccount($id)
    {
      if (Auth::user()) {
         User::find($id)->delete();
       } 
      

      session()->flash('deleted_account','Account Deleted');
      return redirect('/');
    }


 public function about()
    {
        return view('postie.about');
    }


















}
