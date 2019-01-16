<?php

namespace App\Http\Controllers;

use App\Notifications\ResendEmailVarificationLink;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VarificationController extends Controller
{
    public function emailVarify($confirm_code){
    	$user = User::where('confirmation_code',$confirm_code)->firstOrFail();
        $user->login_enabled = 1;
        $user->confirmation_code = null;
        $user->save();
        flash('Yeahh', 'Email Successfully Verified', 'success');
        return redirect(URL_USERS_LOGIN);
    }

    public function resendVerificatinLink( Request $request ){
          $user  = User::where('email','=',$request->email)->first();

          if ($user->login_enabled == '1') {
            flash('Opss', 'User Already Activated','error');
            return redirect(URL_USERS_LOGIN);
          }
          DB::beginTransaction();

         try{

         if($user!=null){

           $confirmCode = $user->confirmation_code;
           $token = EMAIL_VARIFY. '/' .$confirmCode;

           $user->notify(new \App\Notifications\ResendEmailVarificationLink($user,$token));

           flash('Success', 'varification_link_send_to_your_email', 'success');
         }
         else{

            flash('Ooops','email_is_not_existed','error');
         }
      }
      catch(Exception $ex){
          DB::rollBack();
         flash('oops...!', $ex->getMessage(), 'error');

      } 
        return redirect(URL_USERS_LOGIN);
         
     } 

    public function SendOtp(){
      $user = Auth::user();
      $userPhone = $user->phone;
      $otp = rand(10000,99999);
      $userSlug = $user->slug;

      $dbUser = User::where('phone',$userPhone)->first();
      $dbUser->otp = $otp;
      $dbUser->otp_form = 1;
      $dbUser->save();

      $templateId = 720;
      $field = array(
      "sender_id" => "CBRWAV",
      "language" => "english",
      "route" => "qt",
      "numbers" => $userPhone,
      "message" => $templateId,
      "variables" => "{#AA#}",
      "variables_values" => $otp
    );

    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://www.fast2sms.com/dev/bulk",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => json_encode($field),
      CURLOPT_HTTPHEADER => array(
        "authorization: itaqRCmpGPhgUAJvZNIu5B1Q3FkV7fcOEWoLMYz2jX8yblD4edFdGX6OPCaI5RHYVbJhK9Z4rDMoTlEu",
        "cache-control: no-cache",
        "accept: */*",
        "content-type: application/json"
      ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
      echo "cURL Error #:" . $err;
    } else {
      echo $response;
    }

      flash('success', 'Otp Send','Success');
      return redirect('users/edit/'.$userSlug);
      
     }

    public function verifyOtp(Request $request){
        
      $dbUser   = Auth::user();
      $dbOtp    = $dbUser->otp;
      $dbPhone  = $dbUser->phone;
      $userSlug = $dbUser->slug;

      $inputOtp = $request->otp;
      
        if ($dbOtp == $inputOtp) {
          
          $user = User::where('phone', $dbPhone)->first();
          $user->otp = null;
          $user->otp_form = 0;
          $user->phone_verify = 1;
          $user->save();
          flash('Success', 'Mobile Number Successfully Varified', 'success');
          return redirect('users/edit/'.$userSlug);
        }
        flash('Opss', 'Invaild Otp', 'error');
        return redirect('users/edit/'.$userSlug);
     }
    public function changePhone(){
    $user = Auth::user();
    $userSlug = $user->slug;
    $userPhone = $user->phone;

    $dbUser = User::where('phone',$userPhone)->first();
    $dbUser->otp = null;
    $dbUser->otp_form = 0;
    $dbUser->save();
    return redirect('users/edit/'.$userSlug);
  }

}
