<?php

class TalkController extends Controller
{
    public function filters()
    {
        return array(
            'ajaxOnly + add, list',
            'postOnly + add',
        );
    }

	public function actionIndex()
	{
		$this->render('index', array('phrase' => new Phrase()));
	}

    public function actionAdd()
    {
        $model = new Phrase();
        foreach(CJSON::decode($GLOBALS['HTTP_RAW_POST_DATA']) as $var=>$value) {
            if($model->hasAttribute($var))
                $model->$var = $value;
            else
                $this->_sendResponse(500,
                    sprintf('Parameter <b>%s</b> is not allowed', $var) );
        }
        if($model->save())
            echo CJSON::encode($model);
        else {
            $this->_sendResponse(500, CJSON::encode($model->errors) );
        }
    }

    public function actionList()
    {
        //echo CJSON::encode($_REQUEST); exit;
        $messageId = !empty($_REQUEST['message_id']) ? $_REQUEST['message_id'] : 0;
        $phraseList = Phrase::model()->findAll('phrase_id > :phrase_id', array(':phrase_id' => $messageId));
        if($phraseList){
            echo CJSON::encode($phraseList);
        }

    }

    private function _sendResponse($status = 200, $body = '', $content_type = 'text/html')
    {
        $status_header = 'HTTP/1.1 ' . $status . ' ' . $this->_getStatusCodeMessage($status);
        header($status_header);
        header('Content-type: ' . $content_type);

        // pages with body are easy
        if(!empty($body))
        {
            echo $body;
        }
        Yii::app()->end();
    }


}