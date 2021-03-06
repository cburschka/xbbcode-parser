<?php

namespace Ermarian\XBBCode\Tree;

/**
 * An element representing a text fragment.
 */
class TextElement implements ElementInterface {

  /**
   * The text.
   *
   * @var string
   */
  protected $text;

  /**
   * TextElement constructor.
   *
   * @param string $text
   *   The text.
   */
  public function __construct($text) {
    $this->setText($text);
  }

  /**
   * @return string
   */
  public function getText(): string {
    return $this->text;
  }

  /**
   * @param string $text
   */
  public function setText($text) {
    $this->text = $text;
  }

  /**
   * {@inheritdoc}
   */
  public function render(): OutputElementInterface {
    return new OutputElement($this->getText());
  }

}
