<?php

/**
 * Description of system
 *
 * @author Administrator
 */
class YError {

    //put your code here
    private static $message = "";

    static function raseNotice($message) {
        YError::$message = $message;
        Yii::app()->session['message'] = $message;
        Yii::app()->session['rasestatuscode'] = "alert-success";
    }

    static function raseWarning($message) {
        YError::$message = $message;
        Yii::app()->session['message'] = $message;
        Yii::app()->session['rasestatuscode'] = "alert-warning";
    }

    static function showMessage() {

//         echo "<pre>" . print_r(Yii::app()->session, true) . "</pre> <hr />";
//         die("buging");

        $message = Yii::app()->session['message'];
        if (!empty($message) and $message != "") {
            echo '<div id="system-message" class="col-md-12">';
            echo '<div class="alert ' . Yii::app()->session['rasestatuscode'] . '" role="alert">';
            echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
            echo $message;
            echo '</div>';
            echo '</div>';
            Yii::app()->session['message'] = null;
            Yii::app()->session['rasestatuscode'] = null;
        }
    }

}
