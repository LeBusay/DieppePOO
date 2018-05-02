<?php
class Form
{
    public $path;
    public $file;
    public function __construct($p, $f)
    {
        $this->path = $p;
        $this->file = $f;
    }
    public function frmGenerate($actionURI)
    {
        $conf = parse_ini_file($this->path . $this->file . ".ini", true);
        echo "<pre>";
        print_r($conf);
        echo "</pre>";
        $form = "<form method='POST' action='$actionURI' name=>";

        foreach($conf as $content) {
            $form .= "<div>";
            $form .= "<label for='";
            $form .= isset($content['name']) ? $content['name'] : "";
            $form .= "'>";
            $form .= isset($content['name']) ? $content['name'] : "";
            $form .= "</label>";
            $form .= "<";
            $form .= $content['tag'];
            $form .= " ";
            $form .= "type='";
            $form .= $content['type'];
            $form .= "' ";
            $form .= isset($content['name']) ? "name='" . $content['name'] . "'" : "";
            $form .= " />";
            $form .= "</div>";
        }
        $form .= "</form>";
        return $form;
    }

    public function frmCheck()
    {
    }
}