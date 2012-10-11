<?php

class AdminController extends Controller
{
    //--------------------------------------------------------------------------
    // Process submitted page.
    //--------------------------------------------------------------------------
    public function actionAddPage()
    {
        $this->pageTitle = 'Add a Site Content Page';

        $model = new Pages();
        if (isset($_POST['Pages']))
        {
            $model->attributes = $_POST['Pages'];
            if ($model->validate())
            {
                if ($model->add())
                {
                    Yii::app()->user->setFlash('success', TRUE);
                    $this->redirect(Yii::app()->request->url);
                }
                throw new CHttpException('500', 'The page could not be added due to a system error. We apologize for any inconvenience.');
            }
        }
        $this->render('//admin/add_page', array('model' => $model));
    }

    //--------------------------------------------------------------------------
    // Process submitted PDF file.
    //--------------------------------------------------------------------------
    public function actionAddPdf()
    {
        $this->pageTitle = 'Add a PDF';

        $model = new Pdfs('upload');
        if (isset($_POST['Pdfs']))
        {
            $model->attributes = $_POST['Pdfs'];
            if ($model->validate())
            {
                $saveDir = Yii::getPathOfAlias('uploads');
                if ($model->add($saveDir))
                {
                    Yii::app()->user->setFlash('success', TRUE);
                    $this->redirect(Yii::app()->request->url);
                }
                throw new CHttpException('500', 'The PDF could not be added due to a system error. We apologize for any inconvenience.');
            }
        }
        $this->render('//admin/add_pdf', array('model' => $model));
    }
}
