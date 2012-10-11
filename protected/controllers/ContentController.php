<?php

class ContentController extends Controller
{
    //--------------------------------------------------------------------------
    // Show titles from a category
    //--------------------------------------------------------------------------
    public function actionCategory($category_id)
    {
        if ($category = Categories::model()->findByPk($category_id))
        {
            $this->pageTitle = $category->category;

            $data['titles'] = Pages::model()->findAllByAttributes(
                                        array('category_id' => $category_id),
                                        array('order' => 'date_created DESC'));
            return $this->render('//content/category', $data);
        }
        throw new CHttpException('404');
    }

    //--------------------------------------------------------------------------
    // Show page detail
    //--------------------------------------------------------------------------
    public function actionPage($page_id)
    {
        if ($page = Pages::model()->findByPk($page_id))
        {
            $this->pageTitle = $page->title;

            if (!Yii::app()->user->isGuest)
            {
                History::model()->add($page_id, 'page');
            }
            return $this->render('//content/page', array('page' => $page));
        }
        throw new CHttpException('404');
    }

    //--------------------------------------------------------------------------
    // Add a page from favorites.
    //--------------------------------------------------------------------------
    public function actionAddToFavorites($page_id)
    {
        if (Favorites::model()->add($page_id))
        {
            $this->redirect(array("/page/{$page_id}"));
        }
        throw new CHttpException('404');
    }

    //--------------------------------------------------------------------------
    // Remove a page from favorites.
    //--------------------------------------------------------------------------
    public function actionRemoveFromFavorites($page_id)
    {
        if (Favorites::model()->remove($page_id))
        {
            $this->redirect(array("/page/{$page_id}"));
        }
        throw new CHttpException('404');
    }

    //--------------------------------------------------------------------------
    // Show list of favorite pages.
    //--------------------------------------------------------------------------
    public function actionFavorites()
    {
        $this->pageTitle = 'Your Favorite Pages';

        $data['favorites'] = Favorites::model()->all();
        $this->render('//content/favorites', $data);

    }

    //--------------------------------------------------------------------------
    // Show PDF titles
    //--------------------------------------------------------------------------
    public function actionPdfs()
    {
        $this->pageTitle = 'PDF';

        $data['titles'] = Pdfs::model()->all();
        $this->render('//content/pdfs', $data);

    }

    //--------------------------------------------------------------------------
    // Download PDF file
    //--------------------------------------------------------------------------
    public function actionViewPdf($tmp_name)
    {
        $file = Yii::getPathOfAlias('uploads') . "/$tmp_name";
        if (file_exists($file) AND is_file($file))
        {
            $pdf = Pdfs::model()->findByAttributes(
                                    array('tmp_name' => $tmp_name));
            if (Yii::app()->user->isGuest OR Yii::app()->user->isExpired)
            {
                $this->pageTitle = $pdf->title;
                return $this->render('//content/view_pdf', array('pdf' => $pdf));
            }
            History::model()->add($pdf->id, 'pdf');
            CHttpRequest::sendFile($pdf->file_name, file_get_contents($file), 'pdf', TRUE);
        }
        throw new CHttpException('404');
    }

    //--------------------------------------------------------------------------
    // Show 'Your Viewing History'.
    //--------------------------------------------------------------------------
    public function actionHistory()
    {
        $this->pageTitle = 'Your Viewing History';

        $data['pageHistory'] = History::model()->all('page');
        $data['pdfHistory']  = History::model()->all('pdf');

        $this->render('//content/history', $data);
    }

}
