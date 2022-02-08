<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/Lets-Freerun/app/Autoloader.php";
__load_all_classes();

class Spot {

    /** @var string $name */
    private $name;

    /** @var int $tier */
    private $tier;

    /** @var Location $location */
    private $location;

    /** @var UID $uid */
    private $uid;

    public function __construct(string $name, int $tier, Location $location, UID $uid = null){
        $this->name = $name;
        $this->tier = $tier;
        $this->location = $location;
        $this->uid = is_null($uid) ? $this->uid = new UID() : $this->uid = $uid;
    }

    /**
     * @return string
     */
    public function get_name() : string { return $this->name; }

    /**
     * @return int
     */
    public function get_tier() : int { return $this->tier; }

    /**
     * @return Location
     */
    public function get_location() : Location { return $this->location; }

    /**
     * @return int
     */
    public function get_uid() : int { return $this->uid->get_content(); }

    /**
     * @return string
     */
    public function tier_to_category() : string {
        switch ($this->tier){
            case 0:
                return "famous";
            case 1:
                return "uncommon";
            case 2:
                return "all";
        }
    }
}