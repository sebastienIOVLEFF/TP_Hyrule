<?php
class Acc
{
    public $items;

    public function __construct($items = [])
    {
        $this->items = $items;
        $this->display();
    }
    private function display()
    {

        foreach ($this->items as $item) {
            $name = $item;
            echo <<<HTML
    <div class="accordion">
        <div class="accordion-item">
            <button class="accordion-header">{$name}</button>
            <div class="accordion-content">
HTML;

            require $item;

            echo <<<HTML
            </div>
        </div>
    </div>
HTML;
        }
        echo <<<HTML
    <script>
        document.querySelectorAll('.accordion-header').forEach(button => {
            button.addEventListener('click', function () {
                // Close other open forms
                document.querySelectorAll('.accordion-content').forEach(content => {
                    if (content !== this.nextElementSibling) {
                        content.style.display = 'none';
                    }
                });
              
                // Toggle visibility of clicked form
                let content = this.nextElementSibling;
                content.style.display = content.style.display === 'block' ? 'none' : 'block';
            });
        });
    </script>
HTML;
    }
}
?>