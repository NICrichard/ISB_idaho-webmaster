<?php

class HideOptional {
  public static function setting($position, $form_id) {
    if ( $position == -1 ) : ?>
      <li class="visibility_setting field_setting">
        <input type="checkbox" id="field_hide_optional" onclick="SetFieldProperty('hideOptional', this.checked);" /> Hide (Optional)
      </li>
    <?php endif;
  }

  public static function script() {
    ?>
    <script type='text/javascript'>
      jQuery(document).bind("gform_load_field_settings", function(event, field, form){
        jQuery("#field_hide_optional").attr("checked", field["hideOptional"] == true);
      });
    </script>
    <?php
  }
}

add_action( 'gform_field_advanced_settings', array('HideOptional', 'setting'), 10, 2 );
add_action( 'gform_editor_js', array('HideOptional', 'script') );

class GravityForms {
  private static $sizes = array(
    'small' => 5,
    'medium' => 7,
    'large' => 9
  );

  private static $html;
  private static $field;
  private static $xpath;

  private static function dom() {
    $dom = new DOMDocument();
    $dom->loadHTML(self::$html);
    $xpath = new DOMXpath($dom);
    self::$xpath = $xpath;
    return $dom;
  }

  private static function queryClass($class) {
    $node = self::$xpath->query("//*[contains(@class, '$class')]");
    if ($node->length) {
      return $node->item(0);
    } else {
      return false;
    }
  }

  private static function addOptional($container) {
    if (!self::$field->isRequired && self::$field->type !== 'gf_no_captcha_recaptcha') {
      $node = new DOMElement('div', '(Optional)');
      $container->insertBefore($node, $container->firstChild);
      $node->setAttribute('class', 'gfield_not_required');
    }
  }

  private static function moveDescription($container) {
    if (self::$field->description) {
      $description = self::queryClass('gfield_description');
      $container->insertBefore($description, $container->firstChild);
    }
  }

  private static function fixSizing($container) {
    if (self::$field->type !== 'gf_no_captcha_recaptcha') {
      $container->setAttribute('class', $container->getAttribute('class') . ' col-sm-' . self::$sizes[self::$field->size]);
    } else {
      $container->setAttribute('class', $container->getAttribute('class') . ' col-sm-10');
    }
  }

  private static function removeRequired() {
    if (self::$field->isRequired) {
      $required = self::queryClass('gfield_required');
      $required->parentNode->removeChild($required);
    }
    
  }

  public static function callback($html, $field) {

    self::$html = $html;
    self::$field = $field;

    $skip_fields = array('html', 'hidden', 'section', 'captcha');

    if (!empty($html) && !in_array($field->type, $skip_fields)) {
      $dom = self::dom();
    } else {
      return $html;
    }

    if ($container = self::queryClass('ginput_container')) {
      if (!$field->hideOptional) {
        self::addOptional($container);
      }
      self::moveDescription($container);
      self::fixSizing($container);
      self::removeRequired();

      self::$html = $dom->saveHTML();
    }

    return self::$html;
  }
}

add_filter('gform_field_content', array('GravityForms', 'callback'), 10, 2);
