<?php

class Primary_Nav_With_Description extends Walker_Nav_Menu
{
    public $add_description = false;
    public $description = "";
  
    public function start_lvl(&$output, $depth = 0, $args = array())
    {
        $desc = $this->description;
        
        if ($this->add_description) {
            $output .= "<ul class='sub-menu'><li class='description'><div class='menu-description'>".$desc."</div></li>\n";
        } else {
            $output .= "<ul class='sub-menu'>\n";
        }
    }
    public function end_lvl(&$output, $depth = 0, $args = array())
    {
        $output .= "</ul><div class='tri-outer'></div><div class='tri-inner'></div>\n";
    }
    public function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
    {
        $is_custom_dropdown = in_array("custom-dropdown", $item->classes);
        if ($is_custom_dropdown) {
            $this->add_description = true;
            $this->description = $item->description;
        } else {
            $this->add_description = false;
        }

        parent::start_el($output, $item, $depth, $args, $id);
    }
}
