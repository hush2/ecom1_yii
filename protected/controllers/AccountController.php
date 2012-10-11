<?php

class AccountController extends Controller
{
    public $model;

    //--------------------------------------------------------------------------
    // Process user login.
    //--------------------------------------------------------------------------
    public function actionLogin()
    {
        $this->model = new Login;
        if(isset($_POST['Login']))
        {
            $this->model->attributes = $_POST['Login'];
            if ($this->model->validate())
            {
                $this->redirect(Yii::app()->user->returnUrl);
            }
        }
        $this->render('//home/index');
    }

    //--------------------------------------------------------------------------
    // Logout current user.
    //--------------------------------------------------------------------------
    public function actionLogout()
    {
        // logout(FALSE) will keep the session, but clears auth data.
        Yii::app()->user->logout(FALSE);
        // We need the session here.
        Yii::app()->user->setFlash('logout', TRUE);

        $this->redirect(Yii::app()->homeUrl);
    }

    //--------------------------------------------------------------------------
    // Show form or handle registration data.
    //--------------------------------------------------------------------------
    public function actionRegister()
    {
        $this->pageTitle = 'Register';

        $form = new Users('register');
        if(isset($_POST['Users']))
        {
            $form->attributes = $_POST['Users'];
            if ($form->validate())
            {
                if ($form->add())
                {
                    Yii::app()->user->setFlash('success', TRUE);
                    $this->redirect(Yii::app()->request->url);
                }
                throw new CHttpException('500', 'You could not be registered due to a system error. We apologize for any inconvenience.');
            }
        }
        $this->render('//account/register', array('model' => $form));
    }

    //--------------------------------------------------------------------------
    // Show account renewal form
    //--------------------------------------------------------------------------
    public function actionRenew()
    {
        if (!empty($_POST))
        {
            $user = Users::model()->findByPk(Yii::app()->user->id);            
            if ($user->renew())
            {
                $this->redirect('logout');
            }
        }        
        $this->render('//account/renew');
    }

    //--------------------------------------------------------------------------
    // Show form or process forgot password data
    //--------------------------------------------------------------------------
    public function actionChangePassword()
    {
        $this->pageTitle = 'Change Password';

        $form = new ChangePassword;
        if (isset($_POST['ChangePassword']))
        {
            $form->attributes = $_POST['ChangePassword'];
            if ($form->validate())
            {
                if (Users::model()->changePassword($form->pass1))
                {
                    Yii::app()->user->setFlash('success', TRUE);
                    $this->redirect(Yii::app()->request->url);
                }
                throw new CHttpException(500, 'Your password could not be changed due to a system error. We apologize for any inconvenience.');
            }
        }
        $this->render('//account/change_password', array('model' => $form));
    }

    //--------------------------------------------------------------------------
    // Process forgot password data
    //--------------------------------------------------------------------------
    public function actionForgotPassword()
    {
        $this->pageTitle = 'Forgot Password';

        $form = new ForgotPassword();
        if (isset($_POST['ForgotPassword']))
        {
            $form->attributes = $_POST['ForgotPassword'];
            if ($form->validate())
            {
                $new_password = Users::model()->createNewPassword($form->email);
                if ($new_password)
                {
                    $message = "Your password to log into <whatever site> has been temporarily changed to '$new_password'. Please log in using that password and this email address. Then you may change your password to something more familiar.";
                    mail($form->email, 'Your temporary password.', $message, Yii::app()->params['adminEmail']);

                    Yii::app()->user->setFlash('success', TRUE);
                    $this->redirect(Yii::app()->request->url);
                }
                throw new CHttpException('500', 'Your password could not be changed due to a system error. We apologize for any inconvenience.');
            }
        }
        $this->render('//account/forgot_password', array('model' => $form));
    }
}
