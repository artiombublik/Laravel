<?php

namespace App;
use App\Field;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
	public $timestamps = false;
	protected static $fieldData = false;
    protected $fillable = ['type','fname', 'lname', 'email', 'password'];


    public function fields()
    {
        return $this->belongsToMany('App\Field');
    }

    public static function getUserTypes(){
            $count = DB::table('users')->select(DB::raw('type,count(*)'))->groupBy('type')->get();
            return count($count);
    }

    public function getBaseFieldLabel($field){
    	$map = array(
    		'id' 		=> 	'User Id',
    		'fname' 	=> 	'First Name',
    		'lname'		=>	'Last Name',
    		'email'		=>	'Email',
    		'password'	=>	'Password',
    		'type'		=>	'User Type'
    	);
    	if(isset($map[$field])) return $map[$field];
    	return $field;
    }

	public function print_details(){
		$user = $this->toArray();
		if(!static::$fieldData){
			$fields = DB::table('fields')
	            ->leftJoin('field_user', 'fields.id', '=', 'field_user.field_id')
	            ->select('fields.*', 'field_user.value', 'field_user.user_id')
	            ->get()->toArray();
	           static::$fieldData =  $fields;
	    }
	    
	    $new_user = array();
	    foreach(static::$fieldData as $field){
	    	if($field->type == $user['type']){
		    	if(!isset($user[$field->label])) $user[$field->label] = '';
		    	if($field->user_id == $user['id']) $user[$field->label] = $field->value;
	    	}
        }
        $html = '<div class="user-wrapper">';
        foreach($user as $key => $value){
        	$new_key = $this->getBaseFieldLabel($key);
        	if($key == 'type') $value == 0 ? $value = 'Demo' : $value = 'Live';
        	$new_user[$new_key] = $value;
        	$html.="<p><strong>{$new_key}</strong> : {$value}</p>";
        }
        $html.= '</div>';
		return $html;
	}

}
