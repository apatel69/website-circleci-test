<?php
    namespace App;

    use Sober\Controller\Controller;

class NameGenerator extends Controller
{
    private $industry;
    private $keyWord;
    private $start;
    private $templates;

    /**
         * @param string $industry   Industry for name being requested.
         * @param string $keyWord    Key word provided for the business name.
         * @param int $start         Index to start generating names (defaults to 0).
         */
    public function __construct($industry, $keyWord, $start = 0) {
        $this->industry = $industry;
        $this->keyWord = $keyWord;
        $this->start = $start;
        $this->templates = $this->getTemplates($industry);
    }

    //The templates are hardcoded for now but should be read in from somewhere?
    private function getTemplates($industry) {
        if ($industry == "creatives") {
            return array(
                "{} Shop",
                "{} Idea",
                "{} Concept",
                "{} Pixel Perfect",
                "{} Space",
                "{} Union",
                "{} Portfolio",
                "{} Interactive",
                "{} Creative",
                "{} Agency",
                "{} Biz",
                "{} Avant-garde",
                "{} Bonanza",
                "{} Art Market",
                "{} Solutions",
                "The {} Group",
                "{} Collective",
                "{} Crew",
                "Unique {}",
                "{} Creations",
                "{} Boutique",
                "{} Studio",
                "Studio {}",
                "Creative {}",
                "{} Collective",
                "House of {}",
                "The Mighty {}",
                "{} Concepts",
                "{} Factory",
                "The Factory of {}"
            );
        } elseif ($industry == "legal") {
            return array(
                "{} Biz",
                "{} And Order",
                "{} Leading Edge",
                "{} Theorem",
                "{} Foundation",
                "{} Market Watch",
                "{} Growth",
                "{} Business Center",
                "{} Counsel",
                "{} At-law",
                "{} Barrister",
                "{} Advisory",
                "The {} Group",
                "{} Partners",
                "{} Advisory",
                "{} Associates",
                "{} and Associates",
                "{} Council",
                "Council of {}"
            );
        } elseif ($industry == "trades") {
            return array(
            "{} Homeservices",
            "{} Zervices",
            "{} Hammer Times",
            "{} Fabricator",
            "{} Maker",
            "{} Foundry",
            "{} General",
            "{} Co-op",
            "{} Artisan",
            "{} Jobber",
            "{} Megacorp",
            "{} Handy",
            "{} Depot",
            "{} Bolt & Nut",
            "{} Handicraft",
            "{} Enterprise",
            "{} Limited",
            "Trade of {}",
            "{} Foundry",
            "Foundry of {}",
            "{} Supplies"
            );
        } else {
            //$industry == "it" at this point (should already be validated)
            return array(
            "{} Limited",
            "{} Nerd Squad",
            "{} Compu-global",
            "{} Hyper-mega",
            "{} Micro-logic",
            "{} Abacus Inc",
            "{} Intelligence",
            "{} Data Processing",
            "{} Brain Trust",
            "{} Quadrants",
            "{} Gizmo",
            "{} Infinity",
            "{} Wizard",
            "{} Labs",
            "{} Solution",
            "{} Communications",
            "{} Enterprise",
            "Data {}",
            "{} Innovations",
            "{} Interactive",
            "Interactive {}",
            "{} Multimedia",
            "Cyber {}",
            "Infinity {}",
            "Digital {}",
            "{} Cybernauts",
            "{} Lightspeed",
            "{} Optics",
            "{} Technology",
            "{} Digital",
            "{} Cybertronics"
            );
        }
    }

    /**
         * Generates names
         *
         * @param int $numberOfNames    Number of names to generate
         * @return array[BusinessName]  An array of objects of type BusinessName
         */
    public function generate($numberOfNames) {
        $names = array();
        for ($i = 0; $i < $numberOfNames; $i++) {
            $template = $this->templates[($i + $this->start) % count($this->templates)];
            array_push($names, new BusinessName($template, $this->keyWord));
        }
        return $names;
    }
}
