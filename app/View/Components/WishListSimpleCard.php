<?php

namespace App\View\Components;

use Illuminate\View\Component;

class WishListSimpleCard extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $title;
    public $price;
    public $quantity;
    public $subtotal;
    public $image;
    public $link; //the link to detail product

    public function __construct($title, $price, $quantity, $image, $link)
    {
        $this->title = $title;
        $this->price = floatval($price);
        $this->quantity = $quantity;
        $this->subtotal = round($this->price*$this->quantity, 2);
        $this->image = $image;
        $this->link = $link;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.wishlist-simple-card');
    }
}
