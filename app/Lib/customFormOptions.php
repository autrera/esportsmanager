<?php

class customFormOptions
{
    
    public static function getOptionsDefault($textoAyuda = ''){
        return array(
            'div' => array(
                'class' => 'control-group'
            ),
            'label' => array(
                'class' => 'control-label'
            ),
            'class' => 'span6',
            'between' => '<div class = "controls">',
            'after' => '<div class = "help-block">'.$textoAyuda.'</div></div>',
            'error' => array(
                'attributes' => array(
                    'wrap' => 'span', 
                    'class' => array(
                        'help-block',
                        'pull-right',
                    )
                )
            ),
        );
    }

    public static function getOptionsFile($textoAyuda = ''){
        return array(
            'div' => array(
                'class' => 'control-group'
            ),
            'label' => array(
                'class' => 'control-label'
            ),
            'class' => 'input-file',
            'between' => '<div class = "controls">',
            'after' => '<div class = "help-block">'.$textoAyuda.'</div></div>',
            'error' => array(
                'attributes' => array(
                    'wrap' => 'span', 
                    'class' => array(
                        'help-block',
                        'pull-right',
                    )
                )
            ),
            'type' => 'file',
        );
    }

    public static function getOptionsCheckBox($textoAyuda = ''){
        return array(
            'div' => array(
                'class' => 'control-group'
            ),
            'label' => array(
                'class' => 'control-label'
            ),
            'class' => '',
            'before' => '<div class = "controls"><label class = "checkbox">',
            'after' => '</label><div class = "help-block">'.$textoAyuda.'</div></div>',
            'format' => array(
                'label', 'before', 'input', 'after'
            ),
        );
    }

    public static function getOptionsBtnSubmit(){
        return array(
            'value' => 'Submit',
            'class' => array('btn', 'btn-primary', 'btn-large'),
            'div' => array(
                'class' => 'form-actions',
            )
        );
    }
}

?>