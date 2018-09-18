<?php
namespace eduluz1976\user_management;


trait Hashable {

    protected $hash;


    /**
     * @return string
     */
    public function getHash()
    {
        return $this->hash;
    }

    /**
     * @param string $hash
     * @param bool $transform If true, calculate the hash of $hash variable.
     * @return $this
     */
    public function setHash($hash, $transform=false)
    {
        if ($transform) {
            $this->hash = hash('sha256',$hash);
        } else {
            $this->hash = $hash;
        }

        return $this;
    }





}