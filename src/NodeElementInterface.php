<?php

namespace Ermarian\XBBCode;

/**
 * Interface for node elements.
 */
interface NodeElementInterface extends ElementInterface {

  /**
   * Append an element to the children of this element.
   *
   * @param \Ermarian\XBBCode\ElementInterface $element
   *   The new element.
   */
  public function append(ElementInterface $element);

  /**
   * Retrieve the rendered content of the element.
   *
   * @return string
   *   The rendered content.
   */
  public function getContent();

  /**
   * Iterate through all descendants of the element.
   *
   * @return \Ermarian\XBBCode\ElementInterface[]
   *   Every element below this element.
   */
  public function getDescendants();

  /**
   * Get the set of tag names rendered.
   *
   * @return string[]
   *   The set of tags, indexed by tag name.
   */
  public function getRenderedTags();

}