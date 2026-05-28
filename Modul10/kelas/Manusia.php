<?php

class Manusia
{
    // Deklarasi Variabel
    protected $name;
    protected $nik = "123212131243243";
    protected $umur;

    // Getter dan Setter untuk $name
    public function getNama()
    {
        return $this->name;
    }

    public function setNama($name)
    {
        $this->name = $name;
    }

    // Getter untuk NIK
    public function getNIK()
    {
        return " {$this->nik} ";
    }

    // Getter dan Setter untuk $umur
    public function getUmur()
    {
        return $this->umur;
    }

    public function setUmur($umur)
    {
        $this->umur = $umur;
    }
}