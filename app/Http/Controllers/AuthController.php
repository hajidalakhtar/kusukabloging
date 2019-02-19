<?php
namespace App\Http\Controllers;
use App\User;
use Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;
class AuthController extends Controller
{
   
  public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->stateless()->redirect();
    }

    /**
     * Obtain the user information from provider.  Check if the user already exists in our
     * database by looking up their provider_id in the database.
     * If the user exists, log them in. Otherwise, create a new user then log them in. After that
     * redirect them to the authenticated users homepage.
     *
     * @return Response
     */
    public function handleProviderCallback($provider)
    {
        $user = Socialite::driver($provider)->stateless()->user();
        $authUser = $this->findOrCreateUser($user, $provider);
        Auth::login($authUser, true);
        return redirect('/');
    }

    /**
     * If a user has registered before using social auth, return the user
     * else, create a new user object.
     * @param  $user Socialite user object
     * @param $provider Social auth provider
     * @return  User
     */
    public function findOrCreateUser($user, $provider)
    {
        $authUser = User::where('provider_id', $user->id)->first();
        if ($authUser) {
            return $authUser;
        }
        else{
            // $data = User::create([
            //     'name'     => $user->name,
            //     'email'    => !empty($user->email)? $user->email : '' ,
            //     'provider' => $provider,
            //     'provider_id' => $user->id,
            $data = new User ;
            $data->name = $user->name;
            $data->email = !empty($user->email)? $user->email : '' ;
            $data->poto = $user->avatar;
            $data->provider = $provider;
            $data->provider_id = $user->id;
            return $data;
        }
    }
}