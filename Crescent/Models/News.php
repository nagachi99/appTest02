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
            $sql .= ' WHERE deleted_at IS NULL';
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

    /**
     * 4つの値を基にニュースを追加する
     *
     * @param array $postArr
     * @return void
     */
    public function add(array $postArr): void
    {
        $sql  = 'INSERT';
        $sql .= ' INTO ' . $this->tblMain;
        $sql .= ' (posted_at, title, message, image)';
        $sql .= ' VALUES ("' . $postArr['posted'] . '", :title, :message, "' . $postArr['image'] . '")';
        $stmt = $this->pdoObj->prepare($sql);
        $stmt->bindValue(':title',   $postArr['title'],   PDO::PARAM_STR);
        $stmt->bindValue(':message', $postArr['message'], PDO::PARAM_STR);
        $stmt->execute();
    }

    /**
     * ID番号を元に一件分の配列を返す
     * @param integer $id
     * @return boolean|array
     */
    public function find(int $id): bool|array
    {
        $sql = 'SELECT';
        $sql .= ' *';
        $sql .= ' FROM ' . $this->tblMain;
        $sql .= ' WHERE id = :id AND deleted_at IS NULL';
        $stmt = $this->pdoObj->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }

    /**
     * ID番号を元に一件分を更新する
     *
     * @param array $postArr
     * @param integer $id
     * @return void
     */
    public function update(array $postArr, int $id): void
    {
        $sql = 'UPDATE';
        $sql .= ' ' . $this->tblMain;
        $sql .= ' SET';
        $sql .= ' posted_at = :posted_at, title = :title, message = :message, image = :image';
        $sql .= ' WHERE id = :id AND deleted_at IS NULL';
        $stmt = $this->pdoObj->prepare($sql);
        $stmt->bindValue(':posted_at', $postArr['posted'],  PDO::PARAM_STR);
        $stmt->bindValue(':title',     $postArr['title'],   PDO::PARAM_STR);
        $stmt->bindValue(':message',   $postArr['message'], PDO::PARAM_STR);
        $stmt->bindValue(':image',     $postArr['image'],   PDO::PARAM_STR);
        $stmt->bindValue(':id',   (int) $id,                PDO::PARAM_INT);
        $stmt->execute();
    }

    /**
     * ID番号を元に一件分を削除する
     *
     * @param integer $id
     * @return void
     */
    public function delete(int $id): void
    {
        $sql = 'UPDATE';
        $sql .= ' ' . $this->tblMain;
        $sql .= ' SET deleted_at = NOW()';
        $sql .= ' WHERE id = :id';
        $stmt = $this->pdoObj->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    /**
     * 全件数を返す
     *
     * @return array
     */
    public function count(): array
    {
        $sql  = 'SELECT';
        $sql .= ' COUNT(*) AS hits';
        $sql .= ' FROM ' . $this->tblMain;
        $sql .= ' WHERE deleted_at is null';
        return $this->pdoObj->query($sql)->fetch();
    }
}
