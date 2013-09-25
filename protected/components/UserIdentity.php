<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	 private $_id;
	 
	public function authenticate()
	{
		$username=strtolower($this->username);
		$user=Usuario::model()->find('LOWER(usr_usuario)=?',array($username));
		
		//Si el usuario no existe se marca el error.
		if($user===null)
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		//Si el pswd es incorrecto marcar el error.	
		else if(!$user->validatePassword($this->password))
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		//Si todo es correcto inicia sesion.	
		else
		{
			$this->_id=$user->usr_id;
			Yii::app()->session['id']=$user->usr_id;
			$this->username=$user->usr_usuario;
			Yii::app()->session['nombre'] = $user->usr_nombre;
			Yii::app()->session['apellidos'] = $user->usr_apellidos;
			Yii::app()->session['tipo'] = $user->usr_tipo;
			if($user->usr_tipo=='Administrador')
				Yii::app()->session['admin'] = true;
			else
				Yii::app()->session['admin'] = false;
			$this->errorCode=self::ERROR_NONE;
		}
		return $this->errorCode==self::ERROR_NONE;

	}
	public function getId()
	{
		return $this->_id;
	}

}