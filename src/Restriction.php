<?php
namespace eduluz1976\user_management;

trait Restriction {

    /**
     * @var int
     */
    protected $restriction=0;


    /**
     * @return string
     */
    public function getRestriction()
    {
        return $this->restriction;
    }

    /**
     * @param string $restriction
     * @return $this
     */
    public function setRestriction($restriction)
    {
        $this->restriction = $restriction;
        return $this;
    }

}