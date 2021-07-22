<?php
namespace App\Views;

use App\View;

class ListRender
{
    private array $list = [];
    private bool $isOrdered;

    public function __construct(array $list)
    {
        $this->list = $list;
        $this->isOrdered = false;
    }

    public function ordered(bool $isOrdered): void
    {
        $this->isOrdered = $isOrdered;
    }

    public function render(): string
    {
        return View::render('compenent/' . ($this->isOrdered ? 'ordered' : 'unordered') . 'List.php', [
                    'list' => $this->list,
                ]);
    }
}
