<?php
namespace CivContent\View\Helper;

use Zend\View\Helper\AbstractHelper;

class RenderFormHorizontal extends AbstractHelper
{
    public function __invoke($form)
    {
        // Prepare the form.
        $form->prepare();

        // Render the output.
        $form->setAttribute('class', 'form-horizontal');
        $output = $this->view->form()->openTag($form) . PHP_EOL;
        $submits = array();
        $elements = $form->getElements();
        foreach($elements as $element)
        {
            $elementClass = get_class($element);
            $hidden = ($element->getAttribute('type') == 'hidden');
            $button = ($element->getAttribute('type') == 'submit');
            
            if ((!$hidden) && (!$button))
            {
                $messages = $element->getMessages();
                if (empty($messages)) {
                    $output .= '<div class="form-group">' . PHP_EOL;
                } else {
                    $output .= '<div class="form-group has-error">';
                }
            }

            // Render label if present.
            $label = $element->getLabel();
            if (isset($label) && ('' !== $label) && ($elementClass != 'Zend\Form\Element\Button'))
            {
                $element->setLabelAttributes(array('class' => 'col-sm-2 control-label'));
                $output .= $this->view->formLabel($element) . PHP_EOL;
            }

            // Render the actual element (and any errors)
            if ((!$hidden) && (!$button))
            {
                $output .= '<div class="col-sm-10">' . PHP_EOL;
            }
            
            if (!$button)
            {
                $output .= $this->view->formElement($element) . PHP_EOL;
                $output .= $this->view->formElementErrors($element, array('class' => 'help-block')) . PHP_EOL;
            }
            else
            {
                $submits[] = $element;   
            }
            
            // Close divs if reqd
            if (!$hidden && (!$button))
            {
                $output .= '</div>' . PHP_EOL;
                $output .= '</div>' . PHP_EOL;
            }
        }
        
        // now render any buttons.
        if (!empty($submits))
        {
            $output .= '<div class="form-group">' .PHP_EOL;
            $output .= '<div class="col-sm-offset-2 col-sm-10">' . PHP_EOL;
            foreach($submits as $element)
            {
                $output .= $this->view->formElement($element) . PHP_EOL;
            }
            $output .= '</div>' . PHP_EOL;
            $output .= '</div>' . PHP_EOL;
        }
        
        // Close the form.
        $output .= $this->view->form()->closeTag($form) . PHP_EOL;

        // Return the output.
        return $output;
    }
}