<?php

namespace App\View\Components;

use Illuminate\View\Component;

class InventoryCard extends Component
{
  /**
   * Create a new component instance.
   *
   * @return void
   */

  public $loop, $category, $year, $subject, $capacity, $condition, $images, $id, $slug, $route;


  public function __construct($loop, $category, $year, $subject, $capacity = false, $condition, $images, $id, $slug, $route)
  {
    //
    $this->loop = $loop;
    $this->category = $category;
    $this->year = $year;
    $this->subject = $subject;
    $this->capacity = $capacity;
    $this->condition = $condition;
    $this->images = $images;
    $this->id = $id;
    $this->slug = $slug;
    $this->route = $route;
  }

  /**
   * Get the view / contents that represent the component.
   *
   * @return \Illuminate\Contracts\View\View|\Closure|string
   */
  public function render()
  {
    return view('components.inventory-card');
  }
}
