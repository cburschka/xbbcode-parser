<?php

namespace Ermarian\XBBCode\Tree;

/**
 * The root element of the tag tree.
 */
class RootElement extends NodeElement {

  /**
   * {@inheritdoc}
   */
  public function render() {
    return $this->getContent();
  }

}