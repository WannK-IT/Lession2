<?php
class Form
{
    public static function createLabel($forName, $name)
    {
        return sprintf('<label for="%s">%s</label>', $forName, ucfirst($name));
    }

    public static function createInput($name, $type, $value, $description = null)
    {
        $desc = (!empty($description)) ? '<small class="form-text text-muted">' . $description . '</small>' : '';
        return sprintf('<input type="%s" id="%s" name="%s" value="%s" class="form-control" autocomplete="off">%s', $type, $name, $name, $value, $desc);
    }

    public static function createFormSelectBox($name, $arrOptions, $keySelected = null)
    {
        $xhtml = '';
        $xhtml .= '<select id="' . $name . '" name="' . $name . '" class="form-control">';
        if (!empty($arrOptions)) {
            foreach ($arrOptions as $key => $value) {
                $selected = ($keySelected == $key && !empty($keySelected)) ? 'selected' : '';
                $xhtml .= '<option value="' . $key . '" ' . $selected . '>' . $value . '</option>';
            }
        }
        $xhtml .=   '</select>';
        return $xhtml;
    }

    public static function formGroup($arrElement)
    {
        return sprintf('<div class="form-group">%s%s</div>', $arrElement['label'], $arrElement['input']);
    }

    public static function showForm($arrElement)
    {
        $xhtml = '';
        if (!empty($arrElement)) {
            foreach ($arrElement as $element) {
                $xhtml .= self::formGroup($element);
            }
        }
        return $xhtml;
    }
}
