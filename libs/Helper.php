<?php
class Helper
{
    public static function showEmptyRow($colspan = 5, $message = 'Dữ liệu đang được cập nhật!')
    {
        return sprintf('<tr><td class="text-14" colspan="%s" style="text-align: center">%s</td></tr>', $colspan, $message);
    }

    public static function randomString($length = 8)
    {
        $arrChar = array_merge(range('A', 'Z'), range('a', 'z'), range(0, 9));
        $arrChar = implode('', $arrChar);
        $arrChar = str_shuffle($arrChar);

        $result = substr($arrChar, 0, $length);
        return $result;
    }

    public static function showError($errors)
    {
        $xhtml = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    ' . $errors . '
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
        return $xhtml;
        
    }

    public static function navBar($arrElement, $classActive)
    {
        $xhtml = '';
        if (!empty($arrElement)) {
            foreach ($arrElement as $item) {
                $nameNavBar     = strtolower($item['name']);
                $classActive    = ($classActive == 'index') ? 'home' : $classActive;
                $active     = (strtolower($nameNavBar) == $classActive) ? 'btn-primary' : 'btn-white';
                $xhtml .= '<a class="btn ' . $active . ' px-3" href="' . $item['link'] . '">' . ucfirst($nameNavBar) . '</a>';
            }
        }
        return $xhtml;
    }

    public static function highlightSearch($keyword, $string)
    {
        $xhtml = !empty($keyword) ? preg_replace("#$keyword#ui", "<mark class='p-0 bg-warning'>$0</mark>", $string) : $string;
        return $xhtml;
    }
}
