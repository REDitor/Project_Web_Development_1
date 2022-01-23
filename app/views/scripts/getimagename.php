<?php
function getImageName($item): array|string
{
    $replacedSpaces = str_replace(' ', '_', $item->getTitle());
    return str_replace(':', '', $replacedSpaces);
}