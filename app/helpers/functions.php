<?php

/**
 * Transformación de Markdown a HTML
 *
 * @param $markdownText
 * @return string
 */
function transformMarkdowntoHtml($markdownText)
{
    return Markdown::string($markdownText);
}