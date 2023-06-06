<?php

namespace Core\Form;

class Submit extends Field
{
    protected string $button;
//    public function __toString(): string
//    {
//        $submit = '<button type="submit"';
//
//        foreach ($this->attributes as $attribute => $value) {
//            $submit .= ' ' . $attribute . '="' . $value . '"';
//        }
//
//        $submit .= '</button>';
//
//        return $submit;
//    }
    public function __toString( ): string
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