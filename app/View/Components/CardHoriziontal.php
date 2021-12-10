<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CardHoriziontal extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $id;
    public $name;
    public $title;
    public $description;
    public $old_price;
    public $new_price;
    public $discount;
    public $image;  
    public $link; //the link to detail product
    public $rate;

    public function __construct($id=null, $name=null, $title=null, $price=null, $description=null, $discount=null, $image=null, $link=null, $rate=0)
    {
        $this->id = $id;
        $this->name = $name;
        $this->title = $title;
        $this->description = $description;
        $this->old_price= floatval($price);
        $this->discount = floatval($discount);
        $this->image = $image;
        $this->link = $link;
        if($discount !=0 || $discount != null) {
            $this->new_price = round( (100-$discount)/100*$this->old_price, 2);
        }
        $this->rate=$rate;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.card-horiziontal');
    }
}
