<?php
namespace Album\Form;

use Zend\Form\Form;

class AlbumForm extends Form
{
    //http://framework.zend.com/manual/2.2/en/modules/zend.form.quick-start.html
    //https://github.com/doctrine/DoctrineModule/blob/master/docs/hydrator.md#a-complete-example-using-zendform
    public function __construct($name = null)
    {
        // we want to ignore the name passed
        parent::__construct('album');

        $this->setAttribute('method', 'post');
        $this->add(array(
            'name' => 'id',
            'attributes' => array(
                'type'  => 'hidden',
            ),
        ));

        $this->add(array(
            'name' => 'artist',
            'attributes' => array(
                'type'  => 'text',
            ),
            'options' => array(
                'label' => 'Artist',
            ),
        ));

        $this->add(array(
            'name' => 'title',
            'attributes' => array(
                'type'  => 'text',
            ),
            'options' => array(
                'label' => 'Title',
            ),
        ));

        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type'  => 'submit',
                'value' => 'Go',
                'id' => 'submitbutton',
            ),
        ));

    }
}
