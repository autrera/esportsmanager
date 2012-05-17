<?php

class customFormOptions
{
    
    public static function getOptionsDefault($textoAyuda = '', 
        $override = array()
    ){
        return array_merge(
            array(
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
            ),
            $override
        );
    }

    public static function getOptionsFile($textoAyuda = '',
        $override = array()
    ){
        return array_merge(
            array(
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
            ),
            $override
        );
    }

    public static function getOptionsCheckBox($textoAyuda = '',
        $override = array()
    ){
        return array_merge(
            array(
                'div' => array(
                    'class' => 'control-group'
                ),
                'type' => 'checkbox', 
                'label' => array(
                    'class' => 'control-label'
                ),
                'class' => '',
                'before' => '<div class = "controls"><label class = "checkbox">',
                'after' => '</label><div class = "help-block">'.$textoAyuda.'</div></div>',
                'format' => array(
                    'label', 'before', 'input', 'after'
                ),
            ),
            $override
        );
    }

    public static function getOptionsBtnSubmit($btnText = 'Save',
        $override = array()
    ){
        return array_merge(
            array(
                'label' => $btnText,
                'text' => $btnText,
                'class' => array('btn', 'btn-primary'),
                'div' => array(
                    'class' => 'form-actions',
                )
            ),
            $override
        );
    }
}

?>