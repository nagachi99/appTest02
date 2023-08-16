<?php
/**
 * XSS対策のサニタイジングと参照名省略
 *
 * @param string | null string
 * @return string | null
 *
 */
function h(?string $string): ?string
{
    if (empty($string)) return null;
    return htmlspecialchars($string, ENT_QUOTES | ENT_HTML5, 'UTF-8');
}


/**
 * セッションIDを基にハッシュを返す
 *
 * @return string
 */
function getToken(): string
{
    return hash('sha256', session_id());
}
