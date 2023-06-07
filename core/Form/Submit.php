<?php

namespace Core\Form;

class Submit extends Field
{
    protected string $button;


    protected function template(): string
    {
        $button = null;
        $buttonText = $button['text'];
        $attributes = $button['attributes'];

        $buttonHtml = '<button type="submit"';

        foreach ($attributes as $attribute => $value) {
            $buttonHtml .= ' ' . $attribute . '="' . $value . '"';
        }

        $buttonHtml .= '>' . $buttonText . '</button>';

        return $buttonHtml;
    }
}
