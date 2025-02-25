<?php
class Card{
  public $name;
  public $img;
  public $link;
  public $description;

  public function __construct($name, $img, $link, $description){
    $this->name = $name;
    $this->img = $img;
    $this->link = $link;
    $this->description = $description;
    $this->display();
  }
  private function display(){
    echo <<<HTML
    <div class="card" style="background-image: url({$this->img});">
      <div class="card-body">
        <h5 class="card-title">{$this->name}</h5>
        <p class="card-description">{$this->description}</p>
        <a href="{$this->link}" class="btn btn-primary">{$this->name}</a>
      </div>
    </div>
    HTML;
  }
}
?>