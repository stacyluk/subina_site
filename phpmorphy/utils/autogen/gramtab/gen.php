<?php
require_once(dirname(__FILE__).'/../../dict_stuff/dict/source/utils/gramtab/helper.php');

class phpMorphy_GramTab_Consts_Generator
{
    static function generate($outFile)
    {
        $clazz = __CLASS__;
        $obj = new $clazz();
        return $obj->doGenerate($outFile);
    }

    private function doGenerate($outFile)
    {
        if (false === ($fh = fopen($outFile, 'wt'))) {
            throw new Exception("Can`t open '$outFile' file");
        }

        fputs($fh, '<'."?php\n");
        fputs($fh, '// This file is autogenerated at '.date('r').', don`t change it!'."\n\n");

        $files = phpMorphy_GramTab_Const_Factory::getAllXmlFiles();

        foreach ($files as $file) {
            $helper = phpMorphy_GramTab_Const_Factory::createByXml($file);

            $this->writeConsts($fh, $helper);

            fputs($fh, '// '.str_repeat('-', 79)."\n\n");
        }

        fclose($fh);
    }

    private function writeConsts($fh, phpMorphy_GramTab_Const_Helper_Interface $helper)
    {
        fputs($fh, "// parts of speech\n");
        fputs($fh, $this->generateConsts($helper, 'getPosesConsts')."\n");
        fputs($fh, "// grammems\n");
        fputs($fh, $this->generateConsts($helper, 'getGrammemsConsts'));
    }

    protected function generateConsts(phpMorphy_GramTab_Const_Helper_Interface $helper, $method)
    {
        $result = array();

        foreach ($helper->$method() as $id => $name) {
            $result[] = $this->generateConst($id, $name);
        }

        return implode("\n", $result)."\n";
    }

    private function generateConst($id, $name)
    {
        return "define('$name', $id);";
    }
}

function generate_gramtab_consts_file($outFile)
{
    return phpMorphy_GramTab_Consts_Generator::generate($outFile);
}