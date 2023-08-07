<?php

declare(strict_types=1);
require_once(dirname(__FILE__) . '/DB.php');

class News extends DB
{
    /**
     * PDOインスタンスを生成
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * ニュースの全件を返す
     *
     * @return array
     */
    public function all(string $desc, int $startNum = 0, int $getNum = 0): array
    {
        try {
            $sql = 'SELECT';
            $sql .= ' *';
            $sql .= ' FROM ' . $this->tblMain;
            if ($desc) {
                $sql .= ' ORDER BY posted_at DESC, id DESC';
            }
            if ($getNum > 0) {
                $sql .= ' LIMIT ' . $startNum . ', ' .  $getNum;
            }
            return $this->pdoObj->query($sql)->fetchAll();
        } catch (PDOException $e) {
            header('Content-Type: text/plain; charset=UTF-8', true, 500);
            exit($e->getMessage());
        }
    }
}
