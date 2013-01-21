<?php

class UserIdentity extends CUserIdentity {

    private $_id;

    //USE md5 in password later md5($this->password)
    public function authenticate() {
        $user = User::model()->findByAttributes(array('username' => $this->username));
        if ($user === null)
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        else if ($user->password !== md5($this->password)) //md5
            $this->errorCode = self::ERROR_PASSWORD_INVALID;
        else {
            $this->_id = $user->username;
            $this->setState('role', $user->role);
            $this->setState('empNumber', $user->emp_number);
            $this->setState('user', $user->username);
            $auth = Yii::app()->authManager; //initializes the authManager

            if (!$auth->isAssigned($user->role, $this->_id)) { //checks if the role for this user has already been assigned and if it is NOT than it returns true and continues with assigning it below
                if ($auth->assign($user->role, $this->_id)) { //assigns the role to the user
                    Yii::app()->authManager->save(); //saves the above declaration
                }
            }
            $this->errorCode = self::ERROR_NONE;
        }
        return!$this->errorCode;
    }

    public function getId() {
        return $this->_id;
    }

}

